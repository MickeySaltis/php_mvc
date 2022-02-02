<html>
    <head>

    </head>

    <body class="text-center">

        <h1> Se connecter </h1>

        <form method="POST" action="index.php?controller=security&action=login" class="container">
            <div class="mb-3">
                <label for="username" class="form-label">Nom utilisateur</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="Entrez votre identifiant">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Entrez votre mot de passe">
            </div>
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>
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
        <a href="index.php?controller=security&action=register">Créer un compte</a>
    </body>
</html>