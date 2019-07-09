



<?php 
require_once("DataBase.php");
require_once("Chien.php");
$database = new DataBase(); 
$id = $_GET["id"];                         //affiche dans une url http://localhost/profilchien.php?id=1 //id= nombre id du cien voulu       
$chien = $database->getOneDog($id);
?>

<html>
    <head>
        <title>Dog</title>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!-- style CSS -->
    <link rel="stylesheet" href="Dogstyle.css">
<!----police------>       
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    
    </head>

    <body class = "fond">
        <div class="chien text-center">
            <h1>Profil du chien n° 
                <?php echo $chien->getId($id)?></h1>
                <img src="chien.jpg" height="200" alt="chien"><br><br>
                
            <h3>Nom du chien : 
            <strong><?php echo $chien->getNom() ?></strong></h3>
            <h4>Age : 
            <strong><?php echo $chien->getAge() ?> ans</strong></h4>
            <h4>Race : 
            <strong><?php echo $chien->getRace() ?></strong></h4>
            <br>
            <h3>Information maître :<h3>
            <h4>Nom maître : 
                <strong><?php echo $chien->getNomMaitre() ?></strong> </h4>
            <h4>Téléphone : 
                <strong><?php echo $chien->getTelMaitre() ?></strong> </h4>
            
            <br><br>
            <!--<a href="delchien.php"></a>-->

            
               
                <a href = "Dogliste.php?id=<?php echo $chien->getId(); ?>">"retour liste"</a>
                <a href = "delchien.php?id=<?php echo $chien->getId(); ?>">"supprimer ce chien"</a>
                <a href = "updatechien.php?id=<?php echo $chien->getId(); ?>">"mettre à jour le chien"</a>
          

            

        </div>
    </body>
</html>      
        