<?php
require_once("DataBase.php");

$database = new DataBase();
$id = $_GET["id"];
$resultat =$database->SPRDog($id);
if($resultat == true){
    header("Location: Dogliste.php");    //redirige l'utilisateur sur la liste
}else{
    echo "suppression impossible";
}

?>



