<?php
    session_start();
    include "koneksi.php";
    
    $email = mysqli_real_escape_string($con, $_POST['email']);
    
    // PORTOFOLIO
    if(isset($_POST['tambah_organisasi'])){
        $nama_organisasi   = mysqli_real_escape_string($con, $_POST['nama_organisasi']);
        $ho_jabatan        = mysqli_real_escape_string($con, $_POST['ho_jabatan']);
        $ho_periode        = mysqli_real_escape_string($con, $_POST['ho_periode']);

        $update_portfolio = mysqli_query($con, "INSERT INTO `users_history_organization`(`email`, `nama_organisasi`, `ho_jabatan`, `ho_periode`) 
            VALUES ('$email', '$nama_organisasi', '$ho_jabatan', '$ho_periode')");
        if ($update_portfolio) {
            echo"<script>alert('Riwayat berhasil ditambah');
            location.href='../Has-Login/pages/history_organizations/';</script>";
        }else{
            echo"<script>alert('Riwayat gagal di ditambah');
            location.href='../Has-Login/pages/history_organizations/';</script>";
        }
    }
    else if(isset($_POST['tambah_organizer'])){
        $panitia   = mysqli_real_escape_string($con, $_POST['panitia']);
        $jabatan   = mysqli_real_escape_string($con, $_POST['jabatan']);
        $periode   = mysqli_real_escape_string($con, $_POST['periode']);

        $update_portfolio = mysqli_query($con, "INSERT INTO `users_history_organizer` (`email`, `panitia`, `jabatan`, `periode`) 
            VALUES ('$email', '$panitia', '$jabatan', '$periode')");
        if ($update_portfolio) {
            echo"<script>alert('Riwayat kepanitiaan berhasil ditambah');
            location.href='../Has-Login/pages/history_organizations/';</script>";
        }else{
            echo"<script>alert('Riwayat kepanitiaan gagal di ditambah');
            location.href='../Has-Login/pages/history_organizations/';</script>";
        }
    }

?>