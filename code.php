<?php

@include 'config/function.php';



// function redirect($url, $status){
//   $_SESSION['status']=$status;
//   header('Location: '.$url);
//   exit(0);

// }

  if(isset($_POST['saveuser'])){

  $name = mysqli_real_escape_string($conn, $_POST['name']); 
  $email=mysqli_real_escape_string($conn,$_POST['email']);
  $phone=($_POST['phone']);
  $password=md5($_POST['password']);
  $role=($_POST['role']);
  $is_ban = isset($_POST['isban']) ? 1 : 0;
  // $is_ban = isset($_POST['isban']) && $_POST['isban'] == '1' ? 1 : 0;

  $select = " SELECT * FROM college_staff WHERE email = '$email' && phone = '$phone' ";

  $result = mysqli_query($conn, $select);

  if(mysqli_num_rows($result) > 0){
    header('location:users-create.php');
     $error[] = 'user already exist!';

  }else{

      $insert = "INSERT INTO college_staff(name, email, phone,password, user_type,isBan) VALUES('$name','$email','$phone','$password','$role','$is_ban')";
       $result1= mysqli_query($conn, $insert);
       header('location:users.php');
  }  

 
   if($result1){
    redirect('users.php','User/Admin Added Successfully');
   }
    redirect('users-create.php','Something Went Wrong !!');
  }


  if(isset( $_POST['updateUser']))
  {
     
    $name = mysqli_real_escape_string($conn, $_POST['name']); 
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $phone=($_POST['phone']);
    $password=md5($_POST['password']);
    $role=($_POST['role']);
    // $is_ban = isset($_POST['isban']) && $_POST['isban'] == '1' ? 1 : 0;
    $is_ban = isset($_POST['isban']) ? 1 : 0;
    $userId =($_POST['userId']) ;
   
    $user = getById('college_staff',$userId,$conn);
    
    if($user['status']!= 200){
      redirect('users-edit.php?id'.$userId,'No such id Found');
    }

    if($name !='' || $email != ''|| $phone != ''|| $password != ''){
      $query = "UPDATE college_staff SET name='$name', 
      email='$email', 
      phone='$phone',
      password='$password', 
      user_type='$role',
      isBan='$is_ban'
      WHERE id='$userId' ";

       $result1= mysqli_query($conn,$query);
       header('location:users.php');
    
    }else{

      redirect('users-edit.php','Please fill all the input Fileds !!');
      
    }  
  
   
     if($result1){
      redirect('users.php','User/Admin Updated Successfully');
     }
      redirect('users-edit.php','Something Went Wrong !!');
     

  }



  
  ?>