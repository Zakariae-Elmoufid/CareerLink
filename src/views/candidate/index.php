<?php 
require_once __DIR__ . '/../../../vendor/autoload.php';
use App\Classes\Joboffer;
 session_start();
 if(!isset($_SESSION["id"]) && !isset($_SESSION["role"]) && $_SESSION["role"] != "admin"){
     header("Location: ../auth/login.php");
     exit();
 
 }

    $lastOffers = new Joboffer();
    $jobOffers =  $lastOffers->findNewOffer(); 

  print_r($offers);
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
      <!-- Post -->
      <?php 
      foreach ($jobOffers as $jobOffer) {
      ?>
      <div class="max-w-lg mx-auto my-10 bg-white rounded-lg shadow-lg overflow-hidden">
        
        <div class="px-6 py-4 flex justify-between">
          <div class="w-2/3">
            <p class="text-gray-700"><strong>Description:</strong> <?= $jobOffer['description']; ?></p>
            <p class="text-gray-700 mt-2"><strong>Location:</strong> <?= $jobOffer['location']; ?></p>
            <p class="text-gray-700 mt-2"><strong>Salary:</strong> <?= $jobOffer['salary']; ?> EUR</p>
            <p class="text-gray-700 mt-2"><strong>Category:</strong> <?= $jobOffer['namecategory']; ?></p>
            <p class="text-gray-700 mt-2"><strong>Date publie:</strong> <?= $jobOffer['created_at']; ?></p>
            <span class="text-gray-700"> <?php if ($jobOffer['tags']): ?>
                <?php foreach (explode(',', $jobOffer['tags']) as $tag): ?>
                  <span class="inline-block bg-green-100 text-green-800 text-xs px-2 rounded-full">#<?= $tag ?></span>
                <?php endforeach; ?>
              <?php else: ?>
                
           <?php endif; ?>
            </span>
          </div>
          <div class="w-1/3 flex justify-center items-center">
            <img src="<?= $jobOffer['photo']; ?>" alt="Company Logo"
              class="w-32 h-32 object-cover rounded-full border-2 border-gray-200">
          </div>
        </div>


        <div class="px-6 py-4 text-center">
          <button class="w-full bg-green-500 text-white py-2 rounded-md hover:bg-green-600 transition duration-200">
          apply
          </button>
        </div>
      </div>
      <?php
    }
    ?>
    </div>
  </div>
</section>




</body>
</html>