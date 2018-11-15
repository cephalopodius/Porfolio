<?php
				session_start();
			   /* Inclusion du fichier de fonctions */
				include('cobdd.php');
				include("Identifiant.php");
				require("blog.php");
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
					$newBlog = new Blog($_POST['titre'],$_POST['chapo'], $_POST['contenu'],['image'],1);



				$newBlog->addBlog($newBlog);
					$message = '<p>blog ajouté
					<p>Cliquez <a href="../index.php">ici</a> pour revenir</p>';

					echo $message.'</div></body></html>';

				}


	 ?>
