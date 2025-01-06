<?php
require_once __DIR__ . '/../../../vendor/autoload.php';
use App\classes\Category;
use App\classes\Tag;
use App\Classes\Joboffer;

session_start();


$idUser = $_SESSION['id'];
echo $idUser; 


if (isset($_POST['submit'])) {
      $company = $_POST['company_name'];
      $position = $_POST['position'];
      $description = $_POST['description'];
      $salary = $_POST['salary'];
      $location = $_POST['location'];
      $category = $_POST['category'];
      $tags = isset($_POST['tags']) ? $_POST['tags'] : [];

        
      
  
 
     
    
   $_FILES['image'];
        $uploadDir = 'uploads\\'; 
        $fileName = $_FILES['image']['name'];
        $fileTmpName = $_FILES['image']['tmp_name'];
        $fileType = $_FILES['image']['type'];
        $fileSize = $_FILES['image']['size'];
        $filePath = $uploadDir . $fileName;



            if (move_uploaded_file($fileTmpName, $filePath)) {
                echo "L'image a été téléchargée avec succès.";
            }else{
                echo "Errore.";
            } 
    
            $newOffer = new Joboffer();
            $newOffer->AddJobOffer($company,$position,$description,$salary,$location,$category,$tags,$filePath,$idUser);        


}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <!-- Header section -->
    <?php include "../components/headerAdmin.php"; ?>

    <!-- Sidebar -->
    <?php include "../components/sidbarRecruiter.php"; ?>

    <!-- Main Content -->
    <div class="w-4/5 p-10">
        <form method="POST" action="" enctype="multipart/form-data" class="bg-white p-8 rounded-lg shadow-lg space-y-6">
            <div>
                <label for="company_name" class="block text-gray-700 font-semibold">Company Name:</label>
                <input type="text" id="company_name" name="company_name" required
                    class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-400 focus:outline-none">
            </div>

            <div>
                <label for="position" class="block text-gray-700 font-semibold">Position:</label>
                <input type="text" id="position" name="position" required
                    class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-400 focus:outline-none">
            </div>

            <div>
                <label for="description" class="block text-gray-700 font-semibold">Description:</label>
                <textarea id="description" name="description" required
                    class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-400 focus:outline-none"></textarea>
            </div>

            <div>
                <label for="salary" class="block text-gray-700 font-semibold">Salary:</label>
                <input type="number" id="salary" name="salary" min="0" required
                    class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-400 focus:outline-none">
            </div>

            <div>
                <label for="location" class="block text-gray-700 font-semibold">Location:</label>
                <input type="text" id="location" name="location" required
                    class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-400 focus:outline-none">
            </div> 



            <div>
                <label for="photo" class="block text-gray-700 font-semibold">Upload Photo:</label>
                <input type="file" id="photo" name="image"
                    class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-400 focus:outline-none">

            </div>

            <div>
                <label for="caltegory" class="block text-gray-700 font-semibold">Category:</label>
                <select name="category" id="category">
                    <?php
                    $categoryModel = new Category("");
                    $categories = $categoryModel->displayCategorys();
                    foreach ($categories as $categorie) {
                        echo "<option value='{$categorie['id']}'>{$categorie['namecategory']}</option>";

                    }

                    ?>
                </select>
            </div>

            <div>

                    <?php
                    $tagModel = new Tag();
                    $tags = $tagModel->displayTags();
                    foreach ($tags as $tag) {
                        echo "<input type='checkbox' id='tag_{$tag['id']}' name='tags[]' value='{$tag['id']}' class='mr-2'>";
                        echo "<label for='tag_{$tag['id']}' class='text-gray-700'>{$tag['nametag']}</label><br>";
                        
                    }
                    ?>

            </div>

            <div>
                <button type="submit" name="submit"
                    class="w-full py-3 px-6 bg-green-600 text-white font-semibold rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400">
                    Submit
                </button>
            </div>
        </form>
    </div>


</body>

</html>