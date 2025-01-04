<?php

namespace App\Classes;

// use App\config\DataBaseConnection;
use App\Models\CategoryModel;
// use PDO;
// use PDOException;


class Category {
  private $name;
  private $dbConnection;
  private $connection;
  private $errors = [];

  public function __construct($name) {
    $this->name = $name;
}
public function validateInput($name) {
  return  preg_match("/^[a-zA-Z0-9_]{3,20}$/", $name);
}  


public function getName(){
  return $this->name;
}

public function setName($name){
  if ($this->validateInput($name)) {
    $this->name = $name;
}else{
    $this->errors['name']= "Invalid name . It must be 3-20 characters ";
}
    
  }

  public function getErrors() {
    return $this->errors;
}


  public function addCategory($name){
    $this->setName($name);

    if (empty($this->getErrors())) {
      $addCategoryModel = new CategoryModel();
       $addCategoryModel->insertCategory($name);
      
    }else {
        return $this->getErrors();
         
    
    }
  
}


  // public function displayCategory(){
  //   $query = "SELECT  * FROM category ";
  //   $stmt = $this->connection->prepare($query);
  //   $stmt->execute();
  //   $result =  $stmt->fetchAll(PDO::FETCH_ASSOC);
  //   return $result;
  // } 
  
  // public function updateCategory($id,$name){
  //   $query = "UPDATE category  SET namecategory  = :namecategory WHERE id = :id";
  //   $stmt =  $this->connection->prepare($query);
  //   $stmt-> bindParam(":id",$id);
  //   $stmt-> bindParam(":namecategory",$name);
  //   $stmt->execute();

  //   echo "category up dated successful ";

  // }

  // public function deletCategory($id){
  //   $query = "DELETE FROM category  WHERE id = :id";
  //   $stmt = $this->connection->prepare($query);
  //   $stmt-> bindParam(":id",$id);
  //   $stmt->execute();

  //   echo "category deleted successful ";
  // }


}


?> 