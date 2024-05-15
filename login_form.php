<?php

@include 'config/config.php';

session_start();

if (isset($_POST['submit'])) {

  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pass = md5($_POST['password']);
  $user_type = $_POST['user_type'];

  $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' && user_type='$user_type'";

  $result = mysqli_query($conn, $select);

  if (mysqli_num_rows($result) > 0) {

    $row = mysqli_fetch_array($result);

    if ($row['user_type'] == 'admin') {

      $_SESSION['admin_name'] = $row['name'];
      header('location:admin_page.php');

    } elseif ($row['user_type'] == 'user' ) {

      $_SESSION['user_name'] = $row['name'];
      $_SESSION['email'] = $email;
      header('location:homepage.php');

    }

  } else {
    echo($conn->error);
    $error[] = 'incorrect email or password!';
  }

}
;
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


      <form action="" method="POST">
        <h1>Login</h1>
        <div class="input-box">
          <input type="text" name="email" placeholder="Username" required>
          <i class='bx bxs-user'></i>
        </div>
        <div class="input-box">
          <input type="password" name="password" placeholder="Password" required>
          <i class='bx bxs-lock-alt'></i>
        </div>

        <div class="input-box">
          <select id="" name="user_type">
            <option value="user">Select User</option>
            <option value="user">Student</option>
            <option value="admin">Admin</option>
            <option value="admin">Faculty</option>
            <option value="admin">clerk</option>

          </select>
        </div>

        <div>
          <?php
          if (isset($error)) {
            foreach ($error as $error) {
              echo '<span class="error-msg">' . $error . '</span>';
            }
            ;
          }
          ;
          ?>
        </div>


        <div class="remember-forgot">
          <label><input type="checkbox">Remember me</label>
          <a href="#">Forgot Password</a>
        </div>

        <button type="submit" name="submit" class="btn">Login</button>
        <div class="register-link">
          <p>Don't have an account ? <a href="register_form.php">Register</a></p>
        </div>
      </form>
  </div>
</body>

</html>