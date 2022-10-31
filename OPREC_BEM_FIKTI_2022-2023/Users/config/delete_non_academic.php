<?php
// Load file koneksi.php
session_start();
include "koneksi.php";

// Ambil data nama_siswa yang dikirim oleh index.php melalui URL
$id_n_academic = $_GET['id_n_academic'];

$query = mysqli_query($con, "DELETE FROM users_non_academic WHERE id_n_academic = '$id_n_academic' ");

if($query){
	echo"<script>alert('Hapus Non Akademik berhasil');
	   location.href='../Has-Login/pages/academic/';</script>"; // Redirect ke halaman index.php
}
else{
	// Jika Gagal, Lakukan :
	echo"<script>alert('Hapus Non Akademik gagal');
	   location.href='../Has-Login/pages/academic/';</script>";
}
?>
