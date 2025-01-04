<?php
require_once __DIR__ . '/../../../vendor/autoload.php';
use App\Controllers\AuthController;


if(isset($_POST["submit"]))
{


        $email = $_POST["email"];
        $password = $_POST["password"];
        $authController = new AuthController();
        $errors  =   $authController->login($email,$password);
        


}


  





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../output.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>login</title>
</head>
<body>
   
<?php 
include "../components/header.php";
?>
<div class="w-full max-w-md mx-auto my-10 bg-white rounded-lg shadow-md p-6">
    <h2 class="text-2xl font-bold text-green-600 text-center mb-6">Login</h2>

    <form  method="POST">
      <!-- Email Input -->
      <div class="mb-4">
        <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
        <input
          type="email"
          id="email"
          name="email"
          placeholder="Enter your email"
          class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
          required
        />
        <small class="text-red-500"><?php echo $errors['email'] ?? '' ; ?></small>

      </div>

      <!-- Password Input -->
      <div class="mb-4">
        <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
        <input
          type="password"
          id="password"
          name="password"
          placeholder="Enter your password"
          class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
          required
        />
        <small class="text-red-500"><?php echo $errors['password'] ?? '' ; ?></small>

      </div>

      <!-- Submit Button -->
      <div>
        <button
          type="submit"
          name="submit"
          class="w-full bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500"
        >
          Login
        </button>
      </div>
    </form>

    <!-- Additional Links -->
    <p class="text-center text-sm text-gray-600 mt-4">
      Don't have an account? <a href="#" class="text-green-600 hover:underline">Sign up</a>
    </p>
  </div>
   <?php
   include "../components/footer.php";
   ?>
</body>
</html>

