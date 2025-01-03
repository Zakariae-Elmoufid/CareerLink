<?php
namespace App\Models;

use App\Classes\Role;
use App\Classes\User;
use App\Config\DataBaseConnection;
use PDO;
use PDOException;




class UserModel{
    private $conn;
    private $db;

    public function __construct() {
        $this->db = new DataBaseConnection();  
        $this->conn = $this->db->connect(); 
    }

    public function findUserByEmailAndPassword($email, $password){
        $query = "SELECT * FROM user 
        join  role on role.id = user.id_role 
        WHERE email = :email";

        $stmt = $this->conn->prepare($query); 
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        
        $row = $stmt->fetch(mode: PDO::FETCH_ASSOC);

       
        
        if ($row and !password_verify($password, hash: $row['password'])){
        // $role = new Role($row["id"], $row["role_name"]);
        // $user =  new User($row['username'], $row["email"],  $row["password"], $row["id_role"]);
         return  $row['role_name'] ;

        } else {
             return  null;
         }
    }


    public function saveUser($username, $email, $password, $roleId){
        $user = new User( $username,$email,$password, $roleId);

        $user ->setUsername($username);
        $user ->setEmail($email);
        $user ->setPassword($password);
        $user ->setId_role($roleId);

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO user (username, email, password, id_role) VALUES (:username, :email, :password, :id_role)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':id_role',$roleId);
        $stmt->execute();
        return  $user;

    }

    public function getRoles() {
        try {
            $sql = "SELECT * FROM role";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // $role =  new Role( $row["id"],  $row["role_name"]);
    
            return  $row ;

        } catch (PDOException $e) {
            echo "Error fetching roles: " . $e->getMessage();
        }
       
    }

}