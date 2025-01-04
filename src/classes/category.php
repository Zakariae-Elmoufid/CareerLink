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


  public function displayCategorys(){
       $fetch = new CategoryModel() ;
       $rows =  $fetch->fetchAllCategory();
      return $rows;
  } 
  
  public function displayCategory($id){
    $fetch = new CategoryModel();
    $row = $fetch->fechCategoryById($id);
    return $row;
  }
  public function updateCategory($id,$name){
    

    $this->setName($name);

    if (empty($this->getErrors())) {
      $update = new CategoryModel();
      $update->editCategory($id,$name);
    }else {
        return $this->getErrors();
    }
   
  }

  // public function deletCategory($id){
  //   $query = "DELETE FROM category  WHERE id = :id";
  //   $stmt = $this->connection->prepare($query);
  //   $stmt-> bindParam(":id",$id);
  //   $stmt->execute();

  //   echo "category deleted successful ";
  // }


}


?> 