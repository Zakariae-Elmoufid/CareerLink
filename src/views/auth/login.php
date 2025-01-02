<?php
require_once __DIR__ . '/../../../vendor/autoload.php';
use App\Classes\User;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $enteredEmail = $_POST['enteredEmail'];
    $enteredPassword =  $_POST['enteredPassword'];

    $newuser = new User();
    $user =  $newuser->login($enteredEmail,$enteredPassword );
 
   
    print_r($user);
    // echo  htmlspecialchars($user['username']);



}

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
    
    <form action="" method="POST">
        <label for="email">Email:</label>
        <input type="email" name="enteredEmail" id="email" required><br>

        <label for="password">Password:</label>
        <input type="password" name="enteredPassword" id="password" required><br>

        <button type="submit">Login</button>
    </form>

</body>
</html>

