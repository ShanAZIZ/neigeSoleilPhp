# Neige_Soleil_php

## Database
Les fichiers utiliser pour ma base donnée sur stockés dans ./sql_static
On pourra y trouver le fichier NeigeSoleil.SQL

Le fichier conf\db_conf_example.php doit etre modifier selon le moteur de base de donnée et la base de donnée utilisée. Ensuite veuillez la renomer en 
db_conf.php


## Routing Principal - index.php
Le fichier ./index.php - S'occupe du routing depuis l'url vers les vues avec un Switch.
Il prend la variable $page dans l'url (GET) et selon la variable, affiche la vue correspondante

## Le fichier accueil.php
Ce fichier fera office de page d'accueil du site internet, 
il comprend l'appel d'une navbar, d'un message d'accueil. Il comprendra aussi un contenu tirer d'une autre
vue et finalement un footer

## Authentication system 
En cours d'implementation : 
Le systeme de verification de l'existence de l'utilisateur dans la base de donnée n'est pas fonctionnel