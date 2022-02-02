<?php

// Classe pour controller les Produits
// Extension de AdminController pour être accessible que si il y a eu une authentification
    class ProductController extends AdminController {
        
        // Déclaration d'une nouvelle variable
        private $productManager;
        
        // Constructeur de la Classe controlleur / avec la remonté de son parent
        public function __construct() {
            parent::__construct();

            $this->productManager = new ProductManager();
        }


    // Afficher la liste des produits
        public function list() {

            // Récupère les données de tout les produits
            $products = $this->productManager->findAll();
            
            // Connexion de la vue list
            require "View/Product/list.php";
        }
    

    // Fonction pour afficher les erreurs sur le formulaire
        private function validForm(){

            // Tableau pour les erreurs sur le formulaire
            $errors = [];
            
            // Si il n'y a pas de nom
            if(empty($_POST["name"])) {
                $errors[] = "Veuillez insérer le nom du produit.";
            }
            // Si il n'y a pas de description
            if(empty($_POST["description"])) {
                $errors[] = "Veuillez insérer la description du produit.";
            }
            return $errors;
        }


    // Méthode pour ajouter un nouveau produit
        public function add() {

            // Tableau pour les erreurs sur le formulaire
            $errors = [];

            //Effectue un traitement quand le formulaire est bon
            if($_SERVER["REQUEST_METHOD"] == "POST") {

                //Vérification des erreurs avec la fonction validForm
                $errors = $this->validForm();

                // Si il n'y a pas d'erreur
                if(count($errors) ==0) {

                    //Transformer l'ajout en Objet
                    $product = new Product (null, $_POST["name"], $_POST["description"], $_POST["picture"]);

                    // Demande à ProductManager de sauvegarder le nouvelle Objet dans la BDD
                    $this->productManager->save($product);

                    //Retour sur la liste des produits après l'ajout
                    header("Location: index.php?controller=produit&action=list");
                }
            }
            // Connexion de la vue form
            require "View/Product/form.php";
        }



    // Méthode qui affiche le détail d'un produit via son ID
        public function detail($id) {

            // Récupère les données d'un produit
            $product = $this->productManager->findOne($id);

            // Connexion de la vue detail
            require "View/Product/detail.php";
        }


    // Méthode pour éditer un produit existant via son ID
        public function edit($id) {
            
            // Récupère les données d'un produit
            $product = $this->productManager->findOne($id);

            // Tableau pour les erreurs sur le formulaire
            $errors = [];

            //Effectue un traitement quand le formulaire est bon
            if($_SERVER["REQUEST_METHOD"] == "POST") {

                //Vérification des erreurs avec la fonction validForm
                $errors = $this->validForm();

                // Si il n'y a pas d'erreur
                if(count($errors) ==0) {

                    //Valider les valeurs taper sur le formulaire
                    $product ->setName($_POST["name"]);
                    $product ->setDescription($_POST["description"]);
                    $product ->setPicture($_POST["picture"]);

                    // Demande à ProductManager de mettre à jour l'objet dans la BDD
                    $this->productManager->update($product);

                    //Retour sur la liste des produits après la mise à jours du produit
                    header("Location: index.php?controller=produit&action=list");
                }
            }
            // Connexion de la vue detail
            require "View/Product/form.php";
        }



    // Méthode pour supprimer un produit via son ID de la BDD 
        public function delete($id) {

            // Demande à ProductManager de supprimer l'objet de la BDD
            $this->productManager->remove($id);

            //Retour sur la liste des produits après la mise à jours du produit
            header("Location: index.php?controller=produit&action=list");
        }

    }


?>