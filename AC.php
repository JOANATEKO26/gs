<?php 
namespace App\Models; 
class AC extends User {
    private string $email; 
    
    public function __construct()
    {
        parent::__construct();
        parent::$role="ROLE_AC";
        
    }

    


    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
    public static  function selectAll(){
        $sql="select *  from  ".parent::$table." where role like ? ";
       return parent::database()->executeSelect($sql,[parent::$role]);
     }
}