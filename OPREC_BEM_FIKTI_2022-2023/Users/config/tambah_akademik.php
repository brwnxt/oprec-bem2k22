<?php
    session_start();
    include "koneksi.php";
    
    $email = mysqli_real_escape_string($con, $_POST['email']);
    
    // PORTOFOLIO
    if(isset($_POST['tambah_academic'])){
        $a_prestasi   = mysqli_real_escape_string($con, $_POST['a_prestasi']);
        $a_tingkat        = mysqli_real_escape_string($con, $_POST['a_tingkat']);
        $a_tahun        = mysqli_real_escape_string($con, $_POST['a_tahun']);

        $update_portfolio = mysqli_query($con, "INSERT INTO `users_academic`(`email`, `a_prestasi`, `a_tingkat`, `a_tahun`) 
            VALUES ('$email', '$a_prestasi', '$a_tingkat', '$a_tahun')");
        if ($update_portfolio) {
            echo"<script>alert('Akademik berhasil ditambah');
            location.href='../Has-Login/pages/academic/';</script>";
        }else{
            echo"<script>alert('Akademik gagal di ditambah');
            location.href='../Has-Login/pages/academic/';</script>";
        }
    }
    else if(isset($_POST['tambah_non_academic'])){
        $na_prestasi   = mysqli_real_escape_string($con, $_POST['na_prestasi']);
        $na_tingkat   = mysqli_real_escape_string($con, $_POST['na_tingkat']);
        $na_tahun   = mysqli_real_escape_string($con, $_POST['na_tahun']);

        $update_portfolio = mysqli_query($con, "INSERT INTO `users_non_academic` (`email`, `na_prestasi`, `na_tingkat`, `na_tahun`) 
            VALUES ('$email', '$na_prestasi', '$na_tingkat', '$na_tahun')");
        if ($update_portfolio) {
            echo"<script>alert('Non Akademik berhasil ditambah');
            location.href='../Has-Login/pages/academic/';</script>";
        }else{
            echo"<script>alert('Non Akademik organizer gagal di ditambah');
            location.href='../Has-Login/pages/academic/';</script>";
        }
    }

?>