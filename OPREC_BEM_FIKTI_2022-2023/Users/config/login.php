<?php
    session_start();
    include "koneksi.php";

    if (isset($_POST['submit'])) {
        
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        // $password = md5($_POST['password']);
        
        // menyeleksi data admin dengan nama_m dan password yang sesuai
        $query = mysqli_query($con, "SELECT biodata.*, users_account.* 
                                     FROM users_account 
                                     JOIN biodata ON users_account.email = biodata.email
                                     WHERE users_account.email = '$email' AND users_account.password = md5('$password') ");
    
        // menghitung jumlah data yang ditemukan
        $cek = mysqli_num_rows($query);
        $data = mysqli_fetch_array($query);
        
        if($cek > 0){
            $_SESSION['email'] = $data['email'];
            $_SESSION['nama_lengkap'] = $data['nama_lengkap'];

            echo "<script>alert('Selamat datang $_SESSION[nama_lengkap] '); 
            location.href='../Has-Login/' </script>";
        } else {
            echo "<script>alert('Akun salah'); 
            location.href='../' </script>";
        }
    }

?>