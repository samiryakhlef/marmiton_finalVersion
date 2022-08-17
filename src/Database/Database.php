<?php

namespace App\Database;

use Exception;
use PDOException;
use PDO;

class Database
{
    private array|false $config;
    public PDO $pdo;


    /**
     * THE CONSTRUCTOR
     *
     * @throws Exception
     */
    public function __construct()
    {
        $this->config();
        $this->connect();
    }

    /**
     * Retrieve the config from the config.ini file
     *
     * @throws Exception
     */
    private function config(): void
    {
        // On récupère les identifiants de la Base de données
        $con = parse_ini_file('config.ini', true);
        // Erreur pour vor si le fichier n'existe pas 
        if (!$con) {
            $this->thrownew();
        }
        $this->config = $con;
    }

    /**
     * Connect to the DataBase
     */

    // instance singletonPattern
    private static $instance = null;

    // Connexion a la base de données
    public function connect(): void
    {
        //condition singletonPattern
        if (self::$instance === null) {
            try {
                self::$instance = new PDO('mysql:host=' . $this->config["DB_HOST"] . ';dbname=' . $this->config["DB_NAME"], $this->config["DB_USERNAME"], $this->config["DB_PASSWORD"]);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo 'Échec lors de la connexion : ' . $e->getMessage();
            }
        }
        $this->pdo = self::$instance;
    }
    public function getPDO()
    {
        return self::$instance;
    }

    /**
     * @throws Exception
     */
    private function thrownew(): void
    {
        throw new ('Fichier de configuration introuvable');
    }
}
