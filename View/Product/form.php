<?php

    // Formulaire pour ajouter un Produit / editer un Produit
?>

<html>
    <head>

    </head>

    <body class="text-center">

            <h2> Bonjour <?php echo($this->user->getUsername()); ?></h2>

                <a class="me-2" href="index.php?controller=produit&action=list"><?php
                    // bouton prend comme valeur le chemin emprunté ( ADD || EDIT )
                    if ($_GET["action"]=="edit" && isset($_GET["id"])) {
                        echo('Annuler l\'edition du produit '.$product->getName());
                    } else{ echo('Annuler l\'ajout');} ?></a>

                <a href="index.php?controller=security&action=logout">Se deconnecter</a>
         
        <!-- Titre change en rapport du chemin emprunté ( ADD || EDIT ) -->
        <h1 class="mt-4"> <?php
            if ($_GET["action"]=="edit" && isset($_GET["id"])) {
                echo('Edition du produit '.$product->getName());
            } else{ echo('Ajouter un nouveau produit');} ?> </h1>

            <!-- Formulaire ajout de Produit || edition du Produit -->
            <form method="POST" 
                 
                    class="container border p-4 mt-5">
                <div class="mb-3">
                    <label for="name" class="form-label">Nom du produit</label>
                    <input type="text" name="name" class="form-control" id="name"
                        <?php 
                            // Si le chemin emprunté est le EDIT, afficher le nom du produit lié à l'ID
                            if ($_GET["action"]=="edit" && isset($_GET["id"])) {
                            echo('value="'.$product->getName().'"');
                            } ?> 
                        placeholder="Entrez le nom du produit">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description du produit</label>
                    <input type="text" name="description" class="form-control" id="description"
                        <?php 
                            // Si le chemin emprunté est le EDIT, afficher la description du produit lié à l'ID
                            if ($_GET["action"]=="edit" && isset($_GET["id"])) {
                            echo('value="'.$product->getDescription().'"');
                            } ?> 
                         placeholder="Entrez la description du produit">
                </div>
                <div class="mb-3">
                    <label for="picture" class="form-label">Photo du produit</label>
                    <input type="text" name="picture" class="form-control" id="picture"
                        <?php 
                            // Si le chemin emprunté est le EDIT, afficher le lien photo du produit lié à l'ID
                            if ($_GET["action"]=="edit" && isset($_GET["id"])) {
                            echo('value="'.$product->getPicture().'"');
                            } ?>
                        placeholder="Entrez la photo du produit">
                </div>
                <button type="submit" class="btn btn-primary mb-2"><?php
                    // bouton prend comme valeur le chemin emprunté ( ADD || EDIT )
                    if ($_GET["action"]=="edit" && isset($_GET["id"])) {
                        echo('Valider la modification');
                    } else{ echo('Ajouter');} ?></button>

                <?php
                    // Si $errors n'est pas null, afficher les valeurs du tableau avec une boucle
                    if(!is_null($errors)) {
                        foreach($errors as $error) {
                            echo ('<div class=" container alert alert-danger" role="alert">
                                '.$error.'
                                </div>');
                        }
                    }
                ?>
            </form>
        
    </body>
</html>