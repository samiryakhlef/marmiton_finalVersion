<?php

namespace App\Model;

use PDO;
use App\Database\Database;

class ModelHome
    {
        public $id;
        public $name;
        public $description;
        public $ingredients;
        public $steps;
        public $difficulty;
        public $type;
        public $temps;
        public $imageName;
        public $created_at;
        public const TABLE_NAME = 'entrees';

        //j'instancie ma connexion à la base de données
        public function __construct()
        {
            $database = new Database();
            $this->pdo = $database->getPDO();
        }

    }
