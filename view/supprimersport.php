<?php
require_once "../controller/sportc.php";
session_start();
	if(!isset($_SESSION["nompre"])){
		header("Location: login.php");
		exit(); 
	}

    $id = $_POST["supp_id"];
    $sportc = new sportc(); 
    
    $selectedsport = $sportc->getsport($id);
    $sportc->supprimersport($id);
    $return = true;
   
    
 
 die(json_encode(array('return' => $return)));


?>
