<?php
session_start();
if(!isset($_SESSION["id"]) && !isset($_SESSION["role"]) && $_SESSION["role"] != "recruiter"){
    header("Location: ../auth/login.php");
    exit();

}
require_once __DIR__ . '/../../../vendor/autoload.php';


use App\Classes\Joboffer;

$display = new Joboffer();
$applays = $display->selectApplay();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>applay</title>
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

  <div class="bg-white rounded-lg  overflow-hidden transition-colors duration-200">
                <table class="w-full">
                    <thead class="bg-gray-50 dark:bg-gray-700 border-b border-gray-200 dark:border-gray-600">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Photo</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Position</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Date Applay</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class=" divide-gray-200 ">
                        <?php foreach($applays as $apllay):?>
                        <tr class="hover:bg-gray-50  ">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <img src="" 
                                     alt="employee photo" 
                                     class="h-12 w-12 rounded-full object-cover">
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900 ">
                                    <?= $apllay['username'] ?>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900 ">
                                     <?= $apllay['email'] ?>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900 ">
                                  <?= $apllay['position'] ?>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900 ">
                                <?= $apllay['date_apply'] ?>
                                </div>
                            </td>
                            
                            <td class="px-6 py-4">
                            <div class="flex space-x-3">
                                    <div class="bg-blue-600 text-white hover:bg-blue-900 p-1 rounded-md">
                                        <p>Agreeable</p>
                                    </div>
                                    <div class="bg-red-600 text-white  hover:bg-red-900 p-1 rounded-md">
                                       <p>Refuses</p>
                                 </div>
                                </div>
                            </td>
                            
                            
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                </table>

</body>
</html>