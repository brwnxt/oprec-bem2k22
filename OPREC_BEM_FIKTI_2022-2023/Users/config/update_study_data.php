<?php
    session_start();
    include "koneksi.php";

    if (isset($_POST['submit'])) {
        $email        =   mysqli_real_escape_string($con, $_POST['email']);

        $npm          =   mysqli_real_escape_string($con, $_POST['npm']);
        $jurusan      =   mysqli_real_escape_string($con, $_POST['jurusan']);
        $domisili     =   mysqli_real_escape_string($con, $_POST['domisili']);
        $sks          =   mysqli_real_escape_string($con, $_POST['sks']);
        $tahun_masuk  =   mysqli_real_escape_string($con, $_POST['tahun_masuk']);
        
        $ipk_lokal    =   mysqli_real_escape_string($con, $_POST['ipk_lokal']);
        $ipk_utama    =   mysqli_real_escape_string($con, $_POST['ipk_utama']);
        $rangkuman    =   mysqli_real_escape_string($con, $_POST['rangkuman']);
        
        $update_studydata = mysqli_query($con, "UPDATE `users_study_data` SET 
                                        `tahun_masuk` = '$tahun_masuk',
                                        `npm`         = '$npm',
                                        `jurusan`     = '$jurusan',
                                        `domisili`    = '$domisili',
                                        `sks`         = '$sks',
                                        `ipk_lokal`   = '$ipk_lokal',
                                        `ipk_utama`   = '$ipk_utama',
                                        `rangkuman`   = '$rangkuman' 
                                        WHERE email = '$email' ");
                    
        if ($update_studydata) {
            echo"<script>alert('Data studi berhasil diubah');
                location.href='../Has-Login/pages/study_data/';</script>";
            // var_dump($update_studydata);
        }else{
            echo"<script>alert('Data studi gagal diubah');
            location.href='../Has-Login/pages/study_data/';</script>";
        }
    }
                        
?>