<?php


class Database{

    public $connection = [];

    #connecting to database
    public function __construct($hostName , $username, $password, $databaseName){

        $dsn = "mysql:host=$hostName;dbname=$databaseName;";

        try
        {
            $this->connection = new PDO($dsn, $username, $password);
        }
        catch(PDOException $error)
        {
            echo "Database connection unsucessful! try again";
            die();
        }

    }

    #accepting query and executing
    public function QueryAndExecution($query, $params = []){

        $statement = $this->connection->prepare($query);
        if(is_array($params)){
            $statement->execute($params);
        }
        else{
            $statement->bindParam(1, $params);
            $statement->execute();
        }


        return $statement;
        
    } 

    #disconnecting
    public function __destruct(){   
        $this->connection = null;
    }

}