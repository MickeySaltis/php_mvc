<?php

    // Classe qui exploite le tableau User de la BDD via les requêtes SQL
    // Elle est l'extension de la classe DbdManager.php et donc hérite de la classe DbdManager pour être connecté à la BDD
    // la classe utilisera donc l'attribut protégé $bdd de la classe DbdManager
    // Implémenté par le CrudInterface
    Class UserManager extends DbManager {

        // Fonction pour sélectoinner un User par son Username
        public function getOneByUserName($username) {

            // Variable qui prendra la valeur d'un utilisateur inscrit sur la BDD
            $user = null;

            // Requête qui va chercher toute les données de la table user avec l'attribut l'username indiqué
            $requete = $this->bdd->prepare("SELECT * FROM user WHERE username=:username");
            $requete->execute([
                "username"=>$username
            ]);
            $resultat = $requete->fetch();
            

            // Transforme la valeur en Objet
            if($resultat) {
                $user = new User($resultat["id"], $resultat["username"], $resultat["password"]);
            }
            return $user;
        }
    }
?>