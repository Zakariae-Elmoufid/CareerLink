<?php

namespace App\Classes;

use App\config\DataBaseConnection;
use PDO;
use PDOException;


class Tag {
  private $name;
  private $dbConnection;
  private $connection;

  public function __construct() {
    $this->dbConnection = new DataBaseConnection();  
    $this->connection = $this->dbConnection->connect();  
}
  
  public function getTag_name(){
    return $this->name;
  }

  public function setTag_name($name){
     $this->name = $name;
  }


  public function addTag($name){
      $query = "INSRT INTO tag (nametag) values(:nametag)";
      $stmt = $this->connection->prepare($query);
      $stmt->bindParam(":nametag",$name);
      $stmt->execute();
  }


  public function displayTag(){
    $query = "SELECT  * FROM tag ";
    $stmt = $this->connection->prepare($query);
    $stmt->execute();
    $result =  $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  } 
  
  public function updateTag($id,$name){
    $query = "UPDATE tag  SET nametag  = :nametag WHERE id = :id";
    $stmt =  $this->connection->prepare($query);
    $stmt-> bindParam(":id",$id);
    $stmt-> bindParam(":nametag",$name);
    $stmt->execute();

    echo "tag up dated successful ";

  }

  public function deletTag($id){
    $query = "DELETE FROM tag  WHERE id = :id";
    $stmt = $this->connection->prepare($query);
    $stmt-> bindParam(":id",$id);
    $stmt->execute();

    echo "tag deleted successful ";
  }


}


?> 