<?php

  	class User{
      private $id_User;
      private $prenom;
      private $nom;
      private $id_Admin;
      private $mail;
      private $password;


      public function __construct($id_User,$prenom,$nom,$id_Admin,$mail,$password){
        $this->idUser = $id_User;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->idAdmin = $id_Admin;
        $this->mail = $mail;
        $this->password = $password;

      }

      public function getidUser(){
        return $this->idUser;
      }
      public function getPrenom(){
        return $this->prenom;
      }
      public function getNom(){
        return $this->nom;
      }
      public function getidAdmin(){
        return $this->idAdmin;
      }
      public function getMail(){
        return $this->mail;
      }
      public function getPassword(){
        return $this->password;
      }

      public function setidUser($id_User){
        $this->Titre = $id_User;
      }
      public function setPrenom($prenom){
        $this->Chapo = $prenom;
      }
      public function setNom($nom){
        $this->Contenu = $nom;
      }
      public function setidAdmin($id_Admin){
        $this->Image = $id_Admin;
      }
      public function setMail($mail){
        $this->Date = $mail;
      }
      public function setPassword($password){
        $this->id_Admin = $password;
      }

    }

 ?>
