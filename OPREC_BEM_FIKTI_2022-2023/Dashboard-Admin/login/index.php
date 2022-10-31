<?php
session_start();
require("../config/koneksi.php");

if( isset($_SESSION["login"]) ){
  header("Location:../pages/");
  exit;
}

if( isset($_POST["login"]) ){
  $username = mysqli_real_escape_string($conn,$_POST["username"]);
  $pass     = mysqli_real_escape_string($conn,$_POST["pass"]);

  $cek = mysqli_query($conn,"SELECT * FROM admin_bem WHERE username = '$username'");
  $ketemu = mysqli_num_rows($cek);

  if($ketemu == 1){ //username ada
    $row = mysqli_fetch_assoc($cek); 
    if(password_verify($pass,$row['pass']) ){//cek password
      $_SESSION['login'] = true;
      header("Location: ../pages/");
      exit();
    } else{
      echo"
      <script>
          alert('Password anda salah')
      </script>
      ";
    }
  } else{
    echo"
    <script>
        alert('Email tidak terdaftar')
    </script>
    ";
  }
  header("Location:./");
}
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../Users/assets/images/Logo bem.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <h3 class="text-center mb-5">Login Admin OPREC BEM 2022/2023</h3>
                <h6 class="font-weight-bold ">Halo Kabinet Nya RUANG REFLEKSI!</h6>
                <h6 class="font-weight-light ">Silahkan Login untuk masuk dashboard</h6>
                <form class="pt-3" action="" method="post">
                  <div class="form-group">
                    <input type="text" name="username" class="form-control form-control-lg" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <input type="password" name="pass" class="form-control form-control-lg" placeholder="Password">
                  </div>
                  <div class="mt-3">
                    <button type="submit" name="login" class="btn btn-block btn-gradient-dark btn-lg font-weight-medium auth-form-btn" href="../../index.html">MASUK</button>
                  </div>
                  <div class="text-center mt-5 font-weight-light"> Maintained by Biro PTI 2022/2023 </a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>