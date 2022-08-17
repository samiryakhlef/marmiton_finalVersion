<?php 

namespace App;
use PDO;
use PDOException;


class Database
{
    public function Connect(): void
    {
        //on récupère les identifiants de la base de donnéées
        $config = parse_ini_file("config.ini", true);
        try {
            $db = new PDO('mysql:host=' . $config["DB_HOST"] . ';dbname=' . $config["DB_NAME"], $config["DB_USERNAME"], $config["DB_PASSWORD"]);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Échec lors de la connexion : ' . $e->getMessage();
        }
    }
}