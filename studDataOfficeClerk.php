<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "user_db");
if ($conn->connect_error) {
    echo "Connection Failed";
}
$sql = "SELECT * FROM studregistration ORDER BY reg_id ASC;";
// $sql="SELECT * FROM studregistration;";
$result = $conn->query($sql);


?>
<!DOCTYPE html>
<html>

<head>
    <title> </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .table_section {
            height: 650px;
            overflow: auto;
        }

        table {
            border-collapse: collapse;
            width: 4000px;
            background-color: #f2f2f2;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: orange;
        }

        tr:hover {
            background-color: #e2dcd6;
            color: black;
        }

        button {
            outline: none;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            background-color: #0298cf;
            height: 30px;
            color: white;
        }

        .container img {
            width: 300px;
            float: center;
            margin: 20px;
            margin-left: 40%;
        }
    </style>
</head>


<body>

    <div class="container">
        <h2>
            <img src="img/logo.png" alt="">
        </h2>
    </div>
    <div class="searchBar">
        <form action="" method="post">
            Search Record using Student Email : <input type="text" name="searchRecord" id="">
            <input type="submit" name="searchBtn" value="Search">
        </form>
    </div>

    <br>
    <table id="mainTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Student Name</th>
                <th>Father Name</th>
                <th>Mother Name</th>
                <th>Branch</th>
                <th>Admitted For</th>
                <th>Class</th>
                <th>Student Photo</th>
                <th>Student Signature</th>
                <th>Last Exam Attended</th>
                <th>Last Exam Date</th>
                <th>Admission Year</th>
                <th>AadharNo</th>
                <th>Religion</th>
                <th>Caste</th>
                <th>Guardian Name</th>
                <th>Guardian Occupation</th>
                <th>Service Details</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Address</th>
                <th>City</th>
                <th>Pin Code</th>
                <th>Phone No</th>
                <th>WhatsApp No</th>
                <th>Date Of Birth</th>
                <th>Parent Signature</th>
                <th>Approval</th>
                <th>Documents</th>


            </tr>
        </thead>

        <tbody>


            <?php if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // $id=$row["id"];
                    echo "<tr>";
                    echo "<td>" . $row["reg_id"] . "</td>";
                    echo "<td>" . $row["StudentName"] . "</td>";
                    echo "<td>" . $row["FatherName"] . "</td>";
                    echo "<td>" . $row["MotherName"] . "</td>";
                    echo "<td>" . $row["Branch"] . "</td>";
                    echo "<td>" . $row["AdmittedFor"] . "</td>";
                    echo "<td>" . $row["Class"] . "</td>";

                    echo "<td><img height='96px' width='79px' src='data:image/jpg;charset=utf8;base64," . base64_encode($row['StudentPhoto']) . "'></td>";
                    echo "<td><img height='96px' width='79px' src='data:image/jpg;charset=utf8;base64," . base64_encode($row['StudentSignature']) . "'></td>";

                    echo "<td>" . $row["LastExamAttended"] . "</td>";
                    echo "<td>" . $row["LastExamDate"] . "</td>";
                    echo "<td>" . $row["AdmissionYear"] . "</td>";
                    echo "<td>" . $row["AadharNo"] . "</td>";
                    echo "<td>" . $row["Religion"] . "</td>";
                    echo "<td>" . $row["Caste"] . "</td>";
                    echo "<td>" . $row["GuardianName"] . "</td>";
                    echo "<td>" . $row["GuardianOccupation"] . "</td>";
                    echo "<td>" . $row["ServiceDetails"] . "</td>";
                    echo "<td>" . $row["Email"] . "</td>";
                    echo "<td>" . $row["Gender"] . "</td>";
                    echo "<td>" . $row["Address"] . "</td>";
                    echo "<td>" . $row["City"] . "</td>";
                    echo "<td>" . $row["PinCode"] . "</td>";
                    echo "<td>" . $row["PhoneNo"] . "</td>";
                    echo "<td>" . $row["WhatsAppNo"] . "</td>";

                    echo "<td>" . $row["DateOfBirth"] . "</td>";
                    echo "<td><img height='96px' width='79px' src='data:image/jpg;charset=utf8;base64," . base64_encode($row['ParentSignature']) . "'></td>";




                    echo "<td>" . $row["Approval"] . "</td>";

                    echo "<td>";

                    ?>
                    <form method="post">
                        <a href="checkDocuments.php?stud_id=<?php echo $row['reg_id']; ?>"><button type="button"
                                name="changestatus">Check Documents</button></a></td>
                    </form>
                    <?php
                    echo "</td>";

                    echo "</tr>";

                }

            } else {
                echo "0 results";
            }


            ?>
        </tbody>
    </table>



