<?php
class excursion
{
    private ?int $excursion_id = null;
    private ?string $excursion_matricule = null;
    private ?string $excursion_nompre = null;
    private ?int $excursion_age = null;
    private ?string $type_excursion = null;


    
  

    function __construct(string $excursion_matricule,string $excursion_nompre,int $excursion_age,string $type_excursion  )
    {
    
        $this->excursion_matricule=$excursion_matricule;
        $this->excursion_nompre=$excursion_nompre;
        $this->excursion_age=$excursion_age;
        $this->type_excursion=$type_excursion;
    }
    function getexcursion_id() :int
    {
        return $this->excursion_id;
    }
    function getexcursion_matricule() :string
    {
        return $this->excursion_matricule;
    }
    function getexcursion_nompre() :string
    {
        return $this->excursion_nompre;
    }
    function getexcursion_age() :int
    {
        return $this->excursion_age;
    }
    function gettype_excursion() :string
    {
        return $this->type_excursion;
    }
   
    function setexcursion_id(int $excursion_id) :void 
    {
        $this->excursion_id=$excursion_id;
    }
   function setexcursion_matricule(string $excursion_matricule) :void 
    {
        $this->excursion_matricule=$excursion_matricule;
    }
    function setexcursion_nompre(string $excursion_nompre) :void 
    {
        $this->excursion_nompre=$excursion_nompre;
    }
    function setexcursion_age(int $excursion_age) :void 
    {
        $this->excursion_age=$excursion_age;
    }
    function settype_excursion(string $type_excursion) :void 
    {
        $this->type_excursion=$type_excursion;
    }
   
}

?>