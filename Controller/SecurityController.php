<?php

// Classe pour faire une authentification
class SecurityController {


    // Déclaration d'une nouvelle variable
    private $userManager;

    public function __construct() {

        // Inialisation en nouveau Objet UserManager
        $this->userManager = new UserManager();
    }

    // Fonction pour afficher le formulaire "se connecter à son compte"
    public function login() {

        $errors = null;

        //Si la requête renvoyé par le serveur est celle rempli par l'utilisateur dans le form
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            // Variable erreurs prend la valeur du tableau $errors de la fonction isValidLoginForm
            $errors = $this->isValidLoginForm();

            // Si il la valeur de $errors est 0, on vérifie sur la BDD
            if(count($errors) == 0) {

                // On vérifie si le "username" communiqué par l'utilisateur est dans la BDD
               $user = $this->userManager->getOneByUserName($_POST["username"]);
               
               // Si la Variable User n'est pas Null et que le MDP correspond
               if(!is_null($user) && password_verify($_POST["password"], $user->getPassword())) {
                    // La variable de SESSION prend comme valeur l'utilisateur
                    // serialize() sert a retourner en chaine de caractère sans perdre la struture ni le type
                    $_SESSION["user"] = serialize($user);
                    // Et on le redirige
                    header("Location: index.php?controller=default&action=homepage");
               } else {
                   // Sinon envoie d'un message d'erreur
                   $errors[] = "Identifiants incorrects";
               }
            }
        }

        // Connexion à login.php
        require "View/Security/login.php";
    }

    // Fonction pour afficher le formulaire  "créer son compte"
    public function register() {

        // Connexion à register.php
        require "View/Security/register.php";
    }


    // Fonction pour controller les champs du formulaire login
    private function isValidLoginForm() {
        
        $errors = [];

        // Si le champ "username" est vide
        if(empty($_POST["username"])) {
            $errors[] = "Veuillez saisir un nom d'utilisateur, s'il vous plaît.";
        }
        // Si le champ "password" est vide
        if(empty($_POST["password"])) {
            $errors[] = "Veuillez saisir un mot de passe, s'il vous plaît.";
        }

        return $errors;
    }


    // Fonction pour se Déconnecter
    public function logout() {
        session_destroy();
        header("Location: index.php?controller=security&action=login");
    }

}
?>