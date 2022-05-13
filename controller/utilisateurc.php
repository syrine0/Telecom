<?php
require_once "../config.php";

class userc
{

    function afficherutilisateur()
    {   $pdo=config::getConnexion();
        try 
        {
            $query = $pdo->prepare('SELECT * FROM users where nompre !="ttadmin"');
            $query->execute();
            $result = $query->fetchALL();
            return $result;
        }
        catch(Exeption $e)
        {
            die('erreur :'.$e->getMessage());
        }

    }
    function afficheradmin()
    {   $pdo=config::getConnexion();
        try 
        {
            $query = $pdo->prepare('SELECT * FROM users where nompre ="ttadmin"');
            $query->execute();
            $result = $query->fetchALL();
            return $result;
        }
        catch(Exeption $e)
        {
            die('erreur :'.$e->getMessage());
        }

    }
    function getutilisateur(int $id)
        {   
            $pdo = config::getConnexion();
            try {

            $query = $pdo->prepare('SELECT * FROM users where id = :id');

            $query->execute(['id'=>$id]);
            $result = $query->fetch();
            return $result ;
            }
            catch(Exeption $e)
            {
            die('Erreur: '.$e->getMessage());
            }  
        }
        
        
        function modifierutilisateur(utilisateur $utilisateur , int $id)
        {
            $password= hash('sha256', $utilisateur->getpassword());
            $pdo = config::getConnexion();
            try {

            $query = $pdo->prepare('UPDATE users SET
            nompre = :nompre,
            numtel = :numtel,
            email = :email,
            password = :password
            WHERE id = :id  ');

            $query->execute([
            'nompre' => $utilisateur->getnompre(),
            'numtel' => $utilisateur->getnumtel(),
            'email' => $utilisateur->getemail(),
            'password' => $password,
            'id' => $id]);
             }
             catch(Exception $e)
            {
            die('Erreur: '.$e->getMessage());
            }
        
        }
    function supprimerutilisateur(int $id)
    {
        $pdo = config::getConnexion();
        try 
        {
            $query = $pdo->prepare('delete from users where id = :id');
            $query->execute(['id' => $id]);
        }
        catch(Exeption $e)
        {
        die('Erreur: '.$e->getMessage());
        }
    }

}
?>