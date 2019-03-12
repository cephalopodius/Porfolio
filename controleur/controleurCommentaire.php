<?php
				session_start();



				$message='';
        $ComRepository= new ComRepository();

				if($_SESSION['Level'] == 2 || $_SESSION['Level'] == 1){


					if (empty($_POST['Com']) ) //checking if void field
					{
						$message = '<p>une erreur s\'est produite pendant votre saisie.
						Vous devez remplir le champs</p>
						<p>Cliquez <a href="../page/home.php.php">ici</a> pour revenir</p>';
					}
					else //add to database
					{

            $com = new Commentaire('',0,$_POST['Com'],'',$_SESSION['id_User'],$_POST['id_Blog']);
				    $ComRepository->addCom($com);

						$message = '<p>Commentaire ajouté et en attente de validation.
						<p>Cliquez <a href="../page/home.php">ici</a> pour revenir</p>';

						echo $message.'</div></body></html>';

					}

				}else{

						header('Location:../page/home.php');
				}

	 ?>
