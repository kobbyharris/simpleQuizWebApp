<?php
require('../core/configuration.php');


$title = "PQuiz-Results";
$stylesheetName = "./css/home";

$connect = new Database($hostName, $username, $password, $databaseName);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['answers'])) {
        $userAnswers = $_POST['answers'];
        $score = 0;

        foreach ($userAnswers as $questionId => $selectedChoiceId) {
            
            $query = "SELECT is_correct FROM choices WHERE question_id = ? AND choice_id = ?";

            $choice = $connect
                ->QueryAndExecution($query, [$questionId, $selectedChoiceId])
                ->fetch(PDO::FETCH_ASSOC);

            
            if ($choice && $choice['is_correct'] == 1) {
                $score++;
            }
        }
        $query = "SELECT * FROM results WHERE user_id = ?";
        $stmt = $connect->QueryAndExecution($query, [$_SESSION['user_id']]);
        $existingRecord = $stmt->fetch();
        
        if ($existingRecord) {
            $query = "UPDATE results SET score = :score WHERE user_id = :user_id";
            $stmt = $connect->QueryAndExecution($query, ['score' => $score, 'user_id' => $_SESSION['user_id']]);
        } else {
            $query = "INSERT INTO results (user_id, score) VALUES (:user_id, :score)";
            $stmt = $connect->QueryAndExecution($query, ['user_id' => $_SESSION['user_id'], 'score' => $score]);
        }
        

        
        $_SESSION['score'] = $score;

        
        require("../views/verify-view.php");
        exit;
    } else {
        
        $error = "No answers were submitted.";
        $_SESSION['errors'] = $error;
        echo '<script>window.history.back();</script>';
        exit;
    }
}

