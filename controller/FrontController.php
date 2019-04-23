<?php
namespace App\Controller;

class FrontController extends Controller{

  private $blogRepository;
  private $userRepository;
  private $comRepository;

  public function __construct(){

    $this->blogRepository = new \App\Repository\BlogRepository();
    $this->comRepository = new \App\Repository\ComRepository();
    $this->userRepository = new \App\Repository\UserRepository();
  }
  public function home(){

      $userList = $this->userRepository->getUserList();
      $comList = $this->comRepository->getAllCom();
      $security = $this->userRepository->getSecurityLevel();
      $blogList = $this->blogRepository->getAllBlog();

      echo  $template = $this->loadTwig()->render('layout.twig', [
        'blog' => $blogList,
        'com'  => $comList,
        'user' => $userList,
        'security' => $security
      ]);
  }
  public function connection(){

      $userList = $this->userRepository->getUserList();
      $security = $this->userRepository->getSecurityLevel();

      echo  $template = $this->loadTwig()->render('formConnection.twig', [
        'security' => $security
      ]);
  }
  public function add(){

      $userList = $this->userRepository->getUserList();
      $security = $this->userRepository->getSecurityLevel();

      echo  $template = $this->loadTwig()->render('formAdd.twig', [
        'security' => $security
      ]);
  }
  public function edit(){

    $userList = $this->userRepository->getUserList();
    $blogList = $this->blogRepository->getAllBlog();
    $comList = $this->comRepository->getAllCom();
    $security = $this->userRepository->getSecurityLevel();

      echo  $template = $this->loadTwig()->render('formEdit.twig', [
        'blog' => $blogList,
        'com'  => $comList,
        'user' => $userList,
        'security' => $security
      ]);
  }
  public function register(){

    $security = $this->userRepository->getSecurityLevel();
    $userList = $this->userRepository->getUserList();

      echo  $template = $this->loadTwig()->render('formRegister.twig', [
        'security' => $security
      ]);
  }
}
