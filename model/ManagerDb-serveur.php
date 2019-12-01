<?php

class ManagerDb 
{
    protected function dbConnect()
{
    //source: https://my.ionos.fr/pdo-extension/dbs224218
    $host_name = 'db5000229643.hosting-data.io';
    $database = 'dbs224218';
    $user_name = 'dbu348423';
    $password = '6C@ieJ+@72wG';
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