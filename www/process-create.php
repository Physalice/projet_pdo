<?php
require_once ("DataBase.php");
// importer et instancier une database
$database = new DataBase();
//récupérer les info du formulaire avec $_POST
//appeler la function insert dog en lui passant les info du formulaire
$newDog = $database-> insertDog ( $_POST["nom"], $_POST["age"], $_POST["race"], $_POST["idMaitre"]);
     
// var_dump ($newDog);
//rediriger l'utilisateur vers la page de profil du nouveau chien header location
header("Location: profilchien.php?id=$newDog");     


/* correction Sandra

$nom =$_POST["nom"];
$age =$_POST["age"];
$race =$_POST["race"];
$idMaitre =$_POST["idMaitre"];

require_Once("DataBase.php");
$database = new DataBase();

$nouvelId =$database->insertDog($nom, $age, $race, $idMaitre);

header("Location: profilchien.php?id=" .$nouvelid);

*/



?>

