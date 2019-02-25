<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Porfolio</title>

    <!-- Bootstrap core CSS -->
    <link href="asset/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="asset/vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="asset/css/freelancer.css" rel="stylesheet">

  </head>

  	   <?php
			session_start();

			include('repository/cobdd.php');
			include("repository/Identifiant.php");
      include('repository/blogpost.php');
      include("repository/ComRepository.php");
      include('repository/UserRepository.php');



			/*databse connection */
      $db = new Connection();
		   $db = $db->openConnection();

		/*checking access level */
			if(!isset($_SESSION['Level'])){
				$_SESSION['Level'] = 0;
			}

		$BlogRepository = new blogRepository();
    $ComRepository = new ComRepository();
    $UserRepository = new UserRepository();

    $userList = $UserRepository->getUserList();
    $blogList = $BlogRepository->getAllBlog();
    $comList = $ComRepository->getAllCom();
      ?>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Bienvenue</a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#portfolio">Portfolio</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">Moi</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">Contact</a>
            </li>
			<?php
			if ($_SESSION['Level'] == 0)
			{
				echo '<li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="page/formco.php">Connexion</a>
            </li>';
			}
			else {
				echo '<li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="repository/Deconnexion.php">Deconnexion</a>
            </li>';
			}

			if ($_SESSION['Level'] == 2)
			{
				echo '<li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="page/formajout.php">Ajout</a>
            </li>';
				echo '<li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="page/formedit.php">Editer</a>
            </li>';
			}

			?>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead bg-primary text-white text-center">
      <div class="container">
        <img class="img-fluid mb-5 d-block mx-auto" src="asset/img/profile.png" alt="">
        <h1 class="text-uppercase mb-0">Robin Campino , enchanté de vous connaitre </h1>
        <hr class="star-light">
        <h2 class="font-weight-light mb-0">Web Developer</h2>
      </div>
    </header>

    <!-- Portfolio Grid Section -->
    <section class="portfolio" id="portfolio">
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">Mes Projets</h2>
        <hr class="star-dark mb-5">
        <div class="row">
          <?php
          $iIndent = 0;
          foreach ($blogList as $aBlog) { ?>
            <div class="col-md-6 col-lg-4">
              <a class="portfolio-item d-block mx-auto" href="#portfolio-modal-<?= $iIndent ?>">
                <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                  <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                    <i class="fas fa-search-plus fa-3x"></i>
                  </div>
                </div>
                <img class="img-fluid" src="<?= $aBlog->getImage() ?>" alt="">
              </a>
            </div>
          <?php
          $iIndent++;
          } ?>
        </div>
      </div>
    </section>

    <!-- About Section -->
    <section class="bg-primary text-white mb-0" id="about">
      <div class="container">
        <h2 class="text-center text-uppercase text-white">Qui suis je ?</h2>
        <hr class="star-light mb-5">
        <div class="row">
          <div class="col-lg-4 ml-auto">
            <p class="lead">Freelancer is a free bootstrap theme created by Start Bootstrap. The download includes the complete source files including HTML, CSS, and JavaScript as well as optional LESS stylesheets for easy customization.</p>
          </div>
          <div class="col-lg-4 mr-auto">
            <p class="lead">Whether you're a student looking to showcase your work, a professional looking to attract clients, or a graphic artist looking to share your projects, this template is the perfect starting point!</p>
          </div>
        </div>
        <div class="text-center mt-4">
          <a class="btn btn-xl btn-outline-light" href="#">
            <i class="fas fa-download mr-2"></i>
            Mon Cv
          </a>
        </div>
      </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">Me contacter</h2>
        <hr class="star-dark mb-5">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
            <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
            <form name="sentMessage" id="contactForm" novalidate="novalidate">
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Nom</label>
                  <input class="form-control" id="name" type="text" placeholder="Nom" required="required" data-validation-required-message="Saisir votre nom">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Adresse Email</label>
                  <input class="form-control" id="email" type="email" placeholder="Email" required="required" data-validation-required-message="Saisir votre adresse mail">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Téléphone</label>
                  <input class="form-control" id="phone" type="tel" placeholder="Téléphone" required="required" data-validation-required-message="Saisir votre numéro de téléphone">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Message</label>
                  <textarea class="form-control" id="message" rows="5" placeholder="Message" required="required" data-validation-required-message="rédiger votre message"></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <br>
              <div id="success"></div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Envoyer</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="footer text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-4 mb-5 mb-lg-0">
            <h4 class="text-uppercase mb-4">Location</h4>
            <p class="lead mb-0">22120 Hillion
              <br>Bretagne</p>
          </div>
          <div class="col-md-4 mb-5 mb-lg-0">
            <h4 class="text-uppercase mb-4">Around the Web</h4>
            <ul class="list-inline mb-0">
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                  <i class="fab fa-fw fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                  <i class="fab fa-fw fa-google-plus-g"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                  <i class="fab fa-fw fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                  <i class="fab fa-fw fa-linkedin-in"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                  <i class="fab fa-fw fa-dribbble"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <h4 class="text-uppercase mb-4">N'hésitez pas à me contacter</h4>
            <p class="lead mb-0">Normalement je ne mords pas mais sait-on jamais</a>.</p>
          </div>
        </div>
      </div>
    </footer>

    <div class="copyright py-4 text-center text-white">
      <div class="container">
        <small>Copyright &copy; Your Website 2018</small>
      </div>
    </div>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-to-top d-lg-none position-fixed ">
      <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
        <i class="fa fa-chevron-up"></i>
      </a>
    </div>

    <!-- Portfolio Modals -->

    <!-- Portfolio Modal motor -->

    <?php
    $iIndent = 0;
    foreach ($blogList as $aBlog) { ?>

      <div class="portfolio-modal mfp-hide" id="portfolio-modal-<?= $iIndent ?>">
        <div class="portfolio-modal-dialog bg-white">
          <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
            <i class="fa fa-3x fa-times"></i>
          </a>
          <div class="container text-center">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <h1 class="text-secondary text-uppercase mb-0"><?= $aBlog->getTitre() ?></h1>
                <hr class="star-dark mb-5">
				<h2 class="text-secondary text-uppercase mb-0"><?= $aBlog->getChapo() ?></h2>
                <img class="img-fluid mb-5" src="<?= $aBlog->getImage() ?>" alt="">
                <p class="mb-10"><?= $aBlog->getContenu() ?></p>
				 <div class="col-md-12 comspace">Espace commentaire<br/>
				     <!-- Comment-->

          			<?php foreach ($comList as $aCom){
                   if ($aCom->getIdBlog() == $aBlog->getIdBlog() ){  ?>

						<?php foreach($userList as $aUser){
              if ($aUser->getIdUser() == $aCom->getIdUser()){

                echo '
                <div class="row comspace">
                <div class="col-md-3">De '.$aUser->getNom(). '  '.$aUser->getPrenom(). ' le '.$aCom->getDateCom().' </div>
                <div class="col-md-9">' .$aCom->getTextCom(). '</div>
                </div>';

              }

            }

						}} ?>
				  <!-- add comment by visitor -->
					<?php
					if(($_SESSION['Level'] == 1) || ($_SESSION['Level'] == 2)){?>
						   <form name="inscription" method="post" action="controleur/controleurCommentaire.php">

							Saississez votre commentaire <br/>

							<textarea name="Com" rows="10" cols="30"></textarea>

							<input type="hidden" name="id_Blog" value="<?= $aBlog->getIdBlog() ?>"/><br/>

							<input type="submit" name="valider" value="Commenter"/>
						</form>

						 <?php } ?>

						 </div>
                <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
                  <i class="fa fa-close"></i>
                  Fermer le projet</a>
                </div>
              </div>
            </div>
          </div>
        </div>

    <?php
    $iIndent++;
  } ?>

    <!-- Bootstrap core JavaScript -->
    <script src="asset/vendor/jquery/jquery.min.js"></script>
    <script src="asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="asset/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="asset/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="asset/js/jqBootstrapValidation.js"></script>
    <script src="asset/js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="asset/js/freelancer.min.js"></script>

  </body>

</html>
