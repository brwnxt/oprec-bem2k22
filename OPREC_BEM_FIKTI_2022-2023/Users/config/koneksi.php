 <?php

    // $host="localhost";
    // $user="oprecbem_fiktiug";
    // $pass ="SulitBemFiktiOprek_2kDuaSatu";
    // $db ="oprecbem_fikti2021";

    $host   = "localhost";
    $user   = "root";
    $pass   = "";
    $db     = "bemfikti_oprec2k21";

    $con    = mysqli_connect($host, $user, $pass, $db)or die("ERROR");
    
    // if (mysqli_connect_errno()) {
	//     echo mysqli_connect_errno();
    // }

    // if ($_SERVER["HTTPS"] != "on") {
	//     header("Location:https://" .
	// 	    $_SERVER["HTTP_HOST"] .
	// 	    $_SERVER["REQUEST_URI"]);
	//     exit();
    // }

?>