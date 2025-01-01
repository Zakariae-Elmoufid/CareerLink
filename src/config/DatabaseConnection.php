<?php

namespace App\config;
use PDO;
use PDOException;
class DataBaseConnection {
    private $host = 'localhost';
    private $db = 'careerlink';
    private $username = 'root';
    private $password = '';
    private $connection;

    public function  connect(){
        $dsn = "mysql:host=$this->host;dbname=$this->db";
        try {
            $this->connection = new PDO($dsn, $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully"; 
            return $this->connection;
        } catch (PDOException $e) {
            echo "Connection failed: ". $e->getMessage();
        }
    }
}



?>