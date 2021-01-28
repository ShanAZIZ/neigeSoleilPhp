<?php
    class Modele
    {
        private $unPdo,$uneTable;

        public function __construct($serveur, $bdd, $user, $mdp)
        {
            $this->unPdo = null;
            $this->uneTable = "";
            try
            {
                $this->unPdo = new PDO("mysql:host=".$serveur.";dbname=".$bdd,$user,$mdp);

            }
            catch(PDOException $exp)
            {
                echo "<p> Erreur de connexion a la base de donnnee</p>";
            }
        }

        public function verifyUser($mail, $password)
        {
            if ($this->unPdo != null)
            {
                $requete = "select * from Comptes where compte_email = :mail; ";
                $donnees =array (":mail"=>$mail) ;
                $select = $this->unPdo->prepare($requete);
                $select->execute ($donnees);
                $user = $select->fetchAll();
                if (password_verify($password, $user[0]['compte_mot_de_passe']))
                {
                    return $user[0]['compte_id']; 
                }
            }
            else
            {
                return null;
            }
        }

        public function getTable()
        {
            return $this->uneTable;
        }
        public function setTable($uneTable)
        {
            $this->uneTable = $uneTable;
        }

        public function selectAll($tab)
        {
            if($this->unPdo != null)
            {
                $chaine = implode(",",$tab);
                $requete = "SELECT ".$chaine." FROM   ".$this->uneTable.";";
                $select = $this->unPdo->prepare($requete);
                $select->execute();
                return $select->fetchAll();
            }
            else
            {
                return 0;
            }
        }

        public function insert($tab)
        {
            if($this->unPdo != null)
            {
                $listeValeurs = array();
                $listeChamps = array();
                $donnees = array();

                foreach ($tab as $cle => $valeur)
                {
                    $listeChamps[] = $cle;
                    $listeValeurs[] = ":".$cle;
                    $donnees[":".$cle] = $valeur;
                }
                $ChaineChamps = implode(",",$listeChamps);
                $ChaineValeurs = implode(",",$listeValeurs);
                $requete = "INSERT INTO ".$this->uneTable."(".$ChaineChamps.")". "VALUES (".$ChaineValeurs.");";
                $insert = $this->unPdo->prepare($requete);
                $insert->execute($donnees);
            }
        }

        public function delete($tab)
        {
            if($this->unPdo != null)
            {
                $listeChamps = array();
                $donnees = array();
                foreach ($tab as $cle => $valeur)
                {
                    $listeChamps[] = $cle."=".":".$cle;
                    $donnees[":".$cle] = $valeur;
                }
                $ChaineChamps = implode(",",$listeChamps);
                $requete = " delete from ".$this->uneTable."WHERE"." ".$ChaineChamps.";"; //AVOID SONARLINT SS1192
                $delete = $this->unPdo->prepare($requete);
                $delete->execute($donnees);
            }
        }
        
        public function selectWhere ($tab, $where)
        {
            if ($this->unPdo != null)
            {
                $chaine = implode(",", $tab);
                $listeChamps = array ();
                $donnees = array ();
                foreach ($where as $cle => $valeur) 
                {
                    $listeChamps[ ] = $cle."=".":".$cle;
                    $donnees[":".$cle] = $valeur ;
                }
                $chaineChamps = implode(" and ", $listeChamps);

                $requete = "select ".$chaine." from ".$this->uneTable."WHERE"." ".$chaineChamps.";";
                $select = $this->unPdo->prepare ($requete);
                $select->execute ($donnees);
                return $select->fetch (); //un seul résultat.
            }
            else
            {
                return null;
            }
        }
        public function update ($tab, $where)
        {
            if ($this->unPdo != null)
            {
                $listeChamps = array ();
                $listeValeurs = array();
                $donnees = array ();
                foreach ($tab as $cle => $valeur) 
                {
                    $listeValeurs[ ] = $cle."=".":".$cle;
                    $donnees[":".$cle] = $valeur ;
                }
                foreach ($where as $cle => $valeur) 
                {
                    $listeChamps[ ] = $cle."=".":".$cle;
                    $donnees[":".$cle] = $valeur ;
                }
                $chaineChamps = implode(" and ", $listeChamps);
                $chaineValeurs = implode (", ", $listeValeurs);
                $requete = "update ".$this->uneTable." set ".$chaineValeurs."WHERE ".$chaineChamps.";";

                $update = $this->unPdo->prepare ($requete);
                $update->execute ($donnees);
            }
        }
        public function selectLike ($tab, $mot)
        {
            if ($this->unPdo != null)
            {
                $listeChamps= array();
                foreach ($tab as $valeur) 
                {
                    $listeChamps[ ] = $valeur." Like ".":mot";
                }
                $chaineChamps = implode(" or ", $listeChamps);
                $donnees = array(":mot"=>"%".$mot."%");

                $requete =" select * from ".$this->uneTable."WHERE ".$chaineChamps ;

                $select = $this->unPdo->prepare ($requete);
                $select->execute ($donnees);
                return $select->fetchAll ();
        }
        else 
        {
            return 0;
        }
        }
    }
?>
