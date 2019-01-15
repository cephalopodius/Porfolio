
		<?php

		session_start();

				include('cobdd.php');
				include("Identifiant.php");
				connection();
				$i =0 ;
				

		$query=$db->prepare('SELECT id_Blog, date , Titre , Chapo , Contenu , image FROM blog LIMIT 0 ,5');
		$query->execute();
		$data=$query->fetch();

		ListingBlog(){
					 <?php foreach ($aAllCom as $aCom)  if ($aCom['id_Blog'] == $aBlog['id_Blog'] ) { ?>

						<?php foreach ($aAllUser as $aUser){
						  if($aUser['id_User'] == $aCom['id_User']){
							echo '
							<div class="row comspace">
						  <div class="col-md-3">De '.$aUser['nom']. ' le '.$aCom['Datecom'].' </div>
						  <div class="col-md-9">' .$aCom['TextCom']. '</div>
						  </div>';

						}}?>



                  <?php } ?>

		}



		?>
