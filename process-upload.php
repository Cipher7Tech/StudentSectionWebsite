<?php
if (isset ($_POST['submit'])) {

  // $file = $_FILES['aadhar'];
  // print_r($file);

  $folderName = $_POST['regId'];
  $names = array('aadhar', 'lc', 'cetScoreCard', 'hsc', 'ssc');

  // Create seperate folder
  mkdir('uploads/' . $folderName, 0755, true);


  foreach ($names as $name) {

    // File name extraction
    $fileName = $_FILES[$name]['name'];
    $fileTmpName = $_FILES[$name]['tmp_name'];
    $fileSize = $_FILES[$name]['size'];
    $fileError = $_FILES[$name]['error'];
    $fileType = $_FILES[$name]['type'];


    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    // Only these type of files will be allowed
    $allowed = array('jpg', 'jpeg', 'pdf', 'png');

    if (in_array($fileActualExt, $allowed)) {
      if ($fileError === 0) {
        if ($fileSize < 100000) {
          $fileNameNew = $name . '.' . $fileActualExt;


          // File to which the file saved
          $fileDestination = "uploads/" . $folderName . "/" . $fileNameNew;


          move_uploaded_file($fileTmpName, $fileDestination);
          echo 'Upload Success';
        } else {
          echo 'Your file is too big';
        }

      } else {
        echo 'There was an error uploading file';
      }
    } else {
      echo 'Invalid file type';
    }
  }

}
?>