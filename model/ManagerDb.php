<?php

class ManagerDb 
{
    protected function dbConnect()
{
    //source: https://my.ionos.fr/pdo-extension/dbs224218
    $host_name = 'localhost';
    $database = 'p4';
    $user_name = 'cidja';
    $password = 'pi';
    $dbh = null;

    try
    {
        $db = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
        return $db;

    }
    catch (PDOException $e) {
        echo "Erreur!: " . $e->getMessage() . "<br/>";
        die();
    }
}
}