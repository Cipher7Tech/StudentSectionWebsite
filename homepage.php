<?php
@include 'config/config.php';
session_start();

$email = $_SESSION['email'];
$name = $_SESSION['user_name'];

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM studRegistration WHERE email = '$email'";
$result = $conn->query($sql);

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar With Bootstrap</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/homepage-sidebar.css">
    <link rel="stylesheet" href="css/homepage-style.css">
</head>

<body>

    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="homepage.php">Dashboard</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>Profile</span>
                    </a>
                </li>
                
                <li class="sidebar-item">
                    <a href="stud_status.php" class="sidebar-link">
                        <i class="lni lni-popup"></i>
                        <span>Notification</span>
                    </a>
                </li>
                
            </ul>
            <div class="sidebar-footer">
                <a href="logout.php" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>

        <div>
            <div class="main p-3">

                <!-- Logo -->
                <div class="text-center">
                    <img src="img/logo diet.png" alt="logo diet">
                </div>


                <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon-32x32.png">

                <title>Frontend Mentor | Three card feature section</title>

                <link
                    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,600;1,200;1,400;1,600&display=swap"
                    rel="stylesheet">



                <!-- Homepage Cards -->
                <div>

                    <!-- Student Registration Card -->

                    <div class="row1-container" >
                        <div class="box box-down cyan" onclick="showRegistrationMessage()">
                            <h2>Student Registration</h2>
                            <p> General Registration for new Admissions</p>
                            <img src="img/Student Registration 2.png" alt="">
                        </div>

                    <a href="apply_certificate.php">
                    <div class="box box-down blue">
                        <h2>Certification</h2>
                        <p>Certification System For General Use</p>
                        <img src="img/Certification 1.png" alt="">
                    </div>
                    </a>

                    </div>
                </div>


            </div>


        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="js/sidebar.js"></script>
    <script>
        function showRegistrationMessage() {
            <?php
            if ($result->num_rows > 0) {
                // User is already registered, display error message
                echo 'alert("You have already registered.");';
            } else {
                // User is not registered, allow them to proceed to the registration page
                echo 'window.location.href = "studentRegistration.php";';
            }
            ?>
        }
    </script>
</body>

</html>
