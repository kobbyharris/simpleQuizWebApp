<?php



#active link 
function hoverStyle($activePage)
{

    $style ="";
    if($_SERVER['REQUEST_URI'] === "{$activePage}")
    {
    $style = 'style="background-color: rgb(236, 236, 236);"';
    }

    elseif($_SERVER['REQUEST_URI'] === "{$activePage}")
    {
    $style = 'style="background-color: rgb(236, 236, 236);"';
    }

    elseif($_SERVER['REQUEST_URI'] === "{$activePage}")
    {
    $style = 'style="background-color: rgb(236, 236, 236);"';
    }

    elseif($_SERVER['REQUEST_URI'] === "{$activePage}")
    {
    $style = 'style="background-color: rgb(236, 236, 236);"';
    }

    return $style;
}

#user authorization
function authorizingUserLogin($value){
    if(!isset($_SESSION['user_id'])){

        $value = "/login";
    }
    else
    {
        $value;
    }
    return $value ;
}


#dump and die function 
function dd($value){
    echo "<pre>"; var_dump($value); echo "</pre>" ;die();
}

#admin authorization
function authorizingAdminLogin($value){
    if(!isset($_SESSION['admin_id'])){

        $value = "/login";
    }
    else
    {
        $value;
    }
    return $value ;
}


#error page respones function
function errorPageResponse($errorPage = 404){

    http_response_code($errorPage);
    
    require "../controller/{$errorPage}.php";
    die();
}

