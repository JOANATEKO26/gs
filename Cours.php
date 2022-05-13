<?php
namespace App\Models; 
use App\Core\Model;
class Cours extends Model{
    private int $id;
    private \DateTime $dateCours;
    private string $heureDebut;
    private string $heureFin;


    public function __construct()
    {
      parent::$table="cours";   
    }


    //Association
     //1-ManyToOne avec Module
        
        public function module():Module{
          $sql="select m.* from cours c,module m where c.module_id=m.id and c.id=?";
          return new Module();
          parent::selectWhere($sql,[$this->id],true);
      }
      //2-ManyToOne avec Professeur
      public function professeur():Professeur{
        $sql="select u.* from cours c,user u where c.professeur_id=u.id and c.id=?and role like 'ROLE_PROFESSEUR ";  
        return new Professeur();
        parent::selectWhere($sql,[$this->id],true);
    }
       
       //3-ManyToOne avec Classe
       public function classe():Classe{
        $sql="select cl.* from cours c,classe cl where c.classe_id=cl.id and c.id=?";
        return new Classe();
        parent::selectWhere($sql,[$this->id],true);
    }
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }


    /**
     * Get the value of dateCours
     */ 
    public function getDateCours()
    {
        return $this->dateCours;
    }

    /**
     * Set the value of dateCours
     *
     * @return  self
     */ 
    public function setDateCours($dateCours)
    {
        $this->dateCours = $dateCours;

        return $this;
    }

    /**
     * Get the value of heureDebut
     */ 
    public function getHeureDebut()
    {
        return $this->heureDebut;
    }

    /**
     * Set the value of heureDebut
     *
     * @return  self
     */ 
    public function setHeureDebut($heureDebut)
    {
        $this->heureDebut = $heureDebut;

        return $this;
    }

    /**
     * Get the value of heureFin
     */ 
    public function getHeureFin()
    {
        return $this->heureFin;
    }

    /**
     * Set the value of heureFin
     *
     * @return  self
     */ 
    public function setHeureFin($heureFin)
    {
        $this->heureFin = $heureFin;

        return $this;
    }

    public function insert(){
        
      $sql="INSERT INTO  ".parent::$table."  (id,dateCours,heureDebut,heureFin)VALUES ( ?, ?, ?,?);";
           
          
     return parent::database()->executeUpdate($sql,[$this->id,$this->dateCours,$this->heureDebut,$this->heureFin]);
                                              
 }
}