<?php

include_once('cobdd.php');

	class Blog{

		public $Titre;
		public $Chapo;
		public $Contenu;
		public $Image;
    public $id_Admin;
		public $id_Blog;


    public function __construct($Titre,$Chapo,$Contenu,$Image,$id_Admin,$id_Blog){

      $this->Titre = $Titre;
      $this->Chapo = $Chapo;
      $this->Contenu = $Contenu;
      $this->Image = $Image;
      $this->id_Admin = $id_Admin;
			$this->id_Blog = $id_Blog;
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

<<<<<<< master:Fonction/blogpost.php

		public function editBlog($Titre,$Chapo,$Contenu,$image,$id_Blog){
			try{
					$db = new Connection();
					$query=$db->openConnection()->prepare('UPDATE blog SET Titre=:Titre, date=NOW(), Chapo= :Chapo, Contenu= :Contenu, image=:image, id_Admin= :id_Admin WHERE id_Blog =:id_Blog');
					$query->bindParam(':Titre',$Titre, PDO::PARAM_STR);
					$query->bindParam(':Chapo',$Chapo, PDO::PARAM_STR);
					$query->bindParam(':Contenu',$Contenu, PDO::PARAM_STR);
					$query->bindParam(':image',$image, PDO::PARAM_STR);
					$query->bindParam(':id_Admin',1, PDO::PARAM_INT);
					$query->bindParam(':id_Blog', $id_Blog, PDO::PARAM_STR);
=======
		public function editBlog($currentBlog){
			try{
					$db = new Connection();
					$query=$db->openConnection()->prepare('UPDATE blog SET Titre=:Titre, date=NOW(), Chapo= :Chapo, Contenu= :Contenu, image=:image, id_Admin= :id_Admin WHERE id_Blog =:id_Blog');
					$query->bindParam(':Titre',$this->Titre, PDO::PARAM_STR);
					$query->bindParam(':Chapo',$this->Chapo, PDO::PARAM_STR);
					$query->bindParam(':Contenu',$this->Contenu, PDO::PARAM_STR);
					$query->bindParam(':image',$this->Image, PDO::PARAM_STR);
					$query->bindParam(':id_Admin',$this->id_Admin, PDO::PARAM_INT);
					$query->bindParam(':id_Blog',$this->id_Blog, PDO::PARAM_STR);
>>>>>>> editpost:Repository/blogpost.php
					$query->execute();

				}

			catch (PDOException $e)
			{
					echo "There is some problem in connection: " . $e->getMessage();
			}
		}


		public function deleteBlog(){
			try{
				$query=$db->prepare('DELETE FROM blog WHERE id_Blog = :id_Blog');
				$query->bindValue(':id_Blog',$id_blog, PDO::PARAM_STR);
				$query->execute();
			}

			catch(PDOException $e)
			{
					echo "There is some problem in connection: " . $e->getMessage();
			}
		}
}
?>
