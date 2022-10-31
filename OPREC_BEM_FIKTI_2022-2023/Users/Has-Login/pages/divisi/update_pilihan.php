<?php
    session_start();
    include "../../../config/koneksi.php";
    header("X-XSS-Protection: 1; mode=block");

    if (isset($_SESSION['email'])) {
    
    } else {
      echo "<script>alert('Login Dulu ya'); 
      location.href='../../../';</script>";
    }

    $email = $_GET['email'];

    $sqlselect = mysqli_query($con, " SELECT biodata.*, users_account.*, users_choose_point.*
                                      FROM users_account 
                                      JOIN biodata ON users_account.email = biodata.email
                                      JOIN users_choose_point ON biodata.email= users_choose_point.email
                                      WHERE users_account.email = '$email' ");
    while($datas = mysqli_fetch_array($sqlselect)){ 
      $email        = $datas['email'];
      $namalengkap  = $datas['nama_lengkap'];
      $pas_foto     = $datas['pas_foto'];
      $choose_one   = $datas['choose_one'];
      $choose_two   = $datas['choose_two'];
      $reason       = $datas['reason'];
      $motivations  = $datas['motivations'];

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
                        <a href="../../" class="nav-link">
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
                    <div class="row">
                        <div class="col-12 grid-margin">
                            <form action="../../../config/update_choose.php" class="form-sample" method="post"
                                enctype="multipart/form-data">
                                <!-- BIODATA -->
                                <div class="card card-header" style="border-radius: 15px !important; ">
                                    <h3 class="card-description mb-2 text-muted">Update Pilihan Divisi</h3>
                                    <div class="card-body mt-1" style="padding: 10px 0px 0px 0px !important; ">
                                        <div class="row">
                                            <!-- Pilihan 1 -->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <h6 class="col-sm-3 col-form-label">Pilihan 1</h6>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="choose_one"
                                                            style="border: 1px solid rgb(120, 1, 255) !important; border-radius: 5px;">
                                                            <option>--Pilih Departemen / Biro--</option>
                                                            <?php include 'required_one.php'; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Pilihan 2 -->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <h6 class="col-sm-3 col-form-label">Pilihan 2</h6>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="choose_two"
                                                            style="border: 1px solid rgb(120, 1, 255) !important; border-radius: 5px;">
                                                            <option>--Pilih Departemen / Biro--</option>
                                                            <?php include 'required_two.php'; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-bg-customs ">
                                        <h4 class="pb-1 text-muted"> Alasan memilih departemen atau biro tersebut </h4>
                                        <textarea class="form-control" name="reason" id="exampleTextarea1" rows="7" placeholder="Silahkan tulis alasan kalian memilih departemen atau biro tersebut"
                                            style="width: 100%; border: 1px solid rgb(120, 1, 255) !important; border-radius: 5px; padding: 5px 0px 0px 5px;"> <?php echo $reason; ?> </textarea>
                                    </div>

                                    <div class="card-bg-customs mt-4 mb-3">
                                        <h4 class="pb-1 text-muted"> Alasan Mengikuti BEM </h4>
                                        <textarea class="form-control" name="motivations" id="exampleTextarea1" rows="7" placeholder="Silahkan tulis alasan kalian mengikuti BEM"
                                            style="width: 100%; border: 1px solid rgb(120, 1, 255) !important; border-radius: 5px; padding: 5px 0px 0px 5px;"> <?php echo $motivations; ?> </textarea>
                                    </div>
                                </div>
                                <input type="text" name="email" value="<?php echo $email; ?>" hidden>
                                <button type="submit" name="submit"
                                    class="btn btn-custom-submit btn-fw mt-4 mb-n3 float-right col-4 rounded-lg font-button">
                                    Submit
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <footer class="footer bg-white">
                    <div class="container-fluid clearfix text-center">
                        <span class="text-muted d-block text-center d-sm-inline-block"
                            style="color: rgb(120, 1, 255) !important; ">Maintained By Biro PTI 2021/2022</span>
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

    <script>
        function bacaGambar(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#gambar_nodin').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#preview_gambar").change(function () {
            bacaGambar(this);
        });
    </script>

</body>

</html>