<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>category</title>
</head>

<body class="bg-gray-100">

    <!-- header section   -->
    <?php
    include "../../components/headerAdmin.php";
    ?>
    <!-- Sidebar -->
    <?php
    include "../../components/sidbarAdmin.php";
    ?>
    <!-- Main Content -->
    <div class="w-4/5 p-10">
        <div class="block text-end">
           <a href="addCategory.php"
            class="  px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
            <i class='bx bx-plus mr-2'></i>
            Add Category
              </a>
        </div>
       
        <!-- Table -->
        <div class=" bg-white rounded-lg shadow mt-10">
            <table class="min-w-full border border-gray-200">
                <thead class="bg-green-600 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left">#</th>
                        <th class="px-6 py-3 text-left">Category Name</th>
                        <th class="px-6 py-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <!-- Row 1 -->
                    <tr class="bg-gray-100">
                        <td class="px-6 py-3 border">1</td>
                        <td class="px-6 py-3 border">Technology</td>
                        <td class="px-6 py-3 border flex gap-3">
                            <a href="/edit-category/1" 
                               class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">
                                Edit
                            </a>
                            <a href="/delete-category/1" 
                               class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                                Delete
                            </a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>




     </div> 

</body>

</html>