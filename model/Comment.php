<?php
  	class Comment{
      private $idCom;
      private $Validation;
      private $TextCom;
      private $DateCom;
      private $idUser;
      private $idBlog;

      public function __construct($id_Com,$Validation,$TextCom,$DateCom,$id_user,$id_blog){
        $this->idCom = $id_Com;
        $this->Validation = $Validation;
        $this->TextCom = $TextCom;
        $this->DateCom = $DateCom;
        $this->idUser = $id_user;
        $this->idBlog = $id_blog;
      }

      public function getIdCom(){
        return $this->idCom;
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
        return $this->idUser;
      }
      public function getIdBlog(){
        return $this->idBlog;
      }
      public function setIdCom($Id_Com){
        $this->$idCom = $Id_Com;
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
        $this->idUser = $id_user;
      }
      public function setIdBlog($id_blog){
        $this->idBlog = $id_blog;
      }
    }
