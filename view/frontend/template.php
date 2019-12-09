<!-- source: https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php/4682286-creer-un-template-de-page#/id/r-4682316 !-->
<!DOCTYPE html>
<html lang="fr-FR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?= $title ?></title>
        <link rel="stylesheet" href="public/css/style.css"/>
        <!--Bootstrap cdn en dessous!-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>

    <body>
    <header>
    <!--Utiliser pour afficher le formulaire de connexion !-->
    <div class="accessbackend"> 
    
        <form action="index.php?action=backend" method="post">
        Accés adminstrateur :
            <label for="user"><input type="text" name="user" id="user" placeholder="identifiant" required /></label>
            <label for="mdp"><input type="password" name="mdp" id="mdp" placeholder="mot de passe" required /></label>
            <input type="submit" value="connexion" />
        </form>
    </div>
    </header>

        <?= $content ?> <!--va contenir ce que l'on veut mettre dedans direction listPostView.php !-->
    </body>
</html>
