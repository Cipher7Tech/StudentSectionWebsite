<?php

$conn = mysqli_connect("localhost", "root", "", "user_db");
if ($conn->connect_error) {
    echo "Connection Failed";
} else {

    echo "Connection Established";

}

if (isset($_POST['updateBtn'])) {
    $verify = $_POST['approval'];
    $stud_id = $_GET['stud_id'];

    $sql = "UPDATE studregistration SET Approval='$verify' WHERE reg_id='$stud_id';";

    sleep(1);
    if (mysqli_query($conn, $sql)) {
        header("location:studDataOfficeClerk.php");
    } else {
        echo "Some error occured";
    }

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documents</title>
    <link rel="stylesheet" href="css/show-documents.css">
</head>

<body>

    <h2>Documents</h2>

    <table>
        <tr>
            <th>PDF</th>
        </tr>
        <tr>
            <td>
                <?php
                session_start();
                $conn = new mysqli("localhost", "root", "", "user_db");

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                 
                $docArray = ["Aadhar", "Dte", "CetScoreCard", "IncomeCert", "RationCard", "LabourCert", "CasteCert", "CasteValidity", "NonCL", "Ssc", "Hsc", "DiplomaScoreCard", "LC", "MigrationCert", "GapCert", "Domicile", "AdmissionFee"];
                $docTypeArray = ["Aadhar_Type", "Dte_Type", "CetScoreCard_Type", "IncomeCert_Type", "RationCard_Type", "LabourCert_Type", "CasteCert_Type", "CasteValidity_Type", "NonCL_Type", "Ssc_Type", "Hsc_Type", "DiplomaScoreCard_Type", "LC_Type", "MigrationCert_Type", "GapCert_Type", "Domicile_Type", "AdmissionFee_Type"];

                // Combine both arrays into one associative array
                $combinedArray = array_combine($docArray, $docTypeArray);

                $student_id = $_GET['stud_id'];
                 // This should be dynamic
                
                // Check if arrays are successfully combined
                if ($combinedArray !== false) {
                    // Loop through the combined array
                    foreach ($combinedArray as $document => $documentType) {
                        // Retrieve data from the database
                        $query = "SELECT $document, $documentType FROM documents WHERE reg_id = ?";
                        $stmt = $conn->prepare($query);
                        $stmt->bind_param("i", $student_id);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            // Check if document exists
                            if (!empty($row[$document])) {
                                // Output document data based on type
                                if ($row[$documentType] === 'pdf') {
                                    // Output PDF data as an embed tag within a table cell
                                    echo '<h3>' . $document . '</h3>';
                                    echo '<embed src="data:application/pdf;base64,' . base64_encode($row[$document]) . '" />';
                                } else {
                                    // Output image data as an image tag within a table cell
                                    echo '<h3>' . $document . '</h3>';
                                    echo '<img src="data:image/jpeg;base64,' . base64_encode($row[$document]) . '" alt="' . $document . '" />';
                                }
                            } else {
                                echo "No $document found for this student.";
                            }
                        } else {
                            echo "No documents found for this student.";
                        }
                    }
                } else {
                    echo "Error: Arrays could not be combined.";
                }

                $conn->close();
                ?>

            </td>
        </tr>
    </table>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

    <form method="post" enctype="multipart/form-data">
        <input type="radio" name="approval" value="Approved">Approved
        <input type="radio" name="approval" value="Not Approved">Not Approved
        <input type="submit" name="updateBtn" value="Update Approval">
    </form>

</body>

</html>