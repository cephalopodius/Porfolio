<?php

class User{

  public $Prenom;
  public $Nom;
  public $id_User;
  public $Mail;
  public $id_Admin;
  public $Password;

}

public function __construct($Prenom,$Nom,$id_User,$Mail,$id_Admin,$Password){


  $this->Prenom = $Prenom;
  $this->Nom = $Nom;
  $this->id_User = $id_User;
  $this->Mail = $Mail;
  $this->id_Admin = $id_Admin;
  $this->Password = $Password;
}

?>
