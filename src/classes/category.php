<?php

namespace App\Classes;

use App\config\DataBaseConnection;
use PDO;
use PDOException;


class Category {
  private $name;
  private $dbConnection;
  private $connection;

  public function __construct() {
    $this->dbConnection = new DataBaseConnection();  
    $this->connection = $this->dbConnection->connect();  
}
  
  public function getCategory_name(){
    return $this->name;
  }

  public function setCategory_name($name){
     $this->name = $name;
  }


  public function addCategory($name){
      $query = "INSRT INTO category (namecategory) values(:namecategory)";
      $stmt = $this->connection->prepare($query);
      $stmt->bindParam(":namecategory",$name);
      $stmt->execute();
  }


  public function displayCategory(){
    $query = "SELECT  * FROM category ";
    $stmt = $this->connection->prepare($query);
    $stmt->execute();
    $result =  $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  } 
  
  public function updateCategory($id,$name){
    $query = "UPDATE category  SET namecategory  = :namecategory WHERE id = :id";
    $stmt =  $this->connection->prepare($query);
    $stmt-> bindParam(":id",$id);
    $stmt-> bindParam(":namecategory",$name);
    $stmt->execute();

    echo "category up dated successful ";

  }

  public function deletCategory($id){
    $query = "DELETE FROM category  WHERE id = :id";
    $stmt = $this->connection->prepare($query);
    $stmt-> bindParam(":id",$id);
    $stmt->execute();

    echo "category deleted successful ";
  }


}


?> 