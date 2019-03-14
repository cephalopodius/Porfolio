<?php

  	class Blog{
      private $Titre;
      private $Chapo;
      private $Contenu;
      private $Image;
      private $Date;
      private $id_Admin;
      private $id_Blog;

      public function __construct($titre,$chapo,$contenu,$image,$date,$id_admin,$id_blog){
        $this->Titre = $titre;
        $this->Chapo = $chapo;
        $this->Contenu = $contenu;
        $this->Image = $image;
        $this->Date = $date;
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
      public function getDate(){
        return $this->Date;
      }
      public function getIdAdmin(){
        return $this->id_Admin;
      }
      public function getIdBlog(){
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
      public function setDate($date){
        $this->Date = $date;
      }
      public function setIdAdmin($id_admin){
        $this->id_Admin = $id_admin;
      }
      public function setIdBlog($id_blog){
        $this->id_Blog = $id_blog;
      }
    }

 
