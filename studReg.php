<?php
include 'indexStudReg.php';
?>
<!DOCTYPE html>
<html>

<head>
  <title>Student Registration Form 2</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.css">
  <style>
    body {
      font-family: arial;
      transition: all 0.5s ease;
      -webkit-transition: all 0.5s ease;
    }

    .container {
      padding: 40px;
      width: 500px;
      margin: 20px auto;
      background-color: #f1f1f1;
    }

    .container h2 {
      text-align: center;
    }

    fieldset {
      border: 1px solid #d4d4d4;
      padding: 20px 10px;
      margin-bottom: 20px;
      border-radius: 8px;
    }

    .input-field {
      display: flex;
      margin-bottom: 15px;
    }

    label {
      margin-right: 25px;
      margin-top: 5px;
      width: 30%;
      text-align: right;
      font-weight: bold;
    }

    .icon {
      background: #fcfcfa;
      color: black;
      min-width: 40px;
      border: 2px solid #e2e2e2;
      border-right: none;
      text-align: center;
      padding: 7px;
    }

    .inputs {
      padding: 3px 10px;
      border: 2px solid #e2e2e2;
      width: 70%;
    }

    input [type="radio"] {
      margin-right: 8px;
    }

    .textarea {
      padding: 8px;
      border: 2px solid #e2e2e2;
    }

    .textarea-icon {
      padding-top: 14px;
    }

    .button {
      text-align: center;
    }

    .submit {
      color: white;
      background: #ee9a25;
      padding: 9px 25px;
      margin-right: 10px;
      border: none;
      border-radius: 5px;
      box-shadow: 0 0 5px #c9c9c9;
    }

    .submit:hover {
      background: #d1871e;
    }

    .reset {
      color: white;
      background: #c93232;
      padding: 9px 25px;
      border: none;
      border-radius: 5px;
      box-shadow: 0 0 5px #c9c9c9;
    }

    .reset:hover {
      background: #a32727;
    }

    .city {
      margin-left: -6px;
    }

    .gender {
      margin-left: -30px;
    }

    .courses {
      margin-left: -26px;
    }

    input[type="radio"] {
      margin-right: 10px;
    }

    .message {
      margin-left: -30px;
    }
  </style>
</head>

