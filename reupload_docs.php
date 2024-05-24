<?php
@include 'config/config.php';

session_start();
$email = $_SESSION['email'];

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the registration ID for the current user
$sql = "SELECT reg_id FROM documents";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $reg_id = $row['reg_id'];
} else {
    die("No registration found for the current user.");
}

// Define a mapping between document IDs and column names for both file content and file type
$documentColumns = array(
    "aadharCard" => array("Aadhar", "Aadhar_Type"),
    "dteConfirmation" => array("Dte", "Dte_Type"),
    "jeeCETScoreCard" => array("CetScoreCard", "CetScoreCard_Type"),
    "incomeCertificate" => array("IncomeCert", "IncomeCert_Type"),
    "rationCard" => array("RationCard", "RationCard_Type"),
    "registeredLabourCertificate" => array("LabourCert", "LabourCert_Type"),
    "casteCertificate" => array("CasteCert", "CasteCert_Type"),
    "casteValidityCertificate" => array("CasteValidity", "CasteValidity_Type"),
    "nonCreamyLayerCertificate" => array("NonCL", "NonCL_Type"),
    "10thMarkSheet" => array("Ssc", "Ssc_Type"),
    "12thMarkSheet" => array("Hsc", "Hsc_Type"),
    "diplomaMarksheet" => array("DiplomaScoreCard", "DiplomaScoreCard_Type"),
    "leavingCertificate" => array("LC", "LC_Type"),
    "migrationCertificate" => array("MigrationCert", "MigrationCert_Type"),
    "gapCertificate" => array("GapCert", "GapCert_Type"),
    "proofOfIndianNationality" => array("Domicile", "Domicile_Type"),
    "admissionFeeReceipt" => array("AdmissionFee", "AdmissionFee_Type"),
);

// Allowed file types
$allowedTypes = array('pdf','png', 'jpeg','img','jpg');

foreach ($_FILES as $key => $file) {
    if ($file['error'] == UPLOAD_ERR_OK) {
        $tmpName = $file['tmp_name'];
        $fileName = basename($file['name']);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        $fileSize = $file['size'];

        // Validate file type
        if (in_array($fileType, $allowedTypes)) {
            // Check if the file key matches a known document ID
            if (preg_match('/document_(.*)/', $key, $matches)) {
                $documentId = $matches[1];
                if (array_key_exists($documentId, $documentColumns)) {
                    $columnName = $documentColumns[$documentId][0];
                    $columnType = $documentColumns[$documentId][1];

                    // Read the file content
                    $fileContent = file_get_contents($tmpName);

                    // Update the document in the database
                    $stmt = $conn->prepare("UPDATE documents SET $columnName = ?, $columnType = ?, Queries = NULL WHERE reg_id = ?");
                    $stmt->bind_param("bsi", $fileContent, $fileType, $reg_id);
                    $stmt->send_long_data(0, $fileContent);
                    if ($stmt->execute()) {
                    } else {
                        echo "Error uploading document $fileName: " . $stmt->error . "<br>";
                    }
                    $stmt->close();
                }
            }
        } else {
            echo "Invalid file type for $fileName. Only PDF, PNG, JPEG, and JPG files are allowed.<br>";
        }
    } else {
        echo "Error uploading file $fileName.<br>";
    }
}
echo "<script>alert('Document uploaded successfully.');</script>";

$conn->close();

?>
