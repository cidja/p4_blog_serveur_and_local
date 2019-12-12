<?php 

if(isset($_SESSION["user"]) && isset($_SESSION["mdp"])){ //on vérifie que l'on a bien les id et mdp pour acceder à l'interface d'admin
    $title = "Admin mon blog"; 

    ob_start(); ?>
    <div class="container">
        <div class="row">
            <h1 class="mx-auto">Interface d'administration</h1>
        </div>
        <div class="row d-flex justify-content-between mb-5">
            <div id="createpost"><a class="btn btn-success" href="index.php?action=createPostView"><i class="fas fa-plus-circle"></i>Créer un post </a></div>
            <div id="signalComments"><a class="btn btn-success" href="index.php?action=signalCommentsView">Modération des commentaires</a></div>
        </div>
    
    
    <?php
        while($data = $posts->fetch()) //récupération de $posts passé en paramètres dans le index.php qui viens lui même du model.php
        {
    ?>
        <div class="container jumbotron">
            <div class="row d-flex justify-content-between mb-4">
                <div id="readpost"><a class="btn btn-success" href="index.php?action=postBackend&amp;id=<?= $data["id"]; ?>"><i class="fas fa-search-plus"></i>Vue détaillée</a></div>
                <div id="updatepost"><a class="btn btn-success" href="index.php?action=updatePost&amp;id=<?= $data["id"]; ?>"><i class="fas fa-edit"></i>Modifier le post</a></div> <!--utilisation de $data["id"] pour le récupérer dans l'index.php !-->
                <div id="deletepost"><a class="btn btn-success" href="index.php?action=deletePost&amp;id=<?= $data["id"]; ?>"><i class="fas fa-trash-alt"></i>Supprimer le post</a></div>
            </div>
            <div class="container-fluid">
                <h3>
                    <?= htmlspecialchars($data['title']) ?></a>
                    <div>
                        <div class="font-italic"> posté le  <?= $data['creation_date_fr'] ?></div>
                    </div>
                </h3>      
                <div>
                    <?= nl2br(htmlspecialchars_decode($data['content'])) ?>
                    <div>
                        <a class="text-success font-italic" href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    </div> <!-- Fin du div class container premier !-->
    <?php

    $posts->closeCursor();

    $content = ob_get_clean();

 require("templateBackend.php"); 

/*Ce code fait 3 choses :

    Il définit le titre de la page dans $title. Celui-ci sera intégré dans la balise <title> dans le template.

    Il définit le contenu de la page dans $content. Il sera intégré dans la balise <body> du template.
    Comme ce contenu est un peu gros, on utilise une astuce pour le mettre dans une variable. On appelle 
    la fonction ob_start() (ligne 3) qui "mémorise" toute la sortie HTML qui suit, puis, à la fin, on récupère 
    le contenu généré avec ob_get_clean()  (ligne 28) et on met le tout dans $content .

    Enfin, il appelle le template avec un require. Celui-ci va récupérer les variables $title et $content qu'on vient de créer... pour afficher la page !
*/
}
?>