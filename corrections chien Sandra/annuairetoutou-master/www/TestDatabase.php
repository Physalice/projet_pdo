<?php
// Import des fichiers nécessaires aux tests
require_once("database.php");

/////

// J'affiche le titre de ma page
echo "<h1> Tests de la database : </h1>";

// J'instancie une nouvelle connexion à ma base de données
$database = new Database();

// Affichage du contenu de la variable pour debugger
//var_dump($database);

if($database->getConnexion() == null){
    echo "<p>La connexion a échoué</p>";
}else{
    echo "<p>Connexion réussie</p>";
}

//echo $database->getDBName();

// http://localhost/TestDatabase.php?nom="tutu"&tel="07654"
//$nomMaitre = $_GET["nom"]; // je dois recuperer tutu
//$telMaitre = $_GET["tel"];

//echo "Try to insert new master : $nomMaitre, $telMaitre";

// J'insere un nouveau maitre et je récupère son id
//$nouvelId = $database->insertMaster($nomMaitre, $telMaitre);
//echo "<p>Un nouveau maitre inséré avec le numéro : $nouvelId </p>";

// Inserer un nouveau chien et récupérer son id
//$idChien = $database->insertDog("Guigui", 7, "Staffie", $nouvelId);
//echo "<p>Un nouveau chien inséré avec le numéro : $idChien </p>";

// On teste la recuperation de la liste de chiens
$listeChiens = $database->getAllDogs();
echo "<ul>";
foreach($listeChiens as $chien){
    echo "<li>";
    echo "Le chien numéro".$chien->getId()." : ".$chien->getNom()
                                                ." de race ".$chien->getRace();
    echo "</li>";
}
echo "</ul>";

/*
// Appelle de la fonction delete
$resultat = $database->deleteDog(2);
if($resultat == true){
    echo "le chien a bien été supprimé";
}else{
    echo "Problème, impossible de supprimer le chien";
}
*/
// Appel de la fonction update
// $id, $nom, $age, $race
$resultat = $database->updateDog(5, "tutu", 5, "chiuaua");
if($resultat == true){
    echo "le chien a bien été mis à jour";
}else{
    echo "Problème, impossible de mettre à jour le chien";
}

?>