<?php
namespace App\Models; 
use App\Core\Model; 
 
class Module extends Model{
   private int $id;  
   private string $libelle;


   //Association 
   
   //1-OneToMany avec Cours
   
     public function cours():array{
      $sql="select m.* from cours c,module m where c.module_id=m.id and m.id=?"; 
      return [];
      parent::selectWhere($sql,[$this->id]);
    }
    public function __construct()
    {
      parent::$table="module"; 
        
    }
     

   /**
    * Get the value of libelle
    */ 
   public function getLibelle()
   {
      return $this->libelle;
   }

   /**
    * Set the value of libelle
    *
    * @return  self
    */ 
   public function setLibelle($libelle)
   {
      $this->libelle = $libelle;

      return $this;
   }
   public function insert(){
        
    $sql="INSERT INTO  ".parent::$table."  (id,libelle)VALUES ( ?, ?);";
         
        
   return parent::database()->executeUpdate($sql,[$this->id,$this->libelle]);
                                            
}
}