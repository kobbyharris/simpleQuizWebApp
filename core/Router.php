<?php

namespace core;

class Router{

    protected $routes = [];

    public function get($uri, $controller){

        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => "GET"
        ];

    }

    public function post($uri, $controller){

        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => "POST"
        ];

    }

    public function delete($uri, $controller){

        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => "delete"
        ];

    }

    public function patch($uri, $controller){

        $this->routes[] = [
            'uri' => $uri,
            'controller' => "$controller",
            'method' => "PATCH"
        ];

    }

    public function put($uri, $controller){

        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' =>  "PUT"
        ];

    }
    
    public function route($uri, $method){
        
        foreach($this->routes as $route){
            if($uri === $route['uri'] && strtoupper($method) === strtoupper($route['method'])){
            
                require $route['controller'];
                die();
            } 
        }   

        errorPageResponse();
    }
}


