<?php

namespace App\Classes;

use App\Models\TagModel;


class Tag {
  private $name;

  
  private $errors = [];


  public function __construct() {
     
  }
  
  public function getTag_name(){
    return $this->name;
  }
  public function getErrors() {
    return $this->errors;
}

  public function setTag_name($name){
       $patter = "/^[a-zA-Z0-9_]{3,20}$/";
    if (preg_match($patter, $name)) {
      $this->name = $name;
  }else{
      $this->errors['name']= "Invalid name . It must be 3-20 characters ";
  }
     
  }


  public function addTag($name){
      $this->setTag_name($name);
      if (empty($this->getErrors())) {
      $insert = new TagModel();
      return $insert->insertTag($name);
      }else{
        return $this->getErrors();
      }
  }


  public function displayTag(){
    $fetch = new TagModel();
    return $fetch->fetchAllTags();
  } 
  
  // public function updateTag($id,$name){
  //   $query = "UPDATE tag  SET nametag  = :nametag WHERE id = :id";
  //   $stmt =  $this->connection->prepare($query);
  //   $stmt-> bindParam(":id",$id);
  //   $stmt-> bindParam(":nametag",$name);
  //   $stmt->execute();

  //   echo "category up dated successful ";

  // }

  // public function deletTag($id){
  //   $query = "DELETE FROM category  WHERE id = :id";
  //   $stmt = $this->connection->prepare($query);
  //   $stmt-> bindParam(":id",$id);
  //   $stmt->execute();

  //   echo "category deleted successful ";
  // }


}


?> 