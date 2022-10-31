<?php
    session_start();
    include "../config/koneksi.php";
    header("X-XSS-Protection: 1; mode=block");

    if (!isset($_SESSION['']) > 0) {
        echo "<script>alert('Anda siapa ya ?'); 
        location.href='../';</script>";
    } else {
      echo "<script>alert('Anda siapa ya ?'); 
      location.href='../';</script>";
    }
?>