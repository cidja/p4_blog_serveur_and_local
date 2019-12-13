<?php 

if(isset($_SESSION["user"]) && isset($_SESSION["mdp"])){ //on vérifie que l'on a bien les id et mdp pour acceder à l'interface d'admin
    $title = "Admin mon blog"; 

    ob_start(); ?>
    <div id="backgroundSignalCommentsView">
        <div class="container">
            <a class="btn btn-info col mb-4 text-uppercase" href="/p4/index.php?action=backend">Retour à la liste des billets </a>
            <div class="container jumbotron">
                <div class="row text-center">
                    <div class="col-lg-8 offset-lg-2">
                        <h3>Modération des commentaires</h3>
                        <?php 
                        $resultCountSignalComments =  implode(',',$countSignalComments->fetch(PDO::FETCH_ASSOC)); //utilisation de FETCH_ASSOC source: https://www.php.net/manual/fr/pdostatement.fetch.php
                        ?>
                        <div class="countSignalComments">
                            Il reste encore :<span class="font-weight-bold"> <?= $resultCountSignalComments; ?> </span>commentaires à modérer.
                        </div>
                        <?php
                        foreach($signalComments as $data){
                        ?>
                        <div class="conteneurComment border border-secondary rounded bg-dark text-white"> <!--utiliser pour créer un bloc pour chaque commentaires !-->
                            <div class="authorComment">
                            <span class="text-uppercase">Auteur : </span>
                            <?php echo $data["author"]." - ". $data['comment_date_fr'];?> 
                            </div>
                            <div id='commentsSignal'>
                                <span class="text-uppercase">Contenu :</span>
                                    <div class="content">
                                        <?=$data["comment"]; ?>
                                    </div>
                            </div> 
                            <div id="ApprouveOrNotComment">
                                <form class="form-group" action="/p4/index.php?action=signalCommentDecision&amp;id=<?= $data["id"]; ?>" method="post">
                                    <div>
                                        <input type="radio" id="commentApprouve" name="commentChoice" value="commentApprouve" required>
                                    <label class="text-success"for="commentApprouve">Approuver le commentaire </label>
                                    </div>
                                    <div>
                                        <input type="radio" id="deleteComment" name="commentChoice" value="deleteComment">
                                    <label class="text-danger" for="deleteComment">Supprimer le commentaire </label>
                                    </div>
                                    <div>
                                        <input class="btn btn-success text-uppercase" type="submit" value="valider mon choix">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php
                                }
                                ?>
                    </div>
                </div>
            </div>
            
                
                
            
  
    
        </div> <!--Fin div container l9-->
    </div> <!-- fin </div> backgroundSignalCommentsView
    <?php
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