<?php


if(count($_SESSION) == 0 && $_SERVER['REQUEST_URI'] != "/home"){
    
    errorPageResponse(403);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Harrison Amoani">
    <meta name="description" content="PQuiz Web App">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= $stylesheetName; ?>.css">
    <link rel="shortcut icon" href="./assets/icons/fav-icon.png" type="image/x-icon">
    <link rel="shortcut icon" href="./assets/mobilenav.js" type="image/x-icon">
    <title><?= $title; ?></title>
</head>
<body>
