<?php
				session_start();

				include('Fonction/cobdd.php');
				include("Fonction/Identifiant.php");
				require("Fonction/blogpost.php");


				$message='';

				if($_SESSION['Level'] != 2){

					header('Location:index.php');
				}

// checking which function call


//section add blog
				if ($_POST['type'] == "addblog") {

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
										<p>Cliquez <a href="index.php">ici</a> pour revenir</p>';

										echo $message.'</div></body></html>';

									}
				}

//section editblog
				if ($_POST['type'] == "editblog") {


				if (empty($_POST['titre']) || empty($_POST['chapo']) || empty($_POST['contenu']) || empty($_POST['image'])) //checking void field
				{
					$message = '<p>une erreur s\'est produite pendant votre saisie.
					Vous devez remplir tous les champs</p>
					<p>Cliquez <a href="../Page/formajout.php">ici</a> pour revenir</p>';
				}
				else //modification database
				{

							editBlog($Titre = $_POST['titre'] , $Chapo = $_POST['chapo'] , $Contenu = $_POST['contenu'] , $image = $_POST['image'] , $id_Blog = $_POST['id_Blog']);
							$message = '<p>blog modifié
							<p>Cliquez <a href="index.php">ici</a> pour revenir</p>';

							echo $message.'</div></body></html>';

				}

			}

			if ($_POST['type'] == "deleteblog"){

								if (($_POST['Validation'] == "EFFACER")){

										deleteblog();
										$message = '<p>blog supprimé
										<p>Cliquez <a href="index.php">ici</a> pour revenir</p>';

										echo $message.'</div></body></html>';

								}

			}

	 ?>
