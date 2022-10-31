<?php
    session_start();
    include "koneksi.php";

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $nomor_acak = round(microtime(true));

    if (isset($_POST['update']) ){
        
        $foto = $_FILES['pas_foto']['name'];
        $tipe_foto = $_FILES['pas_foto']['type'];
        $file_tmp = $_FILES['pas_foto']['tmp_name'];
        
        $foto_baru = $nomor_acak. '_' .$foto;
    	
    	$a = mysqli_query($con, "SELECT pas_foto FROM biodata WHERE email='$email' ");
        $cek = mysqli_fetch_assoc($a);
        $folder = "../../images_calon/$cek[pas_foto]";
    	unlink($folder);
        $del=mysqli_query($con, "DELETE pas_foto FROM biodata WHERE email='$email' "); 
    	
        if($tipe_foto == "image/jpeg" || $tipe_foto == "image/png" || $tipe_foto == "image/jpg"){
    	    
    	    $update = mysqli_query($con, "UPDATE biodata SET pas_foto='$foto_baru' WHERE email='$email' ");
        
            @move_uploaded_file($file_tmp, "../../images_calon/".$foto_baru);
    
            if ($update){
    			echo"<script>alert('Foto Berhasil Di Ubah');
                location.href='../Has-Login/pages/biodata/';</script>";
    		}else{
                echo"<script>alert('Foto Gagal Di Ubah');
                location.href='../Has-Login/pages/biodata/';</script>";
            }
        }else{
            echo"<script>alert('Maaf format file berkas selain JPG/JPEG/PNG tidak di dukung');
                location.href='../Has-Login/pages/biodata/';</script>";
        }
    }

?>