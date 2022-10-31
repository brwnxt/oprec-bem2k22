<?php
session_start();
ob_start();
require("../config/function.php");

if( !isset($_SESSION["login"]) ){
  header("Location:../login/");
  exit;
}

$user = mysqli_query($conn,"SELECT * FROM users_account ");

$account = mysqli_fetch_array($user);
$deadline = $account['deadline'];
$status_psikotest = $account['deadline_psikotest'];

$pendaftar = 0;
$lulus_berkas = 0;
$lulus_final = 0;

foreach($user as $usr) :
  $pendaftar++;
  if( $usr['berkas'] == 2){  
    $lulus_berkas = $lulus_berkas + 1;
  } 
  if( $usr['final'] == 2){
    $lulus_final = $lulus_final + 1;
  } 
endforeach;



//cek link pendaftaran tutup sudah ditekan atau belum
if( isset($_POST["tutup"]) ){
  //cek data berhasil diupdate atau tidak
  if( tutupDaftar($_POST) > 0 ){ 
    echo "
      <script>
        alert('Status Pendaftaran Berhasil Ditutup');
        document.location.href = './';
      </script>
    ";
  } else {
    echo "
      <script>
         alert('Status Pendaftaran Gagal Ditutup');
        document.location.href = './';
      </script>
    ";
  }
}

//cek link pendaftaran buka sudah ditekan atau belum
if( isset($_POST["buka"]) ){
  //cek data berhasil diupdate atau tidak
  if( bukaDaftar($_POST) > 0 ){ 
    echo "
      <script>
        alert('Status Pendaftaran Berhasil Dibuka');
        document.location.href = './';
      </script>
    ";
  } else {
    echo "
      <script>
         alert('Status Pendaftaran Gagal Dibuka');
        document.location.href = './';
      </script>
    ";
  }
}

//cek link pendaftaran tutup sudah ditekan atau belum
if( isset($_POST["tutupPsi"]) ){
  //cek data berhasil diupdate atau tidak
  if( tutupPsikotest($_POST) > 0 ){ 
    echo "
      <script>
        alert('Status Pendaftaran Berhasil Ditutup');
        document.location.href = './';
      </script>
    ";
  } else {
    echo "
      <script>
         alert('Status Pendaftaran Gagal Ditutup');
        document.location.href = './';
      </script>
    ";
  }
}

