<?php
class sport
{
    private ?int $sport_id = null;
    private ?string $sport_matricule = null;
    private ?string $sport_nompre = null;
    private ?string $type_sport = null;
    private ?int $sport_age = null;


    
  

    function __construct(string $sport_matricule,string $sport_nompre,string $type_sport,int $sport_age  )
    {
    
        $this->sport_matricule=$sport_matricule;
        $this->sport_nompre=$sport_nompre;
        $this->type_sport=$type_sport;
        $this->sport_age=$sport_age;
    }
    function getsport_id() :int
    {
        return $this->sport_id;
    }
    function getsport_matricule() :string
    {
        return $this->sport_matricule;
    }
    function getsport_nompre() :string
    {
        return $this->sport_nompre;
    }
    
    function gettype_sport() :string
    {
        return $this->type_sport;
    }
    function getsport_age() :int
    {
        return $this->sport_age;
    }
    function setsport_id(int $sport_id) :void 
    {
        $this->sport_id=$sport_id;
    }
   function setsport_matricule(string $sport_matricule) :void 
    {
        $this->sport_matricule=$sport_matricule;
    }
    function setsport_nompre(string $sport_nompre) :void 
    {
        $this->sport_nompre=$sport_nompre;
    }
    
    function settype_sport(string $type_sport) :void 
    {
        $this->type_sport=$type_sport;
    }
    function setsport_age(int $sport_age) :void 
    {
        $this->sport_age=$sport_age;
    }
}

?>