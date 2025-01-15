<?php

require_once __DIR__ . '/../../../../vendor/autoload.php';

use App\Classes\Tag;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$category = new Tag();
$row = $category->displayTag($id);


$nameTag = $row['nametag'];
if (isset($_POST["submit"])) {
    $nameTag = trim($_POST['name']);
    $name = $_POST["name"];
    $newTag = new Tag();
    $error = $newTag->updateTag($row['id'],$name);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>updateCategory</title>
</head>

<body class="bg-gray-100">
    <!-- header section   -->
    <?php
    include "../../components/headerAdmin.php";
    // Sidebar 
    
    include "../../components/sidbarAdmin.php";
    ?>
    <!-- Main Content -->
    <div class="w-4/5 p-10">
        <section id="categories" class="mb-10">
            <h3 class="text-2xl font-bold text-green-600 mb-5">Edit Tag</h3>

            <form class="bg-white p-6 rounded shadow" method="POST">
                <div class="mb-4">
                    <label for="category-name" class="block text-gray-700">Tag Name</label>
                    <input id="category-name" type="text" placeholder="Enter category name" name="name"
                        class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-400"
                        value="<?php echo $nameTag ?>">
                    <small class="text-red-500"><?php echo $error['name'] ?? "" ?></small>

                </div>
                <button type="submit" name="submit"
                    class="bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700">Add New Tag</button>
            </form>
        </section>
    </div>
</body>

</html>