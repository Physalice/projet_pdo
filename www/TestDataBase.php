<?php



require_once("DataBase.php");                   //import des ficiers nécessaire aux test
require_once("Chien.php");


echo "<h1> Test de la database : </h1>";         //affiche le titre de la page
$database = new DataBase();                      //créer un objet  avec le constructeur du ficier DataBase.php
                             
if($database->getConnexion() == null){
    echo "<p>La connexion à échoué</p>";
}else{
    echo "<p>Connexion réussie, Bravo!!!</p>";
}


//dans la barrre de l'adresse URL entrer des information qui seront sur le serveur et impèlenmtable dans TestDataBase

//localhost/TestDataBase.php?nom="tutu"&tel="1549650"
//$nomMaitre =$_GET["nom"];                      //récupère le nom tutu
//$telMaitre = $_GET["tel"];                     //récupère le tel 1549650
//echo "Try to insert new master : $nomMaitre, $telMaitre";



var_dump($database);                            //affiche le contenu détaillé

echo "nom db : ".$database->getDBName()."<br/>";


$nouvelid = $database-> insertMaster("Thom", "05464102");
echo "<p>Un nouveau maitre inséré avec le numéro : $nouvelid</p>";

$idchien = $database-> insertDog("Dolly", 12, "Boxer", $nouvelid );
    echo "<p>Un nouveau chien n° : $idchien inséré, le numéro de son maitre est : $nouvelid</p>";

$listeChien = $database-> getAllDog();
    echo "<ul>";
    foreach($listeChien as $chien){
        //echo "<li>" .$chien->getId(), "<br>" .$chien->getNom(), "<br>" .$chien->getRace() ."</li>";
        
        echo "<li>";
        echo "Le chien numéro ".$chien->getId()." : ".$chien->getNom(). "de race :".$chien->getRace();
        echo "</li>";
        
    }
    echo "</ul>";

$OneDog = $database->getOneDog($id);
        echo "Le chien numéro ".$OneDog->getId()." : ".$OneDog->getNom()." agé de : ".$OneDog->getAge()." ans et de race :".$OneDog->getRace() ."son maître est : ".$OneDog->getNomMaitre().", joignable au : ".$OneDog->getTelMaitre() ;
/*
//pour supprimer un chien
$resultat = $database->SPRDog(2);
if(resultat == true){
    echo "le chien a bien été supprimé";
}else{
    echo "Impossible de suprimer ce chien"; 
}
*/

//apel de la fonction UPDATE
$resultat = $database->ADDDog(65, "Tutu", 5, "Chiuaua"); //les rentrées sont impérativement dans l'ordre du tableau (array de la database)
if(resultat == true){
    echo "le chien a bien été mis à jour";
}else{
    echo "Impossible de de mettre à jour ce chien"; 
}
?>
