<?php
require_once __DIR__ . '/../../vendor/autoload.php';
use App\Classes\User;





if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $roleId = $_POST['role']; 


    $newuser = new User();
    

    $newuser->register( $username, $email, $password, $roleId);
    // $errors = $newuser->getErrors();
    if ($newuser->hasErrors()) {
        print_r($newuser->getErrors());
    }else{
        echo "Utilisateur enregistré avec succès";
    }

}






?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
   
<h1>Register</h1>
    <form action="" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" >
        <br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" ><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" ><br>

        <label for="role">Choose a Role:</label>
        <select name="role" id="role" >
            
           <?php
            $newuser = new User();
            $roles =$newuser->getRoles();

            foreach ($roles as $role) {
                echo '<option value="' . htmlspecialchars($role['id']) . '">' . htmlspecialchars($role['role_name']) . '</option>';
            }
           ?>
            
          
        </select><br>

        <button type="submit" class="text-red">Register</button>
    </form>
   

</body>
</html>
