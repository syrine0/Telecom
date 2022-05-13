<?php
require_once "../config.php";

class ticketc
{

    function afficherticket()
    {   $pdo=config::getConnexion();
        try 
        {
            $query = $pdo->prepare('select * from ticket ');
            $query->execute();
            $result = $query->fetchALL();
            return $result;
        }
        catch(Exeption $e)
        {
            die('erreur :'.$e->getMessage());
        }

    }
    
    
    function ajouterticket(ticket $ticket)
    {
        
        $pdo = config::getConnexion();
        try 
        {

            $query = $pdo->prepare('insert into ticket (ticket_matricule,ticket_nompre,ticket_nbper,type_ticket,offre_ticket) values (:ticket_matricule,:ticket_nompre,:ticket_nbper,:type_ticket,:offre_ticket)');
            $query->execute([
                'ticket_matricule' => $ticket->getticket_matricule(),
                'ticket_nompre' => $ticket->getticket_nompre(),
                'ticket_nbper' => $ticket->getticket_nbper(),
                'type_ticket' => $ticket->gettype_ticket(),
                'offre_ticket' => $ticket->getoffre_ticket()])
            ;
            
        }
        catch(Exception $e)
        {
        die('Erreur: '.$e->getMessage());
        }
        
    }
    function supprimerticket(int $id)
    {
        $pdo = config::getConnexion();
        try 
        {
            $query = $pdo->prepare('delete from ticket where ticket_id  = :id');
            $query->execute(['id' => $id]);
        }
        catch(Exeption $e)
        {
        die('Erreur: '.$e->getMessage());
        }
    }
        function getticket(int $id)
        {   
            $pdo = config::getConnexion();
            try {

            $query = $pdo->prepare('SELECT * FROM ticket where ticket_id = :id');

            $query->execute(['id'=>$id]);
            $result = $query->fetch();
            return $result ;
            }
            catch(Exeption $e)
            {
            die('Erreur: '.$e->getMessage());
            }  
        }
        
        
        function modifierticket(ticket $ticket , int $id)
        {
        
            $pdo = config::getConnexion();
            try {

            $query = $pdo->prepare('UPDATE ticket SET
            ticket_matricule = :ticket_matricule,
            ticket_nompre = :ticket_nompre,
            ticket_nbper = :ticket_nbper,
            type_ticket = :type_ticket,
            offre_ticket = :offre_ticket
            WHERE ticket_id = :id  ');

            $query->execute([
            'ticket_matricule' =>$ticket->getticket_matricule(),
            'ticket_nompre' => $ticket->getticket_nompre(),
            'ticket_nbper' => $ticket->getticket_nbper(),
            'type_ticket' => $ticket->gettype_ticket(),
            'offre_ticket' => $ticket->getoffre_ticket(),
            'id' => $id]);
             }
             catch(Exception $e)
            {
            die('Erreur: '.$e->getMessage());
            }
        
        }
        function verifier(ticket $ticket) 
        {
            $pdo = config::getConnexion();
            try 
            {
                $query = $pdo->prepare('select * from ticket where ticket_matricule = :ticket_matricule ');
                $query->execute(['ticket_matricule' => $ticket->getticket_matricule()]);
            $result=$query->fetch();
            return $result;
            }
            catch(Exception $e)
            {
            die('Erreur: '.$e->getMessage());
            }   
        }
      
       

}
?>