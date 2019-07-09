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
        //instanciation de la classe database
        $database = new DataBase();
        //récupérer lîd par l'URL
        $id = $_GET["id"];

        //récupération de la liste de chien
        $chien = $database->getOneDog   ($id);
        //var_dump($chien);
        ?>

          <h2>Mettre à jour le chien</h2>

          <form action="process-update.php" method="post">
          <!---<input type="text" name="nom_champ" id="id_champ" value="Texte initial" onFocus="this.value='';"> 
          Les éléments <input> de type "hidden" permettent aux développeurs web d'inclure des données 
          qui ne peuvent pas être vues ou modifiées lorsque le formulaire est envoyé. Cela permet par exemple d'envoyer 
          l'identifiant d'une commande ou un jeton de sécurité unique. Les champs de ce type sont invisibles sur la page.--->
                <input type="hidden" name="id" value="<?php echo $chien->getId()?>">

                <label for "nomChien">Nom du chien</label><br>
                <input type="text" id="nomChien" name="nom" value="<?php echo $chien->getNom()?>" required maxlength="30"><br><br>
                                                           <!--- la valeur affiche les donnée de getNom du profil chien---->
                <label for "ageChien">Age du chien</label><br>
                <input type="number" id="ageChien" name="age" value="<?php echo $chien->getAge()?>" required min="1" max="22"><br><br>

                <label for "raceChien">Race du chien</label><br>
                <input type="text" id="raceChien" name="race" value="<?php echo $chien->getRace()?>" required maxlength="30"><br><br>

                    <!--- coche pour le sexe de l'animal--->
                Option Genre:
                <input type="radio" name="gender"
                <?php if (isset($gender) && $gender=="female") echo "checked";?>
                value="female">Femelle
                <input type="radio" name="gender"
                <?php if (isset($gender) && $gender=="male") echo "checked";?>
                value="male">Mâle
                
               

                <br><br>     

                <input type="submit" value="Valider">
               

          </form> 



    </body>
  </html>
