<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <!-- header section   -->
    <?php 
        include "../components/headerAdmin.php";
        ?>
  <!-- Sidebar -->
  <div class="flex ">
    <div class="w-1/5 bg-green-600 text-white  py-4 pl-4 h-screen">
      <h2 class="text-2xl font-bold my-5  ">Admin Dashboard</h2>
      <ul>
        <li class="mb-4">
          <a href="#categories" class="block py-2 px-4 pl-4 hover:text-green-600 hover:bg-gray-100 rounded-l-full">Manage Categories</a>
        </li>
        <li class="mb-4">
          <a href="#tags" class="block py-2 px-4 hover:text-green-600 hover:bg-gray-100 rounded-l-full">Manage Tags</a>
        </li>
        <li class="mb-4">
          <a href="#stats" class="block py-2 px-4 hover:text-green-600 hover:bg-gray-100 rounded-l-full">View Statistics</a>
        </li>
      </ul>
    </div>

    <!-- Main Content -->
    <div class="w-4/5 p-10">


    <!-- hello Section -->  

    <div class="bg-green-200 w-full h-40 mx-auto flex justify-between items-center relative">
       <div class="pl-10">
        <h2>Welcome back admin!👋</h2>
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
    </div>
  </div>

  <!-- Script to Dynamically Update Stats -->
  <script>
    // Example: Dynamic Stats Update
    document.getElementById('total-categories').textContent = 15;
    document.getElementById('total-tags').textContent = 40;
    document.getElementById('posts-with-tags').textContent = 78;
  </script>
</body>
</html>
