<?php

include_once('cobdd.php');

	class Blog{

		public $Titre;
		public $Chapo;
		public $Contenu;
		public $Image;
    public $id_Admin;


    public function __construct($Titre,$Chapo,$Contenu,$Image,$id_Admin){

      $this->Titre = $Titre;
      $this->Chapo = $Chapo;
      $this->Contenu = $Contenu;
      $this->Image = $Image;
      $this->id_Admin = $id_Admin;

    }



    public function addBlog($currentBlog){
			try{
				$db = new Connection();
				$query= $db->openConnection()->prepare('INSERT INTO blog(Titre, date, Chapo, Contenu, image,id_Admin) VALUES(:Titre, NOW(), :Chapo, :Contenu, :image, :id_Admin)');
				$query->bindParam(':Titre',$this->Titre, PDO::PARAM_STR);
				$query->bindParam(':Chapo',$this->Chapo, PDO::PARAM_STR);
				$query->bindParam(':Contenu',$this->Contenu, PDO::PARAM_STR);
				$query->bindParam(':image',$this->Image, PDO::PARAM_STR);
				$query->bindParam(':id_Admin',$this->id_Admin, PDO::PARAM_INT);
				$query->execute();
			}
			catch (PDOException $e)
			{
			    echo "There is some problem in connection: " . $e->getMessage();
			}
    }
	}

?>
