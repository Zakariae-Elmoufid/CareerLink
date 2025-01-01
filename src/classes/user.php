<?php
// require_once __DIR__ . '/../../vendor/autoload.php';

namespace App\Classes;

use App\config\DataBaseConnection;
use PDO;
use PDOException;


class User {
    private $id;
    private $username;
    private $email;
    private $password;
    private $id_role;
    private $dbConnection;
    private $connection;



    public function __construct() {
        $this->dbConnection = new DataBaseConnection();  
        $this->connection = $this->dbConnection->connect();  
    }


    public function getUsername(){
        return $this->username;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setUsername($username){
       $this->username = $username;
    } 

    public function setEmail($email){
        $this->email = $email;
    }

    public function setPassword($password){
        $this->password = $password;
    }
    
     

    public function register($username, $email, $password, $roleId) {

        $query = "INSERT INTO user (username, email, password, id_role) VALUES (:username, :email, :password, :id_role)";
        $stmt = $this->connection->prepare($query);
        $stmt->execute([
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'id_role' => $roleId
        ]);
        
    }

    public function getRoles() {
        try {
            $sql = "SELECT * FROM role";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
    
            return $stmt->fetchAll(PDO::FETCH_ASSOC); 
        } catch (PDOException $e) {
            echo "Error fetching roles: " . $e->getMessage();
        }
       
    }
}



?>