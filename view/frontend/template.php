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
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </head>

<body>
    <header>
        <!--Brand  source: https://www.w3schools.com/bootstrap4/bootstrap_navbar.asp !-->
            <nav class="navbar navbar-expand-md bg-success navbar-dark fixed-top">
                <a class="navbar-brand" title="page d'accueil" href="index.php?action=home">Jean Forteroche</a>
            <!-- Toggler / collapsible Button !-->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!--Navbar link !-->
            <div class="collapse navbar-collapse justify-content-md-end align-items-sm-start" id="collapsibleNavbar">
                <ul class="navbar-nav">
                <li class="nav-item ml-1">
                    <a class="nav-link" href="index.php?action=home">ACCUEIL</a>
                </li>
                <li class="nav-item ml-2">
                    <a class="nav-link" href="index.php?action=listPosts">ARTICLES</a>
                </li>
                <li class="nav-item">
                    <a id="adminLink" class="btn btn-secondary" title="login" href="index.php?action=formAdmin">CONNEXION</a>
                </li>
                </ul>
            </div>
        </nav>
    </header>

    <?= $content ?> <!--va contenir ce que l'on veut mettre dedans direction listPostView.php !-->
</body>
</html>
