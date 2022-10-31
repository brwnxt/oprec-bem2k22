<?php
// Load file koneksi.php
session_start();
include "koneksi.php";

// Ambil data nama_siswa yang dikirim oleh index.php melalui URL
$id_organizer = $_GET['id_organizer'];

$query = mysqli_query($con, "DELETE FROM users_history_organizer WHERE id_organizer = '$id_organizer' ");

if($query){
	echo"<script>alert('Hapus riwayat berhasil');
	   location.href='../Has-Login/pages/history_organizations/';</script>"; // Redirect ke halaman index.php
}
else{
	// Jika Gagal, Lakukan :
	echo"<script>alert('Hapus riwayat gagal');
	   location.href='../Has-Login/pages/history_organizations/';</script>";
}
?>
