<?php
require_once __DIR__ . '/../../../vendor/autoload.php';
use App\Classes\Joboffer;
use App\Classes\Category;
use App\Classes\Tag;
session_start();

if(isset($_GET['post'])){
    $post =  $_GET['post'];
    echo $post; 
    $search = new Joboffer();
    $search->shearch($post);

    if (!empty($results)) {
        foreach ($results as $job) {
            echo "<div class='p-4 border-b'>
                    <h2 class='text-lg font-bold'>{$job['position']}</h2>
                    <p class='text-gray-700'>{$job['description']}</p>
                    <span class='text-sm text-gray-500'>Posté le : {$job['date_posted']}</span>
                  </div>";
        }
    } else {
        echo "<p class='text-gray-500'>Aucun poste trouvé.</p>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../output.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Document</title>
</head>
<body>
    <?php include "../components/headerCandidate.php"?>
     <main class="h-screen flex">
        <div class="w-1/5 border-r-2 border-green-500 p-4">
            <form action="" >
                <label for="category"  class="text-gray-700 font-medium ">Category:</label><br>
                <select name="category" id="category" class="mb-2">
                <?php
                    $categoryModel = new Category("");
                    $categories = $categoryModel->displayCategorys();
                    foreach ($categories as $categorie) {
                        echo "<option value='{$categorie['id']}'>{$categorie['namecategory']}</option>";

                    }

                    ?>
                </select><br>
                <label for="" class=" text-gray-700 font-medium ">shearch:</label><br>
                <div class="relative">
                    <input type="text" 
                    placeholder="search job offer..."
                    class="w-full mb-2  px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                    id="searchInput" 
                    name="post">
                    <i class='bx bx-search absolute top-3 right-2'></i>
                </div>
                <br>

                 
                  <?php
                    $tagModel = new Tag();
                    $tags = $tagModel->displayTags();
                    foreach ($tags as $tag) {
                        echo "<input type='checkbox' id='tag_{$tag['id']}' name='tags[]' value='{$tag['id']}' class='mr-2'>";
                        echo "<label for='tag_{$tag['id']}' class='text-gray-700'>{$tag['nametag']}</label><br>";
                        
                    }
                    ?> 
            </form>
        </div>
        <div class="w-4/5" id="result"> 

        </div>
     </main>

     <script>
        const searchInput =document.getElementById('searchInput');
        searchInput.addEventListener("keyup",function(){
            const post = this.value;

            if (post.length == 0) {
                document.getElementById("result").innerHTML = "no post now";
                return;
            }
            else{
                fetch("?post=" + encodeURIComponent(post))
                .then(data => {
                    document.getElementById("result").innerHTML = data; 
                })
                .catch(error => {
                    console.error("Erreur :", error);
                });
                
            }    
       });      
     </script>

</body>
</html>