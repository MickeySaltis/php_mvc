<?php

// Classe User
class User {

    // Attributs Privés de User, accessible seulement avec les accesseurs ( get / set )
    private $id;
    private $username;
    private $password;

    // Méthode Magique __construct, sert à créer de nouveaux objets avec le mot clé "new"
    // Initialisation d'un nouvel objet
    public function __construct($id, $username, $password) {
        // $this->attribut privé de l'objet = $paramètre renseigné
        $this->_id = $id;
        $this->_username = $username;
        $this->_password = $password;
    }

    // Accesseurs
    // Get (pour lire leurs valeurs)
    // getAttribut() permet de retourner l'attribut privé de l'objet dans la voie publique
    public function getId() {
        return $this->_id;
    }
    public function getUsername() {
        return $this->_username;
    }
    public function getPassword() {
        return $this->_password;
    }

    // Set (pour modifier leurs valeurs)
    // setAttribut(paramètre) prend en paramètre la nouvelle valeur qu'on souhaite modifier
    // et modifie l'attribut privé
    // L'attribut Id n'est pas indiqué car il est automatiquement prit en charge par la BDD lors de l'insertion d'une ligne
    public function setUsername($username) {
        $this->_username = $username;
    }
    public function setPassword($password) {
        $this->_password = $password;
    }
}
?>