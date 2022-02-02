<?php
//40:40
    session_start();
    
    // Connexion à loader.php
    require "loader.php";


    // ROUTES

        // Si controller ET action est null dans l'URL, diriger l'utilisateur sur la page index.php
        if (!isset($_GET["controller"]) && !isset($_GET["action"])) {
            header("Location: index.php?controller=default&action=homepage");
        }


        // Si sur l'URL c'est controller=default; $controller devient un nouveau objet DefaultController
        if($_GET["controller"] == "default") {
            $controller = new DefaultController();

            // Si sur l'URL c'est action=homepage; $controller appelle la méthode homePage() / Wiew
            if($_GET["action"] == "homepage") {
                $controller->homePage();
            }
        }

    

        // Si sur l'URL c'est controller=security; $controller devient un nouveau objet SecurityController
        if($_GET["controller"] == "security") {
            $controller = new SecurityController();

            // Si sur l'URL c'est action=login; $controller appelle la méthode login() /Wiew
            if($_GET["action"] == "login") {
                $controller->login();
            } else if
                    // Sinon si sur l'URL c'est action=register; $controller appelle la méthode register() /Wiew
                    ($_GET["action"] == "register") {
                    $controller->register();
                }
            // Si sur l'URL c'est action=logout; $controller appelle la méthode logout()
            if($_GET["action"] == "logout") {
                $controller->logout();
            }
        }


        // Si sur l'URL c'est controller=produit, $controller devient un nouveau objet ProductController
        if($_GET["controller"] == "produit") {
            $controller = new ProductController();

            // Si sur l'URL c'est action=list; $controller appelle la méthode list() /Wiew
            if ($_GET["action"]=="list") {
                $controller->list();
            }
            // Si sur l'URL c'est action=add; $controller appelle la méthode add() /Wiew
            if ($_GET["action"]=="add") {
                $controller->add();
            }
            // Si sur l'URL c'est action=one et que l'Id est déclaré; $controller appelle la méthode detail() /Wiew
            if ($_GET["action"]=="one" && isset($_GET["id"])) {
                $controller->detail($_GET["id"]);
            }
            // Si sur l'URL c'est action=edit et que l'Id est déclaré; $controller appelle la méthode edit() /Wiew
            if ($_GET["action"]=="edit" && isset($_GET["id"])) {
                $controller->edit($_GET["id"]);
            }
            // Si sur l'URL c'est action=delete et que l'Id est déclaré; $controller appelle la méthode delete()
            if ($_GET["action"]=="delete" && isset($_GET["id"])) {
                $controller->delete($_GET["id"]);
            }
        }
    
        

?>
<html>

    <head>
        <!-- Inclure CSS -->
        <?php
            include "View/Part/css.php"
        ?>
    </head>
    <body>
        <!-- Inclure JS -->
        <?php
            include "View/Part/js.php"
        ?>
    </body>
    <footer></footer>
</html>