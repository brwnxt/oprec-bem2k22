<?php 
session_start();
ob_start();
require("../config/function.php");

if( !isset($_SESSION["login"]) ){
  header("Location:../login/");
  exit;
}

$biodata = mysqli_query($conn,"SELECT * FROM users_account 
                                INNER JOIN biodata USING(email) 
                                INNER JOIN users_contact USING(email) 
                                INNER JOIN users_study_data USING(email) 
                                INNER JOIN users_choose_point USING(email)");
                                
//cek link hapus sudah ditekan atau belum
if( isset($_GET["email"]) && isset($_GET["hapus"])){
  //cek data berhasil diupdate atau tidak
  if( hapusPendaftar($_GET) > 0 ){ 
    echo "
      <script>
        alert('Pendaftar Berhasil Dihapus');
        document.location.href = 'biodata.php';
      </script>
    ";
  } else {
    echo "
      <script>
        alert('Pendaftar Gagal Dihapus');
        document.location.href = 'biodata.php';
      </script>
    ";
  }
}
ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Biodata Pendaftar</title>
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
                  <i class="mdi mdi mdi-account-card-details"></i>
                </span> Biodata
              </h3>
            </div>
            <!-- content for nav link #daftar_menu start-->
            
  		      <div class="order" id="order">
              
  		      	<!--coba datatables start-->
              <table id="example" class="table table-bordered table-hover dt-responsive nowrap text-center" style="width:100%; background-color:#fff;">
                <thead>
                  <tr>
                      <th>No</th>
                      <th>Nama Pendaftar</th>
                      <th>NPM</th>
                      <th>TTL</th>
                      <th>Pilihan 1</th>
                      <th>Pilihan 2</th>
                      <th>Email</th>
                      <th>No.Telp</th>
                      <th>Instagram</th>
                      <th>Line</th>
                      <th>Hapus</th>
                  </tr>
                </thead>
                
                <?php
                  $no = 1;
                  foreach($biodata as $data) :
                ?>
                  <tr>
                    <td><?= $no; ?></td>
                    <td>
                      <a href="detail_pendaftar.php?email=<?= $data['email']; ?>">
                        <button type="button" class="btn btn-link btn-fw font-weight-normal">
                          <i class="mdi mdi-account"></i> <?= $data['nama_lengkap'];?>
                        </button>
                      </a>
                    </td>
                    <td><?= $data['npm'];?></td>
                    <td><?= $data['ttl'];?></td>
                    <td><?= $data['choose_one'];?></td>
                    <td><?= $data['choose_two'];?></td>
                    <td><?= $data['email'];?></td>
                    <td><?= $data['no_telp'];?></td>
                    <td><?= $data['instagram'];?></td>
                    <td><?= $data['line'];?></td>
                    <td>
                        <a href="?email=<?= $data['email']; ?>&&hapus=1" onclick="return confirm('Yakin <?= $data['nama_lengkap']. ' ('. $data['npm']. ')' ?>  Akan Dihapus?');">
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