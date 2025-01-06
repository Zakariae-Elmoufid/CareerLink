<?php
namespace App\Controllers;


use App\Models\UserModel;


class AuthController{

 
 
    public function login($email, $password){
        $userModel = new UserModel();
        $user =  $userModel->findUserByEmailAndPassword($email, $password);
        if($user == null)
        {
            echo "user not found please check ..." . $user;
        }
        else{
            if($user['name_role'] == "admin"){ 
                session_start();
               
                  $_SESSION['id'] = $user['iduser'];
                  $_SESSION['username'] =  $user['username'];
                  $_SESSION['is_logged_in'] = true;

                
                //   header("Location:../admin/index.php");
            }
            
            else if($user['name_role'] == "candidate")
            {
                session_start();
               
                $_SESSION['id'] = $user['iduser'];
                $_SESSION['username'] =  $user['username'];
                $_SESSION['is_logged_in'] = true;

              header("Location:../candidate/index.php");
            }
            else if($user['name_role'] == "recruiter")
            {
                session_start();
               
                  $_SESSION['id'] = $user['iduser'];
                  $_SESSION['username'] =  $user['username'];
                  $_SESSION['is_logged_in'] = true;

              header("Location:../recruiter/index.php");
            }else{
                return $user['role_name'];
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