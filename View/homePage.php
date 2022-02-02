
<html>
    <head>

    </head>

    <body class="text-center">

        <h1> Page d'acceuil</h1>

            <h2> Bonjour <?php echo($this->user->getUsername()); ?></h2>

                <a href="index.php?controller=produit&action=list">Liste des produits</a>
                <a href="index.php?controller=security&action=logout">Se deconnecter</a>
         

    </body>
</html>