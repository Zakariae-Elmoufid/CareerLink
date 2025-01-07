<?php 
 session_start();
 if(!isset($_SESSION["id"]) && !isset($_SESSION["role"]) && $_SESSION["role"] != "admin"){
     header("Location: ../auth/login.php");
     exit();
 
 }
 
  print_r($_SESSION);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>candidate</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <?php 
        include "../components/headerAdmin.php";
        ?>

<section class="bg-gray-100 py-12">
    <!-- header section   -->
  <div class="container mx-auto flex flex-col lg:flex-row items-start gap-8 px-6">
    <!-- Left Sidebar - Profile Card -->
    <div class="w-full lg:w-1/4 bg-white rounded-lg shadow-lg p-6">
      <div class="flex items-center gap-4 mb-4">
        <img
          src="https://via.placeholder.com/80"
          alt="Profile Picture"
          class="w-20 h-20 rounded-full border-2 border-grren-500"
        />
        <div>
          <h2 class="text-xl font-bold text-gray-800">Zakariae Elmoufid</h2>
          <p class="text-sm text-gray-600">Full-Stack Web Developer</p>
        </div>
      </div>
      <div class="mb-4">
        <p class="text-sm text-gray-500">Profile viewers: <span class="font-medium">25</span></p>
        <p class="text-sm text-gray-500">Post impressions: <span class="font-medium">13</span></p>
      </div>
      <button class="w-full bg-green-500 text-white py-2 rounded-md hover:bg-green-600 transition">
        Try Premium for MAD0
      </button>
    </div>

    <!-- Right Section - Hero Content -->
    <div class="w-full lg:w-3/4">
      <!-- Banner -->
      <div class="bg-green-100 rounded-lg p-6 mb-6">
        <h1 class="text-2xl font-bold text-green-900">
          The average career is 42 years. Invest in your long-term growth.
        </h1>
        <p class="text-gray-600 mt-2">Try Premium for free for 1 month. Cancel anytime.</p>
        <button class="mt-4 bg-green-500 text-white px-6 py-2 rounded-md hover:bg-green-600 transition">
          Try Premium for MAD0
        </button>
      </div>

    
    </div>
  </div>
</section>


</body>
</html>