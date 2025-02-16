<?php
require('../core/configuration.php');

$title = "PQuiz-Courses";
$stylesheetName = "./css/courses";


$connect = new Database($hostName, $username,$password, $databaseName);
$query = "SELECT category_id, category_name from categories";
$categories = $connect->QueryAndExecution($query)->fetchAll(PDO::FETCH_ASSOC);


/* for($counter = 0; $counter < count($categories) - 1; $counter++){
    echo $categories[$counter]['category_name'];
}
dd('1'); */




require("../views/courses-view.php");