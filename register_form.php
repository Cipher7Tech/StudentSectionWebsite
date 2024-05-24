<?php
session_start();

// Include your database connection file here
@include 'config/config.php';

if (isset($_POST['submit'])) {
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = mysqli_real_escape_string($conn, $_POST['user_type']);

   $errors = [];

   // Check if the user already exists
   $select = "SELECT * FROM user_form WHERE email = '$email'";
   $result = mysqli_query($conn, $select);

   if (mysqli_num_rows($result) > 0) {
      $errors[] = 'User already exists!';
   } else {
      if ($pass != $cpass) {
         $errors[] = 'Passwords do not match!';
      } else {
         $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         if (mysqli_query($conn, $insert)) {
            // Clear the session data after successful registration
            $_SESSION['success_msg'] = 'Registration successful! Please login.';
            unset($_SESSION['form_data']);
            header('Location: login_form.php');
            exit();
         } else {
            $errors[] = 'Registration failed. Please try again.';
         }
      }
   }

   // Store errors and form data in session
   $_SESSION['errors'] = $errors;
   $_SESSION['form_data'] = $_POST;

   // Reload the page to display errors
   header('Location: ' . $_SERVER['PHP_SELF']);
   exit();
}

// Get the errors and form data from session
$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
$form_data = isset($_SESSION['form_data']) ? $_SESSION['form_data'] : [];

// Clear session errors after displaying them
unset($_SESSION['errors']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>



   <style>
      * {
         margin: 0;
         padding: 0;
         box-sizing: border-box;
         font-family: "Poppins", "sans-serif";
      }

      body {
         display: flex;
         justify-content: right;
         margin-right: 150px;
         align-items: center;
         min-height: 100vh;
         background: url(img/about-diet.png) no-repeat;
         background-size: cover;
         background-position: center;
      }

      .error-msg {
         color: red;
         font-size: 14px;
         margin-top: 5px;
         display: block;
      }

      .wrapper {
         width: 420px;
         background: transparent;
         border: 2px solid rgba(255, 255, 255, .2);
         backdrop-filter: blur(20px);
         box-shadow: 0 0 10px rgba(241, 238, 238, 0.337);
         color: #fff;
         border-radius: 20px;
         padding: 30px 40px;
      }

      .wrapper h1 {
         font-size: 36px;
         text-align: center;
      }

      .wrapper .input-box {
         position: relative;
         width: 100%;
         height: 50px;

         margin: 19px 0;
      }

      .input-box input {
         width: 100%;
         height: 100%;
         background: transparent;
         border: none;
         outline: none;
         border: 2px solid rgba(255, 255, 255, .2);
         border-radius: 40px;
         font-size: 17px;
         color: #fff;
         padding: 20px 45px 20px 20px;
      }

      .input-box select {
         width: 100%;
         height: 100%;
         background: transparent;
         border: none;
         outline: none;
         border: 2px solid rgba(255, 255, 255, .2);
         border-radius: 40px;
         font-size: 17px;
         color: #fff;
         padding-top: 3px;
         padding-left: 20px;
         appearance: none;

      }

      .input-box select option {
         color: #333;
         font-size: 17px;
         background: transparent;
      }

      .input-box input::placeholder {
         color: #fff;
      }

      .input-box i {
         position: absolute;
         right: 20px;
         top: 30%;
         transform: translate(-50%);
         font-size: 20px;

      }

      .wrapper .remember-forgot {
         display: flex;
         justify-content: space-between;
         font-size: 14.5px;
         margin: -15px 0 15px;
      }

      .remember-forgot label input {
         accent-color: #fff;
         margin-right: 3px;

      }

      .remember-forgot a {
         color: #fff;
         text-decoration: none;

      }

      .remember-forgot a:hover {
         text-decoration: underline;
      }

      .wrapper .btn {
         width: 100%;
         height: 45px;
         background: #fff;
         border: none;
         outline: none;
         border-radius: 40px;
         box-shadow: 0 0 10px rgba(0, 0, 0, .1);
         cursor: pointer;
         font-size: 17px;
         color: #333;
         font-weight: 600;
         margin-top: 10px;
      }

      .wrapper .register-link {
         font-size: 16px;
         text-align: center;
         margin: 20px 0 5px;

      }

      .register-link p a {
         color: #fff;
         text-decoration: none;
         font-weight: 600;
      }

      .register-link p a:hover {
         text-decoration: underline;
      }
   </style>

</head>

<body style="background: url(img/diet.png) no-repeat;  background-size: cover; background-position: center;">

   <div class="wrapper">


      <form action="" method="post">
         <h1>Register</h1>
         <?php
         if (isset($errors) && !empty($errors)) {
            foreach ($errors as $error) {
               echo '<span class="error-msg">' . htmlspecialchars($error) . '</span>';
            }
         }
         ?>

         <div class="input-box">
            <input type="text" name="name" placeholder="Username" required>
            <i class='bx bxs-user'></i>
         </div>

         <div class="input-box">
            <input type="text" name="email" placeholder="Email" required>
            <i class='bx bxs-envelope'></i>
         </div>

         <div class="input-box">
            <input type="password" name="password" placeholder="Password" required>
            <i class='bx bx-low-vision'></i>
         </div>

         <div class="input-box">
            <input type="password" name="cpassword" placeholder="Confirm Password" required>
            <i class='bx bx-low-vision'></i>
         </div>

         <div class="input-box">
            <select id="password" name="user_type">
               <option value="user">Select User</option>
               <option value="student">Student</option>
               <option value="admin">Admin</option>
               <option value="clerk">Clerk</option>

            </select>
         </div>


         <input type="submit" name="submit" class="btn">
         <div class="register-link">
            <p>Already have an account ? <a href="login_form.php">Login</a></p>
         </div>


      </form>

   </div>
   <script>
      window.onload = function () {
         // Clear form data on page load
         document.querySelector('form').reset();
      };
   </script>

</body>

</html>