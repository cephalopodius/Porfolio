<?php

  	class Blog{
      private $Titre;
      private $Chapo;
      private $Contenu;
      private $Image;
      private $id_Admin;
      private $id_Blog;

      public function __construct($titre,$chapo,$contenu,$image,$id_admin,$id_blog){
        $this->Titre = $titre;
        $this->Chapo = $chapo;
        $this->Contenu = $contenu;
        $this->Image = $image;
        $this->id_Admin = $id_admin;
        $this->id_Blog = $id_blog;

      }

      public function getTitre(){
        return $this->Titre;
      }
      public function getChapo(){
        return $this->Chapo;
      }
      public function getContenu(){
        return $this->Contenu;
      }
      public function getImage(){
        return $this->Image;
      }
      public function getId_Admin(){
        return $this->id_Admin;
      }
      public function getId_Blog(){
        return $this->id_Blog;
      }

      public function setTitre($titre){
        $this->Titre = $titre;
      }
      public function setChapo($chapo){
        $this->Chapo = $chapo;
      }
      public function setContenu($contenu){
        $this->Contenu = $contenu;
      }
      public function setImage($image){
        $this->Image = $image;
      }
      public function setId_Admin($id_admin){
        $this->id_Admin = $id_admin;
      }
      public function setId_Blog($id_blog){
        $this->id_Blog = $id_blog;
      }
    }

 ?>
