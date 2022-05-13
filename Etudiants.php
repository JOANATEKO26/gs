<?php 
namespace App\Models; 
class Etudiants extends User {
    private string $nomComplet;
    private \DateTime $dateNaissance;

     //1-one to many avec classe
     public function classe():array{
        $sql="select e.* from classe cl,etudiants e where cl.etudiants_id=e.id and e.id=?"; 
           return [];
       }
     
     
     
     //2-one to many avec inscriptions
     public function inscriptions():array{
        $sql="select e.* from inscriptions i,etudiants e where i.etudiants_id=e.id and e.id=?"; 
           return [];
       }
     
    
    public function __construct()
    {
        parent::__construct();
        parent::$role="ROLE_ETUDIANTS";
        
    }

    /**
     * Get the value of nomComplet
     */ 
    public function getNomComplet()
    {
        return $this->nomComplet;
    }

    /**
     * Set the value of nomComplet
     *
     * @return  self
     */ 
    public function setNomComplet($nomComplet)
    {
        $this->nomComplet = $nomComplet;

        return $this;
    }

    /**
     * Get the value of dateNaissance
     */ 
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set the value of dateNaissance
     *
     * @return  self
     */ 
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

       
        return $this;
    }

    public static  function selectAll(){
        $sql="select *  from  ".parent::$table." where role like ? ";
       return parent::database()->executeSelect($sql,[parent::$role]);
     }
}