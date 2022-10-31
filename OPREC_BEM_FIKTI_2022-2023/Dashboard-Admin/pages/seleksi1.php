<?php
session_start();
ob_start();
require("../config/function.php");

if( !isset($_SESSION["login"]) ){
  header("Location:../login/");
  exit;
}
$seleksi_berkas = mysqli_query($conn,"SELECT * FROM users_account 
                              INNER JOIN biodata USING(email) 
                              INNER JOIN users_study_data USING(email) 
                              INNER JOIN users_choose_point USING(email)");
                              


//cek link seleksi 1 sudah ditekan atau belum
if( isset($_GET["email"]) && isset($_GET["seleksi1"])){
  //cek data berhasil diupdate atau tidak
  if( seleksiBerkas($_GET) > 0 ){ 
    echo "
      <script>
        alert('Status Seleksi Berkas Berhasil Diubah');
        document.location.href = 'seleksi1.php';
      </script>
    ";
  } else {
    echo "
      <script>
        alert('Status Seleksi Berkas Gagal Diubah');
        document.location.href = 'seleksi1.php';
      </script>
    ";
  }
}
ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Seleksi Berkas OPREC 2022/2023</title>
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
          <!-- content-wrapper start -->
          <div class="content-wrapper">
              

            <div class="page-header">
              <h3 class="page-title text-primary">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-clipboard-check"></i>
                </span> Seleksi Berkas
              </h3>
            </div>
            
            <!-- content for nav link #daftar_menu start-->
  		      <div class="order" id="order">
              
  		      	<!--coba datatables start-->
              <table id="example" class="table table-bordered table-hover dt-responsive nowrap text-center" style="width:100%; background-color:#fff;">
                <thead>
                  <tr>
                      <th>No.</th>
                      <th>Nama Peserta</th>
                      <th>NPM</th>
                      <th>Pilihan 1</th>
                      <th>Pilihan 2</th>
                      <th>Status Seleksi Berkas</th>
                      <th>Aksi</th>
                  </tr>
                </thead>
              
                <?php
                  $no = 1;
                  foreach($seleksi_berkas as $seleksi1) :
                ?>
                  <tr>
                    <td><?= $no;?></td>
                    <td><?= $seleksi1['nama_lengkap']?></td>
                    <td><?= $seleksi1['npm'];?></td>
                    <td><?= $seleksi1['choose_one'];?></td>
                    <td><?= $seleksi1['choose_two'];?></td>
                    <td>
                    <?php
                    switch($seleksi1['berkas']) {
                      case 1 :
                    ?>
                        <label class="badge badge-danger">Tidak Lulus</label>
                    <?php
                        break;
                      case 2 :
                    ?>
                        <label class="badge badge-success">Lulus</label>
                    <?php
                       break;
                     default :
                    ?>
                        <label class="badge badge-info">Belum Dilakukan</label>
                    <?php
                        break;
                    }
                    ?>
                    </td>
                    <td>
                      <a href="?email=<?= $seleksi1['email']; ?>&&seleksi1=1" onclick="return confirm('Yakin <?= $seleksi1['nama_lengkap']. ' ('. $seleksi1['npm']. ')' ?>  Tidak Lulus Seleksi Berkas?');"> <!-- URL seleksi1 = 1= tidak lulus-->
                        <button type="button" class="btn btn-gradient-danger btn-rounded btn-icon btn-sm mr-2">
                          <i class="mdi mdi-close"></i>
                        </button>
                      </a>
                      <a href="?email=<?= $seleksi1['email']; ?>&&seleksi1=2" onclick="return confirm('Yakin <?= $seleksi1['nama_lengkap']. ' ('. $seleksi1['npm']. ')' ?>  Lulus Seleksi Berkas?');"> <!-- URL seleksi= 2= lulus-->
                        <button type="button" class="btn btn-gradient-success btn-rounded btn-icon btn-sm">
                          <i class="mdi mdi mdi-check"></i>
                        </button>
                      </a>
                    </td>
                  </tr>
                
                <?php 
                  $no++;
                  endforeach; 
                ?>
              </table>
              <!--coba datatables end-->
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
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/misc.js"></script>
    <!-- endinject -->
    <!--datatables script-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <!--button datatables-->
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
    <!--responsive datatables-->
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>


    <script>
      $(document).ready(function() {
        $('#example').DataTable( {
            pageLength: 20,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
      } );
    </script>
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
  </body>
</html>