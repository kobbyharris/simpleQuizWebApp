<?php
require('../core/configuration.php');

$title = "Dashboard";
$heading = "Back to home";
$stylesheetName = "./css/dashboard.css";


$connect = new Database($hostName, $username, $password, $databaseName);


$Query = "SELECT COUNT(*) AS totalCategories FROM categories";
$categoryResult = $connect->QueryAndExecution($Query);
$totalCategories = $categoryResult->fetch(PDO::FETCH_ASSOC)['totalCategories'];



$Query = "SELECT COUNT(*) AS totalAdminUsers FROM admins";
$adminUserResult = $connect->QueryAndExecution($Query);
$totalAdminUsers = $adminUserResult->fetch(PDO::FETCH_ASSOC)['totalAdminUsers'];


require('views/dashboard.php');