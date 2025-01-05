<?php
session_start();

require_once __DIR__ . '/../../../vendor/autoload.php';


use App\Classes\Joboffer;

$display = new  Joboffer();
$jobOffers = $display->displayoffers(); 
 


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recruiter Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- header section   -->
    <?php 
        include "../components/headerAdmin.php";
        ?>
  <!-- Sidebar -->
  <?php
  include "../components/sidbarRecruiter.php";
  ?>
    <!-- Main Content -->
    <div class="w-4/5 p-10">


    <!-- hello Section -->  

    <div class="bg-green-200 w-full h-40 mx-auto flex justify-between items-center relative">
       <div class="pl-10">
        <h2>Welcome back <?php echo $_SESSION['username']?>!👋</h2>
       </div>
        <img
        class="w-50 h-40  absolute  right-12 bottom-7"
        src="../assets/images/Welcomepage.png" alt="">
    </div>
      
     

      <!-- Statistics Section -->
      <section id="stats">
        <h3 class="text-2xl font-bold text-green-600 mb-5">Statistics</h3>
        <div class="grid grid-cols-3 gap-6">
          <!-- Total Categories -->
          <div class="bg-white p-6 rounded shadow text-center">
            <h4 class="text-xl font-bold text-gray-700">Total Categories</h4>
            <p id="total-categories" class="text-3xl font-bold text-green-600 mt-2">12</p>
          </div>
          <!-- Total Tags -->
          <div class="bg-white p-6 rounded shadow text-center">
            <h4 class="text-xl font-bold text-gray-700">Total Tags</h4>
            <p id="total-tags" class="text-3xl font-bold text-green-600 mt-2">34</p>
          </div>
          <!-- Posts -->
          <div class="bg-white p-6 rounded shadow text-center">
            <h4 class="text-xl font-bold text-gray-700">Posts with Tags</h4>
            <p id="posts-with-tags" class="text-3xl font-bold text-green-600 mt-2">45</p>
          </div>
        </div>
      </section>
  
      <?php

foreach ($jobOffers as $jobOffer) {
    ?>
    <div class="max-w-lg mx-auto my-10 bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="px-6 py-4">
            <h2 class="text-2xl font-semibold text-center text-gray-800"><?= $jobOffer['company_name']; ?></h2>
            <p class="text-center text-gray-600"><?= $jobOffer['position']; ?></p>
        </div>

        <div class="px-6 py-4 flex justify-between">
            <div class="w-2/3">
                <p class="text-gray-700"><strong>Description:</strong> <?= $jobOffer['description']; ?></p>
                <p class="text-gray-700 mt-2"><strong>Lieu:</strong> <?= $jobOffer['location']; ?></p>
                <p class="text-gray-700 mt-2"><strong>Salaire:</strong> <?= $jobOffer['salary']; ?> EUR</p>
                <p class="text-gray-700 mt-2"><strong>Catégorie:</strong> <?= $jobOffer['id_category']; ?></p>
            </div>
            <div class="w-1/3 flex justify-center items-center">
               
                    <img src="uploads/<?= $jobOffer['photo']; ?>" alt="Logo de l'entreprise" class="w-32 h-32 object-cover rounded-full border-2 border-gray-200">
                
                
            </div>
        </div>

        <div class="px-6 py-4 text-center">
            <button class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition duration-200">
                Postuler
            </button>
        </div>
    </div>
    <?php
}
?>



    </div>
  </div>

 
</body>
</html>
