<?php

require('../core/configuration.php');

$heading = "Back to home";
$stylesheetName = "";
$title = "Admin";
$redirectLink = "admin";

$userInput = ['username' => "",'email'=> "", 'password' => ""];
$userCredentials =['username' => "",'email'=> "", 'password' => ""];
$error =  null;

require('core/registerValidation.php');

require('views/Admin-signup-view.php');