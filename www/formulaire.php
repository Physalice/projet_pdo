<?php
require_once("DataBase.php");                   //import des ficiers nécessaire aux test
require_once("Chien.php");
?>

<!DOCTYPE html>
  <html>
    <head>
    </head>
      <body>

        <?php
        //import des ficiers nécessaire aux tests
        require_once("DataBase.php");                   
        //istanciation de la classe database
        $database = new DataBase();
        //récupération de la liste de maitre
        $maitres = $database->getAllMaster();
       // var_dump($maitres);
        ?>

          <h2>Coordonées du chien</h2>

          <form action="process-create.php" method="post">

                <label for "nomChien">Nom du chien</label><br>
                <input type="text" id="nomChien" name="nom" placeholder="Médor"maxlength="30" required><br><br>
                                                           <!--- placeholdef prérempli les champs pour exemple---->
                <label for "ageChien">Age du chien</label><br>
                <input type="number" id="ageChien" name="age" placeholder="2" min="1" max="22" required><br><br>

                <label for "raceChien">Race du chien</label><br>
                <input type="text" id="raceChien" name="race" placeholder="bulldog" maxlength="30" required><br><br>

                    <!--- coche pour le sexe de l'animal--->
                Option Genre:
                <input type="radio" name="gender"
                <?php if (isset($gender) && $gender=="female") echo "checked";?>
                value="female">Femelle
                <input type="radio" name="gender"
                <?php if (isset($gender) && $gender=="male") echo "checked";?>
                value="male">Mâle
                
                <br><br>

                <label for="choixMaitre">Maitre</label>
                <select id="choixMaitre"name="idMaitre"required>
                <?php
                foreach($maitres as $maitre){
                   echo"<option value=".$maitre->getId() .">" .$maitre->getNom() ."</option>";
                }   
                ?>   
                </select>   

                <br><br>     

                <input type="submit" value="Envoyer">
                <input type="submit" value="annuler">

          </form> 



    </body>
  </html>
