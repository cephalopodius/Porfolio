<?php

namespace App\Router;


class Router {

  private $url;
  private $routes = [];

 public function __construct($url){
   $this->url = $url;
 }

 public function get($path, $callable){
   $route = new Route($path, $callable);
   $this->routes['GET'][] = $route;
 }
 public function post($path, $callable){
   $route = new Route($path, $callable);
   $this->routes['POST'][] = $route;
 }


 public function run(){

   if (!isset($this->routes[$_SERVER['REQUEST_METHOD']])){
     throw new RouterException('REQUEST_METHOD does not exist');
   }
   //checking for each route if it correspond to the right url
   foreach($this ->routes[$_SERVER['REQUEST_METHOD']] as $route){
     if($route->match($this->url)){
       return $route->call();
     }
   }
   throw new RouterException('No matching routes');
 }

 public function call(){
   return call_user_func_array($this->callable, $this->matches);

 }
}
 ?>
