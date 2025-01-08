<?php 

namespace App\Models;
use App\config\DataBaseConnection;
use PDO;
class JobofferModel{
    private $conn;
    private $db;

    public function __construct(){
        $this->db = new DataBaseConnection;
        $this->conn = $this->db->connect();
    }

    public function insertPost($company,$position,$description,$salary,$location,$category,$tags,$filePath,$idUser){
        
    $query = "INSERT INTO joboffer (company_name, description, salary, location, id_category, id_user, photo, position) 
    VALUES (:company, :description, :salary, :location, :category, :idUser, :filePath, :position)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":company", $company);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":salary", $salary);
        $stmt->bindParam(":location", $location);
        $stmt->bindParam(":category", $category);
        $stmt->bindParam(":idUser", $idUser);
        $stmt->bindParam(":filePath", $filePath);
        $stmt->bindParam(":position", $position);
        $stmt->execute();

        $jobOfferId = $this->conn->lastInsertId();
    

        foreach ($tags as $tagId) {
        $tagQuery = "INSERT INTO joboffer_tags (joboffer_id, tag_id) VALUES (:joboffer_id, :tag_id)";
        $tagStmt = $this->conn->prepare($tagQuery);
        $tagStmt->bindParam(':joboffer_id',$jobOfferId);
        $tagStmt->bindParam(':tag_id', $tagId);
        $tagStmt->execute();  
        }

    }
    
    public function fetchoffers(){
        $query = "SELECT 
        joboffer.id AS job_id, 
        joboffer.company_name, 
        joboffer.description, 
        joboffer.salary, 
        joboffer.location, 
        joboffer.id_category,
        category.namecategory, 
        joboffer.photo, 
        joboffer.position,
        joboffer.created_at,
        GROUP_CONCAT(tag.nametag) AS tags
        FROM 
            joboffer
        LEFT JOIN 
            joboffer_tags ON joboffer.id = joboffer_tags.joboffer_id
        left join 
        tag on tag.id =     joboffer_tags.tag_id
        inner join category on category.id = joboffer.id_category

        GROUP BY 
        joboffer.id, 
        joboffer.company_name, 
        joboffer.description, 
        joboffer.salary, 
        joboffer.location, 
        joboffer.id_category, 
        joboffer.photo, 
        joboffer.created_at,
        joboffer.position";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result =  $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }



    public function fetchOfferById($id){
        $query = "SELECT 
        joboffer.id , 
        joboffer.company_name, 
        joboffer.description, 
        joboffer.salary, 
        joboffer.location, 
        joboffer.id_category,
        category.namecategory, 
        joboffer.photo, 
        joboffer.position,
        GROUP_CONCAT(tag.nametag) AS tags
        FROM 
            joboffer
        LEFT JOIN 
            joboffer_tags ON joboffer.id = joboffer_tags.joboffer_id
        left join 
        tag on tag.id =     joboffer_tags.tag_id
        inner join category on category.id = joboffer.id_category
           Where joboffer.id  = :id
        GROUP BY 
        joboffer.id, 
        joboffer.company_name, 
        joboffer.description, 
        joboffer.salary, 
        joboffer.location, 
        joboffer.id_category, 
        joboffer.photo, 
        joboffer.position";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $result;
    }
    
    public function editPost($id, $company, $position, $description, $salary, $location, $categorie, $tags, $filePath, $userId) {
        $query = "UPDATE `joboffer` 
                  SET `company_name` = :company,
                      `description` = :description,
                      `salary` = :salary,
                      `location` = :location,
                      `id_category` = :id_category,
                      `id_user` = :user,
                      `photo` = :image,
                      `position` = :position
                  WHERE `id` = :id";
                  
        $stmt = $this->conn->prepare($query);
    
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':company', $company);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':salary', $salary);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':id_category', $categorie);
        $stmt->bindParam(':user', $userId);
        $stmt->bindParam(':image', $filePath);
        $stmt->bindParam(':position', $position);
        $stmt->execute();
          
      
    

        $deleteQuery = "DELETE FROM `joboffer_tags` WHERE `joboffer_id` = :joboffer_id";
        $deleteStmt = $this->conn->prepare($deleteQuery);
        $deleteStmt->bindParam(':joboffer_id', $id);
        $deleteStmt->execute();


        foreach ($tags as $tagId) {
            $insertQuery = "INSERT INTO `joboffer_tags` (`joboffer_id`, `tag_id`) 
                    VALUES (:joboffer_id, :tag_id)";
            $insertStmt = $this->conn->prepare($insertQuery);
            $insertStmt->bindParam(':joboffer_id', $id);
            $insertStmt->bindParam(':tag_id', $tagId);
            $insertStmt->execute();
        }

        header("Location: ../../../views/recruiter/index.php");


    }


    public function removeOffer($id){
        $query = "DELETE FROM joboffer WHERE  id = :id ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id' ,$id);
        return $stmt->execute();
    }

    public function fetchLastOffers(){
      $query = "SELECT 
        joboffer.id AS job_id, 
        joboffer.company_name, 
        joboffer.description, 
        joboffer.salary, 
        joboffer.location, 
        joboffer.id_category,
        category.namecategory, 
        joboffer.photo, 
        joboffer.position,
        joboffer.created_at,
        GROUP_CONCAT(tag.nametag) AS tags
        FROM 
            joboffer
        inner JOIN 
            joboffer_tags ON joboffer.id = joboffer_tags.joboffer_id
        inner join 
        tag on tag.id =     joboffer_tags.tag_id
        inner join category on category.id = joboffer.id_category

        GROUP BY 
        joboffer.id, 
        joboffer.company_name, 
        joboffer.description, 
        joboffer.salary, 
        joboffer.location, 
        joboffer.id_category, 
        joboffer.photo, 
        joboffer.created_at,
        joboffer.position
        ORDER BY job_id DESC
        LIMIT 6";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result =  $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function apply($jobId,$userId){
        $query = "INSERT INTO `apply` (`id_user`, `id_joboffer`)
        VALUES (:user,:job )";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user',$userId);
        $stmt->bindParam(':job',$jobId);
         $stmt->execute();

    }

    public function fetchApplay(){
        $query = "SELECT username , email , date_apply ,position
        FROM apply
        inner join  `user` on `user`.id = apply.id_user
        inner join joboffer on joboffer.id = apply.id_joboffer";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result =  $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
        
    }


    public function selectcount(){
        $query = "Select COUNT(id_user) FROM apply";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result =  $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }


    public function CandidateApplay($id){
        $query = " SELECT count(id_joboffer)
        FROM apply
        WHERE id_user = :id";
         $stmt = $this->conn->prepare($query);
         $stmt->bindParam(':id',$id);
         $stmt->execute();
         $result =  $stmt->fetch(PDO::FETCH_ASSOC);
         return $result;
    }


    

}

?>
