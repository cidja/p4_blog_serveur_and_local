<?php
    //tous les appels de classes se font dans l'index.php
    require_once("model/PostManager.php"); //appel de la classe PostManager require_once (une fois uniquement)
    require_once("model/CommentManager.php"); //appel de la classe CommentManager require_once (une fois uniquement)
    require_once("model/SessionManager.php");
    require_once("model/UserManager.php"); // Appel de la classe UserManager

    trait ToolsBackend{
        //fonction pour vérifier le mot de passe et le user
        public static function checkUser($user, $mdp)
        {
            $userManager = new UserManager(); // Création de l'objet UserManager
            $check = $userManager->checkUser($user, $mdp); // appel de la fonction de l'objet UserManager

        }

        // Fonction pour lister les posts
        public static function listPosts()
        {
            $postManager = new PostManager(); //Création d'un objet
            $commentManager = new CommentManager(); //Création d'un objet
            $posts = $postManager->getPosts(); //Appel de la fonction de l'objet source: https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php/4735671-passage-du-modele-en-objet#/id/r-4744655
            $countSignalComments = $commentManager->countSignalComments();
            require("view/backend/listPostViewBackend.php"); // affiche la liste des billets
        }

        public static function getPost() //affiche un post unique
        {
            $postManager = new PostManager(); // Création d'un objet
            $post = $postManager->getPost($_GET["id"]); // appel de la function getPost de l'objet PostManager (un seul post(billet))
        
            require("view/backend/postViewBackend.php"); //Affiche un post avec ses commentaires
        }

        //affiche un post pour un update
        public static function getPostForUpdate() 
        {
            $postManager = new PostManager(); // Création d'un objet
            $post = $postManager->getPost($_GET["id"]); // appel de la function getPost de l'objet PostManager (un seul post(billet))

            require("view/backend/updateViewBackend.php");
        }

        //fonction pour modération commentaire
        public static function checkSignalComment()
        {
            $commentManager = new CommentManager(); //Création d'un objet
            $signalComments = $commentManager->checkSignalComment(); // Appel de la méthode checkSignalComment() de l'objet CommentManager
            $countSignalComments = $commentManager->countSignalComments(); // Appel de la méthode countSignalComments() pour affichage du nombre de commentaire à modérer dans signalCommentsView
            require("view/backend/signalCommentsView.php"); // appel de la vue signalCommentsView.php
        }

        //Fonction pour approuvé un commentaire
        public static function approuveComment($id)
        {
            $commentManager = new CommentManager();
            $approuveComment = $commentManager->approuveComment($id); // Appel de la méthode approuveComment avec en paramétre l'id du commentaire
        }

        //Fonction pour delete un commentaire
        public static function deleteComment($id)
        {
            $commentManager = new CommentManager(); // Création de l'objet CommentManager()
            $deleteComment = $commentManager->deleteComment($id); // Appel de la méthode deleteComment avec en paramétre l'id du commentaire
        }
        
        

        //fonction pour créer un post
        public static function createPost($title,$content)
        {
            $postManager = new PostManager(); // Créatoin d'un objet PostManager();
            $createPost = $postManager->createPost($title, $content); // Appel de la fonction de l'objet source
            
        }

        //fonction pour updater les posts 
        public static function updatePost($title,$content,$postId)
        {
            $postManager = new PostManager(); // Création d'un objet PostManager()
            $update = $postManager->updatePost($title,$content,$postId); // appel de la fonction de l'objet source
            
        }

        //fonction pour supprimer un post
        public static function deletePost($postId)
        {
            $postManager = new PostManager(); // Création d'un objet PostManager()
            $delete = $postManager->deletePost($postId); // Appel de la méthode deletePost de l'objet PostManager
        }

        //fonction pour afficher le formNewPassword
        public static function formNewPassword()
        {
            require("view/backend/updatePassword.php");
        }

        //Fonction pour modifier le mot de passe
        public static function changePassword($oldMdp, $mdp1, $mdprepeat)
        {
            $userManager = new UserManager();
            $newPassword = $userManager->changePassword($oldMdp, $mdp1, $mdprepeat);

        }

        public static function sessionStop()
        {
            $sessionManager = new SessionManager(); // Création d'un objet SessionManager()
            $sessionDestroy = $sessionManager->sessionStop(); // Appel de la méthode sessionStop() de l'objet SessionManager()
        }


    }
