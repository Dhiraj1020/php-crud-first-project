<?php
include ("includes/header.php");

?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">User Information</h1>
          <!-- Button trigger modal -->
              <button type="button" class="btn btn-success" style="margin-left:1050px" data-toggle="modal" data-target="#exampleModal">
                Add User
              </button>

              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="" method="post" enctype="multipart/form-data">
                          <div class="form-group">
                          <input type="text" name="unmae" placeholder="Enter User Name.." Required value="" class="form-control">
                          </div>
                          <div class="form-group">
                          <input type="password" name="upass" placeholder="Enter User Name.."  Required value="" class="form-control">
                          </div>
                          <div class="form-group">
                          <input type="file" name="image"  value=""  Required class="form-control">
                          </div>
                      </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" name="add_user" class="btn btn-primary">Add User</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
              <?php
              if(isset($_POST['add_user']))
              {
                $uname=$_POST['unmae'];
                $upass=$_POST['upass'];

                if(isset($_FILES['image']))
                    {
                      

                      $errors= array();
                      $file_name = $_FILES['image']['name'];
                      $file_size =$_FILES['image']['size'];
                      $file_tmp =$_FILES['image']['tmp_name'];
                      $file_type=$_FILES['image']['type'];
                      
                  
                      if(empty($errors)==true){
                         move_uploaded_file($file_tmp,"img/".$file_name);
                         echo "Success";
                         $image = $file_name;

                      }else{
                         print_r($errors);
                         $image = "";

                      }
                   }

                $query_insert=" INSERT INTO users_login(user_name,user_pass,profile_photo) VALUES ('$uname','$upass','$image') ";
                $result_insert=mysqli_query($connection,$query_insert);
                if($result_insert)
                {
                    header("location:users.php");
                }
                else
                {
                  echo"
                    <script>
                    alert('Something Get Wrong....Please Try Again');
                    </script>
                  ";
                }
              }
              
              
              
              ?>


              <br>
              <br>
              


          <table class="table table-boarder table-hover">
              <thead>
                  <th>sr.no</th>
                  <th>user Name</th>
                  <th>Profile Photo</th>
                  <th>Password</th>
                  <th>crated At</th>
                  <th></th>
                  <th></th>
                  <th></th>
              </thead>

              <tbody>
                  <?php
                  
                  $query_view_user="SELECT * FROM users_login ";
                  $result_view=mysqli_query($connection,$query_view_user);
                  if($result_view)
                  {
                      $i=1;
                      while($row=mysqli_fetch_array($result_view))
                      {
                          $id=$row['id'];
                          $user_name=$row['user_name'];
                          $user_pass=$row['user_pass'];
                          $u_phy=$row['physics'];
                          $u_mat=$row['Math'];
                          $u_chem=$row['chemistry'];
                          $profil_photo=$row['profile_photo'];
                          $user_time=$row['join_time'];
                          ?>
                          <tr>
                              <th><?php echo $i?></th>
                              <th><?php echo $user_name?></th>
                              <th> <img src="img/<?php echo $profil_photo?>" width="50px" height="50px" alt="">
                              </th>
                              <th><?php echo $user_pass?></th>
                              <th><?php echo $user_time?></th>
                              <th>
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#markupdate<?php echo $id?>">
                    Update mark
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="markupdate<?php echo $id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update value</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post">
                               
                                
                
                                <div class="form-group">
                                  <label for="">Enter Math mark</label>
                                <input type="number" class="form-control" name="u_math" id="" value="<?php echo $u_mat ?>">
                                <input type="hidden" class="form-control" name="id" id="" value="<?php echo $id ?>">

                                </div>
                                <div class="form-group">
                                <label for="">Enter Physics mark</label>
                                <input type="number" class="form-control" name="u_phy" id="" value="<?php echo $u_phy ?>">

                                </div>
                                <div class="form-group">
                                <label for="">Enter chemistry mark</label>
                                <input type="number" class="form-control" name="u_chem" id="" value="<?php echo $u_chem ?>">

                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="updateM" class="btn btn-primary">Save changes</button>
                        </div>
                        </form>
                        </div>
                    </div>
                    </div>

                              </th>
                              <th>
                                  <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $id?>">
                    Update
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal<?php echo $id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update value</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post">
                                <div class="form-group">
                                
                                <input type="text" class="form-control" name="username" id="" value="<?php echo $user_name ?>">
                                <input type="hidden" class="form-control" name="id" id="" value="<?php echo $id ?>">
                                </div>
                                <div class="form-group">
                                <input type="text" class="form-control" name="userpassword" id="" value="<?php echo $user_pass ?>">

                                </div>
                               
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        </form>
                        </div>
                    </div>
                    </div>
                 </th>
                    <th>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#example<?php echo $id?>">
                    Delete
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="example<?php echo $id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> Delete User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                       
                            <form action="" method="post">
                            Are you sure to delete ....
                            <input type="hidden" class="form-control" name="delete_id" id="" value="<?php echo $id ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="delete" class="btn btn-primary">Delete</button>
                        </div>
                        </form>
                        </div>
                    </div>
                    </div>
                </th>

                          </tr>
                          <?php
                          $i++;
                      }
                  }
                  else
                     echo
                     "<tr>
                            <th colspan='4'>No Result Foound</th>
                        </tr>
                     
                     "
                  
                  ?>
                 
              </tbody>

             

          </table>
          <?php
              if(isset($_POST['updateM']))
              {
                 $user_math = $_POST['u_math'];
                 $user_phy = $_POST['u_phy'];
                 $user_chem = $_POST['u_chem'];
                 $update_id=$_POST['id'];

                 $query_update="UPDATE users_login SET Math='$user_math', physics='$user_phy' ,chemistry='$user_chem' WHERE id='$update_id'";
                 $result_update=mysqli_query($connection,$query_update);
                 if($result_update)
                 {
                    header("Location:users.php");
                 }
                 else
                 {
                     echo "Error".mysqli_error($connection);
                 }
              }
              
              ?>
          <?php
              if(isset($_POST['submit']))
              {
                 $name = $_POST['username'];
                 $pass = $_POST['userpassword'];
                 $user_math = $_POST['u_math'];
                 $user_phy = $_POST['u_phy'];
                 $user_chem = $_POST['u_chem'];
                 $update_id=$_POST['id'];

                 $query_update="UPDATE users_login SET user_name='$name' , user_pass='$pass',Math='$user_math', physics='$user_phy' ,chemistry='$user_chem' WHERE id='$update_id'";
                 $result_update=mysqli_query($connection,$query_update);
                 if($result_update)
                 {
                    header("Location:users.php");
                 }
                 else
                 {
                     echo "Error".mysqli_error($connection);
                 }
              }
              
              ?>

<?php

if(isset($_POST['delete']))
{
  
  $delete_id = $_POST['delete_id'];
  $delete_query = "DELETE FROM users_login WHERE id='$delete_id' ";

  $result = mysqli_query($connection,$delete_query);

  if($result)
  {
    header("Location:users.php");
  }
  else
  {
    echo "Error".mysqli_error($connection);
  }

}


?>    

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  
  <?php
include ("includes/footer.php");

?>
  
