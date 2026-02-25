-- Création de la base
CREATE DATABASE IF NOT EXISTS livraison;
USE livraison;

-- Table Vehicule
CREATE TABLE Vehicule (
    id INT AUTO_INCREMENT PRIMARY KEY,
    num VARCHAR(20) NOT NULL
);

-- Table Livreur
CREATE TABLE Livreur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL
);

-- Table Zone
CREATE TABLE Zone (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    km FLOAT NOT NULL
);

-- Table Colis
CREATE TABLE Colis (
    id INT AUTO_INCREMENT PRIMARY KEY,
    poids FLOAT NOT NULL,
    SalaireLivreur FLOAT NOT NULL,
    voiture FLOAT NOT NULL,
    prix_kg FLOAT DEFAULT 2000,
    description VARCHAR(255)
);

-- Table Status
CREATE TABLE Status (
    id INT PRIMARY KEY,
    nom VARCHAR(20) NOT NULL -- ex: 'en attente', 'livré', 'annulé'
);

-- Table Livraison
CREATE TABLE Livraison (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idLivreur INT NOT NULL,
    idVehicule INT NOT NULL,
    depart VARCHAR(100) NOT NULL,
    arrivee VARCHAR(100) NOT NULL,
    idColis INT NOT NULL,
    idStatus INT NOT NULL,
    FOREIGN KEY (idLivreur) REFERENCES Livreur(id),
    FOREIGN KEY (idVehicule) REFERENCES Vehicule(id),
    FOREIGN KEY (idColis) REFERENCES Colis(id),
    FOREIGN KEY (idStatus) REFERENCES Status(id)
);

-- Table Prix
CREATE TABLE PrixTotal (
    id_livraison INT PRIMARY KEY,
    coutRevient FLOAT,
    cffAchat FLOAT,
    benefice FLOAT,
    FOREIGN KEY (id_livraison) REFERENCES Livraison(id)
);


-- Insérer un véhicule
INSERT INTO Vehicule (num) VALUES ('MG-1234');

-- Insérer un livreur
INSERT INTO Livreur (nom) VALUES ('Andry');

-- Insérer une zone
INSERT INTO Zone (nom, km) VALUES ('Antananarivo-Analakely', 10.5);

-- Insérer un colis
INSERT INTO Colis (poids, SalaireLivreur, voiture, description)
VALUES (5.2, 15000, 2000, 'Colis fragile');

-- Insérer un status
INSERT INTO Status (id, nom) VALUES (1, 'en attente');

-- Insérer une livraison
INSERT INTO Livraison (idLivreur, idVehicule, depart, arrivee, idColis, idStatus)
VALUES (1, 1, 'Antananarivo', 'Analakely', 1, 1);

-- Insérer le prix total pour cette livraison
INSERT INTO PrixTotal (id_livraison, coutRevient, cffAchat, benefice)
VALUES (1, 12000, 25000, 13000);