<?php
    session_start();
    include "koneksi.php";

    if (isset($_POST['submit'])) {
        $email         = mysqli_real_escape_string($con, $_POST['email']);
        $skills        = mysqli_real_escape_string($con, $_POST['skills']);
        $facility      = mysqli_real_escape_string($con, implode(',', $_POST['facility']) );
        
        $query  = "UPDATE `users_facility_skills` SET `facility` = '".$facility."' WHERE `email` = '$email';";
        $query .= "UPDATE `users_facility_skills` SET `skills` = '".$skills."' WHERE `email` = '$email'";
        $facility_skills = mysqli_multi_query($con, $query);
        
        if ($facility_skills == NULL) {
            echo"<script>alert('Data berhasil diubah');
            location.href='../Has-Login/pages/facility_skills/';</script>";
        }elseif ($facility_skills) {
            echo"<script>alert('Data berhasil diubah');
            location.href='../Has-Login/pages/facility_skills/';</script>";
        }else {
            var_dump($query);
            // echo "error";
        }
    }

?>