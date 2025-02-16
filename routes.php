<?php

//all users request types

$router->get('/', '../controller/index.php');  
$router->get('/home', '../controller/home.php'); 
$router->get('/courses', '../controller/courses.php'); 

#login page requests
$router->get('/login', '../controller/login.php'); 
$router->post('/login', '../controller/login.php'); 


#Register page requests
$router->get('/signup', '../controller/signUp.php'); 
$router->post('/signup', '../controller/signUp.php'); 


#question and results requests
$router->get('/question-view', '../controller/questions.php'); 
$router->get('/results', '../controller/results.php'); 
$router->post('/verify', '../controller/verify.php'); 



//all admin request type

#Admin get requests
$router->get('/admin', '../admin/index.php');
$router->get('/dashboard', '../admin/Admin-dashboard.php');
$router->get("/delete", '../admin/delete.php');
$router->get('/add', '../admin/create.php');
$router->get('/admin-signup', '../admin/Admin-signup.php');
$router->get('/ManageQ', '../admin/manage-questions.php');
$router->get("/addcategory", '../admin/add-category.php');
$router->get("/edit_question", '../admin/edit.php');

#Admin Post request
$router->post('/add', '../admin/create.php');
$router->post("/addcategory", '../admin/add-category.php');
$router->post("/update", '../admin/update.php');
$router->post('/admin', '../admin/index.php');
$router->post('/admin-signup', '../admin/Admin-signup.php');




#user and admin logout request
$router->get('/Logout', '../controller/logout.php'); 











