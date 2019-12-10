<?php $title = "Connexion a l'administration"; 

 ob_start(); ?>

<div class="row">
        <div class="accessbackend col-md-12 ml-auto mt-5 mr-5 mb-2 rounded-lg bg-dark text-white"> 
        
            <form class="form-inline" action="index.php?action=backend" method="post">
            Accés adminstrateur :
                <label for="user">
                    <input type="text" class="form-control ml-2 mt-2 mr-sm-2 mb-2  " name="user" id="user" placeholder="identifiant" required />
                </label>
                <label for="mdp">
                    <input type="password" class="form-control mb-2 mt-2 mr-sm-2" name="mdp" id="mdp" placeholder="mot de passe" required />
                </label>
                <input type="submit" value="connexion" class="btn btn-outline-info" />
            </form>
        </div>
    </div>
<?php
    $content = ob_get_clean();

 require("template.php"); 

/*Ce code fait 3 choses :

    Il définit le titre de la page dans $title. Celui-ci sera intégré dans la balise <title> dans le template.

    Il définit le contenu de la page dans $content. Il sera intégré dans la balise <body> du template.
    Comme ce contenu est un peu gros, on utilise une astuce pour le mettre dans une variable. On appelle 
    la fonction ob_start() (ligne 3) qui "mémorise" toute la sortie HTML qui suit, puis, à la fin, on récupère 
    le contenu généré avec ob_get_clean()  (ligne 28) et on met le tout dans $content .

    Enfin, il appelle le template avec un require. Celui-ci va récupérer les variables $title et $content qu'on vient de créer... pour afficher la page !
*/
?>