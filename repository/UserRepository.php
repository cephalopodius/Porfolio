<?php
include_once('cobdd.php');
include_once('/../model/User.php');

	class UserRepository{

    public function __construct(){
    }

      public function connection($currentUser){

      $db = new Connection();
      $query= $db->openConnection()->prepare('SELECT Mail, id_User , id_Admin ,Password ,prenom,nom FROM User WHERE Mail = :mail AND Password = :password');
      $query->bindValue(':mail',$currentUser->getMail(), PDO::PARAM_STR);
      $query->bindValue(':password',$currentUser->getPassword(), PDO::PARAM_STR);
      $query->execute();
      $data=$query->fetch();


      if ($data['Mail'] == ($currentUser->getMail()) && $data['Password'] == ($currentUser->getPassword())) // Access OK !
      {

        if($data['id_Admin']== 1){

          $_SESSION['Level'] = 2;

        }else{

        $_SESSION['Level'] = 1;

        }

        $_SESSION['prenom'] = $data['prenom'];
        $_SESSION['nom'] = $data['nom'];
        $_SESSION['id_User'] = $data['id_User'];

      }
      else // Access not OK !
      {
        $message = "<p>Une erreur s\'est produite pendant votre identification.<br /> Le mot de passe ou l'adresse mail entrée n\'est pas correcte.</p><p>Cliquez <a href='./connexion.php'>ici</a>
        pour revenir à la page précédente
        <br /><br />Cliquez <a href='../index.php'>ici</a>
        pour revenir à la page d accueil</p>";
      }

      $query->CloseCursor();

}

      public function inscription($currentUser){

        $db = new Connection();
        $query= $db->openConnection()->prepare('INSERT INTO user(nom, prenom, Mail, Password) VALUES(:nom, :prenom, :Mail, :Password)');
        $query->bindValue(':nom',$currentUser->getNom(), PDO::PARAM_STR);
        $query->bindValue(':prenom',$currentUser->getPrenom(), PDO::PARAM_STR);
        $query->bindValue(':Mail',$currentUser->getMail(), PDO::PARAM_STR);
        $query->bindValue(':Password',$currentUser->getPassword(), PDO::PARAM_STR);

        $query->execute();

        UserRepository::connection($currentUser);
      }

      public function deconnection(){

        session_start();

        session_destroy();

          header('Location:../index.php');
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
              $user = new User($value['id_User'],$value['prenom'],$value['nom'],'','','');
              $userList[$key] = $user;
          }
          return $userList;
        }
        catch (PDOException $e)
        {
            echo "There is some problem in connection: " . $e->getMessage();
        }


      }
}
    ?>
