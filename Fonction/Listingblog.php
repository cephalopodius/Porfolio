		
		<?php
		
		session_start();
			   /* Inclusion du fichier de fonctions */
				include('cobdd.php');
				include("Identifiant.php");
				connection();
				$i =0 ;
				
				
		$query=$db->prepare('SELECT id_Blog, date , Titre , Chapo , Contenu , image FROM blog LIMIT 0 ,5');
		$query->execute();
		$data=$query->fetch();
		
		for ($data['id_Blog'] =< $i ; i++) 
		{
			
			echo '<div class="col-md-6 col-lg-4">
            <a class="portfolio-item d-block mx-auto" href="#portfolio-modal-1">
              <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                  <i class="fas fa-search-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="'$img'" alt="">
            </a>
          </div>';
		
		}
	
		
		?>