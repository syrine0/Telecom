<?php
require_once "../controller/excursionc.php";
session_start();
	if(!isset($_SESSION["nompre"])){
		header("Location: login.php");
		exit(); 
	}

    $id = $_POST["supp_id"];
    $excursionc = new excursionc(); 
    
    $selectedexcursion = $excursionc->getexcursion($id);
    $excursionc->supprimerexcursion($id);
    $return = true;
   
    
 
 die(json_encode(array('return' => $return)));


?>