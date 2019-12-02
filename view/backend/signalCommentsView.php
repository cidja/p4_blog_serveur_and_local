<?php 

if(isset($_SESSION["user"]) && isset($_SESSION["mdp"])){ //on vérifie que l'on a bien les id et mdp pour acceder à l'interface d'admin
    $title = "Admin mon blog"; 

    ob_start(); ?>
 
    <h1>Administration super blog</h1>
    <h3>Modération des commentaires<h3>

    
        <?php 
        
        while($data = $signalComments->fetch())
        {
        ?>
        <div class="conteneurComment"> <!--utiliser pour créer un bloc pour chaque commentaires !-->
            <div class="authorComment">
                <?= htmlspecialchars($data["author"]); ?> 
            </div>
            <div class="commentHour"> 
                le <?= $data['comment_date_fr'];?> 
            </div>
            <div id='commentsSignal'>
                <?=$data["comment"]; ?>
            </div> 
            <div id="ApprouveOrNotComment">
                <form action="/p4/index.php?action=signalCommentDecision&amp;id=<?= $data["id"]; ?>" method="post">
                    <input type="radio" id="commentApprouve" name="commentChoice" value="commentApprouve">
                    <label for="commentApprouve">Approuver le commentaire </label>
                    <input type="radio" id="deleteComment" name="commentChoice" value="deleteComment">
                    <label for="deleteComment">Supprimer le commentaire </label>
                    <input type="submit" value="valider mon choix">
                </form>
            </div>
        </div>
    <?php
    }
    $signalComments->closeCursor();

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