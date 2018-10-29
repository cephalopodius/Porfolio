<?php	
				session_start();
			   /* Inclusion du fichier de fonctions */
				include('cobdd.php');
				include("Identifiant.php");
				connection();
			
				$message='';
				
				if($_SESSION['Level'] != 2){
					
					header('Location:../index.php');
				}
				
				if (empty($_POST['titre']) || empty($_POST['chapo']) || empty($_POST['contenu']) || empty($_POST['image'])) //Oublie d'un champ
				{
					$message = '<p>une erreur s\'est produite pendant votre saisie.
					Vous devez remplir tous les champs</p>
					<p>Cliquez <a href="../Page/formajout.php">ici</a> pour revenir</p>';
				}
				else //insertion bdd
				{
					$query=$db->prepare('INSERT INTO blog(Titre, date, Chapo, Contenu, image,id_Admin) VALUES(:Titre, NOW(), :Chapo, :Contenu, :image, :id_Admin)');
					$query->bindValue(':Titre',$_POST['titre'], PDO::PARAM_STR);
					$query->bindValue(':Chapo',$_POST['chapo'], PDO::PARAM_STR);
					$query->bindValue(':Contenu',$_POST['contenu'], PDO::PARAM_STR);
					$query->bindValue(':image',$_POST['image'], PDO::PARAM_STR);
					$query->bindValue(':id_Admin',1, PDO::PARAM_INT);					
					$query->execute();
					
				
					
					$message = '<p>blog ajouté
					<p>Cliquez <a href="../index.php">ici</a> pour revenir</p>';
									
					echo $message.'</div></body></html>';
				
					
					
				}
					
				
	 ?>