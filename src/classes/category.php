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


  public function 



}


?> 