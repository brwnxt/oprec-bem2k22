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

    $sqlselect = mysqli_query($con, " SELECT biodata.*, users_account.*, users_contact.*
                                      FROM users_account 
                                      JOIN biodata ON users_account.email = biodata.email
                                      JOIN users_contact ON biodata.email= users_contact.email
                                      WHERE users_account.email = '$email' ");
    while($datas = mysqli_fetch_array($sqlselect)){ 
      $email        = $datas['email'];
      $namalengkap  = $datas['nama_lengkap'];
      $ttl          = $datas['ttl'];
      $jk           = $datas['jk'];
      $agama        = $datas['agama'];
      $anak_ke      = $datas['anak_ke'];
      $bersaudara   = $datas['bersaudara'];
      $satu_kata    = $datas['satu_kata'];
      $moto         = $datas['moto'];
      $pas_foto     = $datas['pas_foto'];
      $alamat_rumah = $datas['alamat_rumah'];
      $alamat_kost  = $datas['alamat_kost'];
      $no_telp      = $datas['no_telp'];  
      $no_telp_ortu = $datas['no_telp_ortu'];
      $instagram    = $datas['instagram'];  
      $line         = $datas['line'];  
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
                        <a class="nav-link" data-toggle="collapse" href="#seleksi" aria-expanded="false"
                            aria-controls="seleksi">
                            <span class="menu-title">Hasil Seleksi</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-checkbox-marked-outline menu-icon"></i>
                        </a>
                        <div class="collapse" id="seleksi">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="../pengumuman/berkas.php">Berkas</a>
                                </li>
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
                            <form action="../../../config/update_biodata.php" class="form-sample" method="post"
                                enctype="multipart/form-data">
                                <!-- BIODATA -->
                                <div class="card card-header" style="border-radius: 15px !important; ">
                                    <h4 class="card-description mb-4">Update Biodata</h4>
                                    <div class="card-body mt-1" style="padding: 10px 0px 0px 0px !important; ">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h6 for="exampleInputName1">E-mail</h6>
                                                    <input type="text" class="form-control" id="exampleInputName1"
                                                        value="<?php echo $email; ?>"
                                                        style="border: none !important; border-bottom: 2px solid rgb(120, 1, 255) !important; padding: 0px 0px 0px 5px;"
                                                        disabled>
                                                    <input name="email" type="text"
                                                        value="<?php echo $_SESSION['email']; ?>" hidden>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h6 for="exampleInputName1">Nama Lengkap</h6>
                                                    <input type="text" name="nama_lengkap" class="form-control"
                                                        id="exampleInputName1" value="<?php echo $namalengkap; ?>"
                                                        style="border: none !important; border-bottom: 2px solid rgb(120, 1, 255) !important; padding: 0px 0px 0px 5px;">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h6 for="exampleInputName1">Tempat, Tanggal Lahir</h6>
                                                    <input type="text" name="ttl" class="form-control"
                                                        id="exampleInputName1" value="<?php echo $ttl; ?>"
                                                        style="border: none !important; border-bottom: 2px solid rgb(120, 1, 255) !important; padding: 0px 0px 0px 5px;">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <h6 class="col-sm-3 col-form-label">Agama</h6>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="agama"
                                                            style="border: 1px solid rgb(120, 1, 255) !important; border-radius: 5px;">
                                                            <option>--Pilih Agama--</option>
                                                            <option name="agama"
                                                                <?php if($agama=="Islam"){echo "selected";}?>
                                                                value="Islam">Islam</option>
                                                            <option name="agama"
                                                                <?php if($agama=="Protestan"){echo "selected";}?>
                                                                value="Protestan">Protestan</option>
                                                            <option name="agama"
                                                                <?php if($agama=="Khatolik"){echo "selected";}?>
                                                                value="Khatolik">Khatolik</option>
                                                            <option name="agama"
                                                                <?php if($agama=="Budha"){echo "selected";}?>
                                                                value="Budha">Budha</option>
                                                            <option name="agama"
                                                                <?php if($agama=="Hindu"){echo "selected";}?>
                                                                value="Hindu">Hindu</option>
                                                            <option name="agama"
                                                                <?php if($agama=="Khonghucu"){echo "selected";}?>
                                                                value="Khonghucu">Khonghucu</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <h6 class="col-sm-3 col-form-label">Jenis Kelamin</h6>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="jk"
                                                            style="border: 1px solid rgb(120, 1, 255) !important; border-radius: 5px;">
                                                            <option>--Pilih Jenis Kelamin--</option>
                                                            <option name="jk"
                                                                <?php if($jk=="Laki-Laki"){echo "selected";}?>
                                                                value="Laki-Laki">Laki-Laki</option>
                                                            <option name="jk"
                                                                <?php if($jk=="Perempuan"){echo "selected";}?>
                                                                value="Perempuan">Perempuan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <h6 class="col-sm-3 col-form-label">Anak ke -</h6>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="anak_ke"
                                                            style="border: 1px solid rgb(120, 1, 255) !important; border-radius: 5px;">
                                                            <option name="anak_ke"
                                                                <?php if($anak_ke=="1"){echo "selected";}?> value="1">1
                                                            </option>
                                                            <option name="anak_ke"
                                                                <?php if($anak_ke=="2"){echo "selected";}?> value="2">2
                                                            </option>
                                                            <option name="anak_ke"
                                                                <?php if($anak_ke=="3"){echo "selected";}?> value="3">3
                                                            </option>
                                                            <option name="anak_ke"
                                                                <?php if($anak_ke=="4"){echo "selected";}?> value="4">4
                                                            </option>
                                                            <option name="anak_ke"
                                                                <?php if($anak_ke=="5"){echo "selected";}?> value="5">5
                                                            </option>
                                                            <option name="anak_ke"
                                                                <?php if($anak_ke=="6"){echo "selected";}?> value="6">6
                                                            </option>
                                                            <option name="anak_ke"
                                                                <?php if($anak_ke=="7"){echo "selected";}?> value="7">7
                                                            </option>
                                                            <option name="anak_ke"
                                                                <?php if($anak_ke=="8"){echo "selected";}?> value="8">8
                                                            </option>
                                                            <option name="anak_ke"
                                                                <?php if($anak_ke=="9"){echo "selected";}?> value="9">9
                                                            </option>
                                                            <option name="anak_ke"
                                                                <?php if($anak_ke=="10"){echo "selected";}?> value="10">
                                                                10</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <h6 class="col-sm-3 col-form-label">Bersaudara</h6>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="bersaudara"
                                                            style="border: 1px solid rgb(120, 1, 255) !important; border-radius: 5px;">
                                                            <option name="bersaudara"
                                                                <?php if($bersaudara=="1"){echo "selected";}?>
                                                                value="1">1</option>
                                                            <option name="bersaudara"
                                                                <?php if($bersaudara=="2"){echo "selected";}?>
                                                                value="2">2</option>
                                                            <option name="bersaudara"
                                                                <?php if($bersaudara=="3"){echo "selected";}?>
                                                                value="3">3</option>
                                                            <option name="bersaudara"
                                                                <?php if($bersaudara=="4"){echo "selected";}?>
                                                                value="4">4</option>
                                                            <option name="bersaudara"
                                                                <?php if($bersaudara=="5"){echo "selected";}?>
                                                                value="5">5</option>
                                                            <option name="bersaudara"
                                                                <?php if($bersaudara=="6"){echo "selected";}?>
                                                                value="6">6</option>
                                                            <option name="bersaudara"
                                                                <?php if($bersaudara=="7"){echo "selected";}?>
                                                                value="7">7</option>
                                                            <option name="bersaudara"
                                                                <?php if($bersaudara=="8"){echo "selected";}?>
                                                                value="8">8</option>
                                                            <option name="bersaudara"
                                                                <?php if($bersaudara=="9"){echo "selected";}?>
                                                                value="9">9</option>
                                                            <option name="bersaudara"
                                                                <?php if($bersaudara=="10"){echo "selected";}?>
                                                                value="10">10</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h6 for="exampleInputName1">Satu kata yang menggambarkan diri saya
                                                    </h6>
                                                    <input type="text" name="satu_kata" class="form-control"
                                                        id="exampleInputName1" value="<?php echo $satu_kata; ?>"
                                                        style="border: none !important; border-bottom: 2px solid rgb(120, 1, 255) !important; padding: 0px 0px 0px 5px;">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h6 for="exampleInputName1">Motto Hidup</h6>
                                                    <textarea class="form-control" name="moto" id="exampleTextarea1"
                                                        rows="7"
                                                        style="width: 100%; border: 1px solid rgb(120, 1, 255) !important; border-radius: 5px; padding: 5px 0px 0px 5px;"><?php echo $moto; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- ADDRESS -->
                                <div class="card card-header mt-4" style="border-radius: 15px !important; ">
                                    <h4 class="card-description mb-2">Address</h4>
                                    <div class="card-body" style="padding: 10px 0px 0px 0px !important; ">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h6 for="exampleInputName1">Alamat Rumah</h6>
                                                    <input type="text" name="alamat_rumah" class="form-control"
                                                        id="exampleInputName1" value="<?php echo $alamat_rumah; ?>"
                                                        style="border: none !important; border-bottom: 2px solid rgb(120, 1, 255) !important; padding: 0px 0px 0px 5px;">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h6 for="exampleInputName1">Alamat Kost</h6>
                                                    <textarea class="form-control" id="exampleTextarea1"
                                                        name="alamat_kost" rows="7"
                                                        style="width: 100%; border: 1px solid rgb(120, 1, 255) !important; border-radius: 5px; padding: 5px 0px 0px 5px;"> <?php echo $alamat_kost; ?> </textarea>
                                                    <!--<input type="text" name="alamat_kost" class="form-control"-->
                                                    <!--    id="exampleInputName1" value="<?php echo $alamat_kost; ?>"-->
                                                    <!--    style="border: none !important; border-bottom: 2px solid rgb(120, 1, 255) !important; padding: 0px 0px 0px 5px;">-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- CONTACT ME -->
                                <div class="card card-header mt-4" style="border-radius: 15px !important; ">
                                    <h4 class="card-description mb-2">Contacts / Social Media</h4>
                                    <div class="card-body" style="padding: 10px 0px 0px 0px !important; ">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5 class="col-sm-12 pl-0 mb-0">No Telepon Pribadi</h5>
                                                    <input type="text" name="no_telp" class="form-control"
                                                        value="<?php echo $no_telp; ?>"
                                                        style="border: none !important; border-bottom: 2px solid rgb(120, 1, 255) !important; padding: 0px 0px 0px 5px;">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5 class="col-sm-12 pl-0 mb-0">No Telepon Orang Tua/Wali</h5>
                                                    <input type="text" name="no_telp_ortu" class="form-control"
                                                        value="<?php echo $no_telp_ortu; ?>"
                                                        style="border: none !important; border-bottom: 2px solid rgb(120, 1, 255) !important; padding: 0px 0px 0px 5px;">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5 class="col-sm-12 pl-0 mb-0">Instagram</h5>
                                                    <input type="text" name="instagram" class="form-control"
                                                        value="<?php echo $instagram; ?>"
                                                        style="border: none !important; border-bottom: 2px solid rgb(120, 1, 255) !important; padding: 0px 0px 0px 5px;">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5 class="col-sm-12 pl-0 mb-0">ID Line</h5>
                                                    <input type="text" name="line" class="form-control"
                                                        value="<?php echo $line; ?>"
                                                        style="border: none !important; border-bottom: 2px solid rgb(120, 1, 255) !important; padding: 0px 0px 0px 5px;">
                                                </div>
                                            </div>
                                        </div>
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