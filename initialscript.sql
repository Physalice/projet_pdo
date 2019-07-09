
------------créer une base de donnée--------------
CREATE DATABASE "AnnuaireToutou";
USE "AnnuaireToutou";
CREATE DATABASE "AnnuaireToutou";
USE "AnnuaireToutou";
CREATE USER "adminToutou"@"%" IDENTIFIED BY "Annu@ireTOutOu";
GRANT ALL PRIVILEGES ON AnnuaireToutou.* TO 'adminToutou'@'%';

---------------créer une table Maitre------------
CREATE TABLE Maitre (
  id INT PRIMARY KEY AUTO_INCREMENT;
  name VARCHAR (200);
  phone varchar(20)
);
----------créer une table chien------------
CREATE TABLE Chien (
  id INT PRIMARY KEY AUTO_INCREMENT;
  nom VARCHAR (255);
  age INT;
  race VARCHAR (200);
  id_maitre INT;
  FOREIGN KEY (id_maitre) REFERENCES Maitre (id)
);

---------insérer un maître----
INSERT INTO Maitre (name, phone,) VALUES (:paramNom, :paramTel);
--------insérer un chien--------
INSERT INTO Chien (nom, age, race, id_maitre) VALUES (:paramNom, :paramAge, :paramRace, :paramidMaitre);

------ alias por le mapping de class----------
----------SELECT id, nom as nomChien , race FROM Chien-------

-----selectionne le chien en fonction de leur id, nom et race-----------
SELECT id, nom, race FROM Chien;

----------selectionne les chien par id------------
----------SELECT * FROM Chien WHERE id = 1;-----------

----------selectionne un chien avec les informations de son maitre-----------
-----SELECT * FROM Chien  INNER JOIN Maitre ON Chien.id_maitre = Maitre.id;------
-----requête du dessus en alias------------
SELECT c.id, c.nom, c.age, m.name as nomMaitre, m.Phone FROM Chien c INNER JOIN Maitre m ON c.id_maitre = m.id WHERE c.id = 12 
----suprimer des éléments par l'id--------
DELETE FROM Chien WHERE id = :id;
---changer des éléments par l'id----
UPDATE Chien SET nom ="Toto", age = 4, race = "Terrier" WHERE id = 1





