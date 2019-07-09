<?php
 

 class Maitre{
    private $id;
    private $name;
    private $phone;
    
    //public function __construct(){} par défaut                            
    
    public function __set($name, $value){}
    
    public function getId(){
        return $this->id;
    }
    
    public function getNom(){
        return $this->name;  // même nom que la liste base de donnée
    }
    public function getTel(){
        return $this->phone;
    }
    
}
?>