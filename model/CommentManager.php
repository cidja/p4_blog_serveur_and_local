<?php
//tous les appels ce font directement dans le index.php
//source: https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php/4735671-passage-du-modele-en-objet#/id/r-4735685
require_once("model/ManagerDb.php"); // Appel de la classe ManagerDb.php Source: https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php/4744941-tirer-parti-de-lheritage#/id/r-4745131

class CommentManager extends ManagerDb 
{
    public function getComments($postId)
    {
        setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
    $db = $this->dbConnect(); //appel de $this S:https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php/4735671-passage-du-modele-en-objet#/id/r-4744592
    $comments = $db->prepare('SELECT comments.id, comments.post_id, comments.author, comments.comment, DATE_FORMAT(comment_date, "%d/%m/%Y à %Hh%imin%ss") AS comment_date_fr, comments.comment_signal
    FROM posts
    INNER JOIN comments
    on posts.id = comments.post_id
    WHERE posts.id = ?
    ORDER BY comment_date DESC');
    $comments->execute(array($postId));
    
    return $comments;
    
    }

    //fonction pour ajout d'un comentaire
    public function postComment($postId, $author, $comment) 
    {
        //utilisation de htmlspecialchars pour éviter des pb de sécurité 
        $postIdEpure    = htmlspecialchars($postId);
        $authorEpure     = htmlspecialchars($author);
        $commentEpure   = htmlspecialchars($comment);
        $db = $this->dbConnect(); //appel de $this S:https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php/4735671-passage-du-modele-en-objet#/id/r-4744592
        $comments = $db->prepare("INSERT INTO comments(post_id, author, comment, comment_date, comment_signal)VALUES(?, ?, ?, NOW(),0)"); //comment_signal mis sur 0 
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
        
    }
    public function signalComment($id) //fonction pour signaler un commentaire pour le faire remonter dans l'interface backend
    { //le but de la fonction est d'ajouter un TRUE sur la colonne signal de la table comments pour ensuite le faire remonter dans les signal sur le backend
        $db = $this->dbConnect(); //appel de $this S:https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php/4735671-passage-du-modele-en-objet#/id/r-4744592
        $comments = $db->prepare("UPDATE comments SET comment_signal=1 WHERE id=?");
        $signalComments = $comments->execute(array($id));
        
        return $signalComments;
    }

    // Fonction pour afficher tous les commentaires signalés
    public function checkSignalComment() 
    {
        $db = $this->dbConnect(); // appel de $this
        $signalComments = $db->query('SELECT id, author, comment, DATE_FORMAT(comment_date, "%d/%m/%Y à %Hh%imin%ss") AS comment_date_fr, comment_signal FROM comments WHERE comment_signal = 1 ORDER BY comment_date DESC');
        return $signalComments;
    }

    //fonction pour valider un commentaire signalé
    public function approuveComment($id)
    {
        $db= $this->dbConnect();
        $approuveComment = $db->prepare("UPDATE comments set comment_signal	= 0 WHERE id= ?");
        $affectedLines = $approuveComment->execute(array($id));
    }

    //Fonction pour supprimer un commentaire signalé
    public function deleteComment($id)
    {
        $db= $this->dbConnect();
        $comment=$db->prepare("DELETE FROM comments WHERE id=?");
        $deleteComment = $comment->execute(array($id));
    }

    //Fonction pour compter nombre commentaire a modérer
    public function countSignalComments()
    {
        $db = $this->dbConnect();
        $countSignalComments = $db->query("SELECT COUNT(comment_signal) FROM comments WHERE comment_signal = 1");
        return $countSignalComments;
    }

}