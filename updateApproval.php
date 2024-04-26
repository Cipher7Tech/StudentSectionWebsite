<script>
  if(window.history.replaceState){
    window.history.replaceState(null,null,window.location.href);
  }
</script>
<?php
session_start();
$conn=mysqli_connect("localhost","root","","user_db");
if($conn->connect_error){
  echo "Connection Failed";
}else{
  
    echo "Connection Established";
  
}

if(isset($_POST['updateBtn'])){
    $verify=$_POST['approval'];
    $stud_id=$_GET['stud_id'];

$sql="UPDATE studregistration SET Approval='$verify' WHERE id='$stud_id';";

sleep(3);
if(mysqli_query($conn,$sql))
	  {
		  header("location:studDataOfficeClerk.php");
	  }
      else{
        echo "Some error occured";
    }

}

?>
<html>
    <head></head>
    <body>
        <form method="post" enctype="multipart/form-data">
            <input type="radio" name="approval" value="Approved">Approved
            <input type="radio" name="approval" value="Not Approved">Not Approved
            <input type="submit" name="updateBtn" value="Update Approval">
        </form>
    </body>
</html>