<?php
// Load file koneksi.php
session_start();
include "koneksi.php";

// Ambil data nama_siswa yang dikirim oleh index.php melalui URL
$id_academic = $_GET['id_academic'];

$query = mysqli_query($con, "DELETE FROM users_academic WHERE id_academic = '$id_academic' ");

if($query){
	echo"<script>alert('Hapus Akademik berhasil');
	   location.href='../Has-Login/pages/academic/';</script>"; // Redirect ke halaman index.php
}
else{
	// Jika Gagal, Lakukan :
	echo"<script>alert('Hapus Akademik gagal');
	   location.href='../Has-Login/pages/academic/';</script>";
}
?>
