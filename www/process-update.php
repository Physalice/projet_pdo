<?php

$id =$_POST["id"];
$nom =$_POST["nom"];
$age =$_POST["age"];
$race =$_POST["race"];


require_once("DataBase.php");
$database = new DataBase();

$database->updateDog($id, $nom, $age, $race);

header("Location: updatechien.php?id=" .$id);

?>