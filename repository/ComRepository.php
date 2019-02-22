<?php
include_once('cobdd.php');
include_once('/../model/Commentaire.php');

	class ComRepository{

    public function __construct(){
    }

    public function getAllCom(){
      try{
        $db = new Connection();
        $query= $db->openConnection()->prepare('SELECT * FROM commentaire WHERE Validation = 1');
        $query->execute();
        $result = $query->fetchAll();

        $comList = array();
          foreach ($result as $key => $value) {
            $com = new Commentaire($value['id_Com'],$value['Validation'],$value['TextCom'],$value['Datecom'],$value['id_User'],$value['id_Blog']);
            $comList[$key] = $com;
        }
        return $comList;
      }
      catch (PDOException $e)
      {
          echo "There is some problem in connection: " . $e->getMessage();
      }
    }

    public function addCom($currentCommentaire){
			try{
				$db = new Connection();
				$query= $db->openConnection()->prepare('INSERT INTO commentaire(DateCom, TextCom, Validation, id_User,id_Blog) VALUES(NOW(), :TextCom, :Validation, :id_User, :id_Blog)');
				$query->bindValue(':TextCom',$currentCommentaire->getTextCom(), PDO::PARAM_STR);
				$query->bindValue(':Validation',$currentCommentaire->getValidation(), PDO::PARAM_STR);
				$query->bindValue(':id_User',$currentCommentaire->getIdUser(), PDO::PARAM_STR);
				$query->bindValue(':id_Blog',$currentCommentaire->getIdBlog(), PDO::PARAM_INT);
				$query->execute();
			}
			catch (PDOException $e)
			{
			    echo "There is some problem in connection: " . $e->getMessage();
			}
    }

		public function editCom($currentCommentaire){
			try{
					$db = new Connection();
					$query=$db->openConnection()->prepare('UPDATE commentaire SET  DateCom=NOW(), TextCom= :TextCom, Validation= :Validation, id_User=:id_User, id_Blog= :id_Blog WHERE id_Com =:id_Com');
					$query->bindParam(':id_Com',$currentCommentaire->getIdCom(), PDO::PARAM_STR);
					$query->bindParam(':TextCom',$currentCommentaire->getTextCom(), PDO::PARAM_STR);
					$query->bindParam(':Validation',$currentCommentaire->getValidation(), PDO::PARAM_STR);
					$query->bindParam(':id_Blog',$currentCommentaire->getIdBlog(), PDO::PARAM_STR);
					$query->bindParam(':id_User',$currentCommentaire->getIdUser(), PDO::PARAM_INT);
					$query->execute();

				}

			catch (PDOException $e)
			{
					echo "There is some problem in connection: " . $e->getMessage();
			}
		}


		public function deleteCom($id){
			try{
				$query=$db->prepare('DELETE FROM commentaire WHERE id_Com = :id_Com');
				$query->bindValue(':id_Com',$id, PDO::PARAM_STR);
				$query->execute();
			}

			catch(PDOException $e)
			{
					echo "There is some problem in connection: " . $e->getMessage();
			}
		}

}
    ?>