<body>
  <div class="container">
    <h2>Registration From</h2>
    <form action="studReg.php" method="post" enctype="multipart/form-data">
      <fieldset>

      <div class="input-field">
          <label class="city">Branch</label>
          <i class="fa fa-list icon"></i>
          <input type="text" name="branch" class="inputs">
      </div>

      <div class="input-field">
          <label class="gender">Admitted For</label>
          <input type="radio" name="admitted" value="Degree">Degree
          <input type="radio" name="admitted" value="Diploma"> Diploma
        </div>

        <div class="input-field">
          <label class="city">Class</label>
          <i class="fa fa-list icon"></i>
          <input type="text" name="class" class="inputs">
      </div>


      <!-- Category -->

      <div class="input-field">
          <label class="city">Category</label>
          <i class="fa fa-list icon"></i>
          <select name="category" id="" class="inputs">
            <option value="0">Select category</option>
            <option value="OPEN">OPEN</option>
            <option value="2">City 2</option>
            <option value="3">City 3</option>
            <option value="4">City 4</option>
            <option value="5">City 5</option>
          </select>
        </div>
      

        <!-- Photo -->
        <div class="input-field">
          <label>Upload Photo</label>
          <i class="fa fa-upload icon"></i>
          <input type="file" name="studentPhoto" class="inputs">
        </div>

        <!-- Signature -->
        <div class="input-field">
          <label>Upload Student Signature</label>
          <i class="fa fa-upload icon"></i>
          <input type="file" name="studentSign" class="inputs">
        </div>

    <!-- Last Exam Attended -->
        <div class="input-field">
          <label class="city">Last Exam Attended</label>
          <i class="fa fa-list icon"></i>
          <input type="text" name="lastExamAttended" class="inputs">
      </div>

      <!-- Last Exam Date -->
      <div class="input-field">
          <label class="courses">Last Exam Date</label>
            <input type="date" name="lastExamDate" class="inputs">
        </div>

        <!-- Admission Year -->
        <div class="input-field">
          <label class="city">Admission Year</label>
          <i class="fa fa-list icon"></i>
          <select name="admissionYear" id="" class="inputs">
            <option value="0">Select Year</option>
            <option value="2023-24">2023-24</option>
            <option value="2024-25">2024-25</option>
            <option value="3">City 3</option>
            <option value="4">City 4</option>
            <option value="5">City 5</option>
          </select>
        </div>

        <!-- Aadhar Card No -->
        <div class="input-field">
          <label class="city">Aadhar Card No</label>
          <i class="fa fa-list icon"></i>
          <input type="number" name="aadharNo" class="inputs">
      </div>

      <!-- Religion -->
      <div class="input-field">
          <label class="city">Religion</label>
          <i class="fa fa-list icon"></i>
          <input type="text" name="religion" class="inputs">
      </div>

      <!-- Caste -->
      <div class="input-field">
          <label class="city">Caste</label>
          <i class="fa fa-list icon"></i>
          <input type="text" name="caste" class="inputs">
      </div>

      <div class="input-field">
          <label class="city">Guardian Name</label>
          <i class="fa fa-list icon"></i>
          <input type="text" name="guardianName" class="inputs">
      </div>

      <div class="input-field">
          <label class="city">Guardian Occupation</label>
          <i class="fa fa-list icon"></i>
          <input type="text" name="guardianOccupation" class="inputs">
      </div>


      <div class="input-field">
          <label class="city">(if in service write details!)</label>
          <i class="fa fa-list icon"></i>
          <input type="text" name="guardianServiceDetails" class="inputs">
      </div>

        <div class="input-field">
          <label>Name</label>
          <i class="fa fa-user icon"></i>
          <input type="text" name="studentName" class="inputs">
        </div>

        <div class="input-field">
          <label>Father's name</label>
          <i class="fa-solid fa-people-roof icon"></i>
          <input type="text" class="inputs" name="fatherName">
        </div>
        <div class="input-field">
          <label>Mother's name</label>
          <i class="fa-solid fa-people-roof icon"></i>
          <input type="text" class="inputs" name="motherName">
        </div>
        <div class="input-field">
          <label>Email</label>
          <i class="fa fa-envelope icon"></i>
          <input type="email" name="email" class="inputs">
        </div>
        <div class="input-field">
          <label class="gender">Gender</label>
          <input type="radio" name="gender" value="Male">Male
          <input type="radio" name="gender" value="Female"> Female
        </div>

        <!-- <div class="input-field">
          <label>Password</label>
          <i class="fa fa-eye-slash icon"></i>
          <input type="password" name="password" class="inputs">
        </div> -->

      <!-- </fieldset>

      <fieldset> -->
        <div class="input-field">
          <label class="message">Address</label>
          <i class="fa-solid fa-address-book icon textarea-icon"></i>
          <textarea class="textarea" name="address"></textarea>
        </div>
        <div class="input-field">
          <label class="city">City</label>
          <i class="fa fa-list icon"></i>
          <input type="text" name="city" class="inputs">
          <!-- <select name="city" id="" class="inputs">
            <option value="0">Select City</option>
            <option value="1">City 1</option>
            <option value="2">City 2</option>
            <option value="3">City 3</option>
            <option value="4">City 4</option>
            <option value="5">City 5</option>
          </select> -->
        </div>
        <div class="input-field">
          <label>Pin code</label>
          <i class="fa fa-home icon"></i>
          <input type="number" name="pinCode" class="inputs">
        </div>
        <div class="input-field">
          <label>Phone No</label>
          <i class="fa fa-phone icon"></i>
          <input type="number" name="phoneNo" class="inputs">
        </div>

        <div class="input-field">
          <label>WhatsApp No</label>
          <i class="fa fa-phone icon"></i>
          <input type="number" name="whatsAppNo" class="inputs">
        </div>

        <div class="input-field">
          <label class="courses">Date of birth</label>
            <input type="date" name="dateOfBirth" class="inputs">
        </div>
        
        <div class="input-field">
          <label>Upload Parent/Guardian Signature</label>
          <i class="fa fa-upload icon"></i>
          <input type="file" name="parentSign" class="inputs">
        </div>
      </fieldset>

      <div class="button">
        <input type="submit" name="submitBtn" class="submit" value="Submit">
        <input type="reset" class="reset" value="Reset">
      </div>
    </form>
  </div>
</body>




</html>