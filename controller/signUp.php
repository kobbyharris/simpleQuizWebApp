<?php

require('../core/configuration.php');

$title = "PQuiz-Sign Up";
$stylesheetName = "./css/signup";
$heading = "Sign in";
$redirectLink = "login";

$userInput = ['username' => "",'email'=> "", 'password' => ""];
$userCredentials =['username' => "",'email'=> "", 'password' => ""];
$error =  null;



require('../core/registerValidation.php');



require("../views/registerAndLoginViews/signup-view.php");

