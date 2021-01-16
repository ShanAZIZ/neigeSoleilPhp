DROP DATABASE IF EXISTS NeigeSoleildb;

CREATE DATABASE NeigeSoleildb;
USE NeigeSoleildb;

CREATE TABLE Utilisateurs (
    utilisateur_id INT NOT NULL AUTO_INCREMENT,
    utilisateur_nom VARCHAR(200),
    utilisateur_prenom VARCHAR(200),
    utilisateur_telephone INT(10),
    utilisateur_email VARCHAR(200),
    utilisateur_password VARCHAR(200),
    utilisateur_adresse VARCHAR(200),
    utilisateur_post_code INT(5),
    utilisateur_rib VARCHAR(200),
    PRIMARY KEY(utilisateur_id)
);

