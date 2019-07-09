<?php
// PAGE INTERMEDIARE => QUE du PHP

// Récupérer les infos du formulaire avec $_POST
$nom = $_POST["nom"];
$age = $_POST["age"];
$race = $_POST["race"];
$idMaitre = $_POST["idMaitre"];

// Importer et instancier une database
require_once("database.php");
$database = new Database();

// Appeler la fonction insertDog en lui passant les infos du formulaire
// Récupérer le nouvel id du chien créé
// insertDog($nom, $age, $race, $idMaitre)
$nouvelId = $database->insertDog($nom, $age, $race, $idMaitre);

// Rediriger l'utilisateur vers la page de profil du nouveau chien
header('Location: afficherChien.php?id='.$nouvelId); 

?>