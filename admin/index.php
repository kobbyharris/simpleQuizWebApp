<?php

require('../core/configuration.php');

$heading = "Back to home";
$stylesheetName = "";
$title = "Admin";
$redirectLink = "admin-signup";


$userInput = ['email' => '','password'=> ''];
$userCredentials =["email"=> "", "password"=> ""];
$error =  null;

require('core/loginValidation.php');

require('views/index-view.php');