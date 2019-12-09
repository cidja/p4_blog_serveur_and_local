<?php $title = "mon blog"; 

 ob_start(); ?>

<div class="container-fluid">
    <div class="row">
        <h1 class="rounded-lg col-md-12 container pt-3 bg-primary text-white text-uppercase text-center">Blog d'artiste</h1>
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
                <?= htmlspecialchars($data['title']) ?>
                <em>le <?= $data['creation_date_fr'] ?></em>
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