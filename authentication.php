<?php
    require_once('template_header.php');
    if(!isset($_SESSION['compte_id'])){
        //On ne peux pas voir les pages de connexions si on est deja connecter
        $auth = $_GET['auth'];
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
                //$_SESSION['user_id'] = $unControleur->selectWhereId()
                header('Location: index.php?page=1'); 
            }
            else{
                echo "Verifier vos identifiants";
            }
            
        }

        if (isset($_POST['enregister'])){
            $unControleur->setTable("Comptes");
            $tab = array(
                "compte_email"=>$_POST['mailUser'],
                "compte_mot_de_passe"=> password_hash($_POST['mdpUser'], PASSWORD_BCRYPT),
            );
            $unControleur->insert($tab);
            /*
            $unControleur->setTable("Utilisateurs") to ad a ;
            $tab = array(
                "utilisateur_email"=>$_POST['mailUser'],
                "utilisateur_nom"=>$_POST['nomUser'],
                "utilisateur_prenom"=>$_POST['prenomUser'],
                "utilisateur_telephone"=>$_POST['telUser'],
                "utilisateur_password"=> password_hash($_POST['mdpUser'], PASSWORD_BCRYPT),
                "utilisateur_adresse"=>$_POST['adresseUser'],
                "utilisateur_post_code"=>$_POST['postCodeUser'],
                "utilisateur_rib"=>$_POST['rib']
            );
            $unControleur->insert($tab); 
            */
            header('Location: index.php?page=2&auth=0');
        }
    }else{
        header('Location: index.php?page=0');
    }
?>