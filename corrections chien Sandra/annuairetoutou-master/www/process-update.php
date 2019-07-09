<?php
// PAGE INTERMEDIARE => QUE du PHP

// Récupérer les infos du formulaire avec $_POST
$id = $_POST["id"];
$nom = $_POST["nom"];
$age = $_POST["age"];
$race = $_POST["race"];

// Importer et instancier une database
require_once("database.php");
$database = new Database();

// Appeler la fonction updateDog en lui passant les infos du formulaire
// updateDog($id, $nom, $age, $race)
$database->updateDog($id, $nom, $age, $race);

// Rediriger l'utilisateur vers la page de profil du chien
header('Location: afficherChien.php?id='.$id); 

?>