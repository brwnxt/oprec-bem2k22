<?php 
session_start();
ob_start();
require("../config/function.php");

if( !isset($_SESSION["login"]) ){
  header("Location:../login/");
  exit;
}

$esport = mysqli_query($conn,"SELECT * FROM esport");

//cek tombol tambah sudah ditekan atau belum
if( isset($_POST["tambah"]) ){
  //cek data berhasil ditambahkan atau tidak
  if( tambahEsport($_POST) > 0 ){ //berhasil masuk kedalam db
    echo "
      <script>
        alert('E-Sport berhasil ditambahkan');
        document.location.href = 'esport.php';
      </script>
    ";
  } else {
    echo "
      <script>
        alert('E-Sport gagal ditambahkan');
        document.location.href = 'esport.php';
      </script>
    ";
  }
}

//cek tombol hapus sudah ditekan atau belum
if( isset($_GET["id_esport"]) ){
  //cek data berhasil dihapus atau tidak
  if( hapusEsport($_GET) > 0 ){ //berhasil masuk kedalam db
    echo "
      <script>
        alert('E-Sport berhasil dihapus');
        document.location.href = 'esport.php';
      </script>
    ";
  } else {
    echo "
      <script>
        alert('E-Sport gagal dihapus');
        document.location.href = 'esport.php';
      </script>
    ";
  }
}

ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>E-Sport</title>
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
                  <i class="mdi mdi-gamepad-variant"></i>
                </span> E-Sport
              </h3>
            </div>
            <!-- content for nav link #daftar_menu start-->
            
  		      <div class="row">
              <div class="col-md-5 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Tambah E-Sport</h4>
                    <div class="template-demo">
                      <form action="" method="post">
                        <div class="form-group">
                          <input type="text" class="form-control" name="nama_esport" placeholder="Masukan Nama E-Sport" required>
                        </div>
                        <button type="submit" class="btn btn-dark btn-lg btn-block mb-5" name="tambah">Tambah</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-7 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4>Jenis E-Sport</h4>
                    <table class="table">
                      <thead>
                        <tr>
                          <td>No</td>
                          <td>Jenis E-Sport</td>
                          <td>Hapus</td>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $no=1; 
                          foreach($esport as $es) : 
                        ?>
                        <tr>
                          <td><?= $no;?></td>
                          <td><?= $es['nama_esport']; ?></td>
                          <td>
                            <a href="?id_esport=<?= $es['id_esport']; ?>" onclick="return confirm('Yakin <?= $es['nama_esport']; ?> dihapus?');">
                              <button type="button" class="btn btn-gradient-danger btn-rounded btn-icon btn-sm mr-2">
                                <i class="mdi mdi-close"></i>
                              </button>
                            </a>
                          </td>
                        </tr>
                        <?php
                          $no++; 
                          endforeach; 
                        ?>
                      </tbody>
                    </table>
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