<?php

require('../core/configuration.php');

$heading = "Back to home";
$stylesheetName = "./css/manageq.css";
$title = "Admin-Manage";
$redirectLink = "admin-signup";


$connect = new Database($hostName, $username, $password, $databaseName);


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $questionId = $_POST['question_id'];
    $updatedQuestionText = $_POST['question_text'];

    $query = "UPDATE questions SET question_text = :question_text WHERE question_id = :question_id";
    $statement = $connect->QueryAndExecution($query, ['question_text' => $updatedQuestionText, 'question_id' => $questionId]);

    require("manage-questions.php");
    exit;
} else {
    
    require("manage-questions.php");
}
