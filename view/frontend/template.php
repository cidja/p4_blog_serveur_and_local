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
        <nav class="navbar navbar-expand-md navbar-dark navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" title="page d'accueil" href="index.php?action=home">Jean Forteroche</a>
                <ul id="navbarToggler" class="nav collapse navbar-collapse flex-md-row justify-content-md-end align-items-sm-start">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=listPosts">Articles</a>
                    </li>
                    <li class="nav-item ml-3">
                        <a id="adminLink" class="btn btn-secondary" title="login" href="index.php?action=formAdmin">Connexion</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

        <?= $content ?> <!--va contenir ce que l'on veut mettre dedans direction listPostView.php !-->
    </body>
</html>
