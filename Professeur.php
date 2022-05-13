<?php 
namespace App\Models; 
 
class Professeur extends User{
     private string $grade;   
     private string $nomComplet;
     //1-OneToOneavec adresse
     private Adresse $adresse;

     public function __construct()
     {
         parent::$role="ROLE_PROFESSEUR";
         $this->adresse=new Adresse;
     }
     //Association 
      //1-OneToOne avec adresse
         
          public function adresse():Adresse{
            $sql="select a.* from professeur p,adresse a where a.adresse_id=a.id and p.id=?";  
            return new Adresse();
        }
        public static  function selectAll(){
            $sql="select *  from ? where role like ? ";
            return parent::database()->executeSelect($sql,[parent::$table, parent::$role]);
        }
   
        public function insert(){
           $sql="INSERT INTO ? (`login`,`password`, `grade`, `ville`, `quartier`, `role`,nom_complet)
                VALUES (?,?,?,?,?,?,?);";
           return parent::database()->executeUpdate($sql,[
                           parent::$table,
                           $this->login,$this->password,$this->grade,
                           $this->adresse->getVille(),  $this->adresse->getQuartier(),
                           parent::$role,$this->nomComplet]);
      }
      

     /**
      * Get the value of grade
      */ 
     public function getGrade()
     {
          return $this->grade;
     }

     /**
      * Set the value of grade
      *
      * @return  self
      */ 
     public function setGrade($grade)
     {
          $this->grade = $grade;

          return $this;
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

     
    }