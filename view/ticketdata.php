<?php
require_once "../model/ticket.php";
require_once "../controller/ticketc.php";

session_start();
	if(!isset($_SESSION["nompre"])){
		header("Location: login.php");
		exit(); 
	}


    $ticket = new ticket(
        $_POST['ticket_matricule'],
        $_POST['ticket_nompre'],
        $_POST['ticket_nbper'], 
        $_POST['type_ticket'],   
        $_POST['offre_ticket']        
    );
    $ticketc = new ticketc();
    $test=$ticketc->verifier($ticket);
    if($test!=null)
		{
            $return = false;

		}else{
        $ticketc->ajouterticket($ticket);
        $return = true;

    }
    die(json_encode(array('return' => $return)));

 



?>
