<?php
namespace App\Repository;
use \PDO;
class UserRepository{

  public function connection($currentUser){

  $hash='$2y$12$GBXH3UwCFImvtdiJtJZf3em5r8Z6.fN4mTM/tDtYcKTjPUsqcJ5mi';

  $db = new Connection();
  $query= $db->openConnection()->prepare('SELECT Mail, id_User , id_Admin ,Password ,prenom,nom FROM User WHERE Mail = :mail ');
  $query->bindValue(':mail',$currentUser->getMail(), PDO::PARAM_STR);
  $query->execute();
  $data=$query->fetch();
  if ($data['Mail'] == ($currentUser->getMail()) && $data['Password'] == password_verify($currentUser->getPassword(),$hash)) // Access OK !
  {
    if($data['id_Admin']== 1){
      $_SESSION['Level'] = 2;
    }else{
    $_SESSION['Level'] = 1;
    }
    //$_SESSION['prenom'] = $data['prenom'];
  //  $_SESSION['nom'] = $data['nom'];
    $_SESSION['id_User'] = $data['id_User'];
		$test = true;
  }
  else // Access not OK !
  {
    $test = false;
  }
  $query->CloseCursor();
	return $test;
 }

  public function register($currentUser){

			$db = new Connection();
			$query= $db->openConnection()->prepare('INSERT INTO user(nom, prenom, Mail, Password) VALUES(:nom, :prenom, :Mail, :Password)');
			$query->bindValue(':nom',$currentUser->getNom(), \PDO::PARAM_STR);
			$query->bindValue(':prenom',$currentUser->getPrenom(), \PDO::PARAM_STR);
			$query->bindValue(':Mail',$currentUser->getMail(), \PDO::PARAM_STR);
			$query->bindValue(':Password',$currentUser->getPassword(), \PDO::PARAM_STR);
			$query->execute();
			$test=true;

    UserRepository::connection($currentUser);
		return $test;
  }

  public function deconnection(){

    session_start();
    session_destroy();
    header('Location:test.php');
      exit();
  }
    //used for matching com and user, to provide name on modal com's window
  public function getUserList(){
    try{
      $db = new Connection();
      $query= $db->openConnection()->prepare('SELECT id_User,nom,prenom FROM user');
      $query->execute();
      $result = $query->fetchAll();

      $userList = array();
        foreach ($result as $key => $value) {
          $user = new \App\Model\User($value['id_User'],$value['prenom'],$value['nom'],'','','');
          $userList[$key] = $user;
      }
      return $userList;
    }
    catch (PDOException $e)
    {
        echo "There is some problem in connection: " . $e->getMessage();
    }
  }
//used for check which kind of user is connected
  public function getSecurityLevel(){
			$level='';
		if( isset($_SESSION['Level']) ){
			 if($_SESSION['Level'] == 1){
				 $level = 1;
			 }
			 if($_SESSION['Level'] == 2){
				 $level = 2;
			 }
			 if($_SESSION['Level'] == 0){
				$level = 0;
			}
		}else{
			$level=0;
		}
		return $level;
 }
 }
