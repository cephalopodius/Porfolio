<?php	
				session_start();
			   /* Inclusion du fichier de fonctions */
				include('cobdd.php');
				include("Identifiant.php");
				connection();
			
				$message='';
				
				if($_SESSION['Level'] != 0){
					
					header('Location:../index.php');
				}
				
				if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['Mail']) || empty($_POST['Password'])) //Oublie d'un champ
				{
					$message = '<p>une erreur s\'est produite pendant votre saisie.
					Vous devez remplir tous les champs</p>
					<p>Cliquez <a href="../Page/formajout.php">ici</a> pour revenir</p>';
				}
				else //insertion bdd
				{
					$query=$db->prepare('INSERT INTO user(nom, prenom, Mail, Password) VALUES(:nom, :prenom, :Mail, :Password)');
					$query->bindValue(':nom',$_POST['nom'], PDO::PARAM_STR);
					$query->bindValue(':prenom',$_POST['prenom'], PDO::PARAM_STR);
					$query->bindValue(':Mail',$_POST['Mail'], PDO::PARAM_STR);
					$query->bindValue(':Password',$_POST['Password'], PDO::PARAM_STR);
									
					$query->execute();
					
				
					
					$message = '<p>Félicitation vous êtes inscrit !</p>
					<p>Cliquez <a href="../index.php">ici</a> pour revenir</p>';
									
					echo $message.'</div></body></html>';
				
					$_SESSION['Level'] = 1;
					
				}
					
				
	 ?>