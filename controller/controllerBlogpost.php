<?php
				session_start();

				$message='';

				if($_SESSION['Level'] != 2){

					header('Location:home');
				}
				$Repository = new blogRepository();

// checking which function call


//section add blog
				if ($_POST['type'] == "addblog") {

									if (empty($_POST['titre']) || empty($_POST['chapo']) || empty($_POST['contenu']) || empty($_POST['image'])) //checking void field
									{
										$message = '<p>une erreur s\'est produite pendant votre saisie.
										Vous devez remplir tous les champs</p>
										<p>Cliquez <a href="ajout">ici</a> pour revenir</p>';
									}
									else //add to database
									{
										$newBlog = new Blog($_POST['titre'],$_POST['chapo'], $_POST['contenu'],$_POST['image'],'',1,1);

										$Repository->addBlog($newBlog);
										$message = '<p>blog ajouté
										<p>Cliquez <a href="home">ici</a> pour revenir</p>';

									}
											echo $message.'</div></body></html>';
				}

//section editblog
				if ($_POST['type'] == "editblog") {


				if (empty($_POST['titre']) || empty($_POST['chapo']) || empty($_POST['contenu']) || empty($_POST['image'])) //checking void field
				{
					$message = '<p>une erreur s\'est produite pendant votre saisie.
					Vous devez remplir tous les champs</p>
					<p>Cliquez <a href="ajout">ici</a> pour revenir</p>';
				}
				//modification database
				else
				{
							$newBlog = new Blog($_POST['titre'],$_POST['chapo'], $_POST['contenu'],$_POST['image'],'',1,$_POST['id_Blog']);
							$Repository->editBlog($newBlog);
							$message = '<p>blog modifié
							<p>Cliquez <a href="home">ici</a> pour revenir</p>';

				}
				echo $message.'</div></body></html>';
			}

			if ($_POST['type'] == "deleteblog"){

								if (($_POST['Validation'] == "EFFACER")){

										$Repository->deleteblog($_POST['id_Blog']);
										$message = '<p>blog supprimé
										<p>Cliquez <a href="home">ici</a> pour revenir</p>';

								}
							echo $message.'</div></body></html>';
			}

	 
