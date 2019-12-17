<?php //deviens notre routeur 
setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
session_start(); // enregistrement des paramètres pour l'admin source: http://www.lephpfacile.com/cours/18-les-sessions Ligne 64
//source: https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php/4682351-creer-un-routeur#/id/r-4682481

include(dirname(__FILE__)."/controller/frontend.php");
include(dirname(__FILE__)."/controller/backend.php");



try { // on essai de faire des choses source: https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php/4689546-gerer-les-erreurs#/id/r-4689754
    if(isset($_GET["action"])){
        if($_GET["action"] == "home"){
            ToolsFrontend::home();
        }
        elseif($_GET["action"] == "listPosts"){ //si dans l'url action = listPosts on appel listPosts du controller
            ToolsFrontend::listPosts(); //renvoi dans controller/frontend
        }
        elseif ($_GET["action"] == "post"){
            if(isset($_GET['id']) && $_GET["id"] > 0){ //Si dans l'url action = post on appel post du controller
                ToolsFrontend::post(); //renvoi dans controller/frontend
            }
            else {
                // Erreur ! on arrête tout, on envoie une exception, donc on saute directement au catch
                throw new Exception("Aucun identifiant de billet envoyé");
            }
        }
        elseif ($_GET["action"] == "addComment") { //Si dans l'url action = addComment on appel on envoi les paramètres à la fonction addComment
            //source: https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php/4683301-nouvelle-fonctionnalite-ajouter-des-commentaires#/id/r-4683671
            if (isset($_GET["id"]) && $_GET["id"] > 0){
                if (!empty($_POST["author"]) && !empty($_POST["comment"])) {
                    $id = htmlspecialchars($_GET["id"]);
                    $author     = htmlspecialchars($_POST["author"]);
                    $comment    = htmlspecialchars($_POST["comment"]);
                    ToolsFrontend::addComment($id, $author, $comment); //renvoi dans controller/frontend
                }
                else {
                    
                    throw new Exception("Erreur tous les champs ne sont pas remplis !");
                }
            }
            else {
            // Autre exception
            throw new Exception("Erreur : aucun identifiant de billet envoyé");
        }
    }
        
        elseif ($_GET["action"] == "signalComment"){ //Pour signaler un commentaire 
            ToolsFrontend::signalComment( $_GET["id"], $_GET["post_id"]); //Appel de la fonction signalComment du controller frontend avec comme paramètres le post_id du comment
        }
        //--------------------------partie appel connexion form admin-------------------------
        elseif ($_GET["action"] == "formAdmin"){
            ToolsFrontend::formAdmin();
        }

        //---------------------------partie Backend--------------------------------------------
        
        elseif ($_GET["action"] == "backend"){
            if(isset($_SESSION["user"]) && isset($_SESSION["mdp"])){
                ToolsBackend::listPosts(); // affichage du template backend
            }
            elseif(empty($_SESSION["user"]) && empty($_SESSION["mdp"])){ //Si $_SESSION empty on crée les variables $user et $mdp pour connexion backend
                $user = htmlspecialchars($_POST["user"]); // htmlspecialchars pour éviter une faille de sécurité 
                $mdp = $_POST["mdp"]; 
                ToolsBackend::checkUser($user, $mdp);
                
            }
            else {
                throw new Exception("Erreur mauvais mot de passe ou identifiant");  
            }
        }

        elseif ($_GET["action"] == "createPostView"){
            header("location: view/backend/createPostView.php"); //envoi sur le formulaire 
        }

        elseif($_GET["action"] == "createPostViewConfirm"){ // Quand on est sur le formulaire on appel le trait createPost()
            ToolsBackend::createPost($_POST["title"], $_POST["content"]);
            header("location: index.php?action=backend"); //renvoi à l'accueil de backend
        }

        elseif($_GET["action"] == "postBackend"){ //quand clic sur vue détaillé pour un post
            if(isset($_GET['id']) && $_GET["id"] > 0){ //Si dans l'url action = post on appel post du controller)
                ToolsBackend::getPost();
            }
            else {
                throw new Exception("Aucun identifiant de billet envoyé");
            }
        }

        //appel updatePostView
        elseif($_GET["action"] == "updatePost"){
            if(isset($_GET['id']) && $_GET["id"] > 0){
                ToolsBackend::getPostForUpdate();
                
            }
        }
        //Appel updatePostConfirm donc la méthode updatePost
        elseif($_GET["action"] == "updatePostConfirm"){ //quand on confirme l'update du post
            ToolsBackend::updatePost($_POST["title"], $_POST["content"], $_GET["id"]);
            header("location: index.php?action=backend"); //renvoi à l'accueil de backend
        }

        //appel la méthode delePost
        elseif($_GET["action"] == "deletePost"){
            if(isset($_GET['id']) && $_GET["id"] > 0){
            ToolsBackend::deletePost($_GET["id"]);
            header("location: index.php?action=backend"); //renvoi à l'accueil de backend
            }
            else {
                throw new Exception("Aucun identifiant de billet envoyé");
            }
        }

        //Appel pour modération des commentaires 
        elseif($_GET["action"] == "signalCommentsView"){
            ToolsBackend::checkSignalComment(); // Appel du trait checkSignalComment();
           
            
        }
        elseif($_GET["action"] == "signalCommentDecision"){
            if(isset($_GET['id']) && $_GET["id"] > 0){
                if($_POST["commentChoice"] == "commentApprouve"){
                    ToolsBackend::approuveComment($_GET["id"]);
                    header("location: index.php?action=signalCommentsView");
                    
                }
                elseif($_POST["commentChoice"] == "deleteComment"){
                    ToolsBackend::deleteComment($_GET["id"]);
                    header("location: index.php?action=signalCommentsView");
                }
            }
            else {
                throw new Exception("Aucun id de post envoyé");
            }
        }
        //Appel de la méthode pour afficher le formNewPassword
        elseif($_GET["action"] == "formNewPassword"){
            ToolsBackend::formNewPassword();
        }

        //Appel de la méthode pour modifier le mot de passe admin
        elseif($_GET["action"] == "updatePassword"){
            $oldMdp = htmlspecialchars($_POST["oldMdp"]);
            $newMdp = htmlspecialchars($_POST["newMdp"]);
            $newMdpRepeat = htmlspecialchars($_POST["newMdpRepeat"]);
            ToolsBackend::changePassword($oldMdp, $newMdp, $newMdpRepeat);
        }
        //Appel la méthode destroysession pour déconnexion de l'admim
        elseif($_GET["action"] == "sessionDestroy"){
            ToolsBackend::sessionStop();
            header("location: index.php?action=home");
        }
    }
    else{
        ToolsFrontend::home();
        //ToolsFrontend::listPosts(); //appel de listPosts() liste des posts
        }
}

catch(Exception $e) // s'il y a une erreur, alors...
{
    echo "Erreur : " . $e->getMessage();
}
    /*
        On charge le fichier controller.php (pour que les fonctions soient en mémoire, quand même !).
    
        On teste le paramètre action pour savoir quel contrôleur appeler. Si le paramètre n'est pas présent, 
        par défaut on charge la liste des derniers billets (ligne 16). C'est comme ça qu'on indique ce que doit 
        afficher la page d'accueil du site.
    
        On teste les différentes valeurs possibles pour notre paramètre action et on redirige vers le bon contrôleur à chaque fois.
    
    */

