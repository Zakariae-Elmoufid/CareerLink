<?php
require_once __DIR__ . '/../../../vendor/autoload.php';
use App\Classes\User;

    $enteredEmail = $_GET['enteredEmail'];
    $enteredPassword =  $_GET['enteredPassword'];

    $newuser = new User();
    $user =  $newuser->login($enteredEmail,$enteredPassword );
 
   
       echo "welcome".$user['username'];
   
  





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
   

    <h1>login</h1>
    
    <form action="" method="GET">
        <label for="email">Email:</label>
        <input type="email" name="enteredEmail" id="email" required><br>

        <label for="password">Password:</label>
        <input type="password" name="enteredPassword" id="password" required><br>

        <button type="submit">Login</button>
    </form>

</body>
</html>

