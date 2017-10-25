<?php
    ini_sets("display errors");
    error_reporting(E_ALL);

    //---------------------
    //  LAUER MATHIEU
    //---------------------
   

    class Factory
    {
        private $_identifiant;
        private $_mdp;
        private $_host;
        private $_db;
        private static $_compteur = 0;

        public function __construct($identifiant, $mdp, $host, $db) {
            //On vérifie que le compteur est différent de 1, dans quel cas, on initialise la connexion à la bdd
            if(Factory::getCompteur() < 1) {
                try
                {
                    // On se connecte à MySQL
                    $bdd = new PDO('mysql:host='.$host.';dbname='.$db.';charset=utf8', $identifiant, $mdp);
                }
                catch(Exception $e)
                {
                    // En cas d'erreur, on affiche un message et on arrête tout
                    die('Erreur : '.$e->getMessage());
                }
                //et on incrémente le compteur
                self::$_compteur++;
            }
            else {
                echo "La connexion est déjà établie !";
            }
                
        }

        //Permet de récupérer la valeur du compteur
        public function getCompteur() {
            return self::$_compteur;
        }

        //Assigne la valeur en vérifiant son intégrité
        public function setIdentifiant() {
            $this->_identifiant = $identifiant;
        }

        public function setMdp() {
            $this->_mdp = $mdp;
        }

        public function setHost() {
            $this->_host = $host;
        }

        public function setDb() {
            $this->_db = $db;
        }
    }