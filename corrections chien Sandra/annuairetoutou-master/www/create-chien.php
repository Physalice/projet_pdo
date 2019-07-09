<?php
// Import du fichier database
require_once("database.php");
// Instanciation de la class Databse
$database = new Database();
// Récupération de la liste de maitres
$maitres = $database->getAllMasters();
//var_dump($maitres);
?>
<html>
    <header>
        <link rel="stylesheet" href="style.css"> 
    </header>
    <body>
        <h1>Création d'un nouveau chien</h1>

        <form action="process-create.php" method="post">
            <label for="nomChien">Nom</label>
            <input type="text" id="nomChien" name="nom" placeholder="Médor" required>
            <label for="ageChien">Age</label>
            <input type="number" id="ageChien" name="age" placeholder="1" required>
            <label for="raceChien">Race</label>
            <input type="text" id="raceChien" name="race" placeholder="Bulldog" required>

            <label for="choixMaitre">Maitre</label>
            <select id="choixMaitre" name="idMaitre" required>
                <?php
                foreach($maitres as $maitre){
                    echo "<option value=".$maitre->getId().">".$maitre->getNom()."</option>";
                }
                ?>
            </select>

            <input type="submit" value="Valider">
        </form>
        
    </body>
</html>