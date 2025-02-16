<?php

require('../core/configuration.php');


$connect = new Database($hostName, $username, $password, $databaseName);

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $questionId = $_GET['id'];

    
    $query = "DELETE FROM choices WHERE question_id = ?";
    $connect->QueryAndExecution($query, $questionId);

   
    $query = "DELETE FROM questions WHERE question_id = ?";
    $connect->QueryAndExecution($query, $questionId);

    require("manage-questions.php");
    exit;
} else {
    
    require("manage-questions.php");
    exit;
}
    


