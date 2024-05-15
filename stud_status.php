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
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-agenda"></i>
                        <span>Task</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                        <i class="lni lni-protection"></i>
                        <span>Auth</span>
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Login</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Register</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-popup"></i>
                        <span>Notification</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-cog"></i>
                        <span>Setting</span>
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
                    <?php
                    @include 'config/config.php';

                    session_start();
                    $email = $_SESSION['email']; // Assuming email is stored in session
                    $sql = "SELECT reg_id FROM studRegistration WHERE email = '$email'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $reg_id = $row['reg_id'];

                        // Use the retrieved reg_id to fetch Queries from the documents table
                        $sql = "SELECT Queries FROM documents WHERE reg_id = '$reg_id'";
                        $result = $conn->query($sql);


                        // Check if any documents were fetched
                        if ($result->num_rows > 0) {
                            // Initialize an empty array to store documents
                            $documentListArray = array();

                            // Fetch each row and extract documents from the Queries column
                            while ($row = $result->fetch_assoc()) {
                                // Split the Queries column by commas to get individual documents
                                $documents = explode(',', $row['Queries']);

                                // Trim each document to remove extra whitespace
                                $documents = array_map('trim', $documents);

                                // Merge documents into the main array
                                $documentListArray = array_merge($documentListArray, $documents);
                            }
                        } else {
                            // If no documents were fetched, handle accordingly
                            echo "No documents found.";
                        }
                    }

                    // foreach ($documentListArray as $document) {
                    //     echo ($document . ',');
                    // }
                    // Close the database connection
                    $conn->close();

                    //   Example array structure: $documentListArray = array(array("id" => 1, "title" => "Document 1"), array("id" => 2, "title" => "Document 2"), ...)
                    $allDocumentListArray = array(
                        array("id" => "aadharCard", "title" => "Aadhar Card"),
                        array("id" => "dteConfirmation", "title" => "DTE Confirmation"),
                        array("id" => "jeeCETScoreCard", "title" => "JEE/CET Score Card"),
                        array("id" => "incomeCertificate", "title" => "Income Certificate"),
                        array("id" => "rationCard", "title" => "Ration Card"),
                        array("id" => "registeredLabourCertificate", "title" => "Registered Labour Certificate/Small Land Holder"),
                        array("id" => "casteCertificate", "title" => "Caste Certificate"),
                        array("id" => "casteValidityCertificate", "title" => "Caste Validity Certificate"),
                        array("id" => "nonCreamyLayerCertificate", "title" => "Non Creamy Layer Certificate"),
                        array("id" => "10thMarkSheet", "title" => "10th Standard/CBSE/Equivalent Exam Mark Sheet"),
                        array("id" => "12thMarkSheet", "title" => "12th Standard/CBSE/Equivalent Exam Mark Sheet"),
                        array("id" => "diplomaMarksheet", "title" => "Diploma 5th & 6th Mark Sheet"),
                        array("id" => "leavingCertificate", "title" => "Leaving Certificate"),
                        array("id" => "migrationCertificate", "title" => "Migration Certificate"),
                        array("id" => "gapCertificate", "title" => "Gap Certificate"),
                        array("id" => "proofOfIndianNationality", "title" => "Proof of Indian Nationality/Domicile"),
                        array("id" => "admissionFeeReceipt", "title" => "Admission Fee Receipt"),
                    );

                    // Function to generate HTML for document list
                    function generateDocumentList($documentList, $allDocumentList)
                    {
                        $html = '';

                        foreach ($documentList as $document) {
                            // Check if the document exists in the allDocumentListArray
                            $found = false;
                            foreach ($allDocumentList as $doc) {

                                if ($doc['id'] === $document) {
                                    $found = true;
                                    $html .= '<p>' . $doc['title'] . '</p>';
                                    $html .= '<form action="upload.php" method="post">'; // Assuming upload.php handles the reupload action
                                    $html .= '<input type="hidden" name="document_id" value="' . $doc['id'] . '">';
                                    $html .= '<input type="submit" name="reupload" value="Reupload">';
                                    $html .= '</form>';
                                    break;
                                }
                            }
                        }

                        return $html;
                    }

                    // Call the function with both arrays as arguments
                    echo generateDocumentList($documentListArray, $allDocumentListArray);


                    ?>


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
</body>

</html>