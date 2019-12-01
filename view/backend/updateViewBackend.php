<?php 

if(isset($_SESSION["user"]) && isset($_SESSION["mdp"])){ //on vérifie que l'on a bien les id et mdp pour acceder à l'interface d'admin
    $title = "Admin mon blog"; 

    ob_start(); ?>

    <h3>Modification du post </h3>
    <form action="/p4/index.php?action=updatePostConfirm&amp;id=<?= $_GET["id"]; ?>" method="post">
        <label for="title"> Titre du billet : </label>
            <input type="text" id="title" name="title" value="<?= htmlspecialchars($post['title']);?>" required autofocus />
        <label for="content">Contenu du billet : </label>    
 <!--en dessous utilisation des balises pour Tiny MCE pour écrire les posts !-->
        <textarea id="content" name="content" placeholder="rentrez votre texte ici" required><?= nl2br(htmlspecialchars_decode($post["content"])); ?> </textarea>
        <input type="submit" value="valider" />
    </form> 

    <!--lien pour retourner à la liste des billets !-->
    <a href="/p4/index.php?action=backend">Retour à la liste des billets </a>
    <?php  
    $content = ob_get_clean();

require("templateBackend.php"); 
}
?>