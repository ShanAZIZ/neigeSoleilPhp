DROP DATABASE IF EXISTS NeigeSoleildb;

CREATE DATABASE NeigeSoleildb;
USE NeigeSoleildb;

CREATE TABLE Utilisateurs (
    utilisateur_id INT NOT NULL AUTO_INCREMENT,
    utilisateur_nom VARCHAR(200),
    utilisateur_prenom VARCHAR(200),
    utilisateur_telephone INT(10),
    utilisateur_email VARCHAR(200),
    utilisateur_password VARCHAR(255),
    utilisateur_adresse VARCHAR(200),
    utilisateur_post_code INT(5),
    utilisateur_rib VARCHAR(200),
    PRIMARY KEY(utilisateur_id)
);

CREATE TABLE Proprietaire(
    proprietaire_id INT NOT NULL AUTO_INCREMENT,
    proprietaire_utilisateur INT,
    PRIMARY KEY(proprietaire_id),
    FOREIGN KEY(proprietaire_utilisateur) REFERENCES  Utilisateurs(utilisateur_id)
);

CREATE TABLE Locations(
    location_id INT NOT NULL AUTO_INCREMENT,
    location_proprietaire INT,
    location_nom VARCHAR(200),
    location_detail VARCHAR(200),
    location_prix_hebdo VARCHAR(200),
    PRIMARY KEY(location_id),
    FOREIGN KEY(location_proprietaire) REFERENCES  Utilisateurs(utilisateur_id)
);

CREATE TABLE ContratProprietaire(
    cp_id INT NOT NULL AUTO_INCREMENT,
    cp_proprietaire INT,
    cp_location INT,
    PRIMARY KEY(cp_id),
    FOREIGN KEY(cp_proprietaire) REFERENCES Proprietaire(proprietaire_id),
    FOREIGN KEY(cp_location) REFERENCES Locations(location_id)
);

INSERT INTO Locations 
VALUES (
    null, 1, "Location 1", "lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum ",
    450
);
