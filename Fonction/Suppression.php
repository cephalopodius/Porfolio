<?php
				session_start();

				include('cobdd.php');
				include("Identifiant.php");
				connection();

				$message='';


				if($_SESSION['Level'] != 2){

					header('Location:../index.php');
				}
				
				if (($_POST['Validation'] == "EFFACER")) //checking information to delete
				{
					$query=$db->prepare('DELETE FROM blog WHERE id_Blog = :id_Blog');
					$query->bindValue(':id_Blog',$_POST['id_Blog'], PDO::PARAM_STR);
					$query->execute();

					$message = '<p>blog supprimé
					<p>Cliquez <a href="../index.php">ici</a> pour revenir</p>';

					echo $message.'</div></body></html>';
				}
				else //modification databse
				{

					$message = '<p>une erreur s\'est produite pendant votre saisie.
					Vous devez remplir tous les champs</p>
					<p>Cliquez <a href="../Page/formedit.php">ici</a> pour revenir</p>';

					echo $message.'</div></body></html>';
				}


	 ?>
