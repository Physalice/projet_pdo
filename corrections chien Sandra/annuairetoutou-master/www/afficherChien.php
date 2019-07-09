<?php
// Import de la databse
require_once("database.php");
// Création de la connexion
$database = new Database();
// Récupérer l'id depuis l'url
$id = $_GET["id"];
var_dump($id);
// Récupération de la liste de chiens
$chien = $database->getDogById($id);
?>
<html>
    <header>
        <link rel="stylesheet" href="style.css"> 
    </header>
    <body>
        <h1>Information chien</h1>
            <p>Nom : <?php echo $chien->getNom(); ?></p>
            <p>Age : <?php echo $chien->getAge(); ?></p>
            <p>Race : <?php echo $chien->getRace(); ?></p>
        <h1>Information maitre</h1>
            <p>Nom : <?php echo $chien->getNomMaitre(); ?></p>
            <p>Tel : <?php echo $chien->getTelephone(); ?></p>

        <br><br>
        <a href="process-delete.php?id=<?php echo $chien->getId(); ?>">Delete</a>
        <a href="update-chien.php?id=<?php echo $chien->getId(); ?>">Update</a>

    </body>
</html>