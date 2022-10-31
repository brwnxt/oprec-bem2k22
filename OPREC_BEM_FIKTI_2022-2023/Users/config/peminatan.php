<?php
    session_start();
    include "koneksi.php";

    if (isset($_POST['submit'])) {
        $email         = mysqli_real_escape_string($con, $_POST['email']);
        $akademik      = mysqli_real_escape_string($con, implode(',',$_POST['akademik']) );
        $olahraga      = mysqli_real_escape_string($con, implode(',',$_POST['olahraga']) );
        $kesenian      = mysqli_real_escape_string($con, implode(',',$_POST['kesenian']) );
        $media_kreatif = mysqli_real_escape_string($con, implode(',',$_POST['media_kreatif']) );   
        
        $query  = "UPDATE `users_minat` SET `akademik` = '".$akademik."' WHERE `email` = '$email';";
        $query .= "UPDATE `users_minat` SET `olahraga` = '".$olahraga."' WHERE `email` = '$email';";
        $query .= "UPDATE `users_minat` SET `kesenian` = '".$kesenian."' WHERE `email` = '$email';";
        $query .= "UPDATE `users_minat` SET `media_kreatif` = '".$media_kreatif."' WHERE `email` = '$email'";
        $peminatan = mysqli_multi_query($con, $query);
        
        if ($peminatan == 0) {
            echo"<script>alert('Peminatan berhasil diubah');
            location.href='../Has-Login/pages/peminatan_staff/';</script>";
        }elseif ($peminatan) {
            echo"<script>alert('Peminatan berhasil diubah');
            location.href='../Has-Login/pages/peminatan_staff/';</script>";
        }else {
            var_dump($query);
            // echo "error";
        }
    }

?>