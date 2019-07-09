<?php
require_once("Chien.php");
require_once("Maitre.php");
class DataBase{
    private $connexion;
    

    public function __construct(){
        $PARAM_hote="mariadb";                     //en dehors de docker mettre localhost
        $PARAM_port="3306";                        //code de port de mariadb
        $PRAM_nom_bd="AnnuaireToutou";             //nom de la base de donnée
        $PARAM_utilisateur="adminToutou";          //nom de l'utilisateur crée dans initialscript.sql
        $PARAM_mot_passe="Annu@ireTOutOu";         //mot de passe créée dans initialscript.sql

        try{$this->connexion =new PDO(                         //utilisé l'attribut connection pour créer un nouveau PDO
            "mysql:host=".$PARAM_hote.";dbname=".$PRAM_nom_bd,
            $PARAM_utilisateur,                               //essaye de faire le code qui est dans le TRY
            $PARAM_mot_passe);
        }catch(Exception $e){                                  //si try echoue je stock l'exception dans $e
            echo "Erreur : ".$e->getMessage()."<br/>";         //affiche le message d'erreur avec le code
            echo "N° : ".$e->getCode();                        //affice le code de l'erreur
        }
    
    }

    public function getDBName(){
        return $this->connexion->query("SELECT database()")->fetchColumn();
    }

    public function getConnexion(){                  //accèder en lecture à un attribut
        //var_dump($connexion->connexion());
        return $this->connexion;
    } 


    public function insertMaster($nameMaster, $telMaster){     // fonction pour insérer un nouveau maître
        
       // var_dump($this->connexion->getAttribute(PDO::ATTR_SERVER_INFO));
        $pdoStatement = $this-> connexion-> prepare("INSERT INTO Maitre (name, phone) Values (:paramNom, :paramTel)");
        $pdoStatement-> execute(array('paramNom' => $nameMaster, 'paramTel' => $telMaster));
        $idMaitre = $this->connexion->lastInsertId();              //récupère l'id qui a été créer avec l'entrée d'un nouveau maître
        return $idMaitre;

       // var_dump($pdoStatement->errorInfo());         //débug et vérifie la fonction
    }

   public function insertDog($nomDog, $ageDog, $raceDog, $idMaitreDog){
       $pdoStatement = $this-> connexion-> prepare("INSERT INTO Chien (nom, age, race, id_maitre) 
                                                    VALUES (:paramNom, :paramAge, :paramRace, :paramidMaitre)");
       $pdoStatement-> execute(array('paramNom'=> $nomDog, 'paramAge'=> $ageDog, 'paramRace'=> $raceDog, 'paramidMaitre'=> $idMaitreDog));

       $idChien = $this->connexion->lastInsertId();              //récupère l'id qui a été créer avec l'entrée d'un nouveau maître
       return $idChien;

      // var_dump($pdoStatement->errorInfo()); 
   }
/*
   public function getListChien($chien){
    $pdoStatement = $this-> connexion-> prepare("SELECT id, nom, race FROM Chien;");
    $pdoStatement-> execute(array('paramid' => $idDog, 'paramNom'=> $nomDog, 'paramAge'=> $ageDog, 'paramRace'=> $raceDog));
    return $chien;
   }
*/
//fetchObject ("Chien") c'est l'appel d'un élément de la liste de chien 
//$obj = $obj = $STH->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "nomdeclass");
//quand le constructeur est appelé avant que les proprété soient assignée 


public function getAllDog(){
    $pdoStatement = $this-> connexion-> prepare("SELECT id, nom, race FROM Chien;");
    $pdoStatement-> execute();
    $listeChien = $pdoStatement->fetchAll (PDO:: FETCH_CLASS, "Chien"); //Chien = tableau Chien

    return $listeChien;  
   }

//   joint le hien au aitre par l'id
   public function getOneDog($id){
    $pdoStatement = $this-> connexion-> prepare("SELECT c.id, c.nom, c.age, c.race, m.name as nomMaitre, m.phone as telMaitre 
                                                 FROM Chien c 
                                                 INNER JOIN Maitre m 
                                                 ON c.id_maitre = m.id 
                                                 WHERE c.id = :idchiens;");
    $pdoStatement-> execute(array("idchiens" => $id));
    $UnChien = $pdoStatement->fetchObject ("Chien");  //Chien = class chien

    return $UnChien;  
   // var_dump($pdoStatement->errorInfo()); 
   }
  //suprime un chien
    public function SPRDog($id){
        $pdoStatement = $this-> connexion-> prepare("DELETE FROM Chien WHERE id = :idChien;"); //pas de variable dans le prépare pour éviter les pirate d'url
        $pdoStatement-> execute(array ("idChien" => $id));
        //récupère le code de retour de l'execution de la requête
        $errorCode = $pdoStatement->errorCode();
        if($errorCode == 0){
            return true;
        
        }else{
            return false;
        }     
    }

    //mettre à jour un élément par la requête SQL
    public function updateDog($id, $nom, $age, $race){
        $pdoStatement = $this-> connexion-> prepare("UPDATE Chien SET nom =:nomChien, age =:ageChien, race = :raceChien WHERE id = :idChien");
        //execution de la requête et mapping des valeurs
        $pdoStatement-> execute(array('idChien'=>$id, 'nomChien'=>$nom, 'ageChien'=>$age, 'raceChien'=>$race));
        //var_dump($pdoStatement->errorInfo());
        //récupère le code de retour de l'execution de la requête
        $errorCode = $pdoStatement->errorCode();
        if($errorCode == 0){
            return true;  //si ça c'est bien passé
        }else{
            return false; //si ça c'est mal passé
        }     
    }
    

    //tous les maitres
    public function getAllMaster(){
        $pdoStatement = $this-> connexion-> prepare("SELECT * FROM Maitre;"); //Maitre = base de donnée
        $pdoStatement-> execute();
       // var_dump($pdoStatement->errorInfo());
        $listeMaitre = $pdoStatement->fetchAll (PDO:: FETCH_CLASS, "Maitre"); //Maitre = class
    
        return $listeMaitre;  
       }




}  //fin database

?>