<?php
@include 'config/config.php';

session_start();
$email = $_SESSION['email'];
$name = $_SESSION['user_name'];

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted and documentType is set
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["documentType"])) {
    $selectedDocumentType = $_POST["documentType"];
    
    // Fetch name and other details from the table where Approval status is 'Approved'
    $sql = "SELECT * FROM studregistration WHERE Approval = 'Approved' AND Email = '$email'";
    $result = $conn->query($sql);

    // Check if there are any approved applications
    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            // Fetch necessary details such as name, email, etc.
            $name = $row['StudentName'];
            $email = $row['Email'];

            // Save the applied document name in the AppliedFor column of the same table
            $updateSql = "UPDATE studregistration SET AppliedFor = '$selectedDocumentType' WHERE Email = '$email'";
            if ($conn->query($updateSql) === TRUE) {
                echo "<script>alert('Applied document name saved successfully for $name ($email).');</script>";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
    } else {
        echo "<script>alert('No approved applications found.');</script>";
    }
}

// Close the database connection
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

    <style>
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
            margin-top: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
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
                    <a href="#" class="sidebar-link">
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

                <div class="status">
                    
                <div class="container">
        <h2 class="text-center mb-4">Apply for Documents</h2>
        <form method="post">
            <div class="form-group">
                <label for="studentName">Student Name:</label>
                <input type="text" class="form-control" id="studentName" name="studentName" required value="<?php echo htmlspecialchars($name); ?>">
            </div>
            <div class="form-group">
                <label for="studentEmail">Email:</label>
                <input type="email" class="form-control" id="studentEmail" name="studentEmail" required value="<?php echo htmlspecialchars($email); ?>">
            </div>
            <div class="form-group">
                <label for="studentId">Student ID:</label>
                <input type="text" class="form-control" id="studentId" name="studentId" required>
            </div>
            <div class="form-group">
                <label for="documentType">Select Document:</label>
                <select class="form-control" id="documentType" name="documentType" required>
                    <option value="">--Select--</option>
                    <option value="LC">Leaving Certificate (LC)</option>
                    <option value="Bonafide">Bonafide Certificate</option>
                    <option value="Marksheet">Marksheet</option>
                    <option value="Transcript">Transcript</option>
                </select>
            </div>
            <div class="form-group">
                <label for="additionalInfo">Additional Information:</label>
                <textarea class="form-control" id="additionalInfo" name="additionalInfo" rows="3"></textarea>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">Apply</button>
            </div>
        </form>
    </div>


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
        window.onload = function () {
         // Clear form data on page load
         document.querySelector('form').reset();
      };
    </script>
</body>

</html>