<?php 
    //TO DO
    //GET THE USER ID REFERED TO THE ACCOUNT ID 

    // CHECK IF THE USER ID IS NOT SET, THEN  REDIRECT TO A CREATION PAGE
    if(isset($_SESSION['compte_id'])){
        $unControleur->setTable("Utilisateurs");
        $tab = array("*");
        $where = array("compte_id" => $_SESSION['compte_id']);
        $user = $unControleur->selectWhere($tab, $where);
        require_once('template_header.php');
        if($user != null){
            $_SESSION['username'] = $user[0]['utilisateur_nom'];
            $_SESSION['userId'] = $user[0]['utilisateur_id'];
            require_once('template_admin_body.php');
        }
        else{
                require_once('insertUser.php');
        }
        require_once('template_footer.php');
    }else{
        header('Location: index.php?page=2&auth=0');
    }

   
    
?>