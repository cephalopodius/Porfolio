<?php

include_once('cobdd.php');
include_once('/../model/Blog.php');

	class blogRepository{

    public function __construct(){
    }

		public function getAllBlog(){
			try{
				$db = new Connection();
				$query= $db->openConnection()->prepare('SELECT * FROM blog');
				$query->execute();
				$result = $query->fetchAll();

				$blogList = array();
					foreach ($result as $key => $value) {
						$blog = new Blog($value['Titre'],$value['Chapo'],$value['Contenu'],$value['image'],$value['date'],$value['id_Admin'],$value['id_Blog']);
						$blogList[$key] = $blog;
				}
				return $blogList;
			}
			catch (PDOException $e)
			{
			    echo "There is some problem in connection: " . $e->getMessage();
			}
		}

    public function addBlog($currentBlog){
			try{
				$db = new Connection();
				$query= $db->openConnection()->prepare('INSERT INTO blog(Titre, date, Chapo, Contenu, image,id_Admin) VALUES(:Titre, NOW(), :Chapo, :Contenu, :image, :id_Admin)');
				$query->bindValue(':Titre',$currentBlog->getTitre(), PDO::PARAM_STR);
				$query->bindValue(':Chapo',$currentBlog->getChapo(), PDO::PARAM_STR);
				$query->bindValue(':Contenu',$currentBlog->getContenu(), PDO::PARAM_STR);
				$query->bindValue(':image',$currentBlog->getImage(), PDO::PARAM_STR);
				$query->bindValue(':id_Admin',$currentBlog->getIdAdmin(), PDO::PARAM_INT);
				$query->execute();
			}
			catch (PDOException $e)
			{
			    echo "There is some problem in connection: " . $e->getMessage();
			}
    }

		public function editBlog($currentBlog){
			try{
					$db = new Connection();
					$query=$db->openConnection()->prepare('UPDATE blog SET Titre=:Titre, date=NOW(), Chapo= :Chapo, Contenu= :Contenu, image=:image, id_Admin= :id_Admin WHERE id_Blog =:id_Blog');
					$query->bindParam(':Titre',$currentBlog->getTitre(), PDO::PARAM_STR);
					$query->bindParam(':Chapo',$currentBlog->getChapo(), PDO::PARAM_STR);
					$query->bindParam(':Contenu',$currentBlog->getContenu(), PDO::PARAM_STR);
					$query->bindParam(':image',$currentBlog->getImage(), PDO::PARAM_STR);
					$query->bindParam(':id_Admin',$currentBlog->getIdAdmin(), PDO::PARAM_INT);
					$query->bindParam(':id_Blog',$currentBlog->getIdBlog(), PDO::PARAM_STR);
					$query->execute();

				}

			catch (PDOException $e)
			{
					echo "There is some problem in connection: " . $e->getMessage();
			}
		}


		public function deleteBlog($id){
			try{
				$query=$db->prepare('DELETE FROM blog WHERE id_Blog = :id_Blog');
				$query->bindValue(':id_Blog',$id, PDO::PARAM_STR);
				$query->execute();
			}

			catch(PDOException $e)
			{
					echo "There is some problem in connection: " . $e->getMessage();
			}
		}
}
?>
