<!--Dans cette vue, on affiche le billet (récupéré avec $post ) et les commentaires (récupérés dans$comments ) !-->
        <?php
        //session_start(); retiré car affiche un warning (le 11.12.19 à 14h47)
        $title = $post["title"]; //définition du titre dans la variable $title 
        
        ob_start();  // On commence la "capture" du code html suivant?> 
    <div id="backgroundPostView">
        <h1 class="text-center text-uppercase">Billet simple pour l'Alaska</h1>
        <div class="container">
            <div class="news jumbotron">
                <h3>
                    <?= $post['title'] //affichage du titre du billet ?> 
                    <div>
                        <em>posté le <?= $post['creation_date_fr'] // affichage de la date de création du billet ?></em>
                    </div>
                </h3>
                
                <p>
                    <?= nl2br(htmlspecialchars_decode($post["content"])) // Affichage du contenu du billet ?>
                </p>
            </div>
        </div>

        <div class="container">
            <section class="mb-4 pt-2 pb-4" id="viewComment">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2 text-white">
                            <h5 class="text-center text-white">Commentaires</h5>
                            <?php
                             while($comment = $comments->fetch()) // On parcours le tableau source: https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php/4678891-nouvelle-fonctionnalite-afficher-des-commentaires#/id/r-4681307
                                {
                            ?>
                            <div class="comment mb-2">
                                <div class="row">
                                    <div class="col-md-12 d-flex">
                                        <span class="ml-2 font-weight-bold"><?= $comment["author"] // Affichage de l'auteur du commentaire ?></span>
                                        - le <?= $comment["comment_date_fr"]  // Affichage de la date du commentaire ?>
                                    </div>
                                    <div class="col-md-9 ml-2">
                                        <?= nl2br(htmlspecialchars_decode($comment["comment"])) // Affichage du contenu du commentaire ?>
                                    </div>
                                    <div class="col-6 col-sm-4 col-md-4 offset-sm-4 offset-md-7 mt-2 mb-3 mr-2">
                                    <?php if ($comment["comment_signal"] == 0){ //condition qui vérifie si comment_signal = 1 ou 0
                                        ?>
                                        <button class="btn btn-success" type="button">
                                            <a class="text-dark" href="index.php?action=signalComment&amp;id=<?= $comment["id"]?>&post_id=<?= $comment["post_id"]?>" id="signallink">Signaler</a>
                                        </button><!--Utiliser pour renvoyer sur une page pour valider la signalisation de commentaire !-->
                                        <?php
                                        } else {
                                            ?>
                                            <button class="btn btn-danger">En attente de modération</button>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            $comments->closeCursor(); //on libère le curseur pour une nouvelle requête
                            ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="container">
            <section id="addComment">
                <div class="container bg-success mb-5 rounded">
                    <div class="row justify-content-center">
                        <div class="mb-2 mt-2">
                            <h2 class="text-white">Ajouter un commentaire </h2>
                                <!-- formulaire pour ajouter un commentaire !-->
                                <!-- source: https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php/4683301-nouvelle-fonctionnalite-ajouter-des-commentaires#/id/r-4683667 !-->
                            <form class="form-login" action="index.php?action=addComment&amp;id=<?= $post["id"] ?>" method="post">
                                <div class="text-center">
                                    <label for="author">
                                        <input type="text" class="form-control" id="author" name="author" placeholder="auteur" required />
                                    </label>
                                </div>
                                <div class="text-center">
                                    <label for="comment">
                                        <textarea id="comment" class="form-control"  name="comment" placeholder="Un petit commentaire ?" required rows="3"></textarea>
                                    </label>
                                </div>
                                <div class="text-center">
                                    <input class="btn btn-light btn-block" type="submit" id="submitbutton"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        
        
    </div> <!--Fin div backgroundPostView !-->
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