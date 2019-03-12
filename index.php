<?php
require('vendor/autoload.php');

include('repository/cobdd.php');
include("repository/Identifiant.php");
require("repository/blogpostRepository.php");
include("repository/ComRepository.php");
include('repository/UserRepository.php');

include('model/Commentaire.php');
include('model/Blog.php');
include('model/User.php');


$router = new App\Router\Router($_GET['url']);

$router->get('/',function(){require ('page/home.php');});
$router->get('/home',function(){require ('page/home.php');});
$router->get('/edit',function(){require ('page/formedit.php');});
$router->get('/connexion',function(){require ('page/formco.php');});
$router->get('/ajout',function(){require ('page/formajout.php');});
$router->get('/inscription',function(){require ('page/forminscription.php');});
$router->get('deconnexion',function(){require('repository/Deconnexion.php');});

$router->post('controleurUser',function(){require('controleur/controleuruser.php');});
$router->post('controleurBlogpost',function(){require('controleur/controleurblogpost.php');});
$router->post('controleurCommentaire',function(){require('controleur/controleurCommentaire.php');});



$router->run();
