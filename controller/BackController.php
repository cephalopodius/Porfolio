<?php
namespace App\Controller;

class BackController extends Controller{

  private $repository;

  public function connection($mail,$password){

    $this->repository=new \App\Repository\UserRepository();
    if ($mail || $password ) //checking void field
    {
      $user = new \App\Model\User('','','','',$mail,$password);
      $test=$this->repository->connection($user);
      if ($test == true){
        $message = '<p>Vous êtes connecté </p>
      <p>Cliquez <a href="home">ici</a> pour revenir</p>';
      }else{
        $message ="<p>Une erreur s\'est produite pendant votre identification.<br /> Le mot de passe ou l'adresse mail entrée n\'est pas correcte.</p><p>Cliquez <a href='connection'>ici</a>
        pour revenir à la page précédente
        <br /><br />Cliquez <a href='home'>ici</a>
        pour revenir à la page d accueil</p>";
      }
    }
    else //checking password
    {
      $message = '<p>une erreur s\'est produite pendant votre identification.
    Vous devez remplir tous les champs</p>
    <p>Cliquez <a href="Connection">ici</a> pour revenir</p>';
    }
    echo $message;
  }

  public function addPost($titre,$chapo,$contenu,$image){

    $this->repository=new \App\Repository\BlogRepository();
		$newBlog = new \App\Model\Blog($titre,$chapo, $contenu,$image,'',1,1);
		$test=$this->repository->addBlog($newBlog);
    if ($test == true){
      $message = '<p>Blog ajoutée </p>
    <p>Cliquez <a href="home">ici</a> pour revenir</p>';
    }else{
      $message ="<p>Une erreur s\'est produite pendant votre saisie.<br /> Le mot de passe ou l'adresse mail entrée n\'est pas correcte.</p><p>Cliquez <a href='add'>ici</a>
      pour revenir à la page précédente
      <br /><br />Cliquez <a href='home'>ici</a>
      pour revenir à la page d accueil</p>";
      }
  echo $message;
    }

    public function editPost($titre,$chapo,$contenu,$image,$idBlog){

      $this->repository=new \App\Repository\BlogRepository();
      $newBlog = new \App\Model\Blog($titre,$chapo, $contenu,$image,'',1,$idBlog);

  		$test=$this->repository->editBlog($newBlog);
      if ($test == true){
        $message = '<p>Blog modifié </p>
      <p>Cliquez <a href="home">ici</a> pour revenir</p>';
      }else{
        $message ="<p>Une erreur s\'est produite pendant votre saisie.<br /> Le mot de passe ou l'adresse mail entrée n\'est pas correcte.</p><p>Cliquez <a href='edit'>ici</a>
        pour revenir à la page précédente
        <br /><br />Cliquez <a href='home'>ici</a>
        pour revenir à la page d accueil</p>";
        }
    echo $message;
      }

    public function addUser($nom,$prenom,$mail,$password){

      $this->repository=new \App\Repository\UserRepository();
      $user = new \App\Model\User('',$prenom,$nom,'',$mail,$password);
      $test=$this->repository->register($user);
      if ($test == true){
        $message = '<p>inscription effectuée </p>
      <p>Cliquez <a href="home">ici</a> pour revenir</p>';
      }else{
        $message ="<p>Une erreur s\'est produite pendant votre saisie.<br /> Le mot de passe ou l'adresse mail entrée n\'est pas correcte.</p><p>Cliquez <a href='register'>ici</a>
        pour revenir à la page précédente
        <br /><br />Cliquez <a href='home'>ici</a>
        pour revenir à la page d accueil</p>";
        }
    echo $message;
      }
      public function addComment($content,$idBlog){

        $this->repository=new \App\Repository\ComRepository();
        $com = new \App\Model\Comment('',0,$content,'',$_SESSION['id_User'],$idBlog);
        $test=$this->repository->addCom($com);
        if ($test == true){
          $message = '<p>commentaire ajouté et en attente de validation</p>
        <p>Cliquez <a href="home">ici</a> pour revenir</p>';
        }else{
          $message ="<p>Une erreur s\'est produite pendant votre saisie.<br />
          <br /><br />Cliquez <a href='home'>ici</a>
          pour revenir à la page d accueil</p>";
          }
      echo $message;
        }

    public function deconnect(){
      session_destroy();
      session_start();
      header('Location:home');
      }

      public function deleteBlog($id_Blog){

        $this->repository=new \App\Repository\BlogRepository();
    		$this->repository->deleteBlog($id_Blog);
    	}
	 }
