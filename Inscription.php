<?php
namespace App\Models;
use App\Core\Model; 
class Inscription extends Model{
    
    private \DateTime $dateInscription;
    private string  $annee;
    
    //1-many to one avec classe
    public function classe():Classe{
        $sql="select cl.* from inscriptions i,classe cl where i.classe_id=cl.id and i.id=?";
  
        return new Classe();
        parent::selectWhere($sql,[$this->id],true);
    }

   
    //2-many to one avec etudiant
    public function etudiants():Etudiants{
        $sql="select e.* from inscriptions i,etudiants e where i.etudiants_id=e.id and i.id=?";
  
        return new Etudiant();
        parent::selectWhere($sql,[$this->id],true);
    }
    
    public function __construct(){
        parent::$table="inscriptions";  
        
    }

    /**
     * Get the value of dateInscription
     */ 
    public function getDateInscription()
    {
        return $this->dateInscription;
    }

    /**
     * Set the value of dateInscription
     *
     * @return  self
     */ 
    public function setDateInscription($dateInscription)
    {
        $this->dateInscription = $dateInscription;

        return $this;
    }

    /**
     * Get the value of annee
     */ 
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * Set the value of annee
     *
     * @return  self
     */ 
    public function setAnnee($annee)
    {
        $this->annee = $annee;

        return $this;
    }
    public function insert(){
        
        $sql="INSERT INTO  ".parent::$table."  (dateInscription,annee)VALUES ( ?, ?);";
             
            
       return parent::database()->executeUpdate($sql,[$this->dateInscription,$this->annee]);
                                                
   }
}