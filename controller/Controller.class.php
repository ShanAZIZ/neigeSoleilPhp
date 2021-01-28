<?php
    require_once("model/Model.class.php");
    class Controleur
    {
        public function __construct($serveur,$bdd,$user,$mdp){
            $this->unModele = new Modele($serveur,$bdd,$user,$mdp);
        }
        public function getTable(){
             return $this->unModele->getTable();
        }
        public function setTable($uneTable){
             $this->unModele->setTable($uneTable);
        }
        public function selectAll($tab){
            return $this->unModele->selectAll($tab);
        }
        public function insert($tab){
            $this->unModele->insert($tab);
        }
        public function delete($tab){
            $this->unModele->delete($tab);
        }

        public function selectWhereId($tab,$idChamp,$id)
        {
            $this->unModele->selectWhereId($tab,$idChamp,$id);
        }

        /* authentification sur php */
        public function initPhpSession() : bool
        {
            if(!session_id()){
                session_start();
                session_regenerate_id();
                return true;
            }
            return false;
        }

        public function verifyUser($mail, $password)
        {
            return $this->unModele->verifyUser($mail, $password);
        }

        public function cleanPhpSession()
        {
            session_unset();
            session_destroy();
        }

        public function is_logged() : bool 
        {
            return true;
        }

    }
?>
