<?php
require_once "../model/excursion.php";
require_once "../controller/excursionc.php";

session_start();
	if(!isset($_SESSION["nompre"])){
		header("Location: login.php");
		exit(); 
	}


    $excursion = new excursion(
        $_POST['excursion_matricule'],
        $_POST['excursion_nompre'],
        $_POST['excursion_age'],  
        $_POST['type_excursion']   
             
    );
    $excursionc = new excursionc();
    $test=$excursionc->verifier($excursion);
    if($test!=null)
		{
            $return = false;

		}else{
        $excursionc->ajouterexcursion($excursion);
        $return = true;

    }
    die(json_encode(array('return' => $return)));

 



?>
