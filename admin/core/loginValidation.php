<?php


if($_SERVER['REQUEST_METHOD'] === "POST"){    
    $userCredentials['email'] = $_POST['email'];
    $userCredentials['password'] = $_POST['password'];
    $userInput['email'] = $_POST['email'];
    $userInput['password'] = $_POST['password'];

    if(empty($userCredentials['email']))
    {
        $error = "An Email is required";
    }
    else 
    {
        if(empty($userCredentials['password']))
        {
            $error = "A Password is required";
        }
        
        else
        {
            
            $connect = new Database($hostName, $username,$password, $databaseName);
            $query = "SELECT admin_id, username, email, password from admins where email = ?";
            $results = $connect->QueryAndExecution($query, $userCredentials['email'])->fetchAll(PDO::FETCH_ASSOC);
            
            if(count($results) == 0){
                $error = 'Invalid inputs';
            }
            else{
                foreach($results as $result){
                    
                    $userPasswordVerify = password_verify($userCredentials['password'], $result['password']);
                    
                    if($result['email'] == $userCredentials['email'] && $userPasswordVerify === true){
                        

                        
                        $_SESSION['username'] = $result['username'];
                        $_SESSION['admin_id'] = $result['admin_id'];

                        setcookie("admin_id", $_SESSION['admin_id'], time() + (86400 * 30), "/");
                        header('location: /dashboard');
                        exit;
                    }
                    else{
                        $error = 'Invalid inputs';
                    }
                }
            }

        }
        
    }
}