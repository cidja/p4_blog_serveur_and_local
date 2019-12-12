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
        <script src="https://kit.fontawesome.com/bad7172f0a.js" crossorigin="anonymous"></script> <!--cdn fontawesome source: https://fontawesome.com/kits/bad7172f0a/settings !-->
        <script src="https://cdn.tiny.cloud/1/er48ufvc7i8vzzseiz1tka82m7p8bec1kdtkmjzdoctvosu2/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>tinymce.init({selector:'#content'});</script> <!--CDN tony mce source: https://www.tiny.cloud/get-tiny/ !-->
        
       
    </head>
    <header>
    <!--Utiliser pour afficher le formulaire de connexion !-->
    <div class="container accessbackend"> 
        <div class="row d-flex flex-row-reverse">
            <form action="index.php?action=sessionDestroy" method="post">
            <input class="btn btn-warning btn-lg" type="submit" value="DECONNEXION" />
            </form>
        </div>
    </div>
    </header>
    
    <body>
    
        <?= $content ?> <!--va contenir ce que l'on veut mettre dedans direction indexView.php !-->
    
    </body>
</html>
