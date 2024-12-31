<?php
class User {

    private string $username;
    private string $email;
    private string $password ;

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

    
}
?>