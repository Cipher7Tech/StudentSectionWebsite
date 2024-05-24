<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>

  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
  <?php

  session_start();

  // Connecting to database
  $conn = mysqli_connect("localhost", "root", "", "user_db");

  // Check connection
  if ($conn->connect_error) {
    echo "Connection Failed";
  }

  // For error handling -->
  $errors = [];
  ?>

  <?php
  // if (isset($_POST["submitBtn"])) {
  
  if (!empty($_POST["submitBtn"])) {

    $branch = $_POST['branch'];
    $admitted = $_POST['admitted'];
    $class = $_POST['class'];
    $category = $_POST['category'];

    if (!empty($_FILES['studentPhoto']['name'])) {
      $filename = basename($_FILES['studentPhoto']['name']);
      $filetype = pathinfo($filename, PATHINFO_EXTENSION);

      $allowtypes = array('jpg', 'png', 'jpeg', 'gif');
      if (in_array($filetype, $allowtypes)) {
        $tempNamestudentPhoto = $_FILES['studentPhoto']['tmp_name'];
        $studentPhoto = addslashes(file_get_contents($tempNamestudentPhoto));
      }

    }

    if (!empty($_FILES['studentSign']['name'])) {
      $filename = basename($_FILES['studentSign']['name']);
      $filetype = pathinfo($filename, PATHINFO_EXTENSION);

      $allowtypes = array('jpg', 'png', 'jpeg', 'gif');
      if (in_array($filetype, $allowtypes)) {
        $tempNamestudentSign = $_FILES['studentSign']['tmp_name'];
        $studentSign = addslashes(file_get_contents($tempNamestudentSign));
      }

    }



    $lastExamAttended = $_POST['lastExamAttended'];
    $lastExamDate = $_POST['lastExamDate'];
    $admissionYear = $_POST['admissionYear'];
    $aadharNo = $_POST['aadharNo'];
    $religion = $_POST['religion'];
    $caste = $_POST['caste'];
    $guardianName = $_POST['guardianName'];
    $guardianOccupation = $_POST['guardianOccupation'];
    $guardianServiceDetails = $_POST['guardianServiceDetails'];
    $studentName = $_POST['studentName'];
    $fatherName = $_POST['fatherName'];
    $motherName = $_POST['motherName'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $pinCode = $_POST['pinCode'];
    $phoneNo = $_POST['phoneNo'];
    $whatsAppNo = $_POST['whatsAppNo'];
    $dateOfBirth = $_POST['dateOfBirth'];

    if (!empty($_FILES['parentSign']['name'])) {
      $filename = basename($_FILES['parentSign']['name']);
      $filetype = pathinfo($filename, PATHINFO_EXTENSION);

      $allowtypes = array('jpg', 'png', 'jpeg', 'gif');
      if (in_array($filetype, $allowtypes)) {
        $tempNameparentSign = $_FILES['parentSign']['tmp_name'];
        $parentSign = addslashes(file_get_contents($tempNameparentSign));
      }

    }

    //  ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// Documents Upload
  
    // Limit file size to 1 MB
    $maxFileSize = 1048576; // 1 MB in bytes
  
    // Allowed file types
    $allowtypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');


    // For Aadhar upload
    if (!empty($_FILES['aadhar']['name'])) {
      $filename = basename($_FILES['aadhar']['name']);
      $aadhartype = pathinfo($filename, PATHINFO_EXTENSION);
      $filesize = $_FILES['aadhar']['size']; // Size in bytes
  

      if (in_array($aadhartype, $allowtypes) && $filesize <= $maxFileSize) {
        $tempNameAadharPhoto = $_FILES['aadhar']['tmp_name'];
        $aadharPhoto = addslashes(file_get_contents($tempNameAadharPhoto));
      } else {
        $errors[] = "Error: Unsupported file type or file size exceeds 1 MB.";
        echo '<div class="alert alert-danger" role="alert">
      Error: Unsupported file type or file size exceeds 1. Reupload Aadhar Card.
    </div>';
      }
    }

    // For DTE upload
    if (!empty($_FILES['dte']['name'])) {
      $filename = basename($_FILES['dte']['name']);
      $dtetype = pathinfo($filename, PATHINFO_EXTENSION);
      $filesize = $_FILES['dte']['size']; // Size in bytes
  

      if (in_array($dtetype, $allowtypes) && $filesize <= $maxFileSize) {
        $tempNameDTEPhoto = $_FILES['dte']['tmp_name'];
        $dtePhoto = addslashes(file_get_contents($tempNameDTEPhoto));
      } else {
        $errors[] = "Error: Unsupported file type or file size exceeds 1 MB for DTE.";
        echo '<div class="alert alert-danger" role="alert">
                Error: Unsupported file type or file size exceeds 1 MB. Please reupload the DTE document.
            </div>';
      }
    }

    // For JEE/CET Score Card upload
    if (!empty($_FILES['cet-score-card']['name'])) {
      $filename = basename($_FILES['cet-score-card']['name']);
      $cettype = pathinfo($filename, PATHINFO_EXTENSION);
      $filesize = $_FILES['cet-score-card']['size']; // Size in bytes
  

      if (in_array($cettype, $allowtypes) && $filesize <= $maxFileSize) {
        $tempNameCETPhoto = $_FILES['cet-score-card']['tmp_name'];
        $cetPhoto = addslashes(file_get_contents($tempNameCETPhoto));
      } else {
        $errors[] = "Error: Unsupported file type or file size exceeds 1 MB for JEE/CET Score Card.";
        echo '<div class="alert alert-danger" role="alert">
                    Error: Unsupported file type or file size exceeds 1 MB for JEE/CET Score Card. Please reupload the file.
                </div>';
      }
    }

    // For Income Certificate upload
    if (!empty($_FILES['income-cert']['name'])) {
      $filename = basename($_FILES['income-cert']['name']);
      $incometype = pathinfo($filename, PATHINFO_EXTENSION);
      $filesize = $_FILES['income-cert']['size']; // Size in bytes
  

      if (in_array($incometype, $allowtypes) && $filesize <= $maxFileSize) {
        $tempNameIncomePhoto = $_FILES['income-cert']['tmp_name'];
        $incomePhoto = addslashes(file_get_contents($tempNameIncomePhoto));
      } else {
        $errors[] = "Error: Unsupported file type or file size exceeds 1 MB for Income Certificate.";
        echo '<div class="alert alert-danger" role="alert">
                  Error: Unsupported file type or file size exceeds 1 MB for Income Certificate. Please reupload the file.
              </div>';
      }
    }


    // For Ration Card upload
    if (!empty($_FILES['ration-card']['name'])) {
      $filename = basename($_FILES['ration-card']['name']);
      $rationtype = pathinfo($filename, PATHINFO_EXTENSION);
      $filesize = $_FILES['ration-card']['size']; // Size in bytes
  

      if (in_array($rationtype, $allowtypes) && $filesize <= $maxFileSize) {
        $tempNameRationPhoto = $_FILES['ration-card']['tmp_name'];
        $RationPhoto = addslashes(file_get_contents($tempNameRationPhoto));
      } else {
        $errors[] = "Error: Unsupported file type or file size exceeds 1 MB for Ration Card.";
        echo '<div class="alert alert-danger" role="alert">
                Error: Unsupported file type or file size exceeds 1 MB for Ration Card. Please reupload the file.
            </div>';
      }
    }


    // For Registered Labour upload
    if (!empty($_FILES['labour-cert']['name'])) {
      $filename = basename($_FILES['labour-cert']['name']);
      $labourCtype = pathinfo($filename, PATHINFO_EXTENSION);
      $filesize = $_FILES['labour-cert']['size']; // Size in bytes
  

      if (in_array($labourCtype, $allowtypes) && $filesize <= $maxFileSize) {
        $tempNamelabourPhoto = $_FILES['labour-cert']['tmp_name'];
        $LabourCPhoto = addslashes(file_get_contents($tempNamelabourPhoto));
      } else {
        $errors[] = "Error: Unsupported file type or file size exceeds 1 MB for Registered Labour Certificate.";
        echo '<div class="alert alert-danger" role="alert">
                Error: Unsupported file type or file size exceeds 1 MB for Registered Labour Certificate. Please reupload the file.
            </div>';
      }
    }


    // For Caste Certificate upload
    if (!empty($_FILES['caste-cert']['name'])) {
      $filename = basename($_FILES['caste-cert']['name']);
      $castetype = pathinfo($filename, PATHINFO_EXTENSION);
      $filesize = $_FILES['caste-cert']['size']; // Size in bytes
  

      if (in_array($castetype, $allowtypes) && $filesize <= $maxFileSize) {
        $tempNamecastePhoto = $_FILES['caste-cert']['tmp_name'];
        $casteCPhoto = addslashes(file_get_contents($tempNamecastePhoto));
      } else {
        $errors[] = "Error: Unsupported file type or file size exceeds 1 MB for Caste Certificate.";
        echo '<div class="alert alert-danger" role="alert">
                Error: Unsupported file type or file size exceeds 1 MB for Caste Certificate. Please reupload the file.
            </div>';
      }
    }



    // For Caste Validity Certificate upload
    if (!empty($_FILES['caste-validity']['name'])) {
      $filename = basename($_FILES['caste-validity']['name']);
      $casteVtype = pathinfo($filename, PATHINFO_EXTENSION);
      $filesize = $_FILES['caste-validity']['size']; // Size in bytes
  

      if (in_array($casteVtype, $allowtypes) && $filesize <= $maxFileSize) {
        $tempNamecasteVPhoto = $_FILES['caste-validity']['tmp_name'];
        $casteVPhoto = addslashes(file_get_contents($tempNamecasteVPhoto));
      } else {
        $errors[] = "Error: Unsupported file type or file size exceeds 1 MB for Caste Validity Certificate.";
        echo '<div class="alert alert-danger" role="alert">
                Error: Unsupported file type or file size exceeds 1 MB for Caste Validity Certificate. Please reupload the file.
            </div>';
      }
    }


    // For Non Creamy Layer Certificate upload
    if (!empty($_FILES['non-cl-cert']['name'])) {
      $filename = basename($_FILES['non-cl-cert']['name']);
      $nonCLtype = pathinfo($filename, PATHINFO_EXTENSION);
      $filesize = $_FILES['non-cl-cert']['size']; // Size in bytes
  

      if (in_array($nonCLtype, $allowtypes) && $filesize <= $maxFileSize) {
        $tempNamenonCLPhoto = $_FILES['non-cl-cert']['tmp_name'];
        $nonCLPhoto = addslashes(file_get_contents($tempNamenonCLPhoto));
      } else {
        $errors[] = "Error: Unsupported file type or file size exceeds 1 MB for Non Creamy Layer Certificate.";
        echo '<div class="alert alert-danger" role="alert">
                Error: Unsupported file type or file size exceeds 1 MB for Non Creamy Layer Certificate. Please reupload the file.
            </div>';
      }
    }


    // For 10th Standard/CBSE/Equivalent Exam Mark Sheet upload
    if (!empty($_FILES['ssc']['name'])) {
      $filename = basename($_FILES['ssc']['name']);
      $ssctype = pathinfo($filename, PATHINFO_EXTENSION);
      $filesize = $_FILES['ssc']['size']; // Size in bytes
  

      if (in_array($ssctype, $allowtypes) && $filesize <= $maxFileSize) {
        $tempNamesscPhoto = $_FILES['ssc']['tmp_name'];
        $sscPhoto = addslashes(file_get_contents($tempNamesscPhoto));
      } else {
        $errors[] = "Error: Unsupported file type or file size exceeds 1 MB for 10th Standard/CBSE/Equivalent Exam Mark Sheet.";
        echo '<div class="alert alert-danger" role="alert">
                Error: Unsupported file type or file size exceeds 1 MB for 10th Standard/CBSE/Equivalent Exam Mark Sheet. Please reupload the file.
            </div>';
      }
    }




    // For 12th Standard/CBSE/Equivalent Exam Mark Sheet upload
    if (!empty($_FILES['hsc']['name'])) {
      $filename = basename($_FILES['hsc']['name']);
      $hsctype = pathinfo($filename, PATHINFO_EXTENSION);
      $filesize = $_FILES['hsc']['size']; // Size in bytes
  

      if (in_array($hsctype, $allowtypes) && $filesize <= $maxFileSize) {
        $tempNamehscPhoto = $_FILES['hsc']['tmp_name'];
        $hscPhoto = addslashes(file_get_contents($tempNamehscPhoto));
      } else {
        $errors[] = "Error: Unsupported file type or file size exceeds 1 MB for 12th Standard/CBSE/Equivalent Exam Mark Sheet.";
        echo '<div class="alert alert-danger" role="alert">
                Error: Unsupported file type or file size exceeds 1 MB for 12th Standard/CBSE/Equivalent Exam Mark Sheet. Please reupload the file.
            </div>';
      }
    }


    // For Diploma Mark Sheet 5th & 6th upload
    if (!empty($_FILES['diploma-score-card']['name'])) {
      $filename = basename($_FILES['diploma-score-card']['name']);
      $diplomaSCtype = pathinfo($filename, PATHINFO_EXTENSION);
      $filesize = $_FILES['diploma-score-card']['size']; // Size in bytes
  

      if (in_array($diplomaSCtype, $allowtypes) && $filesize <= $maxFileSize) {
        $tempNamediplomaSCPhoto = $_FILES['diploma-score-card']['tmp_name'];
        $diplomaSCPhoto = addslashes(file_get_contents($tempNamediplomaSCPhoto));
      } else {
        $errors[] = "Error: Unsupported file type or file size exceeds 1 MB for Diploma Mark Sheet 5th & 6th.";
        echo '<div class="alert alert-danger" role="alert">
                Error: Unsupported file type or file size exceeds 1 MB for Diploma Mark Sheet 5th & 6th. Please reupload the file.
            </div>';
      }
    }


    // For Leaving Certificate upload
    if (!empty($_FILES['lc']['name'])) {
      $filename = basename($_FILES['lc']['name']);
      $lctype = pathinfo($filename, PATHINFO_EXTENSION);
      $filesize = $_FILES['lc']['size']; // Size in bytes
  

      if (in_array($lctype, $allowtypes) && $filesize <= $maxFileSize) {
        $tempNamelcPhoto = $_FILES['lc']['tmp_name'];
        $lcPhoto = addslashes(file_get_contents($tempNamelcPhoto));
      } else {
        $errors[] = "Error: Unsupported file type or file size exceeds 1 MB for Leaving Certificate.";
        echo '<div class="alert alert-danger" role="alert">
                Error: Unsupported file type or file size exceeds 1 MB for Leaving Certificate. Please reupload the file.
            </div>';
      }
    }


    // For Migration Certificate upload
    if (!empty($_FILES['migration-cert']['name'])) {
      $filename = basename($_FILES['migration-cert']['name']);
      $migrationCtype = pathinfo($filename, PATHINFO_EXTENSION);
      $filesize = $_FILES['migration-cert']['size']; // Size in bytes
  
      if (in_array($migrationCtype, $allowtypes) && $filesize <= $maxFileSize) {
        $tempNamemigrationPhoto = $_FILES['migration-cert']['tmp_name'];
        $migrationCPhoto = addslashes(file_get_contents($tempNamemigrationPhoto));
      } else {
        $errors[] = "Error: Unsupported file type or file size exceeds 1 MB for Migration Certificate.";
        echo '<div class="alert alert-danger" role="alert">
                Error: Unsupported file type or file size exceeds 1 MB for Migration Certificate. Please reupload the file.
            </div>';
      }
    }


    // For Gap Certificate upload
    if (!empty($_FILES['gap-cert']['name'])) {
      $filename = basename($_FILES['gap-cert']['name']);
      $gapCtype = pathinfo($filename, PATHINFO_EXTENSION);
      $filesize = $_FILES['gap-cert']['size']; // Size in bytes
  

      if (in_array($gapCtype, $allowtypes) && $filesize <= $maxFileSize) {
        $tempNamegapCPhoto = $_FILES['gap-cert']['tmp_name'];
        $gapCPhoto = addslashes(file_get_contents($tempNamegapCPhoto));
      } else {
        $errors[] = "Error: Unsupported file type or file size exceeds 1 MB for Gap Certificate.";
        echo '<div class="alert alert-danger" role="alert">
                Error: Unsupported file type or file size exceeds 1 MB for Gap Certificate. Please reupload the file.
            </div>';
      }
    }


    // For Proof of Indian Nationality/Domicile upload
    if (!empty($_FILES['domicile']['name'])) {
      $filename = basename($_FILES['domicile']['name']);
      $domiciletype = pathinfo($filename, PATHINFO_EXTENSION);
      $filesize = $_FILES['domicile']['size']; // Size in bytes
  

      if (in_array($domiciletype, $allowtypes) && $filesize <= $maxFileSize) {
        $tempNamedomicilePhoto = $_FILES['domicile']['tmp_name'];
        $domicilePhoto = addslashes(file_get_contents($tempNamedomicilePhoto));
      } else {
        $errors[] = "Error: Unsupported file type or file size exceeds 1 MB for Proof of Indian Nationality/Domicile.";
        echo '<div class="alert alert-danger" role="alert">
                Error: Unsupported file type or file size exceeds 1 MB for Proof of Indian Nationality/Domicile. Please reupload the file.
            </div>';
      }
    }


    // For Admission Fee Receipt upload
    if (!empty($_FILES['admission-fee-receipt']['name'])) {
      $filename = basename($_FILES['admission-fee-receipt']['name']);
      $admissionFRtype = pathinfo($filename, PATHINFO_EXTENSION);
      $filesize = $_FILES['admission-fee-receipt']['size']; // Size in bytes
  

      if (in_array($admissionFRtype, $allowtypes) && $filesize <= $maxFileSize) {
        $tempNameadmissionFRPhoto = $_FILES['admission-fee-receipt']['tmp_name'];
        $admissionFRPhoto = addslashes(file_get_contents($tempNameadmissionFRPhoto));
      } else {
        $errors[] = "Error: Unsupported file type or file size exceeds 1 MB for Admission Fee Receipt.";
        echo '<div class="alert alert-danger" role="alert">
                Error: Unsupported file type or file size exceeds 1 MB for Admission Fee Receipt. Please reupload the file.
            </div>';
      }
    }


    // -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  
    // Process upload query
  
    sleep(1);


    if (empty($errors)) {


      $lastInsertId = 0;
      $insert = "INSERT INTO studregistration(StudentName,FatherName,MotherName,Branch,AdmittedFor,Class,StudentPhoto,StudentSignature,LastExamAttended,LastExamDate,AdmissionYear,AadharNo,Religion,Caste,GuardianName,GuardianOccupation,ServiceDetails,Email,Gender,Address,City,PinCode,PhoneNo,WhatsAppNo,DateOfBirth,ParentSignature) VALUES ('$studentName','$fatherName','$motherName','$branch','$admitted','$class','$studentPhoto','$studentSign','$lastExamAttended','$lastExamDate','$admissionYear','$aadharNo','$religion','$caste','$guardianName','$guardianOccupation','$guardianServiceDetails','$email','$gender','$address','$city','$pinCode','$phoneNo','$whatsAppNo','$dateOfBirth','$parentSign')";

      if ($conn->query($insert) === TRUE) {
        $lastInsertId = intval($conn->insert_id);
        echo "Data inserted successfully";
        echo $lastInsertId;
      } else {
        echo "Error: " . $conn->error;
      }

      $insert = "INSERT INTO documents(reg_id,Aadhar,Dte,CetScoreCard,IncomeCert,RationCard,LabourCert,CasteCert,CasteValidity,NonCL,Ssc,Hsc,DiplomaScoreCard,LC,MigrationCert,GapCert,Domicile,AdmissionFee,Aadhar_Type,Dte_Type,CetScoreCard_Type,IncomeCert_Type,RationCard_Type,LabourCert_Type,CasteCert_Type,CasteValidity_Type,NonCL_Type,Ssc_Type,Hsc_Type,DiplomaScoreCard_Type,LC_Type,MigrationCert_Type,GapCert_Type,Domicile_Type,AdmissionFee_Type) VALUES ('$lastInsertId','$aadharPhoto','$dtePhoto','$cetPhoto','$incomePhoto','$RationPhoto','$LabourCPhoto','$casteCPhoto','$casteVPhoto','$nonCLPhoto','$sscPhoto','$hscPhoto','$diplomaSCPhoto','$lcPhoto','$migrationCPhoto','$gapCPhoto','$domicilePhoto','$admissionFRPhoto','$aadhartype','$dtetype','$cettype','$incometype','$rationtype','$labourCtype','$castetype','$casteVtype','$nonCLtype','$ssctype','$hsctype','$diplomaSCtype','$lctype','$migrationCtype','$gapCtype','$domiciletype','$admissionFRtype')";

      if ($conn->query($insert) === TRUE) {
        echo "Data inserted successfully";
      } else {
        echo "Error: " . $conn->error;
      }

    }



    mysqli_close($conn);
  }
  ?>
</body>

</html>