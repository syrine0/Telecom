<?php
require('config.php');
session_start();


if (isset($_POST['nompre'])){
	$nompre = stripslashes($_POST['nompre']);
	$nompre = mysqli_real_escape_string($conn, $nompre);
	$password = stripslashes($_POST['password']);
	$password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM `users` WHERE nompre='$nompre' and password='".hash('sha256', $password)."'";
	$result = mysqli_query($conn,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
	if($rows==1){
	    $_SESSION['nompre'] = $nompre;
        $return = true;

	  

	}else{
	
        $return = false;

   
	}
}
die(json_encode(array('return' => $return)));

?>