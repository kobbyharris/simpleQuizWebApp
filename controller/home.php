<?php


require('../core/configuration.php');

$title = "PQuiz-Home";
$stylesheetName = "./css/home";
$heading = "Register to continue";

$connect = new Database($hostName, $username, $password, $databaseName);

$achievement= "No Rank";
$score = 0;
$compliment = "No compliment";

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];

    $query = "SELECT score FROM results WHERE user_id = ?";
$stmt = $connect->QueryAndExecution($query, $user_id);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result) {
    
    $score = $result['score'];
    

    $achievement = 'No achievements';
    if ($score >= 10) {
        $achievement = "Excellent";
    } elseif ($score >= 5) {
        $achievement = "Good";
    } else {
        $achievement = "Average";
    }

   

    if ($achievement === "Excellent") {
        $compliment = "Congratulations! ";
    } elseif ($achievement === "Good") {
       $compliment = "Well done! ";
    } else {
       $compliment = "You did okay.";
    }
} 
}else{
    errorPageResponse(403);
}




require("../views/home-view.php");