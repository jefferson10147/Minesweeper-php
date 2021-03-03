<?php

    include ("./database_connection.php");

    class Scores extends DataBase{

        private $table = "scores";
        
        public function __construct(){ }

        public function getAllScores(){

            parent::connectToDB();
            $connection = parent::getConnection();

            try{
                $query = "SELECT * FROM ".$this->table."  ORDER BY time ASC";  
                return $connection->query($query)->fetchAll();
            
            }catch (Exception $e){
                exit ("ERROR: ".$e->getMessage());
            }

            parent::disconnectDB();
        }

        public function insertScore($name, $time, $level){
            parent::connectToDB();
            $connection = parent:: getConnection();
            
            try{
                $query = "INSERT INTO scores (Id, name, time, level) VALUES (NULL, ?, ?, ?);";
                $connection->prepare($query)->execute([$name, $time, $level]);
            
            }catch (Exception $e){
                exit ("ERROR: ".$e->getMessage());
            }

            parent::disconnectDB();

        }

    }

?>