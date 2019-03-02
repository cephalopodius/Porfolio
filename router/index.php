<?php


require '../vendor/autoload.php';

$router = new App\Router($_GET['url']);

$router->get('/posts', function(){echo 'tous les articles';});
$router->get('/posts', function($id){echo 'afficher article numero' . $id;});
$router->post('/posts', function(){echo 'poster article' . $id;});


$router->run();
