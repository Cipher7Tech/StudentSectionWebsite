<?php
include 'indexStudReg.php';

$email = $_SESSION['email'];
$name = $_SESSION['user_name'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Bootstrap Multi Step Form with Progress Bar Example</title>
  <!-- Normalize CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" />
  <!-- Bootstrap 4 CSS -->

  <!-- <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css" /> -->
  <!-- Telephone Input CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.2/css/intlTelInput.css" />
  <!-- Icons CSS -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
  <!-- Nice Select CSS -->
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" />

  <style>
    body {
      font-family: arial;
      transition: all 0.5s ease;
      -webkit-transition: all 0.5s ease;
    }

    .custom-uploader {
      display: flex;
      flex-direction: row;
      width: 150%
    }

    .container {
      padding: 40px;
      width: 500px;
      margin: 20px auto;
      background-color: #d46b6b;
    }

    .container h2 {
      text-align: center;
    }

    fieldset {
      border: 1px solid #090909;
      padding: 20px 10px;
      margin-bottom: 20px;
      border-radius: 8px;
      background-color: #d5d9f2;
      /* text-align: left; */
    }

    .input-field {
      display: flex;
      margin-bottom: 15px;
      align-items: center;
      /* margin: 5px; */
    }

    label {
      margin-right: 25px;
      margin-top: 5px;
      width: 30%;
      text-align: left;
      font-weight: bold;

    }

    .icon {
      background: #fcfcfa;
      color: black;
      min-width: 40px;
      border: 2px solid #e2e2e2;
      border-right: none;
      text-align: left;
      padding: 7px;
    }

    .inputs {
      padding: 3px 10px;
      height: 38px;
      border: 1px solid #311e1e;
      width: 70%;
      border-radius: 4px;
    }

    input [type="radio"] {
      margin-right: 8px;
    }

    .textarea {
      padding: 8px;
      border: 1px solid #111010;
      width: 70%;


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


    input[type="radio"] {
      margin: 10px;
    }

    .error-message {
      display: none;
      color: red;
      font-size: 12px;
      margin-top: 5px;

    }
  </style>
  <style>
    /*font Variables*/
    /*Color Variables*/
    @import url("https://fonts.googleapis.com/css?family=Roboto:300i,400,400i,500,700,900");

    .multi_step_form {
      background: #f6f9fb;
      display: block;
      overflow-x: hidden;
    }

    .multi_step_form #msform {
      text-align: center;
      position: relative;
      padding-top: 50px;
      min-height: 820px;
      height: auto;
      max-width: 1000px;
      margin: 0 auto;
      background: #d5d9f2;
      z-index: 1;

    }

    .multi_step_form #msform .tittle {
      text-align: center;
      padding-bottom: 15px;
    }

    .tittle {
      margin-bottom: 0px;
      padding-bottom: 0px;
      height: 100px;
    }

    .multi_step_form #msform .tittle h2 {
      font: 500 24px/35px "Roboto", sans-serif;
      color: #3f4553;
      padding-bottom: 5px;
    }

    .multi_step_form #msform .tittle p {
      font: 400 16px/28px "Roboto", sans-serif;
      color: #5f6771;
    }

    .multi_step_form #msform fieldset {
      border: 0;
      padding: 20px 105px 0;
      position: relative;
      width: 100%;
      left: 0;
      right: 0;
    }

    .multi_step_form #msform fieldset:not(:first-of-type) {
      display: none;
    }

    .multi_step_form #msform fieldset h3 {
      font: 500 18px/35px "Roboto", sans-serif;
      color: #3f4553;
    }

    .multi_step_form #msform fieldset h6 {
      font: 400 15px/28px "Roboto", sans-serif;
      color: #5f6771;
      padding-bottom: 30px;
    }

    .multi_step_form #msform fieldset .intl-tel-input {
      display: block;
      background: transparent;
      border: 0;
      box-shadow: none;
      outline: none;
    }

    .multi_step_form #msform fieldset .intl-tel-input .flag-container .selected-flag {
      padding: 0 20px;
      background: transparent;
      border: 0;
      box-shadow: none;
      outline: none;
      width: 65px;
    }

    .multi_step_form #msform fieldset .intl-tel-input .flag-x .selected-flag .iti-arrow {
      border: 0;
    }

    .multi_step_form #msform fieldset .intl-tel-input .flag-container .selected-flag .iti-arrow:after {
      content: "\f35f";
      position: absolute;
      top: 0;
      right: 0;
      font: normal normal normal 24px/7px Ionicons;
      color: #5f6771;
    }

    .multi_step_form #msform fieldset #phone {
      padding-left: 80px;
    }

    .multi_step_form #msform fieldset .form-group {
      padding: 0 10px;
    }

    .multi_step_form #msform fieldset .fg_2,
    .multi_step_form #msform fieldset .fg_3 {
      padding-top: 10px;
      display: block;
      overflow: hidden;
    }

    .multi_step_form #msform fieldset .fg_3 {
      padding-bottom: 70px;
    }

    .multi_step_form #msform fieldset .form-control,
    .multi_step_form #msform fieldset .product_select {
      border-radius: 3px;
      border: 1px solid #d8e1e7;
      padding: 0 20px;
      height: auto;
      font: 400 15px/48px "Roboto", sans-serif;
      color: #5f6771;
      box-shadow: none;
      outline: none;
      width: 100%;
    }

    .multi_step_form #msform fieldset .form-control.placeholder,
    .multi_step_form #msform fieldset .product_select.placeholder {
      color: #5f6771;
    }

    .multi_step_form #msform fieldset .form-control:-moz-placeholder,
    .multi_step_form #msform fieldset .product_select:-moz-placeholder {
      color: #5f6771;
    }

    .multi_step_form #msform fieldset .form-control::-moz-placeholder,
    .multi_step_form #msform fieldset .product_select::-moz-placeholder {
      color: #5f6771;
    }

    .multi_step_form #msform fieldset .form-control::-webkit-input-placeholder,
    .multi_step_form #msform fieldset .product_select::-webkit-input-placeholder {
      color: #5f6771;
    }

    .multi_step_form #msform fieldset .form-control:hover,
    .multi_step_form #msform fieldset .form-control:focus,
    .multi_step_form #msform fieldset .product_select:hover,
    .multi_step_form #msform fieldset .product_select:focus {
      border-color: #5cb85c;
    }

    .multi_step_form #msform fieldset .form-control:focus.placeholder,
    .multi_step_form #msform fieldset .product_select:focus.placeholder {
      color: transparent;
    }

    .multi_step_form #msform fieldset .form-control:focus:-moz-placeholder,
    .multi_step_form #msform fieldset .product_select:focus:-moz-placeholder {
      color: transparent;
    }

    .multi_step_form #msform fieldset .form-control:focus::-moz-placeholder,
    .multi_step_form #msform fieldset .product_select:focus::-moz-placeholder {
      color: transparent;
    }

    .multi_step_form #msform fieldset .form-control:focus::-webkit-input-placeholder,
    .multi_step_form #msform fieldset .product_select:focus::-webkit-input-placeholder {
      color: transparent;
    }

    .multi_step_form #msform fieldset .product_select:after {
      display: none;
    }

    .multi_step_form #msform fieldset .product_select:before {
      content: "\f35f";
      position: absolute;
      top: 0;
      right: 20px;
      font: normal normal normal 24px/48px Ionicons;
      color: #5f6771;
    }

    .multi_step_form #msform fieldset .product_select .list {
      width: 100%;
    }

    .multi_step_form #msform fieldset .done_text {
      padding-top: 40px;
    }

    .multi_step_form #msform fieldset .done_text .don_icon {
      height: 36px;
      width: 36px;
      line-height: 36px;
      font-size: 22px;
      margin-bottom: 10px;
      background: #5cb85c;
      display: inline-block;
      border-radius: 50%;
      color: #ffffff;
      text-align: center;
    }

    .multi_step_form #msform fieldset .done_text h6 {
      line-height: 23px;
    }

    .multi_step_form #msform fieldset .code_group {
      margin-bottom: 60px;
    }

    .multi_step_form #msform fieldset .code_group .form-control {
      border: 0;
      border-bottom: 1px solid #a1a7ac;
      border-radius: 0;
      display: inline-block;
      width: 30px;
      font-size: 30px;
      color: #5f6771;
      padding: 0;
      margin-right: 7px;
      text-align: center;
      line-height: 1;
    }

    .multi_step_form #msform fieldset .passport {
      margin-top: -10px;
      padding-bottom: 30px;
      position: relative;
    }

    .multi_step_form #msform fieldset .passport .don_icon {
      height: 36px;
      width: 36px;
      line-height: 36px;
      font-size: 22px;
      position: absolute;
      top: 4px;
      right: 0;
      background: #5cb85c;
      display: inline-block;
      border-radius: 50%;
      color: #ffffff;
      text-align: center;
    }

    .multi_step_form #msform fieldset .passport h4 {
      font: 500 15px/23px "Roboto", sans-serif;
      color: #5f6771;
      padding: 0;
    }

    .multi_step_form #msform fieldset .input-group {
      padding-bottom: 40px;
    }

    .multi_step_form #msform fieldset .input-group .custom-file {
      width: 100%;
      height: auto;
    }

    .multi_step_form #msform fieldset .input-group .custom-file .custom-file-label {
      width: 168px;
      border-radius: 5px;
      cursor: pointer;
      font: 700 14px/40px "Roboto", sans-serif;
      border: 1px solid #99a2a8;
      text-align: center;
      transition: all 300ms linear 0s;
      color: #5f6771;
    }

    .multi_step_form #msform fieldset .input-group .custom-file .custom-file-label i {
      font-size: 20px;
      padding-right: 10px;
    }

    .multi_step_form #msform fieldset .input-group .custom-file .custom-file-label:hover,
    .multi_step_form #msform fieldset .input-group .custom-file .custom-file-label:focus {
      background: #5cb85c;
      border-color: #5cb85c;
      color: #fff;
    }

    .multi_step_form #msform fieldset .input-group .custom-file input {
      display: none;
    }

    .multi_step_form #msform fieldset .file_added {
      text-align: left;
      padding-left: 190px;
      padding-bottom: 60px;
    }

    .multi_step_form #msform fieldset .file_added li {
      font: 400 15px/28px "Roboto", sans-serif;
      color: #5f6771;
    }

    .multi_step_form #msform fieldset .file_added li a {
      color: #5cb85c;
      font-weight: 500;
      display: inline-block;
      position: relative;
      padding-left: 15px;
    }

    .multi_step_form #msform fieldset .file_added li a i {
      font-size: 22px;
      padding-right: 8px;
      position: absolute;
      left: 0;
      transform: rotate(20deg);
    }

    .multi_step_form #msform #progressbar {
      margin-bottom: 30px;
      overflow: hidden;
    }

    .multi_step_form #msform #progressbar li {
      list-style-type: none;
      color: #99a2a8;
      font-size: 9px;
      width: calc(100%/3);
      float: left;
      position: relative;
      font: 500 13px/1 "Roboto", sans-serif;
    }

    .multi_step_form #msform #progressbar li:nth-child(2):before {
      content: "\f12f";
    }

    .multi_step_form #msform #progressbar li:nth-child(3):before {
      content: "\f457";
    }

    .multi_step_form #msform #progressbar li:before {
      content: "\f1fa";
      font: normal normal normal 30px/50px Ionicons;
      width: 50px;
      height: 50px;
      line-height: 50px;
      display: block;
      background: #eaf0f4;
      border-radius: 50%;
      margin: 0 auto 10px auto;
    }

    .multi_step_form #msform #progressbar li:after {
      content: '';
      width: 100%;
      height: 10px;
      background: #eaf0f4;
      position: absolute;
      left: -50%;
      top: 21px;
      z-index: -1;
    }

    .multi_step_form #msform #progressbar li:last-child:after {
      width: 150%;
    }

    .multi_step_form #msform #progressbar li.active {
      color: #5cb85c;
    }

    .multi_step_form #msform #progressbar li.active:before,
    .multi_step_form #msform #progressbar li.active:after {
      background: #5cb85c;
      color: white;
    }

    .multi_step_form #msform .action-button {
      background: #5cb85c;
      color: white;
      border: 0 none;
      border-radius: 5px;
      cursor: pointer;
      min-width: 130px;
      font: 700 14px/40px "Roboto", sans-serif;
      border: 1px solid #5cb85c;
      margin: 0 5px;
      text-transform: uppercase;
      display: inline-block;
    }

    .multi_step_form #msform .action-button:hover,
    .multi_step_form #msform .action-button:focus {
      background: #405867;
      border-color: #405867;
    }

    .multi_step_form #msform .previous_button {
      background: white;
      color: #555b60;
      border-color: #99a2a8;
      margin: 20px;
      margin-top: 10px;
    }

    .multi_step_form #msform .previous_button:hover,
    .multi_step_form #msform .previous_button:focus {
      background: #405867;
      border-color: #405867;
      color: #fff;
    }

    /* doc upload */
    table {
      width: 100%;
      border-collapse: collapse;
      font-family: Arial, sans-serif;
    }

    th,
    td {
      padding: 10px;
      border-bottom: 1px solid #ddd;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
      color: #333;
    }

    input[type="file"] {
      border: 1px solid #502d2d;
      border-radius: 4px;
      padding: 6px;
      width: 70%;
      box-sizing: border-box;
      background-color: white;


    }


    /* form submission */

    .confirm-container {
      background-color: #d4edda;
      max-width: 600px;
      margin: 50px auto;
      padding: 20px;
      border-radius: 8px;
      border-color: #5cb85c;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      color: #333;
      text-align: center;
    }

    p {
      color: #666;
      text-align: center;
    }


    /* error message handling */
    .error-message {
      display: none;
      color: red;
      font-size: 12px;
    }

    .error {
      border: 2px solid red;

    }

    .input-field input[type="radio"].error {
      outline: 2px solid red;
    }

    .input-field select.error {
      border: 2px solid red;
    }

    .custom-uploader input[type="file"].error {
      border: 2px solid red;
    }


    /* form submission */

    .confirm-container {
      background-color: #d4edda;
      max-width: 600px;
      margin: 50px auto;
      padding: 20px;
      border-radius: 8px;
      border-color: #5cb85c;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      color: #333;
      text-align: center;
    }

    p {
      color: #666;
      text-align: center;
    }
  </style>
  </style>

