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


   public function fechCategoryById($id){
    $query = "SELECT  * FROM category WHERE id = $id";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $result =  $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
   }

   public function editCategory($id,$name){
    $query = "UPDATE category  SET namecategory  = :namecategory WHERE id = :id";
    $stmt =  $this->conn->prepare($query);
    $stmt-> bindParam(":namecategory",var: $name);
    $stmt-> bindParam(":id",$id);
    $result = $stmt->execute();
    return $result;
  }

  public function delete($id){
    $query = "DELETE FROM category  WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt-> bindParam(":id",$id);
    return $stmt->execute();
  }
}
?>