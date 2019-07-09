<?php

 

class Chien{
private $id;
private $nom;
private $age;
private $race;
private $nomMaitre;
private $telMaitre;

//public function __construct(){}                             //par défaut

public function __set($name, $value){}

public function getId(){
    return $this-> id;
}
public function getNom(){
    return $this-> nom;
}
public function getAge(){
    return $this-> age;
}
public function getRace(){
    return $this-> race;
}
//public function getIdMaitre(){return $this-> id_maitre;}   //sert de lien entre les table n'est pas utile ici

public function getNomMaitre(){
    return $this-> nomMaitre;
}
public function getTelMaitre(){
    return $this-> telMaitre;
}

}


?>
