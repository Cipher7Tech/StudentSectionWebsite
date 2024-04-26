<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "user_db");
if ($conn->connect_error) {
    echo "Connection Failed";
} else {

    echo "Connection Established";

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
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>
            <center>New Students Registered</center>
        </h2>
    </div>



    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Studen tName</th>
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

</html>