<?php

    include "koneksi.php";

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $nama_lengkap = mysqli_real_escape_string($con, $_POST['nama_lengkap']);
    $password = mysqli_real_escape_string($con, MD5($_POST['password']));
    

    if (isset($_POST['submit'])) {
        $query  = "INSERT INTO users_account (email, password, berkas, deadline, final) VALUES ('$email', '$password', 0, 0, 0);";
        $query .= "INSERT INTO biodata (email, nama_lengkap) VALUES ('$email', '$nama_lengkap');";
        $query .= "INSERT INTO users_contact (email) VALUES ('$email');";
        $query .= "INSERT INTO users_choose_point (email) VALUES ('$email');";
        $query .= "INSERT INTO users_facility_skills (email) VALUES ('$email');";
        $query .= "INSERT INTO users_files (email) VALUES ('$email');";
        $query .= "INSERT INTO users_minat (email) VALUES ('$email');";
        $query .= "INSERT INTO users_study_data (email) VALUES ('$email')";
        
        $check = mysqli_multi_query($con, $query);
        
        if ($check) {
            echo "<script>alert('Terimakasih telah register, Silahkan login');
            location.href='../' </script>";
        }else{
            echo "<script>alert('Maaf email telah terdaftar');
            location.href='../register-acc.php' </script>";
        }
    }

?>