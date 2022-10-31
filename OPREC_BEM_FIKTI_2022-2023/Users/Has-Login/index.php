<?php
    session_start();
    include "../config/koneksi.php";
    header("X-XSS-Protection: 1; mode=block");

    if (isset($_SESSION['email']) > 0) {
      
    } else {
      echo "<script>alert('Login Dulu ya'); 
      location.href='../';</script>";
    }

    $sqlselect = mysqli_query($con, " SELECT biodata.*, users_account.* 
                                      FROM users_account 
                                      JOIN biodata ON users_account.email = biodata.email
                                      WHERE users_account.email = '$_SESSION[email]' ");
    while($datas = mysqli_fetch_array($sqlselect)){
      $namalengkap = $datas['nama_lengkap'];
      $pas_foto = $datas['pas_foto'];
      $tanggal = $datas['created_at'];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>OPREC BEM FIKTI</title>
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="shortcut icon" href="../assets/images/Logo bem.png" />
</head>

<body>
  <div class="container-scroller">
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="#"><img src="../assets/images/Logo bem.png" alt="logo"
            style="width: 60px; height: 60px;" /><span style="font-family: poppins; font-weight: bold;">BEM
            FIKTI</span></a>
        <a class="navbar-brand brand-logo-mini" href="#"><img src="../assets/images/Logo bem.png" alt="logo"
            style="width: 60px; height: 60px;" /></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="mdi mdi-menu"></span>
        </button>
        <div class="search-field d-none d-md-block">
          <form class="d-flex align-items-center h-100" action="#">
            <div class="input-group">
              <div class="input-group-prepend bg-transparent">
                <i class="input-group-text border-0 mdi mdi-magnify"></i>
              </div>
              <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
            </div>
          </form>
        </div>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown"
              aria-expanded="false">
              <div class="nav-profile-img">
                <?php 
                    if ($pas_foto == NULL) { ?>
                <img src="../assets/images/no-profiles.png" alt="profile">
                <?php
                    } else { ?>
                <img src="../../images_calon/<?php echo $pas_foto; ?>" alt="profile">
                <?php
                    }
                ?>
                <span class="availability-status online"></span>
              </div>
              <div class="nav-profile-text">
                <p class="mb-1 text-black"><?php echo $namalengkap; ?></p>
              </div>
            </a>
            <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">

              <a class="dropdown-item" href="../config/logout.php">
                <i class="mdi mdi-logout mr-2 text-primary"></i> Signout </a>
            </div>
          </li>
          <li class="nav-item d-none d-lg-block full-screen-link">
            <a class="nav-link">
              <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
          data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <div class="container-fluid page-body-wrapper">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
              <div class="nav-profile-image">
                <?php 
                    if ($pas_foto == NULL) { ?>
                <img src="../assets/images/no-profiles.png" alt="profile">
                <?php
                    } else { ?>
                <img src="../../images_calon/<?php echo $pas_foto; ?>" alt="profile">
                <?php
                    }
                ?>
                <span class="login-status online"></span>
              </div>
              <div class="nav-profile-text d-flex flex-column">
                <span class="font-weight-bold mb-2"><?php echo $namalengkap; ?></span>
                <span class="text-secondary text-small">Calon Staff</span>
              </div>
              <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <span class="menu-title">Dashboard</span>
              <i class="mdi mdi-home menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/departments_biro">
              <span class="menu-title">Departemen dan Biro</span>
              <i class="mdi mdi mdi-home-modern menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#requirement" aria-expanded="false" aria-controls="requirement">
              <span class="menu-title">Requirement</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-file menu-icon"></i>
            </a>
            <div class="collapse" id="requirement">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/biodata/">Biodata</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/study_data/">Data Studi</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/facility_skills/">Fasilitas & Keahlian</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/peminatan_staff/">Peminatan</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/berkas/">Berkas</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/divisi/">Pilihan</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/history_organizations/">Riwayat Organisasi</a>
                </li>
                <li class="nav-item"> <a class="nav-link" href="pages/academic/">Akademik & Non Akademik</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#seleksi" aria-expanded="false" aria-controls="seleksi">
              <span class="menu-title">Hasil Seleksi</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-checkbox-marked-outline menu-icon"></i>
            </a>
            <div class="collapse" id="seleksi">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/pengumuman/berkas.php">Berkas</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/pengumuman/final.php">Final</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-panel">
        <div class="content-wrapper" style="padding: 20px 20px 0px 20px !important; ">
          <h2 class="text-center text-wellcome-edit mt-2 mb-4"> SELAMAT DATANG DI WEBSITE OPEN RECRUITMENT BEM FIKTI
          </h2>
          <div id="accordion">
            <!-- TIMELINE -->
            <div class="card mb-2">
              <div class="card-header" id="Timeline" style="padding: 0px;">
                <h5 class="mb-0">
                  <button class="btn btn-link" data-toggle="collapse" data-target="#TimelineOprec" aria-expanded="true"
                    aria-controls="TimelineOprec" style="color: #723d90;">
                    Timeline Open Recruitment
                  </button>
                </h5>
              </div>
              <div id="TimelineOprec" class="collapse" aria-labelledby="Timeline" data-parent="#accordion">
                <div class="col-md-12 card-body px-0 py-3">
                  <a href="../assets/TL_Oprec.png">
                    <center>
                      <img src="../assets/TL_Oprec.png" class="col-lg-6 col-md-6 col-12">
                    </center>
                  </a>
                </div>
              </div>
            </div>

            <!-- DEPART BIRO -->
            <div class="card mb-2">
              <div class="card-header" id="Dashboard" style="padding: 0px;">
                <h5 class="mb-0">
                  <button class="btn btn-link" data-toggle="collapse" data-target="#DepartsBiro" aria-expanded="true"
                    aria-controls="DepartsBiro" style="color: #723d90;">
                    Departemen dan Biro di BEM FIKTI UG 2022/2023
                  </button>
                </h5>
              </div>
              <div id="DepartsBiro" class="collapse" aria-labelledby="Dashboard" data-parent="#accordion">
                <?php include "pages/includes/dashboard.php" ?>
              </div>
            </div>

            <!-- PERNYATAAN -->
            <div class="card mb-2">
              <div class="card-header" id="Pernyataan" style="padding: 0px;">
                <h5 class="mb-0">
                  <button class="btn btn-link" data-toggle="collapse" data-target="#ViewPernyataan" aria-expanded="true"
                    aria-controls="ViewPernyataan" style="color: #723d90;">
                    Pernyataan Mengikuti Kegiatan Open Recruitment BEM FIKTI UG 2022/2023
                  </button>
                </h5>
              </div>
              <div id="ViewPernyataan" class="collapse" aria-labelledby="Pernyataan" data-parent="#accordion">
                <div class="col-md-12 card-body deskripsi-pernyataan">
                  <p class="px-m-3 px-sm-1">
                    Saya, <?= $_SESSION['nama_lengkap']; ?>, telah mengisi formulir pendaftaran untuk mengikuti seleksi
                    menjadi pengurus BEM FIKTI Universitas Gunadarma periode 2022/2023 dengan informasi yang
                    sebenar-benarnya dan lengkap
                    serta dapat dipertanggungjawabkan.
                    Saya bersedia mengikuti seluruh rangkaian kegiatan Open Recruitment Pengurus BEM FIKTI Universitas
                    Gunadarma dengan sungguh-sungguh dan saya bersedia mematuhi seluruh keputusan panitia Open
                    Recruitment. Jika saya diterima menjadi pengurus maka saya akan bertanggung jawab atas hal-hal yang
                    saya janjikan dalam rangkaian Open Recruitment.
                    <br>
                    <br>
                    <br>
                    Depok, <?= $tanggal = date("d-m-Y",strtotime($tanggal)); ?>
                    <br>
                    <br>
                    <br>
                    <br>
                    <?= $_SESSION['nama_lengkap']; ?>
                  </p>
                </div>
              </div>
            </div>

            <div class="card card-body mb-2 deskripsi-pernyataan">
              <span class="mb-3">Silakan bergabung pada grup dengan cara memindai (scan) QR Code atau klik button
                "Bergabung Sekarang!" untuk mendapatkan informasi lebih lanjut mengenai rangkaian kegiatan Open
                Recruitment BEM FIKTI UG 2021</span>
              <center>
                <img src="../assets/images/QR-Code.jpg" class="QrCss">
                <br>
                <a href="https://bit.ly/GrupOprecBEMFIKTIUG2021" class="btn btn-primary mt-2">Bergabung Sekarang !</a>
              </center>
            </div>

          </div>
        </div>
        <footer class="footer bg-white">
          <div class="container-fluid clearfix text-center">
            <span class="text-muted d-block text-center d-sm-inline-block"
              style="color: rgb(120, 1, 255) !important; ">Maintained By Biro PTI 2022/2023</span>
          </div>
        </footer>
      </div>
    </div>
  </div>
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="assets/vendors/chart.js/Chart.min.js"></script>
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <script src="assets/js/dashboard.js"></script>
  <script src="assets/js/todolist.js"></script>
</body>

</html>