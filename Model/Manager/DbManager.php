<?php

// Classe qui permet de faire le lien avec la base de données
// Le rôle de l'EntityManager est d'appeler un Repository avec l'entité à manipuler.

    // Classe pour se connecter à la BDD
    abstract class DbManager {

        // Attribut protégé / ne sera accessible seulement dans les classes qui héritent de DbManager
        protected $bdd;

        // Constructeur pour se connecter à la BDD
        public function __construct() {

            // Exeptions
            try {
                $this->bdd = new PDO ('mysql:host=localhost;dbname=cour_php;charset=utf8', 'root', '');
            } catch (\PDOExeption $e) {
                // Envoyer un mail au Developpeur, car le serveur de la BDD n'est pas accessible
                echo('Envoie de mail: '.$e->getMessage().' vas verifier ce fichier: '.$e->getFile().' a la ligne '.$e->getLine());
                // Lancer l'erreur
                throw $e;
            }
            // $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }

?>