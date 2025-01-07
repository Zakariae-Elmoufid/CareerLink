<?php 

require_once __DIR__ . '/../../../vendor/autoload.php';
use App\Classes\Joboffer;

  if(isset($_GET['id'])){
    $id = $_GET['id'];
  } 
   
  $deleteOffer = new Joboffer();
  $result = $deleteOffer->deleteOffer($id);
  if($result){
    echo "Tag deleted successuful ! ";
    header("Location: index.php");
}

?>