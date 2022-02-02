<?php

?>

<html>
    <head>

    </head>

    <body class="text-center">

            <h2> Bonjour <?php echo($this->user->getUsername()); ?></h2>

                <a class="me-2" href="index.php?controller=produit&action=add">Ajouter un produit</a>
                <a href="index.php?controller=security&action=logout">Se deconnecter</a>
         
        <h1 class="mt-4"> Produits disponible</h1>

        <!-- Tableau Produits -->
        <table class="table container text-center mt-5">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Description</th>
                <th scope="col">Photo</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

            <?php
                foreach($products as $product) {
                    echo  ('<tr class="align-middle">
                                <th scope="row">'.$product->getId().'</th>
                                <td>'.$product->getName().'</td>
                                <td>'.$product->getDescription().'</td>
                                <td><img src="'.$product->getPicture().'" alt="photo" class="img-thumbnail" style="height:150px"></td>
                                <td><a href="index.php?controller=produit&action=one&id='.$product->getId().'">Détail</a>
                                <a href="index.php?controller=produit&action=edit&id='.$product->getId().'">Editer</a>
                                <a href="index.php?controller=produit&action=delete&id='.$product->getId().'">Supprimer</a></td>
                            </tr>');
                }
            ?>
                
            </tbody>
        </table>
        
    </body>
</html>