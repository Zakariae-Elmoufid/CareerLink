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
    joboffer.position";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result =  $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

 
}

?>
