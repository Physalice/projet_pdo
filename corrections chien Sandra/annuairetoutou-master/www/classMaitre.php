<?php

class Maitre{
    // Attributs
    private $id;
    private $nom;
    private $telephone;

    // Constructeur par default

    // fonctions
    public function __set($name, $value){}
    
    public function getId(){
        return $this->id;
    }
    public function getNom(){
        return $this->nom;
    }
    public function getTelephone(){
        return $this->telephone;
    }

}

?>