<?php

// Classe ProductManager qui lie au tableau product de la DBD
    class ProductManager extends DbManager {


    // Méthode pour récupérer tout les Produits de la table product
        public function findAll() {

            // Déclaration d'un tableau
            $tableau = [];

            //requête SQL pour sélectionner tout les produits du tableau Product
            $requete = $this->bdd->prepare("SELECT * FROM product");
            $requete->execute();
            $resultats = $requete->fetchAll();

            // Transformation en Objet dans le tableau
            foreach($resultats as $resultat) {
                $tableau[] = new Product ($resultat["id"], $resultat["name"], $resultat["description"], $resultat["picture"]);
            }
            return $tableau;
        }


    // Méthode pour récupérer un Produit de la table product via son ID
        public function findOne($id) {

            // Déclaration d'une variable
            $object = null;

            // requête SQL pour sélectionner le produits du tableau Product via son ID
            $requete = $this->bdd->prepare("SELECT * FROM product WHERE id=:id");
            $requete->execute(["id"=>$id]);
            $resultat = $requete->fetch();

            // S'il y a un résultat
            if($resultat) {

                // Transformation en Objet
                $object = new Product ($resultat["id"], $resultat["name"], $resultat["description"], $resultat["picture"]);
            }
            
            return $object;
        }


    // Méthode pour sauvegarder un nouveau Produit dans la BDD
        public function save(Product $product) {
            // Requete SQL pour sauvegarder le nouveau produit dans la tableau product
            $requete = $this->bdd->prepare("INSERT INTO product (name, description, picture) 
                                            VALUES (:name, :description, :picture)");
            $requete->execute([
                "name"=>$product->getName(),
                "description"=>$product->getDescription(),
                "picture"=>$product->getPicture()
            ]);
        }


    // Méthode pour mettre à jours un Produit dans la BDD via son ID
        public function update(Product $product) {
            // Requete SQL pour mettre à jours le produit via son ID dans la tableau product
            $requete = $this->bdd->prepare("UPDATE product SET name=:name, description=:description, picture=:picture
                                            WHERE id=:id");
            $requete->execute([
                "name"=>$product->getName(),
                "description"=>$product->getDescription(),
                "picture"=>$product->getPicture(),
                "id"=>$product->getId()
            ]);
        }


    //Méthode pour effacer un Produit de la BDD via son ID
        public function remove($id) {

            // Requête SQL pour supprimer un Produit via son ID du tableau product
            $requete = $this->bdd->prepare ("DELETE FROM product WHERE id=:id");
            $requete->execute(["id"=>$id]);
        }
    

    }

?>