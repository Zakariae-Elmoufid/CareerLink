<?php
require_once __DIR__ . '/../../../vendor/autoload.php';
use App\classes\Joboffer;

// if(isset($_POST['sub'])){
    $id_user = $_SESSION['id'];
    $displayCount = new Joboffer();
    $count = $displayCount->Applaycount($id_user);
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body class="bg-gray-100">

    <!-- Full Header -->
    <header class="bg-green-600 text-white w-full">
        <div class="flex items-center justify-between py-4 px-6">
            <!-- Logo -->
            <a href="#" class="flex items-center">
                <span class="ml-3 text-2xl font-bold">CareerLink</span>
            </a>
             


            <!-- Icons and User Menu -->

            <div class="flex items-center gap-6 ">
             <div class="relative ">
                 <i class='bx bxs-shopping-bag  h-6 w-6 text-white hover:text-gray-200'></i>
                 <span class="absolute -top-1 -right-1 bg-red-600 text-white text-xs font-bold rounded-full px-1.5"><?= $count['count(id_joboffer)']?></span>
             </div>   

              <!-- Notification Icon -->
              <div class="relative group">
                    <button class="relative">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white hover:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .415-.152.819-.405 1.437L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        <span class="absolute -top-1 -right-1 bg-red-600 text-white text-xs font-bold rounded-full px-1.5">3</span>
                    </button>

                    <!-- Dropdown Menu -->
                    <div class="absolute right-0 mt-2 w-64 bg-white border border-gray-200 rounded shadow-md hidden group-hover:block z-10">
                        <div class="p-4 text-gray-800 text-sm">
                            <p class="font-bold mb-2">Notifications</p>
                            <ul class="space-y-2">
                                <li class="flex items-start gap-2">
                                    <div class="bg-green-100 text-green-600 p-2 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                    <p>Task completed successfully!</p>
                                </li>
                                <li class="flex items-start gap-2">
                                    <div class="bg-red-100 text-red-600 p-2 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m-3-7a4 4 0 110 8 4 4 0 010-8z" />
                                        </svg>
                                    </div>
                                    <p>Password reset requested.</p>
                                </li>
                                <li class="flex items-start gap-2">
                                    <div class="bg-blue-100 text-blue-600 p-2 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16l4-4-4-4m8 8l-4-4 4-4" />
                                        </svg>
                                    </div>
                                    <p>New message from HR.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
           
                   
                <!-- User Menu -->
                <div class=" group z-10">
                    <div class="flex items-center gap-2 cursor-pointer">
                        <img class="w-10 h-10 rounded-full border-2 border-gray-300" 
                             src="https://intranet.youcode.ma/storage/users/profile/thumbnail/1130-1727859974.JPG" 
                             alt="Profile Image">
                        <span class="font-medium text-white"><?php echo $_SESSION['username']?> </span>
                        <i class='bx bx-chevron-down relative'></i>
                    </div>

                    <!-- Dropdown Menu -->
                    <div class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded shadow-md hidden group-hover:block">
                        <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m2 4H7a1 1 0 01-1-1V7a1 1 0 011-1h10a1 1 0 011 1v8a1 1 0 01-1 1z" />
                            </svg>
                            Settings
                        </a>
                        <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16m-7 6h7" />
                            </svg>
                            Edit Profile
                        </a>
                        <form method="POST" action="../auth/logout.php" class="w-full">
                            <button type="submit" name="submit" class="flex items-center gap-2 w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7" />
                                </svg>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
 
</body>

</html>