</head>

<body>
  <main>
    <article>
      <!-- Start Multiform HTML -->
      <section class="multi_step_form">
        <form id="msform" method="post" enctype="multipart/form-data" action="indexStudReg.php">

          <!-- Tittle -->
          <div class="tittle">
            <h2>Registration Process</h2>
            <hr>
          </div>

          <!-- progressbar -->
          <ul id="progressbar">
            <li class="active">Student Details</li>
            <li>Upload Documents</li>
            <li>Confirmation</li>
          </ul>
          <!-- fieldsets -->

          <!-- Student Details -->
          <fieldset>

            <div class="input-field">
              <label class="city">Select Branch<span style="color:red"> * </span> </label>
              <select name="branch" class="inputs" required>
                <option value="">--Select--</option>
                <option value="Civil">Civil</option>
                <option value="Mechanical">Mechanical</option>
                <option value="Electrical">Electrical</option>
                <option value="Computer Science">Computer Science</option>
                <option value="Electronics & Telecommunication">Electronics & Telecommunication</option>
              </select>
            </div>

            </div>

            <div class="input-field">
              <label class="gender">Admitted For<span style="color:red"> * </span> </label>
              <input type="radio" name="admitted" value="Degree" required> Degree
              <input type="radio" name="admitted" value="Diploma" required> Diploma
            </div>

            <div class="input-field">
              <label class="city">Class<span style="color:red"> * </span> </label>
              <i class="text box"></i>
              <input type="text" name="class" class="inputs" required>
            </div>


            <!-- Category -->


            <div class="input-field">
              <label class="city">Category<span style="color:red"> * </span> </label>
              <select name="category" class="inputs" required>
                <option value="0">--Select--</option>
                <option value="1">OPEN</option>
                <option value="2">OBC</option>
                <option value="3">SC/ST</option>
                <option value="4">NT</option>
                <option value="5">OTHER</option>
              </select>
            </div>

            <!-- Photo -->
            <div class="input-field">
              <label>Upload Photo<span style="color:red"> * </span> </label>
              <i class="text box"></i>
              <input type="file" name="studentPhoto" class="inputs" required>
            </div>

            <!-- Signature -->
            <div class="input-field">
              <label>Upload Student Signature <span style="color:red"> * </span> </label>
              <i class="text box"></i>
              <input type="file" name="studentSign" class="inputs" required>
            </div>

            <!-- Last Exam Attended -->
            <div class="input-field">
              <label class="city">Last Exam Attended<span style="color:red"> * </span> </label>
              <i class="text box"></i>
              <input type="text" name="lastExamAttended" class="inputs" required>
            </div>

            <!-- Last Exam Date -->
            <div class="input-field">
              <label class="courses">Last Exam Date<span style="color:red"> * </span> </label>
              <input type="date" name="lastExamDate" class="inputs" required>
            </div>

            <!-- Admission Year -->
            <div class="input-field">
              <label class="city">Admission Year<span style="color:red"> * </span> </label>
              <i class="text box"></i>
              <select name="admissionyear" id="" class="inputs" required>
                <option value="0">--Select--</option>
                <option value="1">2021-22</option>
                <option value="2">2022-23</option>
                <option value="3">2023-24</option>
                <option value="4">2024-25</option>
                <option value="5">2025-26</option>
              </select>
            </div>

            <!-- Aadhar Card No -->
            <div class="input-field">
              <label class="city">Aadhar Card No<span style="color:red"> * </span> </label>
              <i class="text box"></i>
              <input type="number" name="aadharNo" class="inputs" required>
            </div>

            <!-- Religion -->
            <div class="input-field">
              <label class="city">Religion<span style="color:red"> * </span> </label>
              <i class="text box"></i>
              <input type="text" name="religion" class="inputs" required>
            </div>

            <!-- Caste -->
            <div class="input-field">
              <label class="city">Caste<span style="color:red"> * </span> </label>
              <i class="text box"></i>
              <input type="text" name="caste" class="inputs" required>
            </div>

            <div class="input-field">
              <label class="city">Guardian Name<span style="color:red"> * </span> </label>
              <i class="text box"></i>
              <input type="text" name="guardianName" class="inputs" required>
            </div>

            <div class="input-field">
              <label class="city">Guardian Occupation<span style="color:red"> * </span> </label>
              <i class="text box"></i>
              <input type="text" name="guardianOccupation" class="inputs" required>
            </div>


            <div class="input-field">
              <label class="city">(if in service write details!)</label>
              <i class="text box"></i>
              <input type="text" name="guardianServiceDetails" class="inputs">
            </div>

            <div class="input-field">
              <label>Name<span style="color:red"> * </span> </label>
              <i class="text box"></i>
              <input type="text" name="studentName" class="inputs" required value="<?php echo htmlspecialchars($name); ?>">
            </div>

            <div class="input-field">
              <label>Father's name<span style="color:red"> * </span> </label>
              <i class="text box"></i>

              <input type="text" class="inputs" name="fatherName" required>

            </div>

            <div class="input-field">
              <label>Surname<span style="color:red"> * </span> </label>
              <i class="text box"></i>
              <input type="text" name="surname" class="inputs" required value="<?php echo htmlspecialchars($name); ?>">
            </div>

            <div class="input-field">
              <label>Mother's name<span style="color:red"> * </span> </label>
              <i class="text box"></i>
              <input type="text" class="inputs" required name="motherName">
            </div>
            <div class="input-field">
              <label>Email<span style="color:red"> * </span> </label>
              <i class="text box"></i>
              <input type="email" name="email" class="inputs" required value="<?php echo htmlspecialchars($email); ?>">
            </div>
            <div class="input-field">
              <label class="gender">Gender<span style="color:red"> * </span> </label>
              <input type="radio" name="gender" value="Male" required>Male
              <input type="radio" name="gender" value="Female" required> Female
            </div>

            <!-- <div class="input-field">
          <label>Password</label>
          <i class="text box"></i>
          <input type="password" name="password" class="inputs">
        </div> -->

            <!-- </fieldset>

      <fieldset> -->
            <div class="input-field">
              <label class="message">Address<span style="color:red"> * </span> </label>
              <i class="text box"></i>
              <textarea class="textarea" name="address"></textarea>
            </div>
            <div class="input-field">
              <label class="city">City<span style="color:red"> * </span> </label>
              <i class="text box"></i>
              <input type="text" name="city" class="inputs" required>
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
              <label>Pin code<span style="color:red"> * </span> </label>
              <i class="text box"></i>
              <input type="number" name="pinCode" class="inputs" required>
            </div>
            <div class="input-field">
              <label>Phone No<span style="color:red"> * </span> </label>
              <i class="text box"></i>
              <input type="number" name="phoneNo" class="inputs" required>
            </div>

            <div class="input-field">
              <label>WhatsApp No<span style="color:red"> * </span> </label>
              <i class="text box"></i>
              <input type="number" name="whatsAppNo" class="inputs" required>
            </div>

            <div class="input-field">
              <label class="courses">Date of birth<span style="color:red"> * </span> </label>
              <input type="date" name="dateOfBirth" class="inputs" required>
            </div>

            <div class="input-field">
              <label>Upload Parent/Guardian Signature<span style="color:red"> * </span> </label>
              <i class="text box"></i>
              <input type="file" name="parentSign" id="file" class="inputs" required>
            </div>
            <hr>
            <a href="homepage.php"><button type="button" class="action-button previous_button">
              Back
            </button></a>
            <button type="button" class="next action-button">Continue</button>
          </fieldset>
          <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
          <!-- Documents upload -->
          <fieldset>
            <label for="file" style="margin-left:10%;">
              <h4>Upload Files</h4>
            </label>
            <hr>

            <table>
              <tbody>
                <tr>
                  <td>Aadhar Card<span style="color:red"> * </span> </td>
                  <td><!-- For Aadhar upload -->
                    <div class="custom-uploader">
                      <input type="file" name="aadhar" id="file" required />
                    </div>
                  </td>
                </tr>

                <tr>
                  <td>DTE Confirmation<span style="color:red"> * </span> </td>
                  <td><!-- For DTE upload -->
                    <div class="custom-uploader">
                      <input type="file" name="dte" id="file" required />
                    </div>
                  </td>
                </tr>

                <tr>
                  <td>JEE/CET Score Card<span style="color:red"> * </span> </td>
                  <td><!-- For JEE/CET Score Card upload -->
                    <div class="custom-uploader">
                      <input type="file" name="cet-score-card" id="file" required />
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Income Certificate<span style="color:red"> * </span> </td>
                  <td><!-- For Income Certificate upload -->
                    <div class="custom-uploader">
                      <input type="file" name="income-cert" id="file" required />
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Ration Card</td>
                  <td><!-- For Ration Card upload -->
                    <div class="custom-uploader">
                      <input type="file" name="ration-card" id="file" />
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Registered Labour Certificate/ Small Land Holder</td>
                  <td><!-- For Registered Labour upload -->
                    <div class="custom-uploader">
                      <input type="file" name="labour-cert" id="file" />
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Caste Certificate<span style="color:red"> * </span> </td>
                  <td><!-- For Caste Certificate upload -->
                    <div class="custom-uploader">
                      <input type="file" name="caste-cert" id="file" required />
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Caste Validity Certificate</td>
                  <td><!-- For Caste Validity Certificate upload -->
                    <div class="custom-uploader">
                      <input type="file" name="caste-validity" id="file" />
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Non Creamy Layer Certificate</td>
                  <td><!-- For Non Creamy Layer Certificate upload -->
                    <div class="custom-uploader">
                      <input type="file" name="non-cl-cert" id="file" />
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>10th Standard/CBSE/Equivalent Exam Mark Sheet</td>
                  <td><!-- For 10th Standard/CBSE/Equivalent Exam Mark Sheet upload -->
                    <div class="custom-uploader">
                      <input type="file" name="ssc" id="file" />
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>12th Standard/CBSE/Equivalent Exam Mark Sheet</td>
                  <td><!-- For 12th Standard/CBSE/Equivalent Exam Mark Sheet upload -->
                    <div class="custom-uploader">
                      <input type="file" name="hsc" id="file" />
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Diploma 5th & 6th Mark Sheet</td>
                  <td><!-- For Diploma Mark Sheet 5th & 6th upload -->
                    <div class="custom-uploader">
                      <input type="file" name="diploma-score-card" id="file" />
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Leaving Certificate<span style="color:red"> * </span> </td>
                  <td><!-- For Leaving Certificate upload -->
                    <div class="custom-uploader">
                      <input type="file" name="lc" id="file" required />
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Migration Certificate</td>
                  <td><!-- For Migration Certificate upload -->
                    <div class="custom-uploader">
                      <input type="file" name="migration-cert" id="file" />
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Gap Certificate</td>
                  <td><!-- For Gap Certificate upload -->
                    <div class="custom-uploader">
                      <input type="file" name="gap-cert" id="file" />
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Proof of Indian Nationality/Domicile<span style="color:red"> * </span> </td>
                  <td><!-- For Proof of Indian Nationality/Domicile upload -->
                    <div class="custom-uploader">
                      <input type="file" name="domicile" id="file" required />
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Admission Fee Receipt</td>
                  <td><!-- For Admission Fee Receipt upload -->
                    <div class="custom-uploader">
                      <input type="file" name="admission-fee-receipt" id="file" />
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>


            <button type="button" class="action-button previous previous_button">
              Back
            </button>
            <button type="button" class="next action-button">Continue</button>
          </fieldset>


          <!-- Confirmation -->
          <fieldset>

            <div class="form-group">

            </div>
            <div class="form-group fg_2">

            </div>
            <div class="form-group">

            </div>
            <div class="form-group fg_3">
              <div class="confirm-container">
                <h2>Admission Registration Confirmation</h2>
                <p>Thank you for completing the registration process.</p>
                <p>Please take a moment to review the details you provided before hitting the submit button.</p>


              </div>
            </div>
            <button type="button" class="action-button previous previous_button">
              Back
            </button>


            <input type="submit" class="action-button" name="submitBtn" value="Submit">


          </fieldset>
        </form>
      </section>
      <!-- END Multiform HTML -->
    </article>
  </main>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.2/js/intlTelInput.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
  <script src="js/script.js"></script>
</body>

</html>