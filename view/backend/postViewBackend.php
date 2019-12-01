<?php
        session_start();
        $title = htmlspecialchars($post["title"]); //définition du titre dans la variable $title 
        
        ob_start();  // On commence la "capture" du code html suivant?> 
        <h1>Mon super blog</h1>
        <p><a href="index.php?action=backend">Retour à la liste des billets </a></p>

        <div class="news">
            <h3>
                <?= htmlspecialchars($post['title']) //affichage du titre du billet ?> 
                <em>le <?= htmlspecialchars($post['creation_date_fr']) // affichage de la date de création du billet ?></em>
            </h3>

            <p>
                <?= nl2br(htmlspecialchars_decode($post["content"])) // Affichage du contenu du billet ?>
            </p>
        </div>
        <?php
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
?>