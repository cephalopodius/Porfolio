<?php
				session_start();

<<<<<<< master:controleur/controleurblogpost.php
				include("../repository/cobdd.php");
				include("../repository/Identifiant.php");
				include("../model/Blog.php");
				require("../repository/blogpost.php");
=======
				include("../Repository/cobdd.php");
				include("../Repository/Identifiant.php");
				require("../Repository/blogpost.php");
>>>>>>> editpost:Controleur/controleur.php


				$message='';

				if($_SESSION['Level'] != 2){

					header('Location:index.php');
				}
				$Repository = new blogRepository();

// checking which function call


//section add blog
				if ($_POST['type'] == "addblog") {

									if (empty($_POST['titre']) || empty($_POST['chapo']) || empty($_POST['contenu']) || empty($_POST['image'])) //checking void field
									{
										$message = '<p>une erreur s\'est produite pendant votre saisie.
										Vous devez remplir tous les champs</p>
										<p>Cliquez <a href="Page/formajout.php">ici</a> pour revenir</p>';
									}
									else //add to database
									{
										$newBlog = new Blog($_POST['titre'],$_POST['chapo'], $_POST['contenu'],$_POST['image'],1,1);

										$Repository->addBlog($newBlog);
										$message = '<p>blog ajouté
										<p>Cliquez <a href="../index.php">ici</a> pour revenir</p>';

									}
											echo $message.'</div></body></html>';
				}

//section editblog
				if ($_POST['type'] == "editblog") {


				if (empty($_POST['titre']) || empty($_POST['chapo']) || empty($_POST['contenu']) || empty($_POST['image'])) //checking void field
				{
					$message = '<p>une erreur s\'est produite pendant votre saisie.
					Vous devez remplir tous les champs</p>
<<<<<<< master:controleur/controleurblogpost.php
					<p>Cliquez <a href="../page/formajout.php">ici</a> pour revenir</p>';
=======
					<p>Cliquez <a href="../Page/formajout.php">ici</a> pour revenir</p>';
>>>>>>> editpost:Controleur/controleur.php
				}
				//modification database
				else
				{
							$newBlog = new Blog($_POST['titre'],$_POST['chapo'], $_POST['contenu'],$_POST['image'],1,$_POST['id_Blog']);
<<<<<<< master:controleur/controleurblogpost.php
							$Repository->editBlog($newBlog);
=======
							$newBlog->editBlog($newBlog);
>>>>>>> editpost:Controleur/controleur.php
							$message = '<p>blog modifié
							<p>Cliquez <a href="../index.php">ici</a> pour revenir</p>';

				}
				echo $message.'</div></body></html>';
			}

			if ($_POST['type'] == "deleteblog"){

								if (($_POST['Validation'] == "EFFACER")){

										$Repository->deleteblog($_POST['id_Blog']);
										$message = '<p>blog supprimé
										<p>Cliquez <a href="../index.php">ici</a> pour revenir</p>';

								}
							echo $message.'</div></body></html>';
			}

	 ?>
