<?php

$conn = mysqli_connect("localhost", "root", "", "user_db");
if ($conn->connect_error) {
    echo "Connection Failed";
} else {

    echo "Connection Established";

}

if (isset($_POST['updateBtn'])) {

    // For Check boxes
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Initialize an empty array to store checked values
        $checkedValues = array();

        // Define an array of all document names
        $documentNames = array(
            "aadharCard",
            "dteConfirmation",
            "jeeCETScoreCard",
            "incomeCertificate",
            "rationCard",
            "registeredLabourCertificate",
            "casteCertificate",
            "casteValidityCertificate",
            "nonCreamyLayerCertificate",
            "10thMarkSheet",
            "12thMarkSheet",
            "diplomaMarksheet",
            "leavingCertificate",
            "migrationCertificate",
            "gapCertificate",
            "proofOfIndianNationality",
            "admissionFeeReceipt"
            // Add more document names as needed
        );

        // Loop through each document name
        foreach ($documentNames as $documentName) {
            // Check if the document checkbox is checked
            if (isset($_POST[$documentName])) {
                // Add the checked document name to the array
                $checkedValues[] = $documentName;
            }
        }

        // Now $checkedValues array contains all the checked document names
        // You can further process or store this array as needed


    }

    $verify = $_POST['approval'];
    $stud_id = $_GET['stud_id'];


    $checkedValuesString = implode(", ", $checkedValues);

    $approval = $_POST['approval'];
    if ($approval == 'Approved') {
        // If approval is 'Approved', set Queries column to empty string
        $checkedValuesString = '';
    }

    $stud_id = mysqli_real_escape_string($conn, $stud_id); // Escaping for security
    $checkedValuesString = mysqli_real_escape_string($conn, $checkedValuesString); // Escaping for security

    // Prepare and execute the SQL query to update the database
    $sql = "UPDATE user_db.documents SET Queries='$checkedValuesString' WHERE reg_id='$stud_id'";
    if (mysqli_query($conn, $sql)) {
        echo "Records updated successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }


    
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
    <!-- <link rel="stylesheet" href="css/show-documents.css"> -->

    <style>

        body {
            font-family: Arial, sans-serif;
            background-color: lightgrey;
            height: 100%;
        }

        h2 {
            text-align: center;
        }

        .document-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 20px;

        }

        .document-item {
            flex-basis: calc(50% - 20px);
            margin-bottom: 20px;
            padding: 10px;
            border: 1.5px solid black;
            box-sizing: border-box;
            background-color: white;
        }

        .document-item h3 {
            margin-top: 0;
        }

        .document-item embed,
        .document-item img {
            width: 100%;
            height: auto;
        }

        .approval-options {
            text-align: center;
            margin-top: 20px;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
           
        }

        .approval-options input[type="radio"] {
            margin-right: 10px;
            size: 10px;
        }

        .update-approval-btn {
            text-align: center;
            margin-top: 10px;
        }

        /* Adjust button size */
        .update-approval-btn input[type="submit"] {
            width: 200px; /* Adjust width as needed */
            height: 35px; /* Adjust height as needed */
            font-size: 15px; /* Adjust font size as needed */
            background-color: #1C77FF; 
            color: white;
            border-radius:5px;
            border: #1C77FF; 
            cursor:pointer;
            margin:10px;

        }

        /* On hover, darken the button */
        .update-approval-btn input[type="submit"]:hover {
            background-color: #406ce5;
        }


        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {

            border: 1px solid #dddddd;
            text-align: left;
            padding: 15px;
            word-break: break-all;
        }

        th {
            background-color: #f2f2f2;
        }

        img {
            max-width: 40%;
            height: 800px;
            padding: 2%;
            border: solid black;
        }

        embed {
            width: 40%;
            height: 800px;
            padding: 2%;
            border: solid black;
        }

        .document-row {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .document-cell {
            width: calc(33.33% - 20px);
            margin-right: 20px;
            margin-bottom: 20px;
        }

        @media screen and (max-width: 768px) {
            .document-cell {
                width: calc(50% - 20px);
            }
        }

        @media screen and (max-width: 480px) {
            .document-cell {
                width: 100%;
                margin-right: 0;
            }
        }


        .approval-options {
        text-align: center;
        margin-top: 20px;
        display: flex;
        flex-direction: row;
        justify-content: center; /* Adjust alignment */
    }

    .approval-options label {
        margin-right: 20px; /* Add some spacing between radio buttons */
        font-size: 16px;
    }

    .approval-options input[type="radio"] {
        width: 14px;
        height:14px;
        margin-right: 10px;
    
        /* margin-right: 10px; */ /* Remove this line */
        /* size: 10px; */ /* Remove this line */
    }

        /* Checkboxes */

        div.checkbox {
            margin-bottom: 10px;
        }

        label {
            margin-left: 5px;
        }

        input[type="checkbox"] {
            margin-right: 10px;
        }

        input[type="checkbox"]+label {
            color: #333;
        }

        input[type="checkbox"]:checked+label {
            color: #0b8;
        }

        input[type="checkbox"]:hover {
            cursor: pointer;
        }

        input[type="checkbox"]:focus {
            outline: none;
        }
    </style>
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
                
                @include 'config/config.php';

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
            <hr style="border: 1px solid black;"> <!-- Add a horizontal line with 1.5px solid black border -->


    <h2>Document Verification</h2>


    <form method="post" enctype="multipart/form-data">

        <div class="checkbox">
            <input type="checkbox" id="aadharCard" name="aadharCard">
            <label for="aadharCard">Aadhar Card</label>
        </div>
        <div class="checkbox">
            <input type="checkbox" id="dteConfirmation" name="dteConfirmation">
            <label for="dteConfirmation">DTE Confirmation</label>
        </div>
        <div class="checkbox">
            <input type="checkbox" id="jeeCETScoreCard" name="jeeCETScoreCard">
            <label for="jeeCETScoreCard">JEE/CET Score Card</label>
        </div>
        <div class="checkbox">
            <input type="checkbox" id="incomeCertificate" name="incomeCertificate">
            <label for="incomeCertificate">Income Certificate</label>
        </div>
        <div class="checkbox">
            <input type="checkbox" id="rationCard" name="rationCard">
            <label for="rationCard">Ration Card</label>
        </div>
        <div class="checkbox">
            <input type="checkbox" id="registeredLabourCertificate" name="registeredLabourCertificate">
            <label for="registeredLabourCertificate">Registered Labour Certificate/ Small Land Holder</label>
        </div>
        <div class="checkbox">
            <input type="checkbox" id="casteCertificate" name="casteCertificate">
            <label for="casteCertificate">Caste Certificate</label>
        </div>
        <div class="checkbox">
            <input type="checkbox" id="casteValidityCertificate" name="casteValidityCertificate">
            <label for="casteValidityCertificate">Caste Validity Certificate</label>
        </div>
        <div class="checkbox">
            <input type="checkbox" id="nonCreamyLayerCertificate" name="nonCreamyLayerCertificate">
            <label for="nonCreamyLayerCertificate">Non Creamy Layer Certificate</label>
        </div>
        <div class="checkbox">
            <input type="checkbox" id="10thMarkSheet" name="10thMarkSheet">
            <label for="10thMarkSheet">10th Standard/CBSE/Equivalent Exam Mark Sheet</label>
        </div>
        <div class="checkbox">
            <input type="checkbox" id="12thMarkSheet" name="12thMarkSheet">
            <label for="12thMarkSheet">12th Standard/CBSE/Equivalent Exam Mark Sheet</label>
        </div>
        <div class="checkbox">
            <input type="checkbox" id="diplomaMarksheet" name="diplomaMarksheet">
            <label for="diplomaMarksheet">Diploma 5th & 6th Mark Sheet</label>
        </div>
        <div class="checkbox">
            <input type="checkbox" id="leavingCertificate" name="leavingCertificate">
            <label for="leavingCertificate">Leaving Certificate</label>
        </div>
        <div class="checkbox">
            <input type="checkbox" id="migrationCertificate" name="migrationCertificate">
            <label for="migrationCertificate">Migration Certificate</label>
        </div>
        <div class="checkbox">
            <input type="checkbox" id="gapCertificate" name="gapCertificate">
            <label for="gapCertificate">Gap Certificate</label>
        </div>
        <div class="checkbox">
            <input type="checkbox" id="proofOfIndianNationality" name="proofOfIndianNationality">
            <label for="proofOfIndianNationality">Proof of Indian Nationality/Domicile</label>
        </div>
        <div class="checkbox">
            <input type="checkbox" id="admissionFeeReceipt" name="admissionFeeReceipt">
            <label for="admissionFeeReceipt">Admission Fee Receipt</label>
        </div>  
        <hr style="border: 1px solid black;"> <!-- Add a horizontal line with 1.5px solid black border -->

<div class="approval-options">
    <input type="radio" name="approval" value="Approved">Approved
    <input type="radio" name="approval" value="Not Approved">Not Approved
</div>

<div class="update-approval-btn">
    <input type="submit" name="updateBtn" value="Update Approval">
</div>    
</form>



</body>

</html>