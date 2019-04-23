<?php
namespace App\Controller;

class Controller{

    public function loadTwig(){
    $loader = new \Twig\Loader\FilesystemLoader('./page');
    $twig = new \Twig\Environment($loader, [
      'cache' => false //__DIR__ . 'tmp'
    ]);
    return $twig;
  }
}
