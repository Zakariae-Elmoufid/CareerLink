<?php

class DataBaseConnection {
    private $host = 'localhost';
    private $db = 'careerlink';
    private $username = 'root';
    private $password = '';
    private $connexion;

    public function  connect(){
        $dsn = "mysql:host=$this->host;dbname=$this->db";
        try {
            $this->connexion = new PDO($dsn, $this->username, $this->password);
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully"; 
            return $this->connexion;
        } catch (PDOException $e) {
            echo "Connection failed: ". $e->getMessage();
            return null;
        }
    }
}
$conn = new DataBaseConnection();
$conn->connect();

?>