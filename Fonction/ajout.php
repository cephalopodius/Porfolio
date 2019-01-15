<?php
				session_start();

				include('cobdd.php');
				include("Identifiant.php");
				require("blog.php");


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
				else //add to database
				{
					$newBlog = new Blog($_POST['titre'],$_POST['chapo'], $_POST['contenu'],$_POST['image'],1);



				$newBlog->addBlog($newBlog);
					$message = '<p>blog ajouté
					<p>Cliquez <a href="../index.php">ici</a> pour revenir</p>';

					echo $message.'</div></body></html>';

				}


	 ?>
