<?php
require_once __DIR__ . '/../../vendor/autoload.php';
use App\Classes\User;





if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $roleId = $_POST['role']; // ID du rôle sélectionné

    // Instancier l'objet User
    $zakaria = new User();
    $userId = $zakaria->register($username, $email, $password, $roleId);

    echo "Utilisateur enregistré avec succès, ID : $userId";
}

$user = new User();
$roles = $user->getRoles();

echo '<pre>';
print_r($roles);
echo '</pre>';

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
        <input type="text" name="username" id="username" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>

        <label for="role">Choose a Role:</label>
        <select name="role" id="role" required>
            <!-- Options seront affichées ici -->
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
