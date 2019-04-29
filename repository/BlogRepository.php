<?php
namespace App\Repository;
use \PDO;

class BlogRepository{

	public function getAllBlog(){
		try{
			$db = new Connection();
			$query= $db->openConnection()->prepare('SELECT * FROM blog');
			$query->execute();
			$result = $query->fetchAll();

			$blogList = array();
				foreach ($result as $key => $value) {
					$blog = new \App\Model\Blog($value['Titre'],$value['Chapo'],$value['Contenu'],$value['image'],$value['date'],$value['id_Admin'],$value['id_Blog']);
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
			$test = true;
		}
		catch (PDOException $e)
		{
		    echo "There is some problem in connection: " . $e->getMessage();
				$test=false;
		}
		return $test;
  }

	public function editBlog($currentBlog){
		try{
				$db = new Connection();
				$query=$db->openConnection()->prepare('UPDATE blog SET Titre=:Titre, date=NOW(), Chapo= :Chapo, Contenu= :Contenu, image=:image, id_Admin= :id_Admin WHERE id_Blog =:id_Blog');
				$query->bindValue(':Titre',$currentBlog->getTitre(), PDO::PARAM_STR);
				$query->bindValue(':Chapo',$currentBlog->getChapo(), PDO::PARAM_STR);
				$query->bindValue(':Contenu',$currentBlog->getContenu(), PDO::PARAM_STR);
				$query->bindValue(':image',$currentBlog->getImage(), PDO::PARAM_STR);
				$query->bindValue(':id_Admin',$currentBlog->getIdAdmin(), PDO::PARAM_INT);
				$query->bindValue(':id_Blog',$currentBlog->getIdBlog(), PDO::PARAM_STR);
				$query->execute();
				$test = true;
			}
		catch (PDOException $e)
		{
				echo "There is some problem in connection: " . $e->getMessage();
				$test = false;
		}
		return $test;
	}

	public function deleteBlog($id){
		try{
			$db = new Connection();
			$query=$db->openConnection()->prepare('DELETE FROM blog WHERE id_Blog = :id_Blog');
			$query->bindValue(':id_Blog',$id, PDO::PARAM_STR);
			$query->execute();
		}
		catch(PDOException $e)
		{
				echo "There is some problem in connection: " . $e->getMessage();
		}
	}
}