//cek link pendaftaran buka sudah ditekan atau belum
if( isset($_POST["bukaPsi"]) ){
  //cek data berhasil diupdate atau tidak
  if( bukaPsikotest($_POST) > 0 ){ 
    echo "
      <script>
        alert('Status Pendaftaran Berhasil Dibuka');
        document.location.href = './';
      </script>
    ";
  } else {
    echo "
      <script>
         alert('Status Pendaftaran Gagal Dibuka');
        document.location.href = './';
      </script>
    ";
  }
}

ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <title>Dashboard Admin OPREC BEM 2022/2023</title>
    <!--partial:partials/header.php start-->
    <?php include('../partials/header.php'); ?> 
    <!--partial:partials/header.php end-->
  </head>
  
  <body>
    <div class="container-scroller">

    <!--partial:partials/navbar.php start-->
    <?php include('../partials/navbar.php'); ?>
    <!--partial:partials/navbar.php end-->  

      <div class="container-fluid page-body-wrapper">

        <!--partial:partials/_sidebar.php start-->
        <?php include('../partials/sidebar.php'); ?> 
        <!--partial:partials/_sidebar.php end-->

        <div class="main-panel">
          <div class="content-wrapper">
            
            <div class="page-header">
              <h3 class="page-title text-primary">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-home"></i>
                </span> Dashboard
              </h3>
            </div>

            <div class="row">
              <div class="col-md-4 ">
                <a href="biodata.php">
                  <div class="stretch-card grid-margin">
                    <div class="card bg-gradient-info card-img-holder text-white">
                      <div class="card-body">
                        <img src="../assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Pendaftar<i class="mdi mdi-bookmark-outline mdi-24px float-right"></i></h4>
                        <h2 class="mb-5"><?= $pendaftar; ?></h2>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-md-4">
                <a href="seleksi1.php">
                  <div class="stretch-card grid-margin">
                    <div class="card bg-gradient-success card-img-holder text-white">
                      <div class="card-body">
                        <img src="../assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Lolos Seleksi Berkas<i class="mdi mdi-clipboard-check mdi-24px float-right"></i></h4>
                        <h2 class="mb-5"><?= $lulus_berkas; ?></h2>
                    </div>
                  </div>
                 </div>
                </a>
              </div>
              <div class="col-md-4">
                <a href="seleksi2.php">
                  <div class="stretch-card grid-margin">
                    <div class="card bg-gradient-primary card-img-holder text-white">
                      <div class="card-body">
                        <img src="../assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Lolos Seleksi Final<i class="mdi mdi-clipboard-check mdi-24px float-right"></i></h4>
                        <h2 class="mb-5"><?= $lulus_final; ?></h2>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              
            </div>
            
            <div class="row">
              <div class="col-md-6 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12 mb-2">
                        <h4 class="d-inline mr-2">Status Pendaftaran</h4>
                        <?php 
                            switch($deadline) {
                            case 0 :
                        ?>
                            <label class="badge badge-info">Buka</label>
                        <?php 
                            break;
                            case 1 :
                        ?>
                            <label class="badge badge-danger">Tutup</label>
                        <?php
                            break;
                            default :
                        ?>
                            <label class="badge badge-warning">Terjadi Kesalahan</label>
                        <?php
                            break;
                        }
                        ?>
                      </div>
                      <div class="col-12">
                        <form action="" method="post" class="d-inline">
                          <input type="hidden" name="deadline" value="1"/>
                          <button type="submit" name="tutup" class="btn btn-gradient-danger btn-rounded btn-fw mb-2 mr-2">Tutup</button>
                        </form>
                        <form action="" method="post" class="d-inline">
                          <input type="hidden" name="deadline" value="0"/>
                          <button type="submit" name="buka" class="btn btn-gradient-info btn-rounded btn-fw mb-2">Buka</button>
                        </form>
                      </div>
                    </div>
                      
                  </div>
                </div>  
              </div>
              
              <div class="col-md-6 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12 mb-2">
                        <h4 class="d-inline mr-2">Status Psikotest</h4>
                        <?php 
                            switch($status_psikotest) {
                            case 1 :
                        ?>
                            <label class="badge badge-info">Buka</label>
                        <?php 
                            break;
                            case 2 :
                        ?>
                            <label class="badge badge-danger">Tutup</label>
                        <?php
                            break;
                            default :
                        ?>
                            <label class="badge badge-primary">Belum Dibuka</label>
                        <?php
                            break;
                        }
                        ?>
                      </div>
                      <div class="col-12">
                        <form action="" method="post" class="d-inline">
                          <input type="hidden" name="deadline_psikotest" value="2"/>
                          <button type="submit" name="tutupPsi" class="btn btn-gradient-danger btn-rounded btn-fw mb-2 mr-2">Tutup</button>
                        </form>
                        <form action="" method="post" class="d-inline">
                          <input type="hidden" name="deadline_psikotest" value="1"/>
                          <button type="submit" name="bukaPsi" class="btn btn-gradient-info btn-rounded btn-fw mb-2">Buka</button>
                        </form>
                      </div>
                    </div>
                      
                  </div>
                </div>  
              </div>
              
            </div>

          </div>
          <!-- content-wrapper ends -->

          <!--partial:partials/_footer.php start-->
          <?php include('../partials/footer.php'); ?>
          <!--partial:partials/_footer.php end-->

        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../assets/vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../assets/js/dashboard.js"></script>
    <script src="../assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>