<?php
    session_start();
    include "koneksi.php";

    if (isset($_POST['submit'])) {
        $email        =   mysqli_real_escape_string($con, $_POST['email']);

        $choose_one     =   mysqli_real_escape_string($con, $_POST['choose_one']);
        $choose_two     =   mysqli_real_escape_string($con, $_POST['choose_two']);
        $reason         =   mysqli_real_escape_string($con, $_POST['reason']);
        $motivations    =   mysqli_real_escape_string($con, $_POST['motivations']);
        
        $update_studydata = mysqli_query($con, "UPDATE `users_choose_point` SET 
                                        `choose_one`    = '$choose_one',
                                        `choose_two`    = '$choose_two',
                                        `reason`        = '$reason',
                                        `motivations`   = '$motivations' 
                                        WHERE email     = '$email' ");
                    
        if ($update_studydata) {
            echo"<script>alert('Pilihan berhasil diubah');
                location.href='../Has-Login/pages/divisi/';</script>";
            // var_dump($update_studydata);
        }else{
            echo"<script>alert('Pilihan gagal diubah');
            location.href='../Has-Login/pages/divisi/';</script>";
        }
    }
                        
?>