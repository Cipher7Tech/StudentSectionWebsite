<?php include('includes/header.php');?>

  

<div  class="row">
    
    <div class="col-md-12">   
          <div class="card">
            <div class="card-header">
              <h4>
                EDIT User
                  <a href="users.php" class="btn btn-primary float-end">Back</a>
              </h4>
            </div>

            <div class="card-body">

            <?= alertMessage();?>

  <form action="code.php" method="POST">



  <?php 
                
                $paramResult = checkParamId('id');
                if(!is_numeric($paramResult)){
                 echo '<h5>'.$paramResult.'</h5>';
                 return false;
                }
 
                $user =getById('college_staff',checkParamId('id'),$conn);
                if($user['status'] == 200){
                  ?>

<input type="hidden" name="userId" value="<?=$user['data']['id'];?>" required >
 
 <div class="row">
                      <div class="col-md-6">

                      <div class="mb-3">
                        <label for="">Name</label>
                        <input type="text" name="name" value="<?=$user['data']['name'];?>" required class="form-control">
                       </div>

                </div>

                      <div class="col-md-6">
                         <div class="mb-3">
                            <label for="">Email</label>
                            <input type="text" name="email"  value="<?=$user['data']['email'];?>"  required class="form-control">
                        </div>
                      </div>


                      <div class="col-md-6">
                      <div class="mb-3">
                             <label for="">Phone</label>
                             <input type="text" name="phone" value="<?=$user['data']['phone'];?>"  required class="form-control">
                      </div>

                      </div>
                          
                      <div class="col-md-6">
                        <div class="mb-3">
                             <label for="">Password</label>
                             <input type="password" name="password" value="<?=$user['data']['password'];?>" required class="form-control">
                        </div>
                      </div>

                      <!-- <div class="col-md-6">
                        <div class="mb-3">
                             <label for="">Confirm-password</label>
                             <input type="confirm-password" name="password" class="form-control">
                        </div>
                      </div> -->
                           `
                      <div class="col-md-3">
              
                           <div class="mb-3">

                              <label for="">Select Role</Select></label>
                              <select name="role" required class="form-select">
                                 <option value="">Select Role</option>
                                 <option value="Office Clerk" <?=$user['data']['user_type'] == 'officeClerk'?'selected':'';?> >Office Clerk</option>
                                 <option value="Faculty" <?=$user['data']['user_type'] == 'faculty'?'selected':'';?> >Faculty</option>
                               </select>
                          </div>

                      </div>

                <div class="col-md-3">
                         <div class="mb-3">
                            <label >Is Ban </label>
                             <br/>
                             <input type="checkbox" name="isban" <?=$user['data']['isBan'] == true ?'checked':'';?> style="width:30px;height:30px" />
                          </div>
              
                </div>
                <div class="col-md-6">
                    <div class ="mb-3">
                       
                     <button type="submit" name="updateUser" class="btn btn-primary">Update</button>
                    </div>
                </div>
            
 </div>
 
  
                   <?php
 
                }
                else{
                     echo '<h5>'.$user['message'].'</h5>';
                }
                 
                 ?>


          

 </form>
             
            
            </div>
          </div>
         
    </div>


</div>


<?php include('includes/footer.php');?>