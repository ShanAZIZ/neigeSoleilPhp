<?php 
    require_once('vues/vue_new_user_form.php');
    if(isset($_POST['enregistrer'])){
        $tab = array(
            "compte_id"=>$_SESSION['compte_id'],
            "utilisateur_nom"=>$_POST['nomUser'],
            "utilisateur_prenom"=>$_POST['prenomUser'],
            "utilisateur_telephone"=>$_POST['telUser'],
            "utilisateur_adresse"=>$_POST['adresseUser'],
            "utilisateur_code_postal"=>$_POST['postCodeUser'],
            "utilisateur_ville"=>$_POST['villeUser'],
            "utilisateur_rib"=>$_POST['ribUser']
        );
        var_dump($tab);
        $unControleur->insert($tab); 
        header('Location: index.php?page=1');
    }

?>