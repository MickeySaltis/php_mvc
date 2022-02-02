<?php

?>

<html>
    <head>

    </head>

    <body class="text-center">

            <h2> Bonjour <?php echo($this->user->getUsername()); ?></h2>

                <a href="index.php?controller=security&action=logout">Se deconnecter</a>
         
        <h1 class="mt-4"><?php echo($product->getName()) ?></h1>

        <!-- Carte Produit -->
        <div class="d-flex justify-content-center pt-4">
            <div class="card" style="width: 18rem;">
                <img src="<?php echo($product->getPicture()) ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Détail pour <?php echo($product->getName()) ?></h5>
                    <p class="card-text"><?php echo($product->getDescription()) ?></p>
                </div>
                <a href="index.php?controller=produit&action=list">Retour</a>
            </div>
        </div>
        
    </body>
</html>