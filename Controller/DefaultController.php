<?php

// Classe qui est l'extension de AdminController
// s'il y a bien une authentification, envoyer l'utilisateur sur la page d'acceuil
class DefaultController extends AdminController {

    public function __construct() {
        // Indiquer le constructeur du parent sous peine qu'il soit écrasé
        parent::__construct();
    }

    public function homePage() {

        //Connexion à homePage.php
        require "View/homePage.php";
    }
}

    
?>