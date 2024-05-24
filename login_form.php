<?php
// Include your database connection file here
@include 'config/config.php';

session_start();

$errors = [];

if (isset($_POST['submit'])) {
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pass = md5($_POST['password']);
  $user_type = $_POST['user_type'];

  $select = "SELECT * FROM user_form WHERE email = '$email' AND password = '$pass' AND user_type = '$user_type'";

  $result = mysqli_query($conn, $select);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    if ($row['user_type'] == 'admin') {
      $_SESSION['admin_name'] = $row['name'];
      header('location: admin_page.php');
      exit();
    } elseif ($row['user_type'] == 'student') {
      $_SESSION['user_name'] = $row['name'];
      $_SESSION['email'] = $email;
      header('location: homepage.php');
      exit();
    }
  } else {
    $errors[] = 'Incorrect email, password, or user type!';
  }

  // Store errors in session
  $_SESSION['errors'] = $errors;

  // Store form data in session for repopulating fields
  $_SESSION['form_data'] = $_POST;

  // Redirect to current page to clear POST data from URL
  header("Location: {$_SERVER['REQUEST_URI']}");
  exit();
}

// Retrieve errors from session
$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];

// Retrieve form data from session for repopulating fields
$form_data = isset($_SESSION['form_data']) ? $_SESSION['form_data'] : [];

// Clear session data
unset($_SESSION['errors']);
unset($_SESSION['form_data']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dnyanshree Login</title>
  <link rel="stylesheet" href="css/loginpage.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body style="background: url(img/diet.png) no-repeat;  background-size: cover; background-position: center;">
  <div class="wrapper">
    <form action="" method="post">
      <h1>Login</h1>
      <div class="input-box">
        <input type="text" name="email" placeholder="Email"
          value="<?php echo isset($form_data['email']) ? htmlspecialchars($form_data['email']) : ''; ?>" required>
        <i class='bx bxs-user'></i>
      </div>
      <div class="input-box">
        <input type="password" name="password" placeholder="Password" required>
        <i class='bx bxs-lock-alt'></i>
      </div>
      <div class="input-box">
        <select id="" name="user_type" required>
          <option value="user">Select User</option>
          <option value="student" <?php echo (isset($form_data['user_type']) && $form_data['user_type'] == 'student') ? 'selected' : ''; ?>>Student</option>
          <option value="admin" <?php echo (isset($form_data['user_type']) && $form_data['user_type'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
          <option value="clerk" <?php echo (isset($form_data['user_type']) && $form_data['user_type'] == 'clerk') ? 'selected' : ''; ?>>Clerk</option>
        </select>
        <i class='bx bxs-down-arrow'></i>
      </div>
      <div>
        <?php
        // Display errors if any
        if (!empty($errors)) {
          foreach ($errors as $error) {
            echo '<span class="error-msg">' . htmlspecialchars($error) . '</span>';
          }
        }
        ?>
      </div>
      <button type="submit" name="submit" class="btn">Login</button>
      <div class="register-link">
        <p>Don't have an account ? <a href="register_form.php">Register</a></p>
      </div>
    </form>
  </div>
</body>

</html>