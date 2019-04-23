<?php
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
            $com = new Comment($value['id_Com'],$value['Validation'],$value['TextCom'],$value['Datecom'],$value['id_User'],$value['id_Blog']);
            $comList[$key] = $com;
        }
        return $comList;
      }
      catch (PDOException $e)
      {
          echo "There is some problem in connection: " . $e->getMessage();
      }
    }

    public function addCom($currentComment){
			try{
				$db = new Connection();
				$query= $db->openConnection()->prepare('INSERT INTO commentaire(DateCom, TextCom, Validation, id_User,id_Blog) VALUES(NOW(), :TextCom, :Validation, :id_User, :id_Blog)');
				$query->bindValue(':TextCom',$currentComment->getTextCom(), PDO::PARAM_STR);
				$query->bindValue(':Validation',$currentComment->getValidation(), PDO::PARAM_STR);
				$query->bindValue(':id_User',$currentComment->getIdUser(), PDO::PARAM_STR);
				$query->bindValue(':id_Blog',$currentComment->getIdBlog(), PDO::PARAM_INT);
				$query->execute();
				$test =true;
			}
			catch (PDOException $e)
			{
			    echo "There is some problem in connection: " . $e->getMessage();
					$test=false;
			}
			return $test;
    }

		public function editCom($currentComment){
			try{
					$db = new Connection();
					$query=$db->openConnection()->prepare('UPDATE commentaire SET  DateCom=NOW(), TextCom= :TextCom, Validation= :Validation, id_User=:id_User, id_Blog= :id_Blog WHERE id_Com =:id_Com');
					$query->bindParam(':id_Com',$currentComment->getIdCom(), PDO::PARAM_STR);
					$query->bindParam(':TextCom',$currentComment->getTextCom(), PDO::PARAM_STR);
					$query->bindParam(':Validation',$currentComment->getValidation(), PDO::PARAM_STR);
					$query->bindParam(':id_Blog',$currentComment->getIdBlog(), PDO::PARAM_STR);
					$query->bindParam(':id_User',$currentComment->getIdUser(), PDO::PARAM_INT);
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
