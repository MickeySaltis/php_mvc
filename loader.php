<?php

// OU faire un autoload ( qui charge tout seul les requires)
    // spl_autoload_register(function($class) {

    // $files prend comme valeurs les Classes.php qui se situe dans les dossiers indiqué  
        //    $files = str_replace('\\' DIRECTORY_SEPARATOR, $class).'.php';
    
    //  SI il a des fichiers qui se finissent par Controller.php dans le dossier Controller, les connecter
        //     if(str_ends_with($file,'Controller.php')) {
        //     require 'Controller/'.$file;

    //  SINON SI il a des fichiers qui se finissent par Manager.php dans le dossier Model du dossier Manager, les connecter
        //     }else if(str_ends_with($file,'Manager.php')) {
        //     require 'Model/Manager/'.$file;
        
    //  SINON il a des fichiers dans le dossier Manager, les connecter
        //     }else{
        //     require 'Manager/'.$file; }
        //   });


// Sert à stocker les connexions pour une meilleur visibilité et gestion
// Par ordre de parenté


    /* Controller */
    
        // Connexion à SecurityController.php
        require "Controller/SecurityController.php";

        // Connexion au controlleur d'Authentification
        require "Controller/AdminController.php";

        // Connexion à DefaultController.php
        require "Controller/DefaultController.php";

        // Connexion à ProductController.php
        require "Controller/ProductController.php";


    /* Classe */

        // Connexion à la classe User
        require "Model/User.php";

        // Connexion à la classe Product
        require "Model/Product.php";
        
        
    /* BDD */

        // Connexion à la BDD
        require "Model/Manager/DbManager.php";

        // Connexion au tableau User de la BDD
        require "Model/Manager/UserManager.php";

        // Connexion au tableau Product de la BDD
        require "Model/Manager/ProductManager.php";

?>