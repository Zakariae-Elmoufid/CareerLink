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
            echo "user not found please check ..." . print_r($user);
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
            }
            echo "hello zakariar <br>";
            var_dump($user);
        }
    }

       

    public function register( $username, $email, $password, $roleId){
        $userModel = new UserModel();
         $user  = $userModel->saveUser($username, $email, $password, $roleId);

         if($user == null)
         {
             echo "user not found please check ...";
         }
         else{
             if($user->getRole()->getName() == "admin")
             {
                 header("Location:../admin/index.php");
             }
             else if($user->getRole()->getName() == "candidate")
             {
               header("Location:../candidate/index.php");
             }
             else if($user->getRole()->getName() == "recruiter")
             {
               header("Location:../recruiter/index.php");
             }
         }
    }


}


?>