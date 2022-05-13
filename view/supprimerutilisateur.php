<?php
require_once "../controller/utilisateurc.php";
session_start();
	if(!isset($_SESSION["nompre"])){
		header("Location: login.php");
		exit(); 
	}

    $id = $_POST["supp_id"];
    $userc = new userc(); 
    $selectedutilisateur = $userc->getutilisateur($id);

    $userc->supprimerutilisateur($id);
    $return = true;


 
 die(json_encode(array('return' => $return)));

?>