<?php

// Classe pour vérifier s'il y a une authentification
    abstract class AdminController {

        // Attribut protégé / ne sera accessible seulement dans les classes qui héritent de AdminController
        protected $user;

        // Fonction pour rediriger l'utilisateur s'il n'est pas authentifié
        public function __construct() {
            if(!isset($_SESSION["user"]) || empty($_SESSION["user"])) {
                header("Location: index.php?controller=security&action=login");
            } else {
                // Sinon on unserialize la variable SESSION pour user
                // unserialize prend une variable linéarisée et la convertit en variable PHP
                $this->user = unserialize($_SESSION["user"]);
            }
        }
    }
?>