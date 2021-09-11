<?php
    abstract class Model{

        protected $database;
        function __construct()
        {
            $this->database = new Database();
        }

        abstract function get($id);
        abstract function getAll();
        abstract function delete($id);
        abstract function update($id);
        abstract function save($id);

        
    }

?>