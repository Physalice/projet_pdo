
<?php
  
    require_once("DataBase.php");

    $database = new DataBase();                   
    $listeChiens = $database->getAllDog();
?>    

<html>
    <head>
        <title>Dog</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="Dogstyle.css">
    </head>
    <body style="background:rgb(201, 241, 241); font-size: 1.1em">
        <h1>Liste de nos chiens</h1>
        
        <ul>
            <?php foreach($listeChiens as $chien){ ?>
            <li>
                <?php 
                echo "<a href= profilchien.php?id=".$chien->getId().">";
                echo "Le chien numéro ".$chien->getId()." : ".$chien->getNom(). ", ".$chien->getRace(); 
                echo "</a>";
                ?>
            </li>
            <?php } ?>
        </ul><br><br>  
        <a href = "formulaire.php?id=<?php echo $chien->getId(); ?>">"ajouter un chien"</a>
    </body>
</html>