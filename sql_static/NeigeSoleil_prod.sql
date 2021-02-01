SET NAMES utf8;

DROP DATABASE IF EXISTS Neige_Soleil_db;
CREATE DATABASE Neige_Soleil_db;

USE Neige_Soleil_db;

CREATE TABLE Comptes(
  compte_id INT NOT NULL AUTO_INCREMENT,
  compte_email VARCHAR(200),
  compte_mot_de_passe VARCHAR(200),
  PRIMARY KEY(compte_id)
);

CREATE TABLE Utilisateurs(
  utilisateur_id INT NOT NULL AUTO_INCREMENT,
  compte_id INT NOT NULL,
  utilisateur_nom VARCHAR(200),
  utilisateur_prenom VARCHAR(200),
  utilisateur_telephone VARCHAR(200),
  utilisateur_adresse VARCHAR(200),
  utilisateur_code_postal VARCHAR(200),
  utilisateur_ville VARCHAR(200),
  utilisateur_rib VARCHAR(200),
  PRIMARY KEY(utilisateur_id),
  FOREIGN KEY(compte_id) REFERENCES Comptes(compte_id)
);

CREATE TABLE Locations(
  location_id INT NOT NULL AUTO_INCREMENT,
  utilisateur_id INT NOT NULL,
  location_description VARCHAR(1000),
  location_surface_habitable FLOAT(3,2),
  location_surface_balcon FLOAT(3,2),
  location_capacite INT,
  location_distance_des_pistes FLOAT(3,2),
  location_status ENUM("Disponible", "Occuper", "Reserver"),
  PRIMARY KEY(location_id),
  FOREIGN KEY(utilisateur_id) REFERENCES Utilisateurs(utilisateur_id)
);

CREATE TABLE Reservations(
  reservation_id  INT NOT NULL AUTO_INCREMENT,
  utilisateur_id INT NOT NULL,
  location_id INT NOT NULL,
  reservation_date_debut DATE,
  reservation_date_fin DATE,
  reservation_status ENUM("En attente", "Confirmer", "Annuler"),
  PRIMARY KEY(reservation_id),
  FOREIGN KEY(utilisateur_id) REFERENCES Utilisateurs(utilisateur_id),
  FOREIGN KEY(location_id) REFERENCES Locations(location_id)
);

CREATE TABLE Contrat_Locations(
  contrat_location_id INT NOT NULL AUTO_INCREMENT,
  reservation_id INT NOT NULL,
  PRIMARY KEY(contrat_location_id),
  FOREIGN KEY(reservation_id) REFERENCES Reservations(reservation_id)
);
