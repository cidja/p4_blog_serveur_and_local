<!-- source: https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php/4682286-creer-un-template-de-page#/id/r-4682316 !-->
<!DOCTYPE html>
<html lang="fr-FR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?= $title ?></title>
        <link rel="stylesheet" href="public/css/style.css"/>
        <script src="https://kit.fontawesome.com/bad7172f0a.js" crossorigin="anonymous"></script> <!--cdn fontawesome source: https://fontawesome.com/kits/bad7172f0a/settings !-->
        <script src="https://cdn.tiny.cloud/1/er48ufvc7i8vzzseiz1tka82m7p8bec1kdtkmjzdoctvosu2/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>tinymce.init({selector:'#content'});</script> <!--CDN tony mce source: https://www.tiny.cloud/get-tiny/ !-->
        
       
    </head>
    <header>
    <!--Utiliser pour afficher le formulaire de connexion !-->
    <div class="accessbackend"> 
    
        <form action="index.php?action=sessionDestroy" method="post">
        Déconnexion:
            <input type="submit" value="déconnexion" />
        </form>
    </div>
    </header>
    
    <body>
    
        <?= $content ?> <!--va contenir ce que l'on veut mettre dedans direction indexView.php !-->
    
    </body>
</html>
