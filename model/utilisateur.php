<?php
class utilisateur
{
    private ?int $id  = null;
    private ?string $matricule = null;
    private ?string $nompre = null;
    private ?int $numtel = null;
    private ?string $email = null;
    private ?string $password = null;


    

    
  

    function __construct(string $nompre,int $numtel,string $email,string $password)
    {
        $this->nompre=$nompre;
        $this->numtel=$numtel;
        $this->email=$email;
        $this->password=$password;
 

    }
    function getid() :int
    {
        return $this->id;
    }

    function getmatricule() :string
    {
        return $this->matricule;
    }
    function getnompre() :string
    {
        return $this->nompre;
    }
    function getnumtel() :int
    {
        return $this->numtel;
    }
    function getemail() :string
    {
        return $this->email;
    }
    function getpassword() :string
    {
        return $this->password;
    }

    
    function setid(int $id) :void 
    {
        $this->id=$id;
    }
   function setmatricule(string $matricule) :void 
    {
        $this->matricule=$matricule;
    }
    function setnompre(string $nompre) :void 
    {
        $this->nompre=$nompre;
    }
    function setnumtel(int $numtel) :void 
    {
        $this->numtel=$numtel;
    }
    function setemail(string $email) :void 
    {
        $this->email=$email;
    }
    function setpassword(string $password) :void 
    {
        $this->password=$password;
    }
    
    
}

?>