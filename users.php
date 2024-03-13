<?php include('includes/header.php');?>

  

<div  class="row">
    
    <divclass="col-md-12">   
          <div class="card">
            <div class="card-header">
              <h4>
                User List
                  <a href="users-create.php" class="btn btn-primary float-end">Add Users</a>
              </h4>
            </div>
            <div class="card-body">

            <?= alertMessage();?>
             
            <table class="table table-bordered tabel-striped">
    <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Role</th>
            <th>Ban Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $usersResults = getAll('college_staff');

        if ($usersResults !== false) {
            if (mysqli_num_rows($usersResults) > 0) {
                foreach ($usersResults as $userItem) {
        ?>
                    <tr>
                        <td><?= $userItem['id']; ?></td>
                        <td><?= $userItem['name']; ?></td>
                        <td><?= $userItem['email']; ?></td>
                        <td><?= $userItem['phone']; ?></td>
                        <td><?= $userItem['user_type']; ?></td>
                        <td><?= $userItem['isBan'] ==1?'Banned':'Active'; ?></td>
                        <td>
                            <a href="users-edit.php?id=<?= $userItem['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                            <a href="users-delete.php?id=<?= $userItem['id']; ?>" 
                            class="btn btn-danger btn-sm mx-2"
                            
                            onclick="return confirm('Are You Sure You Want to Delete This Data?')"
                            >Delete</a>
    
                        </td>
                    </tr>
        <?php
                }
            } else {
        ?>
                <tr>
                    <td colspan="7">No Record Found</td>
                </tr>
        <?php
            }
        } else {
            // Handle database error here
            echo "Error fetching data from the database.";
        }
        ?>
    </tbody>
</table>
            
            </div>
          </div>
         
    </div>


</div>


<?php include('includes/footer.php');?>