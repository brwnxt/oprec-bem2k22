<?php
    session_start();
    include "koneksi.php";
    
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $nomor_acak = round(microtime(true));
    
    // Foto Formal
    if(isset($_POST['btn_foto_formal'])) {
        $foto_formal = $_FILES['foto_formal']['name'];
        $tipe_foto_formal = $_FILES['foto_formal']['type'];
        $file_tmp_foto_formal = $_FILES['foto_formal']['tmp_name'];
        
        $foto_formal_baru = $nomor_acak. '.' .$foto_formal;

        $a = mysqli_query($con, "SELECT foto_formal FROM `users_files` WHERE email='$email' ");
        $cek = mysqli_fetch_assoc($a);
        
        $folder = "../../berkas_calon/file_foto/$cek[foto_formal]";
        unlink($folder);
        $del=mysqli_query($con, "DELETE foto_formal FROM `users_files` WHERE email='$email' ");
        
        if($tipe_foto_formal == "image/jpeg" || $tipe_foto_formal == "image/png" || $tipe_foto_formal == "image/jpg" ){
            $update_foto_formal = mysqli_query($con, " UPDATE `users_files` SET `foto_formal`= '$foto_formal_baru' WHERE email = '$email' ");
    
            @move_uploaded_file($file_tmp_foto_formal, "../../berkas_calon/file_foto/".$foto_formal_baru);
            
            if ($update_foto_formal) {
                echo"<script>alert('File foto berhasil upload');
                location.href='../Has-Login/pages/berkas/';</script>";
            }else{
                echo"<script>alert('File foto gagal di upload');
                location.href='../Has-Login/pages/berkas/';</script>";
            }
        }else{
            echo"<script>alert('Maaf format file berkas selain JPG/JPEG/PNG tidak di dukung');
                location.href='../Has-Login/pages/berkas/';</script>";
        }
    }

    // KRS
    else if(isset($_POST['btn_krs'])) {
        $krs_file = $_FILES['krs_file']['name'];
        $tipe_file_krs = $_FILES['krs_file']['type'];
        $file_tmp_krs = $_FILES['krs_file']['tmp_name'];
        
        $krs_baru = $nomor_acak. '_' .$krs_file;

        $a = mysqli_query($con, "SELECT krs FROM `users_files` WHERE email='$email' ");
        $cek = mysqli_fetch_assoc($a);
        
        $folder = "../../berkas_calon/krs/$cek[krs]";
        unlink($folder);
        $del=mysqli_query($con, "DELETE krs FROM `users_files` WHERE email='$email' ");
        
        if($tipe_file_krs == "application/pdf"){
            $update_krs = mysqli_query($con, " UPDATE `users_files` SET `krs`= '$krs_baru' WHERE email = '$email' ");
    
            @move_uploaded_file($file_tmp_krs, "../../berkas_calon/krs/".$krs_baru);
            
            if ($update_krs) {
                echo"<script>alert('Berkas berhasil upload');
                location.href='../Has-Login/pages/berkas/';</script>";
            }else{
                echo"<script>alert('Berkas gagal di upload');
                location.href='../Has-Login/pages/berkas/';</script>";
            }
        }else{
            echo"<script>alert('Maaf format file berkas selain pdf tidak di dukung');
                location.href='../Has-Login/pages/berkas/';</script>";
        }
    }

    // PSIKOTEST
    else if(isset($_POST['btn_psikotest'])) {
        $psikotest_file = $_FILES['psikotest_file']['name'];
        $tipe_file_psikotest = $_FILES['psikotest_file']['type'];
        $file_tmp_psikotest = $_FILES['psikotest_file']['tmp_name'];

        $a = mysqli_query($con, "SELECT psikotest FROM `users_files` WHERE email='$email' ");
        $cek = mysqli_fetch_assoc($a);
        
        $psikotest_baru = $nomor_acak. '_' .$psikotest_file;
        
        $folder = "../../berkas_calon/psikotest/$cek[psikotest]";
        unlink($folder);
        $del=mysqli_query($con, "DELETE psikotest FROM `users_files` WHERE email='$email' ");

        if($tipe_file_psikotest == "application/pdf"){
            $update_psikotest = mysqli_query($con, "UPDATE `users_files` set `psikotest` = '$psikotest_baru' WHERE email = '$email' ");
            @move_uploaded_file($file_tmp_psikotest, "../../berkas_calon/psikotest/".$psikotest_baru);
            
            if ($update_psikotest) {
               echo"<script>alert('Berkas berhasil upload');
                location.href='../Has-Login/pages/berkas/';</script>";
            }else{
                echo"<script>alert('Berkas gagal di upload');
                location.href='../Has-Login/pages/berkas/';</script>";
            }
        }else{
            echo"<script>alert('Maaf format file psikotest selain pdf tidak di dukung');
                location.href='../Has-Login/pages/berkas/';</script>";
        }
    }

    // RANGKUMAN NILAI
    else if(isset($_POST['btn_rangkuman'])) {
        $rangkuman_nilai_file = $_FILES['rangkuman_file']['name'];
        $tipe_file_rangkuman = $_FILES['rangkuman_file']['type'];
        $file_tmp_rangkuman_nilai = $_FILES['rangkuman_file']['tmp_name'];

        $a = mysqli_query($con, "SELECT rangkuman_nilai FROM `users_files` WHERE email='$email' ");
        $cek = mysqli_fetch_assoc($a);
        
        $rangkuman_nilai_baru = $nomor_acak. '_' .$rangkuman_nilai_file;
        
        $folder = "../../berkas_calon/rangkuman_nilai/$cek[rangkuman_nilai]";
        unlink($folder);
        $del=mysqli_query($con, "DELETE rangkuman_nilai FROM `users_files` WHERE email='$email' ");

        if($tipe_file_rangkuman == "application/pdf"){

            $update_rangkuman_nilai = mysqli_query($con, "UPDATE `users_files` set `rangkuman_nilai` = '$rangkuman_nilai_baru' WHERE email = '$email' ");
            @move_uploaded_file($file_tmp_rangkuman_nilai, "../../berkas_calon/rangkuman_nilai/".$rangkuman_nilai_baru);
            
            if ($update_rangkuman_nilai) {
                echo"<script>alert('Berkas berhasil upload');
                location.href='../Has-Login/pages/berkas/';</script>";
            }else{
                echo"<script>alert('Berkas gagal di upload');
                location.href='../Has-Login/pages/berkas/';</script>";
            } 
        }else{
            echo"<script>alert('Maaf format file berkas selain pdf tidak di dukung');
                location.href='../Has-Login/pages/berkas/';</script>";
        }
    }

    // PORTOFOLIO
    else if(isset($_POST['btn_portfolio'])){
        $portfolio = mysqli_real_escape_string($con, $_POST['portfolio']);

        $update_portfolio = mysqli_query($con, "UPDATE `users_files` set `portfolio` = '$portfolio' WHERE email = '$email' ");
        if ($update_portfolio) {
            echo"<script>alert('Portfolio berhasil upload');
            location.href='../Has-Login/pages/berkas/';</script>";
        }else{
            echo"<script>alert('Portfolio gagal di upload');
            location.href='../Has-Login/pages/berkas/';</script>";
        }
    }

?>