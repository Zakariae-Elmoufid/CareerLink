<?php
namespace App\Controllers;

// use App\Classes\User;
// use App\Classes\Role;
// use App\Config\DataBaseConnection;
use App\Models\UserModel;
// use PDO;

class AuthController{

 
 
    public function login($email, $password){
        $userModel = new UserModel();
        $user =  $userModel->findUserByEmailAndPassword($email, $password);
        if($user == null)
        {
            echo "user not found please check ..." . $user;
        }
        else{
            if($user == "admin")
            {
                header("Location:../admin/index.php");
            }
            else if($user == "candidate")
            {
              header("Location:../candidate/index.php");
            }
            else if($user == "recruiter")
            {
              header("Location:../recruiter/index.php");
            }else{
                return $user;
            }
            
        }
    }

       

    public function register( $username, $email, $password, $roleId){
        $userModel = new UserModel();
         $user  = $userModel->saveUser($username, $email, $password, $roleId);

         
            if($user == "3")
            {
                header("Location:../admin/index.php");
            }
            else if($user == "1")
            {
              header("Location:../candidate/index.php");
            }
            else if($user == "2")
            {
              header("Location:../recruiter/index.php");
            }else{
                return $user;
            }
            
         
    }


}


?>