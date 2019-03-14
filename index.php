<?php
require('vendor/autoload.php');


$router = new App\Router\Router($_GET['url']);

$router->get('/',function(){require('page/home.php');});
$router->get('/home',function(){require('page/home.php');});
$router->get('/edit',function(){require('page/formEdit.php');});
$router->get('/connexion',function(){require('page/formConnection.php');});
$router->get('/ajout',function(){require('page/formAdd.php');});
$router->get('/inscription',function(){require('page/formInscription.php');});
$router->get('/deconnexion',function(){require('repository/Deconnection.php');});

$router->post('/controllerUser',function(){require('controller/controllerUser.php');});
$router->post('/controllerBlogpost',function(){require('controller/controllerBlogpost.php');});
$router->post('/controllerComment',function(){require('controller/controllerComment.php');});



$router->run();
