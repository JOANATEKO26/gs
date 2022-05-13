<?php
namespace App\Models; 
class RP extends User  {
    private string $adresse;
    
    public function __construct()
    {
        parent::__construct();
        parent::$role="ROLE_RP";
        
    }
    public static  function selectAll(){
        $sql="select *  from  ".parent::$table." where role like ? ";
       return parent::database()->executeSelect($sql,[parent::$role]);
     }

  



    /**
     * Get the value of adresse
     */ 
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set the value of adresse
     *
     * @return  self
     */ 
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }
}