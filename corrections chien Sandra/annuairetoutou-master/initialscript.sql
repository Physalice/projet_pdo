-- Créer la base de données
CREATE DATABASE AnnuaireToutou;
USE AnnuaireToutou;

-- Créer l'utilisateur
CREATE USER "adminToutou"@"%" IDENTIFIED BY "Annu@ireT0ut0u";
GRANT ALL PRIVILEGES ON AnnuaireToutou.* TO "adminToutou"@"%";

-- Créer la table Maitres en premier
CREATE TABLE Maitres(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(200),
    telephone VARCHAR(20)
);

-- Créer la table Chiens
CREATE TABLE Chiens{
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255),
    age INT,
    race VARCHAR(200),
    id_maitre INT,
    FOREIGN KEY (id_maitre) REFERENCES Maitres(id)
};

-- Insérer un maitre
INSERT INTO Maitres (nom, telephone) VALUES ('Bob', '0798767654');

-- Insérer un chien
INSERT INTO Chiens (nom, age, race, id_maitre) VALUES ('Nolly', 2, 'bouledog', 1);

-- Selectionner tous les chiens
SELECT id, nom, race FROM Chiens;

-- Selectionner un chien avec les informartion de son maitre
SELECT c.id, c.nom, c.age, c.race, m.nom as nomMaitre, m.telephone
FROM Chiens c
INNER JOIN Maitres m
ON c.id_maitre = m.id
WHERE c.id = 1

-- Supprimer un chien de la base de données
DELETE FROM Chiens WHERE id = 1

-- Mettre à jour les informations d'un chien
UPDATE Chiens 
SET nom = "Toto", age = 4, race = "Terrier"
WHERE id = 1
