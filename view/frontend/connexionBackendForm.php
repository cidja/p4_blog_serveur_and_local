<?php $title = "Connexion a l'administration"; 

 ob_start(); ?>
<div id="backgroundLogin">
   
        <section id="sectionLogin">
            <div class="container bg-success rounded border border-success">
                <div class="row justify-content-center">
                    <div class="mb-5 mt-4">
                        <form class="form-login" action="index.php?action=backend" method="post">
                            <div class="text-center text-white">
                                Accés adminstrateur :
                            </div>
                            <div class="form-group mt-2 text-center">
                                <label for="user">
                                    <input type="text" class="form-control ml-2 mt-2 mr-sm-2 mb-2  " name="user" id="user" placeholder="identifiant" required autofocus/>
                                </label>
                            </div>
                            <div class="form-group text-center">
                                <label for="mdp">
                                    <input type="password" class="form-control ml-2 mb-2 mt-2 mr-sm-2" name="mdp" id="mdp" placeholder="mot de passe" required />
                                </label>
                            </div>
                            <div class="text-center">
                                <input class="btn btn-light" type="submit" value="connexion"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    
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