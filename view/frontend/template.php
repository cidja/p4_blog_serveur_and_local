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
    <div class="container-fluid">
        <div class="row">
            <h1 class="rounded-lg col-md-12 container p-3 bg-primary text-white text-uppercase text-center">Blog d'artiste</h1>
        </div>
    </div>
    </header>

        <?= $content ?> <!--va contenir ce que l'on veut mettre dedans direction listPostView.php !-->
    </body>
</html>
