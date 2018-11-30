<?php
				session_start();
			   /* Inclusion du fichier de fonctions */
				include_once('cobdd.php');
				include("Identifiant.php");


				$prenom='';
				$message='';
				if (empty($_POST['mail']) || empty($_POST['password']) ) //Oublie d'un champ
				{
					$message = '<p>une erreur s\'est produite pendant votre identification.
				Vous devez remplir tous les champs</p>
				<p>Cliquez <a href="../Page/formco.php">ici</a> pour revenir</p>';
				}
				else //On check le mot de passe
				{
					$db = new Connection();
					$query= $db->openConnection()->prepare('SELECT Mail, id_User , id_Admin ,Password ,prenom FROM User WHERE Mail = :mail AND Password = :password');
					$query->bindValue(':mail',$_POST['mail'], PDO::PARAM_STR);
					$query->bindValue(':password',$_POST['password'], PDO::PARAM_STR);
					$query->execute();
					$data=$query->fetch();
					/*   test des valeurs
					$test1=md5($_POST['mail']);
					$test2=md5($_POST['password']);

					echo $data['Mail'];
					echo $data['Password'];
					echo $test1;
					echo $test2;

					*/





					if ($data['Mail'] == ($_POST['mail']) && $data['Password'] == ($_POST['password'])) // Acces OK !
					{



						if($data['id_Admin']== 1){

							$_SESSION['Level'] = 2;


						}else{

						$_SESSION['Level'] = 1;

						}

						$_SESSION['prenom'] = $data['prenom'];
						$message = '<p>Bienvenue '.$data['prenom'].',
							vous êtes maintenant connecté!</p>
							<p>Cliquez <a href="../index.php">ici</a>
							pour revenir à la page d accueil   '.$_SESSION['Level'].'</p>';
						$_SESSION['id_User'] = $data['id_User'];

					}
					else // Acces pas OK !
					{
						$message = "<p>Une erreur s\'est produite pendant votre identification.<br /> Le mot de passe ou l'adresse mail entrée n\'est pas correcte.</p><p>Cliquez <a href='./connexion.php'>ici</a>
						pour revenir à la page précédente
						<br /><br />Cliquez <a href='../index.php'>ici</a>
						pour revenir à la page d accueil</p>";
					}
					$query->CloseCursor();
				}
				echo $message.'</div></body></html>';

	 ?>
