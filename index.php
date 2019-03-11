<?php
require('vendor/autoload.php');

include('repository/cobdd.php');
include("repository/Identifiant.php");
include('repository/blogpost.php');
include("repository/ComRepository.php");
include('repository/UserRepository.php');



$router = new App\Router\Router($_GET['url']);

$router->get('/',function(){require ('page/home.php');});
$router->get('/home',function(){require ('page/home.php');});
$router->get('/edit',function(){require ('page/formedit.php');});
$router->get('/connexion',function(){require ('page/formco.php');});
$router->get('/ajout',function(){require ('page/formajout.php');});
$router->get('/inscription',function(){require ('page/forminscription.php');});


$router->get('/posts/id',function($id){echo 'Tous l articlees'. $id;});
$router->post('/posts/id',function($id){echo 'Tous les articlees' . $id;});

$router->run();
