<?php
    $menu = $_GET['menu'];
    switch($menu){
        case 1 : 
            require_once('vues/vue_admin_proprietaire_nouveau.php');
            break;
        case 2 :
            break;
        default:
            require_once('vues/vue_admin_accueil.php');
            break;
    }
?>