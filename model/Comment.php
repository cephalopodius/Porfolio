<?php

  	class Comment{
      private $id_Com;
      private $Validation;
      private $TextCom;
      private $DateCom;
      private $id_User;
      private $id_Blog;

      public function __construct($id_Com,$Validation,$TextCom,$DateCom,$id_user,$id_blog){
        $this->id_Com = $id_Com;
        $this->Validation = $Validation;
        $this->TextCom = $TextCom;
        $this->DateCom = $DateCom;
        $this->id_User = $id_user;
        $this->id_Blog = $id_blog;

      }

      public function getIdCom(){
        return $this->id_Com;
      }
      public function getValidation(){
        return $this->Validation;
      }
      public function getTextCom(){
        return $this->TextCom;
      }
      public function getDateCom(){
        return $this->DateCom;
      }
      public function getIdUser(){
        return $this->id_User;
      }
      public function getIdBlog(){
        return $this->id_Blog;
      }

      public function setIdCom($Id_Com){
        $this->$id_Com = $Id_Com;
      }
      public function setValidation($Validation){
        $this->Validation = $Validation;
      }
      public function setTextCom($TextCom){
        $this->TextCom = $TextCom;
      }
      public function setDateCom($DateCom){
        $this->DateCom = $DateCom;
      }
      public function setIdUser($id_user){
        $this->id_User = $id_user;
      }
      public function setIdBlog($id_blog){
        $this->id_Blog = $id_blog;
      }
    }

 
