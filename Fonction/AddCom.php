<?php	
				session_start();
			   /* Inclusion du fichier de fonctions */
				include('cobdd.php');
				include("Identifiant.php");
				connection();
			
				$message='';
				
				if($_SESSION['Level'] == 2 || $_SESSION['Level'] == 1){
					
								
					if (empty($_POST['Com']) ) //Oublie d'un champ
					{
						$message = '<p>une erreur s\'est produite pendant votre saisie.
						Vous devez remplir le champs</p>
						<p>Cliquez <a href="../index.php.php">ici</a> pour revenir</p>';
					}
					else //insertion bdd
					{
						$query=$db->prepare('INSERT INTO commentaire(id_Blog, Datecom, TextCom, Validation,id_User) VALUES(:id_Blog, NOW(), :TextCom, :Validation, :id_User)');
						$query->bindValue(':id_Blog',$_POST['id_Blog'], PDO::PARAM_STR);	
						$query->bindValue(':TextCom',$_POST['Com'], PDO::PARAM_STR);
						$query->bindValue(':Validation',0, PDO::PARAM_STR);
						$query->bindValue(':id_User',$_SESSION['id_User'], PDO::PARAM_STR);				
						$query->execute();
						
					
						
						$message = '<p>Commentaire ajouté et en attente de validation.
						<p>Cliquez <a href="../index.php">ici</a> pour revenir</p>';
										
						echo $message.'</div></body></html>';
					
						
						
					}
					
				}else{
					
						header('Location:../index.php');
				}
				
	 ?>