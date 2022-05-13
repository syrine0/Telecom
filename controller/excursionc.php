<?php
require_once "../config.php";

class excursionc
{

    function afficherexcursion()
    {   $pdo=config::getConnexion();
        try 
        {
            $query = $pdo->prepare('select * from excursion ');
            $query->execute();
            $result = $query->fetchALL();
            return $result;
        }
        catch(Exeption $e)
        {
            die('erreur :'.$e->getMessage());
        }

    }
    
    
    function ajouterexcursion(excursion $excursion)
    {
        
        $pdo = config::getConnexion();
        try 
        {

            $query = $pdo->prepare('insert into excursion (excursion_matricule,excursion_nompre,excursion_age,type_excursion) values (:excursion_matricule,:excursion_nompre,:excursion_age,:type_excursion)');
            $query->execute([
                'excursion_matricule' => $excursion->getexcursion_matricule(),
                'excursion_nompre' => $excursion->getexcursion_nompre(),
                'excursion_age' => $excursion->getexcursion_age(),
                'type_excursion' => $excursion->gettype_excursion()])
            ;
            
        }
        catch(Exception $e)
        {
        die('Erreur: '.$e->getMessage());
        }
        
    }
    function supprimerexcursion(int $id)
    {
        $pdo = config::getConnexion();
        try 
        {
            $query = $pdo->prepare('delete from excursion where excursion_id  = :id');
            $query->execute(['id' => $id]);
        }
        catch(Exeption $e)
        {
        die('Erreur: '.$e->getMessage());
        }
    }
        function getexcursion(int $id)
        {   
            $pdo = config::getConnexion();
            try {

            $query = $pdo->prepare('SELECT * FROM excursion where excursion_id = :id');

            $query->execute(['id'=>$id]);
            $result = $query->fetch();
            return $result ;
            }
            catch(Exeption $e)
            {
            die('Erreur: '.$e->getMessage());
            }  
        }
        
        
        function modifierexcursion(excursion $excursion , int $id)
        {
        
            $pdo = config::getConnexion();
            try {

            $query = $pdo->prepare('UPDATE excursion SET
            excursion_matricule = :excursion_matricule,
            excursion_nompre = :excursion_nompre,
            excursion_age = :excursion_age,
            type_excursion= :type_excursion
            WHERE excursion_id = :id  ');

            $query->execute([
            'excursion_matricule' =>$excursion->getexcursion_matricule(),
            'excursion_nompre' => $excursion->getexcursion_nompre(),
            'excursion_age' => $excursion->getexcursion_age(),
            'type_excursion' => $excursion->gettype_excursion(),
            'id' => $id]);
             }
             catch(Exception $e)
            {
            die('Erreur: '.$e->getMessage());
            }
        
        }
        function verifier(excursion $excursion) 
        {
            $pdo = config::getConnexion();
            try 
            {
                $query = $pdo->prepare('select * from excursion where excursion_matricule = :excursion_matricule ');
                $query->execute(['excursion_matricule' => $excursion->getexcursion_matricule()]);
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