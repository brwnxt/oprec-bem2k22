<?php
    session_start();
    include "koneksi.php";

    $email     =   mysqli_real_escape_string($con, $_POST['email']);
    $ttl            =   mysqli_real_escape_string($con, $_POST['ttl']);
    $jk             =   mysqli_real_escape_string($con, $_POST['jk']);
    $agama          =   mysqli_real_escape_string($con, $_POST['agama']);
    $anak_ke        =   mysqli_real_escape_string($con, $_POST['anak_ke']);
    $bersaudara     =   mysqli_real_escape_string($con, $_POST['bersaudara']);
    $satu_kata      =   mysqli_real_escape_string($con, $_POST['satu_kata']);
    $moto           =   mysqli_real_escape_string($con, $_POST['moto']);

    $alamat_rumah   =   mysqli_real_escape_string($con, $_POST['alamat_rumah']);
    $alamat_kost    =   mysqli_real_escape_string($con, $_POST['alamat_kost']);
    $no_telp        =   mysqli_real_escape_string($con, $_POST['no_telp']);
    $no_telp_ortu   =   mysqli_real_escape_string($con, $_POST['no_telp_ortu']);
    $instagram      =   mysqli_real_escape_string($con, $_POST['instagram']);
    $line           =   mysqli_real_escape_string($con, $_POST['line']);

    $update_bio     = "UPDATE `biodata` SET `ttl` = '$ttl', `jk` = '$jk', `agama` = '$agama', `anak_ke` = '$anak_ke', `bersaudara` = '$bersaudara', `satu_kata` = '$satu_kata', `moto` = '$moto'
                       WHERE email = '$email'; ";

    $update_bio     .= "UPDATE `users_contact` SET `alamat_rumah` = '$alamat_rumah', `alamat_kost` = '$alamat_kost', `no_telp` = '$no_telp', `no_telp_ortu` = '$no_telp_ortu', `line` = '$line', `instagram` = '$instagram'
                            WHERE email = '$email' ";
                    
    $update_multi_bio = mysqli_multi_query($con, $update_bio);
    if ($update_multi_bio) {
        echo"<script>alert('Biodata Di Ubah');
            location.href='../Has-Login/pages/biodata/';</script>";
        // var_dump($update_multi_bio);
    }else{
        echo"<script>alert('Biodata Di Ubah');
            location.href='../Has-Login/pages/biodata/';</script>";
    }
    


?>