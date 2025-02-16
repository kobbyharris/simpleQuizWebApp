<?php

require('../core/configuration.php');

$stylesheetName = "./css/edit.css";
$title = "Edit";

$questionId = "";
if(isset($_GET['id'])){
    $questionId = $_GET['id'];
}

$connect = new Database($hostName, $username, $password, $databaseName);

$query = "SELECT * FROM questions WHERE question_id = ?";
$question= $connect->QueryAndExecution($query, $questionId)->fetch();

if ($question) {
    
    $questionId = $question['question_id'];
    $questionText = $question['question_text']; 
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $questionId = $_POST['question_id'];
    $updatedQuestionText = $_POST['question_text'];

    $query = "UPDATE questions SET question_text = :question_text WHERE question_id = :question_id";
    $statement = $connect->QueryAndExecution($query, ['question_text' => $updatedQuestionText, 'question_id' => $questionId]);

    require("views/manage-questions-view.php");
    exit;
} else {
    
    require('views/edit-view.php');
}



