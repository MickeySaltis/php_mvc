<?php

    // Classe Produit Objet
    class Product {

        // attribut privé du Product
        private $id;
        private $name;
        private $description;
        private $picture;

        public function __construct($id, $name, $description, $picture) {
            // $this->attribut privé de l'objet = $paramètre renseigné
            $this->_id = $id;
            $this->_name = $name;
            $this->_description = $description;
            $this->_picture = $picture;
        }

        // Accesseurs
        // Get (pour lire leurs valeurs)
        // getAttribut() permet de retourner l'attribut privé de l'objet dans la voie publique
        public function getId() {
            return $this->_id;
        }
        public function getName() {
            return $this->_name;
        }
        public function getDescription() {
            return $this->_description;
        }
        public function getPicture() {
            return $this->_picture;
        }

        // Set (pour modifier leurs valeurs)
        // setAttribut(paramètre) prend en paramètre la nouvelle valeur qu'on souhaite modifier
        // et modifie l'attribut privé
        // L'attribut Id n'est pas indiqué car il est automatiquement prit en charge par la BDD lors de l'insertion d'une ligne        
        public function setId($id) {
            $this->_id = $id;
        }
        public function setName($name) {
            $this->_name = $name;
        }
        public function setDescription($description) {
            $this->_description = $description;
        }
        public function setPicture($picture) {
            $this->_picture = $picture;
        }

    }
?>