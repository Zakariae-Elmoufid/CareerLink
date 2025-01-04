<?php

namespace App\Models;
// use App\Classes\Category;
use App\config\DataBaseConnection;
use PDO;


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
        echo  "Données ajoutées avec succès. ID : " . $lastInsertId;
    } 
   }

   public function fetchAllCategory(){
        $query = "SELECT  * FROM category ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result =  $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
   }

}
?>