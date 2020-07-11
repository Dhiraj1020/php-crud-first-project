<?php
include ("includes/header.php");

?>
   

   

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          

          <!-- Content Row -->
          
        <!-- /.container-fluid -->

      </div>


      <table>
      <table class="table table-boarder table-hover">
              <thead>
                  <th>sr.no</th>
                  <th>user Name</th>
                  <th>Profile Photo</th>
                  <th>Physics Mark</th>
                  <th>Chemistry Mark</th>
                  <th>Maths Mark</th>
              </thead>

              <tbody>
              <?php
              
              $query_view_mark="SELECT * FROM users_login ";
              $result_mark=mysqli_query($connection,$query_view_mark);
              if($result_mark)
              {
                  $i=1;
                  while($row=mysqli_fetch_array($result_mark))
                  {
                      $id=$row['id'];
                      $user_name=$row['user_name'];
                      $user_math=$row['Math'];
                      $user_physics=$row['physics'];
                      $user_chemistry=$row['chemistry'];
                       $profil_photo=$row['profile_photo'];
                     
                      ?>

                      <tr>
                              <th><?php echo $i?></th>
                              <th ><?php echo $user_name?></th>
                              <th > <img src="img/<?php echo $profil_photo?>" width="50px" height="50px" alt="">
                              </th>
                              <th><?php echo $user_math?></th>
                              <th> <?php echo $user_physics?></th>
                              <th><?php echo $user_chemistry?></th>

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
      <!-- End of Main Content -->

     

  <?php
include ("includes/footer.php");

?>
  

  