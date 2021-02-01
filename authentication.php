<?php
    
    if(!isset($_SESSION['compte_id'])){
        //On ne peux pas voir les pages de connexions si on est deja connecter
        $auth = $_GET['auth'];
        require_once('template_header.php');
        if($auth==1){
            require_once("vues/vue_form_register.php");
        }
        else {
            require_once("vues/vue_form_login.php");
        }
        require_once('template_footer.php');
        

        
        if (isset($_POST['seconnecter'])){
            $mail = $_POST['mail'];
            $password = $_POST['password'];
            $unUser = $unControleur->verifyUser($mail, $password);
            if($unUser != null){
                $_SESSION['compte_id'] = $unUser;
                header('Location: index.php?page=1&menu=0'); 
            }
            else{
                echo "Verifier vos identifiants";
            }
            
        }

        if (isset($_POST['enregistrer'])){
            $unControleur->setTable("Comptes");
            $tab = array(
                "compte_email"=>$_POST['mailUser'],
                "compte_mot_de_passe"=> password_hash($_POST['mdpUser'], PASSWORD_BCRYPT),
            );
            $unControleur->insert($tab);
            header('Location: index.php?page=2&auth=0');
        }
    }else{
        header('Location: index.php?page=0');
    }
?>