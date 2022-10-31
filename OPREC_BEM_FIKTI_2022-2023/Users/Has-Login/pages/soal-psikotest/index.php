<?php
    session_start();
    include "../../../config/koneksi.php";
    header("X-XSS-Protection: 1; mode=block");

    if (isset($_SESSION['email']) > 0) {
      
    } else {
      echo "<script>alert('Login Dulu ya'); 
      location.href='../../../';</script>";
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
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="shortcut icon" href="../../../assets/images/Logo bem.png" />

    <style>
        div.content-wrapper {
            background-color: #7f28ed;
            height: 575px;
            overflow: auto;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="#"><img src="../../../assets/images/Logo bem.png" alt="logo"
                        style="width: 60px; height: 60px;" /><span style="font-family: poppins; font-weight: bold;">BEM
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
                                <img src="../../../assets/images/no-profiles.png" alt="profile">
                                <?php
                    } else { ?>
                                <img src="../../../../images_calon/<?php echo $pas_foto; ?>" alt="profile">
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
                                <img src="../../../assets/images/no-profiles.png" alt="profile">
                                <?php
                    } else { ?>
                                <img src="../../../../images_calon/<?php echo $pas_foto; ?>" alt="profile">
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
                        <a class="nav-link" data-toggle="collapse" href="#requirement" aria-expanded="false"
                            aria-controls="requirement">
                            <span class="menu-title">Requirement</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-file menu-icon"></i>
                        </a>
                        <div class="collapse" id="requirement">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pages/biodata/">Biodata</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/study_data/">Data Studi</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/facility_skills/">Fasilitas &
                                        Keahlian</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/peminatan_staff/">Peminatan</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" href="pages/berkas/">Berkas</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/divisi/">Pilihan</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/history_organizations/">Riwayat
                                        Organisasi</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" href="pages/academic/">Akademik & Non
                                        Akademik</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#seleksi" aria-expanded="false"
                            aria-controls="seleksi">
                            <span class="menu-title">Hasil Seleksi</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-checkbox-marked-outline menu-icon"></i>
                        </a>
                        <div class="collapse" id="seleksi">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pages/pengumuman/berkas.php">Berkas</a>
                                </li>
                                <!-- <li class="nav-item"> <a class="nav-link" href="pages/pengumuman/final.php">Final</a></li> -->
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-panel">
                <div class="content-wrapper text-white" style="padding: 20px 20px 0px 20px !important; ">
                    <h4>PETUNJUK :</h4>
                    <h4 class="pl-4">Di dalam berkas soal ini terdapat 90 pasang pernyataan. Pilihlah salah satu
                        pernyataan dari pasangan pernyataan itu yang Anda rasakan paling mendekati
                        gambaran diri Anda, atau yang paling menunjukkan perasaan Anda.
                        Kadang-kadang Anda merasa bahwa kedua pernyataan tersebut tidak sesuai benar
                        dengan diri Anda, namun demikian Anda diminta tetap memilih salah satu
                        pernyataan yang paling menunjukkan diri Anda.</h4>
                    <h4 class="pt-3 pb-2">Jawaban Anda dibuat pada LEMBAR JAWABAN dengan cara MELINGKARI
                        HURUF A ATAU B yang terdapat di nomor pernyataannya.</h4>

                    <h4> Misalnya : </h4>
                    <div class="pl-3 pb-2">
                        <p class="h4">
                            A. Saya seorang pekerja "keras"
                            <br>
                            B. Saya bukan seorang pemurung
                        </p>
                    </div>
                    <h4 class="mt-3"> pada LEMBAR JAWABAN : </h4>
                    <h4 class="pl-3">
                        Bila Anda seorang pekerja "keras", maka lingkarilah A <br>
                        Tetapi bila Anda bukan seorang pemurung, maka lingkarilah B
                    </h4>
                    <ul class="ml-4 h5">
                        <li>Pastikan bahwa Anda memilih jawaban Anda pada nomor yang tepat
                            di lembar jawaban Anda.</li>
                        <li>Bekerjalah dengan cepat, tetapi jangan sampai ada nomor pernyataan yang
                            terlewatkan.</li>
                    </ul>

                    <hr class="col-11 mt-4 mb-4" style="height: 5px; background-color: white; padding-left: 0px !important;">
                    <?php include "table_soal.php"; ?>

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
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/dashboard.js"></script>
</body>

</html>