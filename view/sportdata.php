
<?php
require_once "../model/sport.php";
require_once "../controller/sportc.php";

session_start();
	if(!isset($_SESSION["nompre"])){
		header("Location: login.php");
		exit(); 
	}


    $sport = new sport(
        $_POST['sport_matricule'],
        $_POST['sport_nompre'],
        $_POST['type_sport'],   
        $_POST['sport_age']        
    );
    $sportc = new sportc();
    $test=$sportc->verifier($sport);
    if($test!=null)
		{
            $return = false;

		}else{
        $sportc->ajoutersport($sport);
        $return = true;

    }
    die(json_encode(array('return' => $return)));

 



?>
