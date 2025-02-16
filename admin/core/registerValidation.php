<?php


$_SESSION['admin_id'] = "";

if($_SERVER['REQUEST_METHOD'] === "POST"){    
    $userCredentials['username'] = $_POST['username'];
    $userCredentials['email'] = $_POST['email'];
    $userCredentials['password'] = $_POST['password'];

    $userInput['username'] = $_POST['username'];
    $userInput['email'] = $_POST['email'];
    $userInput['password'] = $_POST['password'];
    

    if(empty($userCredentials['username']))
    {
        $error = 'Username required';
    }
    else
    {

        if(empty($userCredentials['email']))
        {
            $error = 'Fill out all the input fields';
        }
        else{

            if(!filter_var($userCredentials['email'], FILTER_SANITIZE_EMAIL))
            {
                $error = 'Invalid email';
            }
            else
            {
                if(!empty($userCredentials['password']))
                {
                    $UserHashedpassword = password_hash($userCredentials['password'], PASSWORD_DEFAULT);
                    
                    $connect = new Database($hostName, $username,$password, $databaseName);
                    $query = "SELECT email from admins where email = ?";
                    $results = $connect->QueryAndExecution($query, $userCredentials['email'])->fetchAll(PDO::FETCH_ASSOC);
                    
                    if(count($results) > 0){

                        $error = "Account already exist ";
                     
                    }
                    else
                    {    
                        if(count($results) === 0)
                        {
                            $connec = new Database($hostName, $username,$password, $databaseName);
                            $query = "INSERT INTO admins(username, email, password) VALUES(:username, :email, :password)";
                            $results = $connect->QueryAndExecution($query, ['username' => $userCredentials['username'], 'email' => $userCredentials['email'], 'password' => $UserHashedpassword]);
                            


                            $connec = new Database($hostName, $username,$password, $databaseName);
                            $query = "SELECT admin_id, username from admins where email = ?";
                            $results = $connect->QueryAndExecution($query, $userCredentials['email'])->fetchAll(PDO::FETCH_ASSOC);
                            
                            /* $_SESSION['admin_id'] = $results["admin_id"];
                            dd($_SESSION['admin_id']);
                            die(); */
                            foreach($results as $result){
                                if(isset($result['admin_id'])){
                                    $_SESSION['admin_id'] = $result['admin_id'];
                                  
                                }
                            }

                            $_SESSION['username'] = $userCredentials['username'];
                            setcookie("admin_id", $_SESSION['admin_id'], time() + (86400 * 30), "/");

                            header('location: /dashboard');
                            die();
                        }
                        
                    }

                }
                else
                {
                    
                    $error = "Password is required";
                }
            }
        }
    
    }
} 