<?php

    class Database{

        private static $BD_URL = 'localhost';
        private static $BD_USER = 'id16320256_root';
        private static $BD_PASSWORD = '(>nCcxdZyL6TIh<E';
        private static $BD_NAME = 'id16320256_salmaclinic';
        private static $CHAR_MODE = 'utf-8';
        private $connection;

        function __construct()
        {
            $dsn = "mysql:host=" .Database::$BD_URL. ";dbname=".Database::$BD_NAME;
            try {
                $this->connection = new PDO($dsn, Database::$BD_USER, Database::$BD_PASSWORD);
                error_log("Database->__construct : Se ha establecido conexión con la base de datos");
            } catch (PDOException $e) {
                error_log("Database->__construct : No se pudo establecer conexión con la base de datos (".$e->getMessage().")");
                die($this->connection);
            }
        }

        public function query($query){
            return $this->connection->query($query);
        }

        public function prepare($query, $values = []){
            return $this->connection->prepare($query, $values);
        }



    }

?>