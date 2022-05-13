<?php
require_once "../controller/ticketc.php";
session_start();
	if(!isset($_SESSION["nompre"])){
		header("Location: login.php");
		exit(); 
	}

    $id = $_POST["supp_id"];
    $ticketc = new ticketc(); 
    
    $ticketc->supprimerticket($id);
    $return = true;
   
    
 
 die(json_encode(array('return' => $return)));


?>

