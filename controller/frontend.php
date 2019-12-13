<?php
//tous les appels ce font directement dans le index.php
require_once("model/PostManager.php"); //appel de la classe PostManager require_once (une fois uniquement)
require_once("model/CommentManager.php"); //appel de la classe CommentManager require_once (une fois uniquement)


trait ToolsFrontend{ //création d'un trait pour pouvoir rester dans l'appel de POO
    public static function home()
    {
        require("view/frontend/home.php");
    }

    public static function formAdmin()
    {
        require("view/frontend/connexionBackendForm.php");
    }
    
    public static function listPosts()
    {
        $postManager = new PostManager(); //Création d'un objet
        $posts = $postManager->getPosts(); //Appel de la fonction de l'objet source: https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php/4735671-passage-du-modele-en-objet#/id/r-4744655
        require("view/frontend/listPostView.php"); // affiche la liste des billets
    }
    public static function post()
    {
        $postManager = new PostManager(); // Création d'un objet
        $post = $postManager->getPost($_GET["id"]); // appel de la function getPost de l'objet PostManager (un seul post(billet))
    
        $commentManager = new CommentManager(); // Création d'un objet
        $comments = $commentManager->getComments($_GET["id"]); // appel de la function getComments de l'objet CommentManager (récupère les comments)
    
        require("view/frontend/postView.php"); //Affiche un post avec ses commentaires
    }

    public static function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager(); // Création d'un objet

    $affectedLines = $commentManager->postComment($postId, $author, $comment); // appel de la fonction postComment de l'objet CommentManager

    if($affectedLines === false) {
        //Notre modèle arrête tout et affiche une erreur avec un  die . Il y a moyen de faire plus propre : 
        //jetons ici une exception, le code va s'arrêter là et l'erreur être remontée jusque dans le routeur qui contenait le bloc  try  !
        //source: https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php/4689546-gerer-les-erreurs#/id/r-4689802
        throw new Exception("Impossible d'ajouter le commentaire");
    }
    else { //Sinon on renvoi sur l'url index.php?action=post&id=5 par exemple pour le post avec l'id 5
        header("location: index.php?action=post&id=". $postId);
    }
}
    public static function signalComment($id, $postId)
    {
        $commentManager = new CommentManager(); // création d'un objet

        $signalComment = $commentManager->signalComment($id); // Appel de la fonction signalComment de l'objet CommentManager
        if($signalComment === false) 
        {
            throw new Exception("Impossible de signaler le commentaire");
        }
        else {
           header("location: index.php?action=post&id=".$postId); // renvoi au menu principal
            }
            
        }
    public static function changeDate($date, $format = "%a %d %b %Y", $duree = "0 day") {
        //pour changer le format de la date
        /*
          %a     >     Mon
          %A     >     Monday
          %w     >     1
          %d  >     1 JOUR
          %-d  >     01 JOUR
          %b     >    Sep
          %B     >     September
          %m     >     09
          %-m >    9
          %y     >    13
          %Y     >     2013
          %H  >     07 HEURE 24
          %-H >     7 HEURE 24
          %I  >     07 HEURE 12
          %-I >     7 HEURE 12
          %M     >     06
          %-M >    6
          %S     >     05
          %-S >     5
         */
    
    
        if ($date != '' && $date != '0000-00-00') {
            $datejour = strftime($format, strtotime($duree, strtotime($date)));
            return $datejour;
        } else {
            return '';
        }
    }
    }
