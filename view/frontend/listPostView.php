<?php $title = "mon blog"; 

 ob_start(); ?>


<!--Utiliser pour afficher le formulaire de connexion !-->
    <div class="row">
        <div class="accessbackend col-md-6 ml-auto mt-2 mr-5 mb-2 rounded-lg bg-dark text-white"> 
        
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
    <div class="container-fluid">
        <div class="row">
            <h3 class="col-md-12 text-center">Derniers billets du blog :</h3>
        </div>
    </div>
<?php
    while($data = $posts->fetch()) //récupération de $posts passé en paramètres dans le index.php qui viens lui même du model.php
    {
?>
    <div class="container-fluid">
        <div class="news jumbotron">
            <h3>
            <a href="index.php?action=post&amp;id=<?= $data['id'] ?>"><?= htmlspecialchars($data['title']) ?></a>
                <div>
                    <em>posté le  <?= $data['creation_date_fr'] ?></em>
                </div>
            </h3>
                    
            <p>
                <?= nl2br(htmlspecialchars_decode($data['content'])) ?>
                <br />
                <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
            </p>
        </div>
    </div>
<?php
}
$posts->closeCursor();

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