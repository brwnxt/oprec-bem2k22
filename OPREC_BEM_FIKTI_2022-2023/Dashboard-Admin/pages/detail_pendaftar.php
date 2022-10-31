<?php 
session_start();
ob_start();

require("../config/koneksi.php");

if( !isset($_SESSION["login"]) ){
  header("Location:../login/");
  exit;
}

$email = $_GET['email'];

$biodata = mysqli_query($conn,"SELECT * FROM users_account
INNER JOIN biodata USING(email) 
INNER JOIN users_contact USING(email) 
INNER JOIN users_minat USING(email) 
INNER JOIN users_facility_skills USING(email) 
INNER JOIN users_files USING(email) 
INNER JOIN users_study_data USING(email) 
INNER JOIN users_choose_point USING(email)
WHERE users_account.email = '$email'
");



$organisasi = mysqli_query($conn,"SELECT * FROM users_account INNER JOIN users_history_organization USING(email) WHERE users_account.email = '$email'");
$kepanitiaan = mysqli_query($conn,"SELECT * FROM users_account INNER JOIN users_history_organizer USING(email) WHERE users_account.email = '$email'");
$academic = mysqli_query($conn,"SELECT * FROM users_account INNER JOIN users_academic USING(email) WHERE users_account.email = '$email'");
$non_academic = mysqli_query($conn,"SELECT * FROM users_account INNER JOIN users_non_academic USING(email) WHERE users_account.email = '$email'");

$e_sport = mysqli_query($conn,"SELECT * FROM esport");

ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Data Personal OPREC BEM 2022/2023</title>
    
    <!--partial:partials/header.phpt-->
    <?php include('../partials/header.php'); ?>
    <style>
    .table-custom, tr, td{
      width: 100%;
      border-collapse: collapse;
      border: 1px solid #000;
      padding: 8px 20px;
    }
    </style> 
  </head>

  <body>
    <div class="container-scroller">
    <!--partial:partials/navbar.php-->
    <?php include('../partials/navbar.php'); ?>

      <div class="container-fluid page-body-wrapper">
        <!--partial:partials/_sidebar.php-->
        <?php include('../partials/sidebar.php'); ?> 

        <div class="main-panel">
          <!-- content-wrapper start -->
          <div class="content-wrapper">
          <?php
              foreach($biodata as $data) :
            ?>
            <div class="page-header">
              <h3 class="page-title text-primary">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi mdi-account-card-details"></i>
                </span> Data <?= $data['nama_lengkap']; ?>
              </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="data.php?email=<?=$email;?>" target="_BLANK">
                      <button class="btn btn-success">Download <i class="mdi mdi-file-pdf"></i></button>
                    </a>
                  </li>
                </ol>
              </nav>
            </div>

            <div id="data-pendaftar">
              <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h3 class="text-center mb-2">Formulir Open Recruitment STAFF BEM FIKTI 2021</h3>
                      <div class="row">
                      <table class="table-custom mb-3">
                        <tr>
                          <td class="text-muted">I. Data Pribadi</td>
                          <td rowspan="8"><img src="../../berkas_calon/file_foto/<?= $data['foto_formal'];?>" alt="" width="200px"></td>
                        </tr>
                        <tr>
                          <td>
                            <span class="font-weight-bold">Nama Lengkap: </span> 
                            <?= $data['nama_lengkap']; ?>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <span class="font-weight-bold">Tempat, Tanggal Lahir: </span>
                            <?= $data['ttl']; ?>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <span class="font-weight-bold">Jenis Kelamin:</span>
                            <?= $data['jk']; ?>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <span class="font-weight-bold">Agama:</span> 
                            <?= $data['agama']; ?>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <span class="font-weight-bold">Anak keberapa & Berapa Saudara:</span>
                            <?= $data['anak_ke']. ' dari '. $data['bersaudara']. ' saudara' ; ?> 
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="font-weight-bold">Alamat Rumah:</div> 
                            <?= $data['alamat_rumah']; ?>
                        </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="font-weight-bold">Alamat Kost:</div> 
                            <?= $data['alamat_kost']; ?>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <span class="font-weight-bold">Nomor Telepon Pribadi: </span>
                            <?= $data['no_telp']; ?>
                          </td>
                          <td>
                            <span class="font-weight-bold">Nomor Telepon Orang Tua/Wali: </span>
                            <?= $data['no_telp_ortu']; ?>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <span class="font-weight-bold">E-mail: </span> 
                            <?= $data['email']; ?>
                          </td>
                          <td>
                            <span class="font-weight-bold">ID Line & IG: </span> 
                            <?= $data['line']. ' & '. $data['instagram']; ?> 
                        </td>
                        </tr>
                        <tr>
                          <td colspan="2">
                            <span class="font-weight-bold">Motto Hidup: </span>
                            <?= $data['moto']; ?>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="2">
                            <span class="font-weight-bold">Satu kata yang menggambarkan diri saya:</span>
                            <?= $data['satu_kata']; ?>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-muted" colspan="2">II. Peminatan</td>
                        </tr>
                        <tr>
                          <td colspan="2">
                            <label class="mt-2 font-weight-bold">Akademik</label> <br>
                            <div class="row">
                              <div class="col-md-8">
                                <?php
                                $all_akademik = array('Web Programming','Penelitian Ilmiah','Mobile Programming','ERP/System','Database','Jaringan Komputer','Desktop Programming','FPGA','IoT','Embedded System','Robotic');
                                $akademik = $data['akademik'];
                                $akademik_arr = explode(",",$akademik);
                                foreach($all_akademik as $akademik) :
                                  if(!in_array($akademik,$akademik_arr)){
                                    $checked_select = "";
                                  } else{
                                    $checked_select = "checked";
                                  }
                                ?>
                                <label class="mr-2"><input type="checkbox" <?=$checked_select;?>  value="<?=$akademik;?>" class="mr-1"/><?= $akademik; ?></label>
                                <?php
                                  endforeach;
                                ?>
                                <br> <br>
                              </div>
                            </div>
                            
                            
                            <label class="mt-2 font-weight-bold">Olahraga</label> <br>
                            <div class="row">
                              <div class="col-md-8">
                                <?php
                                $all_olahraga = array('Futsal/Sepak Bola','Bulu Tangkis','Voli','Catur','Tenis','Basket','Panahan');
                                foreach($e_sport as $row) :
                                  array_push($all_olahraga,$row['nama_esport']);
                                endforeach;
                                $olahraga = $data['olahraga'];
                                $olahraga_arr = explode(",",$olahraga);
                                foreach($all_olahraga as $olahraga) :
                                  if(!in_array($olahraga,$olahraga_arr)){
                                    $checked_select = "";
                                  } else{
                                    $checked_select = "checked";
                                  }
                                ?>
                                <label class="mr-2"><input type="checkbox" <?=$checked_select;?>  value="<?=$olahraga;?>" class="mr-1"/><?= $olahraga; ?></label>
                                <?php
                                  endforeach;
                                ?>
                                <br> <br>
                              </div>
                            </div>

                            <label class="mt-2 font-weight-bold">Kesenian</label> <br>
                            <?php
                            $all_kesenian = array('Musik','Tari Tradisional','Tari Modern','Gambar/Lukis','Teater/Drama','Pantun','Stand Up Comedy');
                            $kesenian = $data['kesenian'];
                            $kesenian_arr = explode(",",$kesenian);
                            foreach($all_kesenian as $kesenian) :
                              if(!in_array($kesenian,$kesenian_arr)){
                                $checked_select = "";
                              } else{
                                $checked_select = "checked";
                              }
                            ?>
                            <label class="mr-2"><input type="checkbox" <?=$checked_select;?>  value="<?=$kesenian;?>"     class="mr-1"/><?= $kesenian; ?></label>
                            <?php
                              endforeach;
                            ?>
                            <br><br>

                            <label class="mt-2 font-weight-bold">Media Kreatif</label> <br>
                            <div class="row">
                              <div class="col-md-8">
                                <?php
                                $all_media_kreatif = array('Fotografi','Ilustrasi','Desain Grafis','Videografi','Multimedia','Animasi');
                                $media_kreatif = $data['media_kreatif'];
                                $media_kreatif_arr = explode(",",$media_kreatif);
                                foreach($all_media_kreatif as $media_kreatif) :
                                  if(!in_array($media_kreatif,$media_kreatif_arr)){
                                    $checked_select = "";
                                  } else{
                                    $checked_select = "checked";
                                  }
                                ?>
                                <label class="mr-2"><input type="checkbox" <?=$checked_select;?>  value="<?=$media_kreatif;?>" class="mr-1"/><?= $media_kreatif; ?></label>
                                <?php
                                  endforeach;
                                ?>
                                <br> <br>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-muted" colspan="2">III. Keahlian</td>
                        </tr>
                        <tr>
                          <td colspan="2"><?= $data['skills']; ?></td>
                        </tr>
                        <tr>
                          <td class="text-muted" colspan="2">IV. Fasilitas Kepimilikan yang Dimiliki</td>
                        </tr>
                        <tr>
                          <td colspan="2">
                            <div class="row mt-2">
                              <div class="col-md-5">
                                <?php
                                $all_fasilitas = array('Handphone','Laptop','Digital camera/SLR','Handycam','Mobil','Motor');
                                $fasilitas = $data['facility'];
                                $fasilitas_arr = explode(",",$fasilitas);
                                foreach($all_fasilitas as $fasilitas) :
                                  if(!in_array($fasilitas,$fasilitas_arr)){
                                    $checked_select = "";
                                  } else{
                                    $checked_select = "checked";
                                  }
                                ?>
                                <label class="mr-2"><input type="checkbox" <?=$checked_select;?> value="<?=$fasilitas;?>" class="mr-1"/><?= $fasilitas; ?></label>
                                <?php
                                  endforeach;
                                ?>
                              </div>
                            </div>
                          </td>
                        </tr>
                      </table>
                      <table  class="table-custom mb-3">
                        <tr>
                          <td class="text-muted" colspan="4">V. Data Studi</td>
                        </tr>
                        <tr>
                          <td><span class="font-weight-bold">Tahun Masuk</span></td>
                          <td colspan="3"><?= $data['tahun_masuk']; ?></td>
                        </tr>
                        <tr>
                          <td><span class="font-weight-bold">NPM</span></td>
                          <td colspan="3"><?= $data['npm']; ?></td>
                        </tr>
                        <tr>
                          <td><span class="font-weight-bold">Jurusan</span></td>
                          <td colspan="3"><?= $data['jurusan']; ?></td>
                        </tr>
                        </tr>
                        <tr>
                          <td><span class="font-weight-bold">Domisili</span></td>
                          <td colspan="3"><?= $data['domisili']; ?></td>
                        </tr>
                        <tr>
                          <td><span class="font-weight-bold">SKS yang dicapai</span></td>
                          <td colspan="3"><?= $data['sks']; ?></td>
                        </tr>
                        <tr>
                          <td><span class="font-weight-bold">IPK Terakhir</span></td>
                          <td>Lokal: <?= $data['ipk_lokal']; ?></td>
                          <td>Utama: <?= $data['ipk_utama']; ?></td>
                          <td>Rangkuman: <?= $data['rangkuman']; ?></td>
                        </tr>

                      </table>
                      <table  class="table-custom mb-3">
                        <tr>
                          <td class="text-muted" colspan="3">VI. Riwayat Organisasi</td>
                        </tr>
                        <tr class="font-weight-bold text-center">
                          <td>Nama Organisasi</td>
                          <td>Jabatan</td>
                          <td>Periode</td>
                        </tr>
                        <?php foreach($organisasi as $org) : ?>
                        <tr>
                          <td><?= $org['nama_organisasi']; ?></td>
                          <td><?= $org['ho_jabatan']; ?></td>
                          <td><?= $org['ho_periode']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                        <tr>
                          <td class="text-muted" colspan="3">VII. Riwayat Kepanitiaan</td>
                        </tr>
                        <tr class="font-weight-bold text-center">
                          <td>Nama Kepanitiaan</td>
                          <td>Jabatan</td>
                          <td>Periode</td>
                        </tr>
                        <?php foreach($kepanitiaan as $panitia) : ?>
                        <tr>
                          <td><?= $panitia['panitia']; ?></td>
                          <td><?= $panitia['jabatan']; ?></td>
                          <td><?= $panitia['periode']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                        <tr>
                          <td class="text-muted" colspan="3">VIII. Riwayat Akademik</td>
                        </tr>
                        <tr class="font-weight-bold text-center">
                          <td>Prestasi</td>
                          <td>Tingkat</td>
                          <td>Tahun</td>
                        </tr>
                        <?php foreach($academic as $ac) : ?>
                        <tr>
                          <td><?= $ac['a_prestasi']; ?></td>
                          <td><?= $ac['a_tingkat']; ?></td>
                          <td><?= $ac['a_tahun']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                        <tr>
                          <td class="text-muted" colspan="3">IX. Riwayat Non-Akademik</td>
                        </tr>
                        <tr class="font-weight-bold text-center">
                          <td>Prestasi</td>
                          <td>Tingkat</td>
                          <td>Tahun</td>
                        </tr>
                        <?php foreach($non_academic as $non_ac) : ?>
                        <tr>
                          <td><?= $non_ac['na_prestasi']; ?></td>
                          <td><?= $non_ac['na_tingkat']; ?></td>
                          <td><?= $non_ac['na_tahun']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                      </table>

                      <table class="table-custom mb-3">
                        <tr>
                          <td class="text-muted">X. Motivasi Menjadi Pengurus BEM</td>
                        </tr>
                        <tr>
                          <td><p class="text-justify"><?= $data['motivations']; ?></p></td>
                        </tr>
                        <tr>
                          <td>
                            <label class="mb-2 font-weight-bold">Pilih 2 Biro/Departemen/AU</label>
                            <ul>
                              <li><?= $data['choose_one']; ?></li>
                              <li><?= $data['choose_two']; ?></li>
                            </ul>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-muted">XI. Alasan Memilih Biro/Depatemen/AU/ Tersebut</td>
                        </tr>
                        <tr>
                          <td>
                            <p class="text-justify">
                              <?= $data['reason']; ?>
                            </p>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-muted">XI. Pernyataan</td>
                        </tr>
                        <tr>
                          <td>
                            <p class="text-justify mt-2">
                            &nbsp; Saya, <?= $data['nama_lengkap']; ?>, telah mengisi formulir pendaftaran untuk mengikuti seleksi menjadi pengurus BEM FIKTI Universitas Gunadarma periode 2021/2022 dengan informasi yang sebenar-benarnya dan lengkap serta dapat dipertanggungjawabkan.
                            </p>
                            <p class="text-justify">
                            &nbsp; Saya bersedia mengikuti seluruh rangkaian kegiatan Open Recruitment Pengurus BEM FIKTI Universitas Gunadarma dengan sungguh-sungguh dan saya bersedia mematuhi seluruh keputusan panitia Open Recruitment. Jika saya diterima menjadi pengurus maka saya akan bertanggung jawab akan atas hal-hal yang saya janjikan dalam rangkaian Open Recruitment.
                            </p> <br>
                            <label class="mb-5"> Depok, <?=date('d M Y', strtotime($data["created_at"])) ?></label><br>
                            <label><?= $data['nama_lengkap']; ?></label>
                          </td>
                        </tr>

                      </table>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <?php endforeach; ?>  
          </div>
          <!-- content-wrapper ends -->

          <!--partial:partials/_footer.php-->
          <?php include('../partials/footer.php'); ?>
    
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

    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
  </body>
</html>