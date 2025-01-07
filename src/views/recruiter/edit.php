<?php
require_once __DIR__ . '/../../../vendor/autoload.php';
use App\Classes\Joboffer;
use App\classes\Category;
use App\classes\Tag;
session_start();
$idUser = $_SESSION['id'];

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $displayPost = new Joboffer();
    $post = $displayPost->displayoffer($id);
    print_r($post);
}

if(isset($_POST['submit'])){
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



       move_uploaded_file($fileTmpName, $filePath);
           
       $newOffer = new Joboffer();
        $newOffer->updateJobOffer($id,$company,$position,$description, $salary ,$location,$category,$tags,$filePath,$idUser); 
      
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
                    class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-400 focus:outline-none"
                    value="<?php echo $post['company_name'] ?>">
            </div>

            <div>
                <label for="position" class="block text-gray-700 font-semibold">Position:</label>
                <input type="text" id="position" name="position" required value="<?php echo $post['position'] ?>"
                    class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-400 focus:outline-none">
            </div>


            <div>
                <label for="description" class="block text-gray-700 font-semibold">Description:</label>
                <textarea id="description" name="description" required
                    class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-400 focus:outline-none"><?php echo $post['description'] ?>
                    </textarea>
            </div>

            <div>
                <label for="salary" class="block text-gray-700 font-semibold">Salary:</label>
                <input type="number" id="salary" name="salary" min="0" required value="<?php echo $post['salary'] ?>"
                    class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-400 focus:outline-none">
            </div>

            <div>
                <label for="location" class="block text-gray-700 font-semibold">Location:</label>
                <input type="text" id="location" name="location" required value="<?php echo $post['location'] ?>"
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
                        if ($categorie['id'] == $post['id_category']) {
                            echo "<option selected value='{$post['id_category']}'>{$categorie['namecategory']}</option>";
                        } else {
                            echo "<option value='{$categorie['id']}'>{$categorie['namecategory']}</option>";
                        }
                    }

                    ?>
                </select>
            </div>

            <div>

                <?php
                $tagModel = new Tag();
                $tags = $tagModel->displayTags();
                $selectedTags = explode(',', $post['tags']);
                foreach ($tags as $tag) {
                    $isChecked = in_array($tag['nametag'], $selectedTags) ? 'checked' : '';
                    echo "<input type='checkbox' id='tag_{$tag['id']}' name='tags[]' value='{$tag['id']}' $isChecked class='mr-2'>";
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