<?php
include ("includes/db.php");

?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Akurdi Php Project - Register</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form class="user" method="post" enctype="multipart/form-data">
                
                <div class="form-group row">
                  
                  <input type="text" name="user_name" class="form-control form-control-user" id="exampleFirstName" placeholder="Enter userName..">
                
               
              </div>
                <div class="form-group">
                  <input type="email" required name="user_email" class="form-control form-control-user" id="" placeholder="Enter Your Email ....">
                </div>
                <div class="form-group">
                  <input type="number" required name="user_phone" class="form-control form-control-user" id="" placeholder="Enter Your phone no. ....">
                </div>
                <div class="form-group row">
                   <input type="password" required name="u_pass" class="form-control form-control-user" id="" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="">Upload profile_photo</label>
                  <input type="file" required name="image" class="form-control " id=" ">
                </div>
                <input type="submit" required name="register" value="Login"  class="btn btn-primary btn-user btn-block">
                
                <hr>
               
              </form>

              <?php
              
              if(isset($_POST['register']))
              {
                $uname=$_POST['user_name'];
                $u_email=$_POST['user_email'];
                $u_phone=$_POST['user_phone'];
                $upass=$_POST['u_pass'];

                if(isset($_FILES['image']))
                    {
                      

                      $errors= array();
                      $file_name = $_FILES['image']['name'];
                      $file_size =$_FILES['image']['size'];
                      $file_tmp =$_FILES['image']['tmp_name'];
                      $file_type=$_FILES['image']['type'];
                      
                  
                      if(empty($errors)==true){
                         move_uploaded_file($file_tmp,"img/".$file_name);
                         //echo "Success";
                         $images = $file_name;

                      }else{
                         print_r($errors);
                         $images = "";

                      }
                   }
                  
                $query_register="INSERT INTO users_login(user_name,user_pass,profile_photo,user_email,User_phone) VALUES ('$uname','$upass','$images','$u_email','$u_phone')";
                $result_register=mysqli_query($connection,$query_register);
                if($result_register)
                {
                  header("location:index.php");                
                }
                else{
                  echo "
                         <script>
                         alert('username and password invalid')
                         </script>
                         ";
                }

              }

              
              
              
              ?>

              <hr>
              
              <div class="text-center">
                <a class="small" href="index.php">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>























//     $query_product="INSERT INTO product_info (for_whome,brand_name,product_nama,type1,catagory,mrp,discount,price_show,size,photo_product,unit_stock,color) 
          //                       VALUES('$pro_forw','$pro_brand','$pro_pname','$pro_type','$pro_cata','$pro_mrp',' $pro_disc',' $pro_price',' $pro_size','$images','$pro_sunit',' $pro_color')";
          //       $result_register=mysqli_query($connection,$query_product);
          //       if($result_register)
          //       {
          //         header("location:index.php");                
          //       }
          //       else{
          //         echo "
          //                 <script>
          //                 alert('username and password invalid')
          //                 </script>
          //                 ";
          //       }

          //  }
