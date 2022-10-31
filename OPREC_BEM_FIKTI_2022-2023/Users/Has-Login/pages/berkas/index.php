<?php
    session_start();
    include "../../../config/koneksi.php";
    header("X-XSS-Protection: 1; mode=block");

    if (isset($_SESSION['email'])) {
    
    } else {
      echo "<script>alert('Login Dulu ya'); 
      location.href='../../../';</script>";
    }

    $sqlselect = mysqli_query($con, " SELECT biodata.*, users_account.*, users_files.*
                                      FROM users_account 
                                      JOIN biodata ON users_account.email = biodata.email
                                      JOIN users_files ON biodata.email= users_files.email
                                      WHERE users_account.email = '$_SESSION[email]' ");

    while($datas = mysqli_fetch_array($sqlselect)){ 
        $berkas             = $datas['berkas'];
        $deadline           = $datas['deadline'];
        $namalengkap        = $datas['nama_lengkap'];
        $pas_foto           = $datas['pas_foto'];
        $krs                = $datas['krs'];
        $foto_formal        = $datas['foto_formal'];
        $psikotest          = $datas['psikotest'];
        $portfolio          = $datas['portfolio'];
        $rangkuman_nilai    = $datas['rangkuman_nilai'];
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
                                <p class="mb-1 text-black"><?php echo $namalengkap;?></p>
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
                                <span class="font-weight-bold mb-2"><?php echo $namalengkap;?></span>
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

                        <!-- Pas Foto -->
                        <div class="col-12 mb-4">
                            <form class="form-sample" action="../../../config/berkas_upload.php" method="post"
                                enctype="multipart/form-data">
                                <div class="card card-header" style="border-radius: 10px !important; ">
                                    <h4 class="text-muted">Foto Formal</h4>
                                    <span class="mb-2 h4">Silakan unggah foto kalian di bawah ini dengan ketentuan
                                        :</span>
                                    <ol>
                                        <li> Pas Foto berukuran 4x6</li>
                                        <li> Background foto berwarna putih</li>
                                        <li> Mahasiswa/i menggunakan almamater Gunadarma atau kemeja polos (selain warna
                                            putih)</li>
                                        <li> Foto terbaru (kurang dari 6 bulan)</li>
                                        <li> Maksimal ukuran 5 MB</li>
                                        </li>
                                    </ol>
                                    <div class="row">
                                        <div class="col-md-6 col-12 pt-0">
                                            <?php 
                                        if ($deadline == 1) { ?>
                                            <div class="pt-0 pb-2">
                                                <p class="h5">Foto yang telah diunggah :
                                                    <a href="<?php echo "../../../../berkas_calon/file_foto/".$foto_formal; ?>"
                                                        download>
                                                        <?php echo $foto_formal; ?>
                                                    </a>
                                                </p>
                                            </div>
                                            <?php
                                        }else { ?>
                                            <input type="text" name="email" value="<?= $_SESSION['email']; ?>" hidden>
                                            <input type="file" name="foto_formal" required>
                                            <div class="pt-3 pb-2">
                                                <p class="h5">Foto yang telah diunggah :
                                                    <a href="<?php echo "../../../../berkas_calon/file_foto/".$foto_formal; ?>"
                                                        download>
                                                        <?php echo $foto_formal; ?>
                                                    </a>
                                                </p>
                                            </div>
                                            <?php 
                                            } 
                                        ?>
                                        </div>
                                        <?php 
                                        if ($deadline == 1) { ?>
                                        <div class="col-md-12 col-12">
                                            <span class="badge badge-danger col-12" style="font-size: 17px;">Upload Foto
                                                Formal sudah
                                                ditutup</span>
                                        </div>
                                        <?php
                                            }else { ?>
                                        <div class="col-md-6 col-12">
                                            <button type="submit" name="btn_foto_formal"
                                                class="btn btn-primary col-md-6 col-12 float-right mt-3">Submit</button>
                                        </div>
                                        <?php        
                                            }
                                        ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- KRS -->
                        <div class="col-12 mb-4">
                            <form class="form-sample" action="../../../config/berkas_upload.php" method="post"
                                enctype="multipart/form-data">
                                <div class="card card-header" style="border-radius: 10px !important; ">
                                    <h4 class="text-muted">KRS Semester ATA 2020/2021</h4>
                                    <span class="mb-2 h4">Silakan unggah KRS di bawah ini ( format nama file NPM_KRS.pdf
                                        )</span>
                                    <div class="row">
                                        <?php 
                                        if ($deadline == 1) { ?>
                                        <div class="col-md-6 col-12">
                                            <div class="pt-2 pb-2">
                                                <p class="h5">KRS yang telah diunggah :
                                                    <a href="<?php echo "../../../../berkas_calon/krs/".$krs; ?>"
                                                        download>
                                                        <?php echo $krs; ?>
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <span class="badge badge-danger col-12" style="font-size: 17px;">Upload KRS
                                                sudah
                                                ditutup</span>
                                        </div>
                                        <?php }else {?>
                                        <div class="col-md-6 col-12 pt-2">
                                            <input type="text" name="email" value="<?= $_SESSION['email']; ?>" hidden>
                                            <input type="file" name="krs_file" required>
                                            <div class="pt-3 pb-2">
                                                <p class="h5">KRS yang telah diunggah :
                                                    <a href="<?php echo "../../../../berkas_calon/krs/".$krs; ?>"
                                                        download>
                                                        <?php echo $krs; ?>
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <button type="submit" name="btn_krs"
                                                class="btn btn-primary col-md-6 col-12 float-right mt-3">Submit</button>
                                        </div>
                                        <?php } ?>

                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- RANGKUMAN NILAI -->
                        <div class="col-12 mb-4">
                            <form class="form-sample" action="../../../config/berkas_upload.php" method="post"
                                enctype="multipart/form-data">
                                <div class="card card-header" style="border-radius: 10px !important; ">
                                    <h4 class="text-muted">Rangkuman Nilai Terakhir</h4>
                                    <span class="mb-2"> Silakan unggah rangkuman nilai kalian di bawah ini ( format nama
                                        file NPM_Rangkuman Nilai.pdf ) </span>
                                    <div class="row">
                                        <?php 
                                        if ($deadline == 1) { ?>
                                        <div class="col-md-12 col-12">
                                            <div class="pt-2 pb-2">
                                                <p class="h5">File rangkuman yang telah diunggah :
                                                    <a href="<?php echo "../../../../berkas_calon/rangkuman_nilai/".$rangkuman_nilai; ?>"
                                                        download>
                                                        <?php echo $rangkuman_nilai; ?>
                                                    </a>
                                                </p>
                                            </div>
                                            <?php } else {?>
                                            <div class="col-md-6 col-12 pt-2">
                                                <input type="text" name="email" value="<?= $_SESSION['email']; ?>"
                                                    hidden>
                                                <input type="file" name="rangkuman_file" required>

                                                <div class="pt-3 pb-2">
                                                    <p class="h5">File rangkuman yang telah diunggah :
                                                        <a href="<?php echo "../../../../berkas_calon/rangkuman_nilai/".$rangkuman_nilai; ?>"
                                                            download>
                                                            <?php echo $rangkuman_nilai; ?>
                                                        </a>
                                                    </p>
                                                </div>
                                                <?php } ?>

                                            </div>
                                            <?php 
                                        if ($deadline == 1) { ?>
                                            <div class="col-md-12 col-12">
                                                <span class="badge badge-danger col-12" style="font-size: 17px;">Upload
                                                    Rangkuman Nilai sudah
                                                    ditutup</span>
                                            </div>
                                            <?php
                                            }else { ?>
                                            <div class="col-md-6 col-12">
                                                <button type="submit" name="btn_rangkuman"
                                                    class="btn btn-primary col-md-6 col-12 float-right">Submit</button>
                                            </div>
                                            <?php        
                                            }
                                        ?>
                                        </div>
                                    </div>
                            </form>
                        </div>

                        <!-- Portofolio -->
                        <div class="col-12 mb-4">
                            <form class="form-sample" action="../../../config/berkas_upload.php" method="post"
                                enctype="multipart/form-data">
                                <div class="card card-header" style="border-radius: 10px !important; ">
                                    <h4 class="text-muted">Portofolio</h4>
                                    <div class="mb-4">
                                        <ul class="nav nav-pills" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="BiroHumas" data-toggle="tab"
                                                    href="#Humas" role="tab" aria-controls="Humas"
                                                    aria-selected="true">Humas</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="BiroMedia" data-toggle="tab" href="#Media"
                                                    role="tab" aria-controls="Media" aria-selected="false">Media</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="BiroBismit" data-toggle="tab" href="#Bismit"
                                                    role="tab" aria-controls="Bismit" aria-selected="false">Bismit</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="BiroPTI" data-toggle="tab" href="#PTI"
                                                    role="tab" aria-controls="PTI" aria-selected="false">PTI</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content mt-3 text-muted" id="myTabContent">
                                            <div class="tab-pane fade show active" id="Humas" role="tabpanel"
                                                aria-labelledby="BiroHumas"><a
                                                    href="../../../assets/Ketentuan/Task Public Relation for Open Recruitment Staff BEM FIKTI UG 2021.pdf"
                                                    download>Biro Hubungan Masyarakat.pdf</a> </div>
                                            <div class="tab-pane fade" id="Media" role="tabpanel"
                                                aria-labelledby="BiroMedia"><a
                                                    href="../../../assets/Ketentuan/Task Biro Media for Open Recruitment Staf BEM FIKTI UG 2021.pdf"
                                                    download>Biro Media.pdf</a> </div>
                                            <div class="tab-pane fade" id="Bismit" role="tabpanel"
                                                aria-labelledby="BiroBismit"><a
                                                    href="../../../assets/Ketentuan/Task Biro Bisnis dan Kemitraan for Open Recruitment Staf BEM FIKTI UG 2021.pdf"
                                                    download> Biro Bisnis dan Kemitraan.pdf </a></div>
                                            <div class="tab-pane fade" id="PTI" role="tabpanel"
                                                aria-labelledby="BiroPTI"><a
                                                    href="../../../assets/Ketentuan/Task Biro PTI For Open Recruitment Staff BEM FIKTI UG 2021.pdf"
                                                    download>Biro Pengembangan Teknologi Informasi.pdf </a></div>
                                        </div>
                                    </div>
                                    <span class="mb-2">Silakan input link Google Drive kalian yang berisi portofolio
                                        dari biro yang kalian pilih
                                    </span><span style="font-size: 10pt; font-weight: bold;"> Pastikan link dapat
                                        diakses oleh panitia (Anyone with the link) </span>
                                    <div class="row">
                                        <?php 
                                        if ($deadline == 1) { ?>
                                        <div class="col-md-6 col-12">
                                            <div class="pt-3 pb-2">
                                                <p class="h5">Link portofolio yang telah diunggah :
                                                    <a href="<?php echo $portfolio; ?>">
                                                        <?php echo $portfolio; ?>
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <span class="badge badge-danger col-12" style="font-size: 17px;">Upload
                                                Portofolio sudah ditutup</span>
                                        </div>
                                        <?php }else{ ?>
                                        <div class="col-md-6 col-12">
                                            <input type="text" name="email" value="<?= $_SESSION['email']; ?>" hidden>
                                            <input type="text" name="portfolio" class="form-control"
                                                placeholder="https://LinkGDrive"
                                                style="border: none !important; border-bottom: 2px solid rgb(120, 1, 255) !important; padding: 0px 0px 0px 5px;"
                                                required>
                                            <div class="pt-3 pb-2">
                                                <p class="h5">Link portofolio yang telah diunggah :
                                                    <a href="<?php echo $portfolio; ?>">
                                                        <?php echo $portfolio; ?>
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <button type="submit" name="btn_portfolio"
                                                class="btn btn-primary col-md-6 col-12 float-right">Submit</button>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- Psikotest -->
                        <?php 
                        
                        $psikopen = mysqli_query($con, " SELECT * FROM users_account");
                        $cek = mysqli_num_rows($psikopen);
                        $data = mysqli_fetch_array($psikopen);

                        if ($berkas == 1) { ?>
                            <div class="col-12 mb-4">
                                <div class="card card-header" style="border-radius: 10px !important; ">
                                    <h4 class="text-muted">Psikotest</h4>
                                    <span class="badge badge-danger" style="font-size: 17px;">Mohon maaf <?= $_SESSION['nama_lengkap'] ?> tidak bisa mengikuti psikotest karena tidak lolos dalam seleksi berkas </span>
                                </div>
                            </div>
                        <?php 
                        }elseif ($berkas == 2) {
                            if ($data['deadline_psikotest'] == 1) {?>
                                <div class="col-12 mb-4">
                                    <form class="form-sample" action="../../../config/berkas_upload.php" method="post"
                                        enctype="multipart/form-data">
                                        <div class="card card-header" style="border-radius: 10px !important; ">
                                            <h4 class="text-muted">Psikotest</h4>
                                            <!--span class="mb-2 h4">Silakan unduh lembar LJK untuk mengerjakan psikotest <a
                                                    href="../../../assets/ljk psikotes.docx">di sini </a> </span-->
                                            
                                            <span class="mb-2 h4">Silakan buka lembar soal psikotest <a
                                                    href="../soal-psikotest/">di sini </a> </span>
                                                    
                                            <div class="row">
                                                <div class="col-md-6 col-12 pt-2">
                                                    <input type="text" name="email" value="<?= $_SESSION['email']; ?>" hidden>
                                                    <p class="h5">Silakan unggah file kalian dibawah ini</p>
                                                    <input type="file" name="psikotest_file" required>
                                                    <div class="pt-3 pb-2">
                                                        <p class="h5">File Psikotest yang telah diunggah :
                                                            <a href="<?php echo "../../../../berkas_calon/psikotest/".$psikotest; ?>"
                                                                download>
                                                                <?php echo $psikotest; ?>
                                                            </a>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <button type="submit" name="btn_psikotest"
                                                        class="btn btn-primary col-md-6 col-12 float-right mt-3">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            <?php } else if($data['deadline_psikotest'] == 2) {?>
                                <div class="col-12 mb-4">
                                    <form class="form-sample" action="../../../config/berkas_upload.php" method="post"
                                        enctype="multipart/form-data">
                                        <div class="card card-header" style="border-radius: 10px !important; ">
                                            <h4 class="text-muted">Psikotest</h4>
                                            <span class="badge badge-danger" style="font-size: 17px;">Upload Psikotest Di Tutup</span>
                                        </div>
                                    </form>
                                </div>
                            <?php }else { ?>
                                <div class="col-12 mb-4">
                                    <form class="form-sample" action="../../../config/berkas_upload.php" method="post"
                                        enctype="multipart/form-data">
                                        <div class="card card-header" style="border-radius: 10px !important; ">
                                            <h4 class="text-muted">Psikotest</h4>
                                            <span class="badge badge-info" style="font-size: 17px;">Psikotest Belum Dibuka</span>
                                        </div>
                                    </form>
                                </div>
                            <?php } ?>
                        <?php
                        }
                        ?>
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