<?php
require_once "../config.php";

class sportc
{

    function affichersport()
    {   $pdo=config::getConnexion();
        try 
        {
            $query = $pdo->prepare('select * from sport ');
            $query->execute();
            $result = $query->fetchALL();
            return $result;
        }
        catch(Exeption $e)
        {
            die('erreur :'.$e->getMessage());
        }

    }
    
    
    function ajoutersport(sport $sport)
    {
        
        $pdo = config::getConnexion();
        try 
        {

            $query = $pdo->prepare('insert into sport (sport_matricule,sport_nompre,type_sport,sport_age) values (:sport_matricule,:sport_nompre,:type_sport,:sport_age)');
            $query->execute([
                'sport_matricule' => $sport->getsport_matricule(),
                'sport_nompre' => $sport->getsport_nompre(),
                'type_sport' => $sport->gettype_sport(),
                'sport_age' => $sport->getsport_age()])
            ;
            
        }
        catch(Exception $e)
        {
        die('Erreur: '.$e->getMessage());
        }
        
    }
    function supprimersport(int $id)
    {
        $pdo = config::getConnexion();
        try 
        {
            $query = $pdo->prepare('delete from sport where sport_id  = :id');
            $query->execute(['id' => $id]);
        }
        catch(Exeption $e)
        {
        die('Erreur: '.$e->getMessage());
        }
    }
        function getsport(int $id)
        {   
            $pdo = config::getConnexion();
            try {

            $query = $pdo->prepare('SELECT * FROM sport where sport_id = :id');

            $query->execute(['id'=>$id]);
            $result = $query->fetch();
            return $result ;
            }
            catch(Exeption $e)
            {
            die('Erreur: '.$e->getMessage());
            }  
        }
        
        
        function modifiersport(sport $sport , int $id)
        {
        
            $pdo = config::getConnexion();
            try {

            $query = $pdo->prepare('UPDATE sport SET
            sport_matricule = :sport_matricule,
            sport_nompre = :sport_nompre,
            type_sport = :type_sport,
            sport_age = :sport_age
            WHERE sport_id = :id  ');   

            $query->execute([
            'sport_matricule' => $sport->getsport_matricule(),
            'sport_nompre' => $sport->getsport_nompre(),
            'type_sport' => $sport->gettype_sport(),
            'sport_age' => $sport->getsport_age(),
            'id' => $id]);
             }
             catch(Exception $e)
            {
            die('Erreur: '.$e->getMessage());
            }
        
        }
        function verifier(sport $sport) 
        {
            $pdo = config::getConnexion();
            try 
            {
                $query = $pdo->prepare('select * from sport where sport_matricule = :sport_matricule ');
                $query->execute(['sport_matricule' => $sport->getsport_matricule()]);
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