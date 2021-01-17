<?php
    $page = (isset($_GET['authPage'])) ? $_GET['authPage']: 'login';
    switch($page){
        case 'login':
            require_once("vues/vue_login.php");
            break;
        case 'register':
            require_once("vues/vue_register.php");
            break;
        default : 
            require_once("vues/vue_login.php");
            break;
    }

    if (isset($_POST['connect'])){
        echo 'connect post';
    }
    if (isset($_POST['register'])){
        echo 'register post';        
    }
?>