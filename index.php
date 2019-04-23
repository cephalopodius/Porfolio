<?php
session_start();
require('vendor/autoload.php');

//routing
$router = new App\Router\Router($_GET['url']);


//$router->get('/posts/:page', "Posts#show");
//$router->get('/controlleurConnection/:page', "Posts#show");

//$router->get('/posts/:page',function($page){});

//$router->post('/posts/:page',function($page){require('controller/controller.php');});

$router->get('/',function(){
  $FrontController = new FrontController();
  $FrontController->home();
});
$router->get('/home',function(){
  $FrontController = new FrontController();
  $FrontController->home();
});
$router->get('/connection',function(){
  $FrontController = new FrontController();
  $FrontController->connection();
});
$router->post('checkConnection',function() {
  $BackController = new BackController();
  $BackController->connection($_POST['mail'],$_POST['password']);
});
$router->get('/add',function(){
  $FrontController = new FrontController();
  $FrontController->add();
});
$router->post('/checkAdd',function() {
  $BackController = new BackController();
  $BackController->addPost($_POST['titre'],$_POST['chapo'],$_POST['content'],$_POST['image']);
});
$router->get('/deconnection',function(){
  $BackController = new BackController();
  $BackController->deconnect();
});
$router->get('/edit',function(){
  $FrontController = new FrontController();
  $FrontController->edit();
});
$router->get('/register',function(){
  $FrontController = new FrontController();
  $FrontController->register();
});
$router->post('/checkSignIn',function(){
  $BackController = new BackController();
  $BackController->addUser($_POST['nom'],$_POST['prenom'],$_POST['mail'],$_POST['password']);
});
$router->post('/deleteBlog',function(){
  $BackController = new BackController();
  $BackController->deleteBlog($_POST['idBlog']);
});
$router->post('/checkEdit',function(){
  $BackController = new BackController();
  $BackController->editPost($_POST['titre'],$_POST['chapo'], $_POST['contenu'],$_POST['image'],$_POST['idBlog']);
});
$router->post('/checkComment',function(){
  $BackController = new BackController();
  $BackController->addComment($_POST['comContent'],$_POST['id_Blog']);
});
$router->run();
