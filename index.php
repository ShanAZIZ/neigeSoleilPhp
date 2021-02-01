<?php
    require_once("controller/Controller.class.php");
    require_once("conf/db_conf.php");
	$unControleur = new Controleur ($serveur,$bdd,$user,$mdp);
	$unControleur->initPhpSession();
	$page = (isset($_GET['page'])) ? $_GET['page']: 0;
	switch ($page) {
		case 0:
			require_once("accueil.php");
			break;
		case 1:
			require_once("gestionAdmin.php");
			break;
		case 2:
			require_once("authentication.php");
			break;
		case 6:
			$unControleur->cleanPhpSession();
			header('Location: index.php?page=0');
			break;
		default: 
			require_once("accueil.php");
			break;
	}
?>