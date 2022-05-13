<?php
class ticket
{
    private ?int $ticket_id = null;
    private ?string $ticket_matricule = null;
    private ?string $ticket_nompre = null;
    private ?int $ticket_nbper = null;
    private ?string $type_ticket = null;
    private ?string $offre_ticket = null;


    
  

    function __construct(string $ticket_matricule,string $ticket_nompre,int $ticket_nbper,string $type_ticket,string $offre_ticket )
    {
    
        $this->ticket_matricule=$ticket_matricule;
        $this->ticket_nompre=$ticket_nompre;
        $this->ticket_nbper=$ticket_nbper;
        $this->type_ticket=$type_ticket;
        $this->offre_ticket=$offre_ticket;
    }
    function getticket_id() :int
    {
        return $this->ticket_id;
    }
    function getticket_matricule() :string
    {
        return $this->ticket_matricule;
    }
    function getticket_nompre() :string
    {
        return $this->ticket_nompre;
    }
    function getticket_nbper() :int
    {
        return $this->ticket_nbper;
    }
    function gettype_ticket() :string
    {
        return $this->type_ticket;
    }
    function getoffre_ticket() :string
    {
        return $this->offre_ticket;
    }
    function setticket_id(int $ticket_id) :void 
    {
        $this->ticket_id=$ticket_id;
    }
   function setticket_matricule(string $ticket_matricule) :void 
    {
        $this->ticket_matricule=$ticket_matricule;
    }
    function setticket_nompre(string $ticket_nompre) :void 
    {
        $this->ticket_nompre=$ticket_nompre;
    }
    function setticket_nbper(int $ticket_nbper) :void 
    {
        $this->ticket_nbper=$ticket_nbper;
    }
    function settype_ticket(string $type_ticket) :void 
    {
        $this->type_ticket=$type_ticket;
    }
    function setoffre_ticket(string $offre_ticket) :void 
    {
        $this->offre_ticket=$offre_ticket;
    }
}

?>
