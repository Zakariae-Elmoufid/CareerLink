<?php

namespace App\Models;
use App\config\DataBaseConnection;
use PDO;

class TagModel{
    
    private $conn;
    private $db;

    public function __construct(){
        $this->db = new DataBaseConnection;
        $this->conn = $this->db->connect();
    }

    public function fetchAllTags(){
        $query = "SELECT  * FROM tag ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result =  $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}
