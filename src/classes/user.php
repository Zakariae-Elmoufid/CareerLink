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
    private $errors = [];



    public function __construct() {
        $this->dbConnection = new DataBaseConnection();  
        $this->connection = $this->dbConnection->connect();  
    }

    

    private function validateInput($data, $key) {
        switch ($key) {
            case 'username':
                return preg_match("/^[a-zA-Z0-9_]{3,20}$/", $data);
            case 'email':
                return filter_var($data, FILTER_VALIDATE_EMAIL); 
            case 'password':
                return strlen($data) >= 8; 
            default:
                return false;
        }
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
        if ($this->validateInput($username, 'username')) {
            $this->username = $username;
        }else{
            $this->errors['username']= "Invalid username. It must be 3-20 characters long and contain only letters, numbers, and underscores.";
        }
    } 

    public function setEmail($email){
        if ($this->validateInput($email, "email")){
            $this->email = $email;
        }else{
            $this->errors ['email'] = "Invalid email format.";
        }
    }

    public function setPassword($password){
        if ($this->validateInput($password, 'password')) {
            $this->password = $password;
        }else{
            $this->errors ['password'] = "Password must be at least 8 characters long.";
        }
    }
    public function setRole($role){
         $this->role = $role;
    }
    
    public function getErrors() {
        return $this->errors;
    }
    public function hasErrors() {
        return !empty($this->errors);
    }

    public function login($enteredEmail, $enteredPassword) {
       
    $query = "SELECT * FROM user WHERE email = :email ";
    $stmt = $this->connection->prepare($query);
    $stmt->bindParam(':email', $enteredEmail);
    $stmt->execute();
    
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    
    // Fetch the user
    print_r($user);
    if ($user && password_verify($enteredPassword, $user['password'])) {
        return $user;
    } else {
        return "Invalid username or password.";
    }
    
    }
   
    

    public function register($username, $email, $password, $role) {

       
        $this->setUsername($username);
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setRole($role);
        
        if (empty($this->errors)) {


        $hashedPassword = password_hash($this->password, PASSWORD_BCRYPT);
        $query = "INSERT INTO user (username, email, password, id_role) VALUES (:username, :email, :password, :id_role)";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':id_role',$this->role);
        $stmt->execute();
        
    }
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