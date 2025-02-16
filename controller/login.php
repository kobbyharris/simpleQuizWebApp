<?php

require('../core/configuration.php');

$title = "PQuiz-Login";
$stylesheetName = "./css/login";
$heading = "Sign Up";
$redirectLink = "signup";


$userInput = ['email' => '','password'=> ''];
$userCredentials =["email"=> "", "password"=> ""];
$error =  null;
 

require('../core/loginValidation.php');


require("../views/registerAndLoginViews/login-view.php");

