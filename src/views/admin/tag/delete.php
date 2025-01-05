<?php 

require_once __DIR__ . '/../../../../vendor/autoload.php';
use App\Classes\Tag;

 if(isset($_GET['id'])) {
    $id = $_GET['id'];
}    

   $deleteCategory = new Tag();
   $result  = $deleteCategory->deleteTag($id);
   

   if($result){
       echo "Tag deleted successuful ! ";
       header("Location: index.php");

   }
?> 