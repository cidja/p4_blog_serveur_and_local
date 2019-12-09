<?php
//tous les appels ce font directement dans le index.php
//source: https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php/4735671-passage-du-modele-en-objet#/id/r-4735685
require_once("model/ManagerDb.php"); // Appel de la classe ManagerDb.php Source: https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php/4744941-tirer-parti-de-lheritage#/id/r-4745131
require_once("model/PostManager.php"); //appel de la classe PostManager require_once (une fois uniquement)

class UserManager extends ManagerDb
{
    //fonction pour vérifier le user et le mdp rentré dans le header
    public function checkUser($user, $mdp)
    {
        $db = $this->dbConnect(); 
        $check = $db->query("SELECT user,mdp FROM users");
        foreach($check as $data){ //boucle d'itération
            if($data["user"] == $_POST["user"]){
                if (password_verify($_POST["mdp"], $data["mdp"])){ //Source: https://www.php.net/manual/fr/function.password-verify.php
                    $_SESSION["user"] = $user; // Création des sessions
                    $_SESSION["mdp"] = $mdp; // Création des sessions
                }
                ToolsBackend::listPosts();
            }
            else {
                echo "mauvais mot de passe ou identifiant";
            }
        }
    }
}