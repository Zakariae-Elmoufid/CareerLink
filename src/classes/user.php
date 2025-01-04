<?php


namespace App\Classes;

// use PDO;
// use PDOException;


class User {
    private $id;
    private $username;
    private $email;
   
    private $password;
    private $id_role;
   

    public function __construct($username, $email, $password ,$id_role) {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->id_role = $id_role;
     
    }

    private $errors = [];





    

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
    public function getId_role(){
        return $this->id_role;
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
    public function setId_role($id_role){
         $this->id_role = $id_role;
    }
    
    public function getErrors() {
        return $this->errors;
    }
    

   
   
    

    // public function register($username, $email, $password, $id_role) {

       
    //     $this->setUsername($username);
    //     $this->setEmail($email);
    //     $this->setPassword($password);
    //     $this->setRole($id_role);
        
    //     // if (!empty($this->errors)) {
    //     //     // Retourner les erreurs de validation
    //     //     return $this->errors;
    //     // }
    //     $hashedPassword = password_hash($this->password, PASSWORD_BCRYPT);
        

    //     $query = "INSERT INTO user (username, email, password, id_role) VALUES (:username, :email, :password, :id_role)";
    //     $stmt = $this->connection->prepare($query);
    //     $stmt->bindParam(':username', $this->username);
    //     $stmt->bindParam(':email', $this->email);
    //     $stmt->bindParam(':password', $hashedPassword);
    //     $stmt->bindParam(':id_role',$this->id_role);
    //     $stmt->execute();
        
    
    // }

// public function login($enteredEmail, $enteredPassword) {
       
//     $query = "SELECT * FROM user WHERE email = :email ";
//     $stmt = $this->connection->prepare($query);
//     $stmt->bindParam(':email', $enteredEmail);
//     $stmt->execute();
    
//     $user = $stmt->fetch(mode: PDO::FETCH_ASSOC);

    
    
//     if (isset($user) and password_verify($enteredPassword, $user['password'])){
      
//             // echo "password  hach : " . $user['password'] . "<br>";
//             // echo "password saisi par l'utilisateur : " . $enteredPassword . "<br>";
          
//             return $user;
        
//     } else {
//         return  "No user found with this email.";
//     }
//    }

   
}



?>