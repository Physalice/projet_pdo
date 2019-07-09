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
        <h1>Mettre à jour le chien</h1>

        <form action="process-update.php" method="post">
            <input type="hidden" name="id" value="<?php echo $chien->getId(); ?>">
            <label for="nomChien">Nom</label>
            <input type="text" id="nomChien" name="nom" value="<?php echo $chien->getNom(); ?>" required>
            <label for="ageChien">Age</label>
            <input type="number" id="ageChien" name="age" value="<?php echo $chien->getAge(); ?>" required>
            <label for="raceChien">Race</label>
            <input type="text" id="raceChien" name="race" value="<?php echo $chien->getRace(); ?>" required>


            <input type="submit" value="Mettre à jour">
        </form>
        
    </body>
</html>
