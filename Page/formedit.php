<?php

	session_start();
if($_SESSION['Level'] != 2){
	header('Location:../index.php');

}
		   /* Inclusion du fichier de fonctions */
			include('../Fonction/cobdd.php');
			include("../Fonction/Identifiant.php");
			/* connexion a la bdd */

		   $db = new Connection();
	  $query=$db->openConnection()->prepare('SELECT Titre, Chapo, Contenu, id_Blog, image FROM blog');
		  $query->execute();
		  $aAllBlog = $query->fetchAll();

?>
<html>
    <head><title>Ajout</title></head>
    <body>
        <h1>Remplir les champs</h1>

		 <div class="row">
          <?php
          $iIndent = 0;
          foreach ($aAllBlog as $aBlog) { ?>


        <form name="inscription" method="post" action="../Fonction/modif.php">
			Blog numéro : <?= $aBlog['id_Blog'] ?> <br/>
            Entrez le titre : <input type="text" name="titre" size="20" value="<?= $aBlog['Titre'] ?>"/> <br/>
            Entrez le chapo : <input type="text" name="chapo" size="20" value="<?= $aBlog['Chapo'] ?>"/> <br/>
			Entrez le contenu : <input type="text" name="contenu" size="80" value="<?= $aBlog['Contenu'] ?>"/> <br/>
			Entrez l'image associée : <input type="text" name="image" value="<?= $aBlog['image'] ?>"/><br/>
			<input type="hidden" name="id_Blog" value="<?= $aBlog['id_Blog'] ?>"/><br/>

            <input type="submit" name="valider" value="Editer"/>
        </form>


		  <form name="inscription" method="post" action="../Fonction/Suppression.php">
			Ecrire EFFACER pour supprimer: <input type="text" name="Validation" size="20" /> <br/>
			<input type="hidden" name="id_Blog" value="<?= $aBlog['id_Blog'] ?>"/><br/>

            <input type="submit" name="valider" value="Supprimer"/>
        </form>


          <?php
          $iIndent++;
          } ?>



    </body>
</html>
