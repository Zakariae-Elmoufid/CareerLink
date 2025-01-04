<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full Header</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <!-- Full Header -->
    <header class="bg-green-600 text-white w-full">
        <div class="flex items-center justify-between py-4 px-6">
            <!-- Logo -->
            <a href="#" class="flex items-center">
                <span class="ml-3 text-2xl font-bold">CareerLink</span>
            </a>
            <!-- Navigation -->
            <nav>
                <ul class="flex space-x-8 text-lg">
                    <li><a href="#" class="hover:text-green-300">Home</a></li>
                    <li><a href="#" class="hover:text-green-300">About Us</a></li>
                    <li><a href="#" class="hover:text-green-300">Jobs</a></li>
                    <li><a href="#" class="hover:text-green-300">Contact</a></li>
                </ul>
            </nav>
            <!-- Call to Action -->
             <!-- User Menu -->
  <div class="relative">
    <!-- Profile Image -->
    <div class="flex items-center gap-2 cursor-pointer">
      <img class="w-10 h-10 rounded-full border-2 border-gray-300" 
           src="https://intranet.youcode.ma/storage/users/profile/thumbnail/1130-1727859974.JPG" 
           alt="Profile Image">
      <span class="font-medium text-gray-800">John Doe</span>
    </div>

    <!-- Dropdown Menu -->
    <div class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded shadow-md hidden group-hover:block">
      <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
      <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Edit Profile</a>
      <form method="POST" action="/logout">
        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-100">Logout</button>
      </form>
    </div>
  </div>

        </div>
    </header>

    <script src="../script/headerAdmin.js"></script>

</body>

</html>