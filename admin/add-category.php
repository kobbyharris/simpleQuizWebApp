<?php

require('../core/configuration.php');

$stylesheetName = "./css/edit.css";
$title = "Add Category";



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $categoryName = $_POST['category_name'];

    
    if (!empty($categoryName)) {

        $connect = new Database($hostName, $username, $password, $databaseName);
        
        $query = "SELECT category_name FROM categories";

        $categoryResultNames = $connect->QueryAndExecution($query)->fetchALL(PDO::FETCH_ASSOC);
        
        

        foreach($categoryResultNames as $ResultNames){
            
            if($ResultNames['category_name'] === $categoryName){

                header("Location: /addcategory?status=duplication of category name");
                exit();
            }else{

                $query = "INSERT INTO categories (category_name) VALUES (?)";

                $connect->QueryAndExecution($query, [$categoryName]);

                header("Location: /addcategory?status=success");
                exit();

            }
        }

        
    } else {
        // If category name is empty, redirect back to the add category page with error message
        header("Location: /addcategory?status=error");
        exit();
    }
} else {

    require('views/add-category-view.php');
    exit();
}

   




