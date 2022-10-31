<?php
require("koneksi.php");


function seleksiBerkas($id){
    global $conn;
    
    $email = $_GET['email'];
    $berkas = $_GET['seleksi1'];

    $result = mysqli_query($conn,"UPDATE users_account SET berkas = '$berkas' WHERE email = '$email'"); 

    return mysqli_affected_rows($conn);
}

function seleksiFinal($id){
    global $conn;
    
    $email = $_GET['email'];
    $final = $_GET['seleksi2'];

    $result = mysqli_query($conn,"UPDATE users_account SET final = '$final' WHERE email = '$email'"); 

    return mysqli_affected_rows($conn);
}

function tutupDaftar($data){
    global $conn;

    $deadline = htmlspecialchars($data["deadline"]);

    $query = "UPDATE users_account SET deadline = '$deadline' " ;
    $result = mysqli_query($conn,$query);
    //vardump($result);die;
    
    return mysqli_affected_rows($conn);
}


function bukaDaftar($data){
    global $conn;

    $deadline = htmlspecialchars($data["deadline"]);

    $query = "UPDATE users_account SET deadline = '$deadline' " ;
    $result = mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}
function tutupPsikotest($data){
    global $conn;

    $deadline = htmlspecialchars($data["deadline_psikotest"]);

    $query = "UPDATE users_account SET deadline_psikotest = '$deadline' " ;
    $result = mysqli_query($conn,$query);
    //vardump($result);die;
    
    return mysqli_affected_rows($conn);
}


function bukaPsikotest($data){
    global $conn;

    $deadline = htmlspecialchars($data["deadline_psikotest"]);

    $query = "UPDATE users_account SET deadline_psikotest = '$deadline' " ;
    $result = mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

function tambahEsport($data){
    global $conn;

    $nama_esport = htmlspecialchars($data["nama_esport"]);

    $query = "INSERT INTO esport (id_esport, nama_esport) VALUES ('','$nama_esport')" ;
    $result = mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

function hapusEsport($id){
    global $conn;
    $id_esport = $_GET["id_esport"];
    $result = mysqli_query($conn, "DELETE FROM esport WHERE id_esport = '$id_esport'");
    return mysqli_affected_rows($conn);
}

function hapusPendaftar($id){
    global $conn;
    $email = $_GET['email'];
    $hapus = $_GET['hapus'];
    
    if($hapus == 1){
        $query  = "DELETE FROM users_account WHERE email = '$email' ;";
        $query .= "DELETE FROM biodata WHERE email = '$email' ;";
        $query .= "DELETE FROM users_contact WHERE email = '$email' ;";
        $query .= "DELETE FROM users_choose_point WHERE email = '$email' ;";
        $query .= "DELETE FROM users_facility_skills WHERE email = '$email' ;";
        $query .= "DELETE FROM users_files WHERE email = '$email' ;";
        $query .= "DELETE FROM users_minat WHERE email = '$email' ;";
        $query .= "DELETE FROM users_study_data WHERE email = '$email' ";
        
        $check = mysqli_multi_query($conn, $query);
        
    }
    
    return mysqli_affected_rows($conn);
}

?>  