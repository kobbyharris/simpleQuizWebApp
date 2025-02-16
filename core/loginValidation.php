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
            $query = "SELECT username, user_id, email, password from users where email = ?";
            $results = $connect->QueryAndExecution($query, $userCredentials['email'])->fetchAll(PDO::FETCH_ASSOC);
            
            if(count($results) == 0){
                $error = 'Invalid inputs';
            }
            else{
                foreach($results as $result){
                    
                    $userPasswordVerify = password_verify($userCredentials['password'], $result['password']);
                    
                    if($result['email'] == $userCredentials['email'] && $userPasswordVerify === true){
                        

                        $_SESSION['user_id'] = $result['user_id'];
                        $_SESSION['username'] = $result['username'];

                        setcookie("user_id", $_SESSION['user_id'], time() + (86400 * 30), "/");
                        header('location: /home');
                        exit;

                    }
                    else{
                        $error = 'Invalid email or password';
                    }
                }
            }

        }
        
    }
}