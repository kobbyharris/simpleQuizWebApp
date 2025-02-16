<?php

require('../core/configuration.php');


$stylesheetName = "./css/manageq.css";
$heading = "Back to home";
$title = "Create";

    $doneAlert = "Successfully added";
    $doneAlert = "";
$connect = new Database($hostName, $username, $password, $databaseName);


$query = "SELECT MAX(question_id) AS last_question_id FROM questions";
$result = $connect->QueryAndExecution($query);
$row = $result->fetch(PDO::FETCH_ASSOC);
$next_question_id = $row['last_question_id'] + 1;





$query = "SELECT * FROM categories";
$categories = $connect
            ->QueryAndExecution($query)
            ->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $questionText = $_POST['question_text'];
    $categoryId = $_POST['category_id'];
    $choices = $_POST['choices'];
    $correctChoice = $_POST['correct_choice'];

    

    $pdo = new PDO("mysql:host=$hostName;dbname=$databaseName", $username, $password);

    // created a new instance and avoid to used the database class to avoid errors since the question_id column is not in autoINcrement
    $stmt = $pdo->prepare("INSERT INTO questions (question_id, question_text, category_id) VALUES (:question_id, :question_text, :category_id)");
    $stmt->execute(['question_id' => $next_question_id, 'question_text' =>  $questionText, 'category_id' => $categoryId]);
    $lastInsertedId = $pdo->lastInsertId();


 
    foreach ($choices as $key => $choice) {
        $isCorrect = ($key + 1) == $correctChoice ? 1 : 0;
    
        // Insert the choice into the database
        $query = "INSERT INTO choices (choice_text, question_id, is_correct) VALUES (?, ?, ?)";
        $stmt = $connect->QueryAndExecution($query, [$choice, $next_question_id, 0]);
    }

   
    $query = "SELECT choice_id FROM choices WHERE choice_text = ? AND question_id = ?";
    $stmt = $connect->QueryAndExecution($query, [$correctChoice, $next_question_id]);
    $correctChoiceId = $stmt->fetchColumn();

    
    $query = "UPDATE choices SET is_correct = 1 WHERE choice_id = ?";
    $stmt = $connect->QueryAndExecution($query, [$correctChoiceId]);

    $doneAlert = "Successfully added";
    require('views/create-view.php');
} else {
    $error = "Fill out all the fields";
    require('views/create-view.php');
}