</body>
<?php
if (!empty($_POST['searchBtn'])) {
    $getEmail = $_POST['searchRecord'];

    $searchQuery = "select * from studregistration where Email='$getEmail';";

    $searchResult = $conn->query($searchQuery);

    if ($searchResult->num_rows > 0) {
        while ($rowSearch = $searchResult->fetch_assoc()) {


            ?>
            <script>
                var maintable = document.getElementById('mainTable');
                maintable.style.display = 'none';
            </script>
            <br>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Student Name</th>
                        <th>Father Name</th>
                        <th>Mother Name</th>
                        <th>Branch</th>
                        <th>Admitted For</th>
                        <th>Class</th>
                        <th>Student Photo</th>
                        <th>Student Signature</th>
                        <th>Last Exam Attended</th>
                        <th>Last Exam Date</th>
                        <th>Admission Year</th>
                        <th>AadharNo</th>
                        <th>Religion</th>
                        <th>Caste</th>
                        <th>Guardian Name</th>
                        <th>Guardian Occupation</th>
                        <th>Service Details</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Pin Code</th>
                        <th>Phone No</th>
                        <th>WhatsApp No</th>
                        <th>Date Of Birth</th>
                        <th>Parent Signature</th>
                        <th>Approval</th>
                        <th>Documents</th>


                    </tr>
                </thead>


                <tbody>

                    <?php
                    echo "<tr>";
                    echo "<td>" . $rowSearch["reg_id"] . "</td>";
                    echo "<td>" . $rowSearch["StudentName"] . "</td>";
                    echo "<td>" . $rowSearch["FatherName"] . "</td>";
                    echo "<td>" . $rowSearch["MotherName"] . "</td>";
                    echo "<td>" . $rowSearch["Branch"] . "</td>";
                    echo "<td>" . $rowSearch["AdmittedFor"] . "</td>";
                    echo "<td>" . $rowSearch["Class"] . "</td>";

                    echo "<td><img height='96px' width='79px' src='data:image/jpg;charset=utf8;base64," . base64_encode($rowSearch['StudentPhoto']) . "'></td>";
                    echo "<td><img height='96px' width='79px' src='data:image/jpg;charset=utf8;base64," . base64_encode($rowSearch['StudentSignature']) . "'></td>";

                    echo "<td>" . $rowSearch["LastExamAttended"] . "</td>";
                    echo "<td>" . $rowSearch["LastExamDate"] . "</td>";
                    echo "<td>" . $rowSearch["AdmissionYear"] . "</td>";
                    echo "<td>" . $rowSearch["AadharNo"] . "</td>";
                    echo "<td>" . $rowSearch["Religion"] . "</td>";
                    echo "<td>" . $rowSearch["Caste"] . "</td>";
                    echo "<td>" . $rowSearch["GuardianName"] . "</td>";
                    echo "<td>" . $rowSearch["GuardianOccupation"] . "</td>";
                    echo "<td>" . $rowSearch["ServiceDetails"] . "</td>";
                    echo "<td>" . $rowSearch["Email"] . "</td>";
                    echo "<td>" . $rowSearch["Gender"] . "</td>";
                    echo "<td>" . $rowSearch["Address"] . "</td>";
                    echo "<td>" . $rowSearch["City"] . "</td>";
                    echo "<td>" . $rowSearch["PinCode"] . "</td>";
                    echo "<td>" . $rowSearch["PhoneNo"] . "</td>";
                    echo "<td>" . $rowSearch["WhatsAppNo"] . "</td>";

                    echo "<td>" . $rowSearch["DateOfBirth"] . "</td>";
                    echo "<td><img height='96px' width='79px' src='data:image/jpg;charset=utf8;base64," . base64_encode($rowSearch['ParentSignature']) . "'></td>";




                    echo "<td>" . $rowSearch["Approval"] . "</td>";

                    echo "<td>";

                    ?>
                    <form method="post">
                        <a href="checkDocuments.php?stud_id=<?php echo $rowSearch['reg_id']; ?>"><button type="button"
                                name="changestatus">Check Documents</button></a></td>
                    </form>
                    <?php
                    echo "</td>";

                    echo "</tr>";

                    ?>


                </tbody>
            </table>


            <?php

        }

    } else {
        echo "0 results";
    }


}
?>

</html>