<?php 

if(isset($_SESSION["user"]) && isset($_SESSION["mdp"])){ //on vérifie que l'on a bien les id et mdp pour acceder à l'interface d'admin
    $title = "Modification d'un billet"; 

    ob_start(); ?>
    <div class="container">
        <!--lien pour retourner à la liste des billets !-->
        <a class="btn btn-info col mb-4 text-uppercase" href="/p4/index.php?action=backend">Retour à la liste des billets </a>
        <section id="updatePost">
            <div class="container bg-success">
                <div class="row justify-content-center text-uppercase text-white">
                    <div class="mb-2 mt-2">
                        <h3 class="text-center">Modification du post </h3>
                        <form class="form-login" action="/p4/index.php?action=updatePostConfirm&amp;id=<?= $_GET["id"]; ?>" method="post">
                            <div class="text-center">
                                <label for="title"> Titre du billet :
                                    <input type="text" id="title" name="title" value="<?= $post['title'];?>" required autofocus /> 
                                </label>
                            </div>
                            <div class="text-center">
                                <label for="content">Contenu du billet : 
                                    <!--en dessous utilisation des balises pour Tiny MCE pour écrire les posts !-->
                                    <textarea id="content" name="content" placeholder="rentrez votre texte ici" required><?= nl2br(htmlspecialchars_decode($post["content"])); ?> </textarea>
                                </label>
                            </div>
                            <div class="text-center">
                                <input class="btn btn-secondary" type="submit" value="valider" />
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </section>
    </div>
    
    <?php  
    $content = ob_get_clean();

require("templateBackend.php"); 
}
?>