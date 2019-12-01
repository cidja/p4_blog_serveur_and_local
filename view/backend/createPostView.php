<?php
session_start();
 $title = "Création de post"; 

 ob_start(); ?> <!--commencement de la capture pour créer la variable $content qu'on insère dans templateBackend.php !-->

 <h1>Création de billet</h1>

    <form action="/p4/index.php?action=createPostViewConfirm" method="post">
        <label for="title"> Titre du billet : </label>
            <input type="text" id="title" name="title" placeholder="Titre" required autofocus />
        <label for="content">Contenu du billet : </label>    
 <!--en dessous utilisation des balises pour Tiny MCE pour écrire les posts !-->
        <textarea id="content" name="content" placeholder="rentrez votre texte ici" required>Rentrez votre texte du billet </textarea>
        <input type="submit" value="valider" />
    </form> 

    <!--lien pour retourner à la liste des billets !-->
    <a href="/p4/index.php?action=backend">Retour à la liste des billets </a>
    <?php  
    $content = ob_get_clean();

require("templateBackend.php"); 

?>