<?php
session_start();
 $title = "Création de post"; 

 ob_start(); ?> <!--commencement de la capture pour créer la variable $content qu'on insère dans templateBackend.php !-->
<div class="container-fluid">
    <a class="btn btn-info col mb-4 text-uppercase" href="/p4/index.php?action=backend">Retour à la liste des billets </a>
    <section id="createPost">
        <div class="container-fluid">
            <h1 class="text-center">Création de billet</h1>
            <form action="/p4/index.php?action=createPostViewConfirm" method="post">
                <div class="form-row">
                    <div class="form-group col-12">
                        <label for="title"> Titre du billet : </label>
                        <input class="form-control" type="text" id="title" name="title" placeholder="Titre" required autofocus />
                    </div>
                </div>
                <div class="form-group">
                    <label for="content">Contenu du billet :</label>
                    <!--en dessous utilisation des balises pour Tiny MCE pour écrire les posts !-->
                        <textarea class="form-control" id="content" name="content" placeholder="rentrez votre texte ici" required>Rentrez votre texte du billet </textarea>     
                </div>
                <div class="form-group">
                    <input class="btn btn-success" type="submit" value="valider" />
                </div>
            </form> 
        </div>
    </section>
</div>

    <?php  
    $content = ob_get_clean();

require("templateBackend.php"); 

?>