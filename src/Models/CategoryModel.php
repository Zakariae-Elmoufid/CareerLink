<?php

namespace App\Models;
use App\config\DataBaseConnection;


class CategoryModel{
    private $conn;
    private $db;

    public function __construct() {
        $this->db = new DataBaseConnection();  
        $this->conn = $this->db->connect(); 
    }

   public function  insertCategory($name){
    $query = "INSERT INTO category (namecategory) values(:namecategory)";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":namecategory",$name);
    if ($stmt->execute()) {
        $lastInsertId = $this->conn->lastInsertId(); // ID de la dernière insertion
        echo "Données ajoutées avec succès. ID : " . $lastInsertId;
    } else {
        echo "Erreur lors de l'ajout des données.";
    }


   }

}
?>