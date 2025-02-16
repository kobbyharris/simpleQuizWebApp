<?php

require('../core/configuration.php');

$heading = "Back to home";
$stylesheetName = "./css/manageq.css";
$title = "Manage";
$redirectLink = "admin-signup";



if(!isset($questions)){

    $connect = new Database($hostName, $username, $password, $databaseName);

    $query = "SELECT question_id, question_text from questions where question_id > ?";

    $questions = $connect->QueryAndExecution($query, 0)->fetchAll(PDO::FETCH_ASSOC);

    

}


require('views/manage-questions-view.php');