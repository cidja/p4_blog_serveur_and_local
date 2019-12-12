<?php
session_start();
 $title = "Création de post"; 

 ob_start(); ?> <!--commencement de la capture pour créer la variable $content qu'on insère dans templateBackend.php !-->
<div class="container-fluid">
    <a class="btn btn-info col mb-4 text-uppercase" href="/p4/index.php?action=backend">Retour à la liste des billets </a>
    <section id="createPost">
        <div class="container-fluid">
            <div class="row">
            <h1 class="text-center">Création de billet</h1>
                <form action="/p4/index.php?action=createPostViewConfirm" method="post">
                    <div class="row">
                        <label for="title"> Titre du billet :
                            <input type="text" id="title" name="title" placeholder="Titre" required autofocus />
                        </label>
                    </div>
                    <div class="row">
                        <label for="content">Contenu du billet :
        <!--en desso    us utilisation des balises pour Tiny MCE pour écrire les posts !-->
                            <textarea id="content" name="content" placeholder="rentrez votre texte ici" required>Rentrez votre texte du billet </textarea>
                        </label>
                    </div>
                    <input type="submit" value="valider" />
                </form> 
            </div>
        </div>
</section>

    

    <!--lien pour retourner à la liste des billets !-->
    </div>
    <?php  
    $content = ob_get_clean();

require("templateBackend.php"); 

?>