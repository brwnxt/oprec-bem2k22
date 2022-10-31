<?php
    session_start();
    include "config/koneksi.php";
    header("X-XSS-Protection: 1; mode=block");

    $sqlselect = mysqli_query($con, " SELECT * FROM users_account ");

    while($datas = mysqli_fetch_array($sqlselect)){ 
        $deadline           = $datas['deadline'];
    }

    if ($deadline == 1) {
        echo "<script>alert('Maaf, pendaftaran telah ditutup'); 
            location.href='./' </script>";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/login.css">
    <link rel="shortcut icon" href="assets/images/Logo bem.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#"><img src="assets/images/Logo bem.png" width="40"><span class="pl-2 h4"style="color:#54337e;font-family: 'Bree Serif', serif;"> BEM FIKTI UG </span></a>
    </nav>

    <div class="main">
    <div class="container">
    
        <div class="row align-items-center pt-5">
            <!-- For Demo Purpose -->
            <div class="col-md-5 pr-lg-5 mb-3 mb-md-0" style="margin-left:60px;">
                <img src="assets/images/Logo bem.png" width="300" class="img-fluid mb-3 d-none d-md-block" >
            </div>

            <!-- Registeration Form -->
            <div class="col-md-7 col-lg-6 ml-auto">
                <h4 class="text-center mb-5"style="color:#54337e;font-family: 'Bree Serif', serif;">OPEN RECRUITMENT BEM FIKTI GUNADARMA UNIVERSITY 2022/2023</h4>
                <h4 class="text-center mb-5" style="color:#54337e;font-family: 'Bree Serif', serif;">REGISTRATION</h4>
                <form action="config/account-regist.php" method="POST">
                    <div class="row">

                        <!-- Email Address -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-user text-muted"></i>
                                </span>
                            </div>
                            <input id="email" type="text" name="nama_lengkap" placeholder="Nama Lengkap"
                                class="form-control bg-white border-left-0 border-md" required>
                        </div>

                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-envelope text-muted"></i>
                                </span>
                            </div>
                            <input id="email" type="email" name="email" placeholder="Email Address"
                                class="form-control bg-white border-left-0 border-md" required>
                        </div>
                        
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-lock text-muted"></i>
                                </span>
                            </div>
                            <input id="password" type="password" name="password" placeholder="Password"
                                class="form-control bg-white border-left-0 border-md" required>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group col-lg-12 mx-auto mb-4">
                           <button class="btn btn-primary btn-block py-2 font-weight-bold" type="submit" name="submit" style="font-family: 'Bree Serif', serif;">Sign Up</button>
                           <h5 class="text-center pt-3 pb-5" style="font-family: 'Bree Serif', serif;"> Sudah memiliki akun ? <a href="./index.php"> Login </a> </h5>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer class="page-footer font-small blue fixed-bottom bg-light">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">Maintained by Biro PTI 2022/2023
        </div>
        <!-- Copyright -->

    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>