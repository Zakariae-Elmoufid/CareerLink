<?php 

require_once __DIR__ . '/../../../../vendor/autoload.php';
use App\Classes\Category;

 if(isset($_GET['id'])) {
    $id = $_GET['id'];
}    

   $deleteCategory = new Category("");
   $result  = $deleteCategory->deletCategory($id);
   

   if($result){
       echo "category deleted successuful ! ";
       header("Location: index.php");

   }
?> 