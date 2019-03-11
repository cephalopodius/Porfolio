<?php
				session_start();

				include('../repository/cobdd.php');
				include("../repository/Identifiant.php");
        include('../model/User.php');
        include('../repository/UserRepository.php');

				$message='';
				$prenom='';
  			$UserRepository= new UserRepository();

					if ($_POST['type'] == "connection"){

    				if (empty($_POST['mail']) || empty($_POST['password']) ) //checking void field
    				{
    					$message = '<p>une erreur s\'est produite pendant votre identification.
    				Vous devez remplir tous les champs</p>
    				<p>Cliquez <a href="../page/formco.php">ici</a> pour revenir</p>';
    				}
    				else //checking password
    				{
              $user = new User('','','','',$_POST['mail'],$_POST['password']);
              $UserRepository->connection($user);

              $message = '<p>Bonjour , vous êtes maintenant connecté
              <p>Cliquez <a href="page/home.php">ici</a> pour revenir</p>';

            }
						  echo $message.'</div></body></html>';
						}

						if ($_POST['type'] == "inscription"){

							  $message='';

							  if($_SESSION['Level'] != 0){

							    header('Location:../page/home.php');
							  }

							  if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['mail']) || empty($_POST['password'])) //checking void field
							  {
							    $message = '<p>une erreur s\'est produite pendant votre saisie.
							    Vous devez remplir tous les champs</p>
							    <p>Cliquez <a href="../page/formajout.php">ici</a> pour revenir</p>';
							  }
							  else //add to database
							  {

											$user = new User('',$_POST['prenom'],$_POST['nom'],'',$_POST['mail'],$_POST['password']);
											$UserRepository->inscription($user);
											$message = '<p>Félicitation vous êtes inscrit !</p>
											<p>Cliquez <a href="../page/home.php">ici</a> pour revenir</p>';

							  }
							echo $message.'</div></body></html>';

						}


if ($_POST['type'] == "delete"){

}
	 ?>
