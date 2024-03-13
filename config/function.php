<?php
session_start();

@include 'config.php';


function validate($inputData){

   global $conn;

  mysqli_real_escape_string($conn,$inputData);
}

function redirect($url, $status){
  $_SESSION['status']=$status;
  header('Location: '.$url);
  exit(0);

}

  function alertMessage(){
      if(isset($_SESSION['status']))
      {
        echo'<div class="alert alert.success">
        <h4>'.$_SESSION['status'].'</h4>
        </div>';
        unset($_SESSION['status']);
      }
  } 


    function checkParamId($paramType) {
     
      if(isset($_GET[$paramType])){
         if($_GET[$paramType] != null){
            
          return $_GET[$paramType];

         }else{

          return 'No id found';

         }
        

      }else{

       return 'No id Given';

      }
     

    } 



  function getAll($tableName) {
    global $conn;
    
    $table = mysqli_real_escape_string($conn, $tableName); // Escape table name if needed
    $query = "SELECT * FROM $table";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        // Query failed, handle the error (e.g., log, return false)
        return false;
    }

    return $result; // Return mysqli_result object
}

  // function getById($tableName,$id){
  //    global  $conn;

  //    $table =mysqli_real_escape_string($conn,$tableName);
  //    $table =mysqli_real_escape_string($conn,$id);
      
  //    $query = "SELECT * FROM $table WHERE id='$id' LIMIT 1";
     
  //    $result = mysqli_query($conn,$query);

  //    if($result){

  //       if(mysqli_num_rows($result)==1){

  //         $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

  //       }else{
  //         $response= [
  //           'status' => 200,
  //           'message'=>'Fected data',
  //           'data' => 'No Data Record'
  //        ];
   
  //         return $response;

          
  //       }

  //    }else{
      
  //     $response= [
  //        'status' => 500,
  //        'message' => 'Something Went Wrong'
  //     ];

  //      return $response;

  //    }

  // }


  function getById($tableName, $id, $conn) {
    // Escape table name and ID
    $table = mysqli_real_escape_string($conn, $tableName);
    $id = mysqli_real_escape_string($conn, $id);
    
    // Prepare and execute query
    $query = "SELECT * FROM `$table` WHERE id=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    // Check for errors
    if (!$result) {
        $response = [
            'status' => 500,
            'message' => 'Database error: ' . mysqli_error($conn)
        ];
        return $response;
    }
    
    // Fetch data
    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $response = [
            'status' => 200,
            'message' => 'Data fetched successfully',
            'data' => $row
        ];
    } else {
        $response = [
            'status' => 404,
            'message' => 'No record found with the provided ID'
        ];
    }
    
    // Clean up and return response
    mysqli_free_result($result);
    mysqli_stmt_close($stmt);
    return $response;
}



?>