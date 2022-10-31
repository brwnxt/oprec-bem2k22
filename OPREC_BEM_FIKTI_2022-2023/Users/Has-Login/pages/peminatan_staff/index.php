<?php
    session_start();
    include "../../../config/koneksi.php";
    header("X-XSS-Protection: 1; mode=block");

    if (isset($_SESSION['email'])) {
    
    } else {
      echo "<script>alert('Login Dulu ya'); 
      location.href='../../../';</script>";
    }

    $esports = mysqli_query($con, "SELECT * FROM esport");

    $sqlselect = mysqli_query($con, " SELECT biodata.*, users_account.*, users_minat.*
                                      FROM users_account 
                                      JOIN biodata ON users_account.email = biodata.email
                                      JOIN users_minat ON biodata.email = users_minat.email
                                      WHERE users_account.email = '$_SESSION[email]' ");
 
    while($datas = mysqli_fetch_array($sqlselect)){ 
      $pas_foto     = $datas['pas_foto'];
      $namalengkap  = $datas['nama_lengkap'];
      $email        = $_SESSION['email'];
      
      $minatakademik         = explode(',', $datas['akademik']);
      $minatolahraga         = explode(',', $datas['olahraga']);
      $minatkesenian         = explode(',', $datas['kesenian']);
      $minatmedia_kreatif    = explode(',', $datas['media_kreatif']);
    }

    // $all_olahraga = array('Futsal/Sepak Bola','Bulu Tangkis','Voli','Basket','Panahan');
    foreach($minatolahraga as $olahraga){
      if(!in_array($olahraga, $minatolahraga)){
        $checked_select = "";
      } else{
        $checked_select = "checked";
      }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>OPREC BEM FIKTI</title>
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="shortcut icon" href="../../../assets/images/Logo bem.png" />
</head>

<body>
    <div class="container-scroller">
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="#"><img src="../../../assets/images/Logo bem.png"
                        alt="logo" style="width: 60px; height: 60px;" /><span
                        style="font-family: poppins; font-weight: bold;">BEM
                        FIKTI</span></a>
                <a class="navbar-brand brand-logo-mini" href="#"><img src="../../../assets/images/Logo bem.png"
                        alt="logo" style="width: 60px; height: 60px;" /></a>
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
                            <input type="text" class="form-control bg-transparent border-0"
                                placeholder="Search projects">
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
                                <img src="../../../assets/images/no-profiles.png" alt="image">
                                <?php
                                } else { ?>
                                <img src="../../../../images_calon/<?php echo $pas_foto; ?>" alt="image">
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

                            <a class="dropdown-item" href="../../../config/logout.php">
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
                                <img src="../../../assets/images/no-profiles.png" alt="image">
                                <?php
                                } else { ?>
                                <img src="../../../../images_calon/<?php echo $pas_foto; ?>" alt="image">
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
                        <a class="nav-link" href="../../">
                            <span class="menu-title">Dashboard</span>
                            <i class="mdi mdi-home menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../departments_biro">
                            <span class="menu-title">Departemen dan Biro</span>
                            <i class="mdi mdi mdi-home-modern menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                            aria-controls="ui-basic">
                            <span class="menu-title">Requirement</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-file menu-icon"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="../biodata/">Biodata</a></li>
                                <li class="nav-item"> <a class="nav-link" href="../study_data/">Data Studi</a></li>
                                <li class="nav-item"> <a class="nav-link" href="../facility_skills/">Fasilitas &
                                        Keahlian</a></li>
                                <li class="nav-item"> <a class="nav-link" href="../peminatan_staff/">Peminatan</a></li>
                                <li class="nav-item"> <a class="nav-link" href="../berkas/">Berkas</a></li>
                                <li class="nav-item"> <a class="nav-link" href="../divisi/">Pilihan</a></li>
                                <li class="nav-item"> <a class="nav-link" href="../history_organizations/">Riwayat
                                        Organisasi</a></li>
                                <li class="nav-item"> <a class="nav-link" href="../academic/">Akademik & Non
                                        Akademik</a></li>
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
                            <li class="nav-item"> <a class="nav-link" href="../pengumuman/berkas.php">Berkas</a></li>
                            <li class="nav-item"> <a class="nav-link" href="../pengumuman/final.php">Final</a></li>
                        </ul>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-panel">
                <div class="content-wrapper" style="padding: 20px 20px 0px 20px !important; ">
                    <!--<form action="../../../config/peminatan.php" method="post">-->
                        <div class="card card-header mb-4 card-bg-customs">
                            <h2 class="pb-3 text-muted"> Peminatan </h2>
                            <h4>Akademik</h4>
                            <div class="col-md-12">
                                <?php include "akademik.php"; ?>
                            </div>
                        </div>

                        <div class="card card-header mb-4 card-bg-customs">
                            <h4>Olahraga</h4>
                            <div class="col-md-12">
                                <?php include "olahraga.php"; ?>
                            </div>
                        </div>

                        <div class="card card-header mb-4 card-bg-customs">
                            <h4>Kesenian</h4>
                            <div class="col-md-12">
                                <?php include "kesenian.php"; ?>
                            </div>
                        </div>

                        <div class="card card-header mb-4 card-bg-customs">
                            <h4>Media Kreatif</h4>
                            <div class="col-md-12">
                                <?php include "media_kreatif.php"; ?>
                            </div>
                        </div>

                        <!--<input type="text" name="email" value="<?= $email; ?>" hidden>-->
                        <!--<button type="submit" name="submit"-->
                        <!--    class="btn btn-custom-submit btn-fw mb-4 float-right col-4 rounded-lg font-button">-->
                        <!--    Submit-->
                        <!--</button>-->
                    <!--</form>-->
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
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../../assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/dashboard.js"></script>
    <script src="../../assets/js/todolist.js"></script>
</body>

</html>