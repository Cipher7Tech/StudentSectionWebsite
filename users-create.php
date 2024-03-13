<?php include('includes/header.php');?>

 

<div  class="row">
    
    <div class="col-md-12">   
          <div class="card">
            <div class="card-header">
              <h4>
                Add User
                  <a href="users.php" class="btn btn-primary float-end">Back</a>
              </h4>
            </div>

            <div class="card-body">
              
            <?= alertMessage();?>


  <form action="code.php" method="post">
         <div class="row">
                      <div class="col-md-6">

                      <div class="mb-3">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control">
                       </div>

                </div>

                      <div class="col-md-6">
                         <div class="mb-3">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                      </div>


                      <div class="col-md-6">
                      <div class="mb-3">
                             <label for="">Phone-No</label>
                             <input type="text" name="phone" class="form-control">
                      </div>

                      </div>
                          
                      <div class="col-md-6">
                        <div class="mb-3">
                             <label for="">Password</label>
                             <input type="password" name="password" class="form-control">
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
                              <select name="role" class="form-select">
                                 <option value="">Select Role</option>
                                 <option value="Faculty">Faculty</option>
                                 <option value="Office Clerk">Office Clerk</option>
                               </select>
                          </div>

                      </div>

                <div class="col-md-3">
                         <div class="mb-3">
                            <label >Is Ban </label>
                             <br/>
                             <input type="checkbox" name="isban" value="1" style="width:30px;height:30px" />
                          </div>
              
                </div>
                <div class="col-md-6">
                    <div class ="mb-3">
                       
                     <button type="submit" name="saveuser" class="btn btn-primary">Save</button>
                    </div>
                </div>
            
        </div>
            


 </form>
             
            
            </div>
          </div>
         
    </div>


</div>


<?php include('includes/footer.php');?>