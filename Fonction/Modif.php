<?php
				session_start();

				include('cobdd.php');
				include("Identifiant.php");

				$message='';

				if($_SESSION['Level'] != 2){

					header('Location:../index.php');
				}

				if (empty($_POST['titre']) || empty($_POST['chapo']) || empty($_POST['contenu']) || empty($_POST['image'])) //checking void field
				{
					$message = '<p>une erreur s\'est produite pendant votre saisie.
					Vous devez remplir tous les champs</p>
					<p>Cliquez <a href="../Page/formajout.php">ici</a> pour revenir</p>';
				}
				else //modification databse
				{
					$db = new Connection();
					$query=$db->openConnection()->prepare('UPDATE blog SET Titre=:Titre, date=NOW(), Chapo= :Chapo, Contenu= :Contenu, image=:image, id_Admin= :id_Admin WHERE id_Blog =:id_Blog');
					$query->bindValue(':Titre',$_POST['titre'], PDO::PARAM_STR);
					$query->bindValue(':Chapo',$_POST['chapo'], PDO::PARAM_STR);
					$query->bindValue(':Contenu',$_POST['contenu'], PDO::PARAM_STR);
					$query->bindValue(':image',$_POST['image'], PDO::PARAM_STR);
					$query->bindValue(':id_Admin',1, PDO::PARAM_INT);
					$query->bindValue(':id_Blog',$_POST['id_Blog'], PDO::PARAM_STR);
					$query->execute();

					$message = '<p>blog modifié
					<p>Cliquez <a href="../index.php">ici</a> pour revenir</p>';

					echo $message.'</div></body></html>';

				}


	 ?>
