<?php 
    if(isset($_SESSION['compte_id'])){
        require_once('vues/admin_dashboard.php');
    }else{
        header('Location: index.php?page=2&auth=0');
    }
?>