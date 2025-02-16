<?php

require('../core/configuration.php');

$stylesheetName = "./css/home";
$title = "Test";


$error = "";
if(isset($_SESSION['username'])){
    if(!isset($_SESSION['catergorySelected'])){
        $selectedCategoryId = $_GET['categories_id'];
        $_SESSION['categorySelected'] = $selectedCategoryId;
    }
}else{
    errorPageResponse(403);
}

if( $_SESSION['categorySelected'] === $selectedCategoryId){

    $conn = new Database($hostName, $username, $password, $databaseName);

    $query = "SELECT q.question_id, q.question_text, c.choice_id, c.choice_text 
        FROM Questions q 
        JOIN Choices c ON q.question_id = c.question_id 
        WHERE q.category_id = ?";
    $statement = $conn->QueryAndExecution($query, $selectedCategoryId);
    $questions = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    if(!isset($questions) < 0){
        $error = "No questions";
    }
   
}else{
    errorPageResponse(403);
}

    

require("../views/question-view.php");