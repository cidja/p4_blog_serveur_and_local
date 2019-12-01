<?php

class SessionManager
{
    public function sessionStop() //méthode pour supprimer la session pour se déconnecter de l'admin
    {
        session_start();
        session_unset();
        session_destroy();

    }
}