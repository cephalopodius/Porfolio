<?php

	session_start();
if($_SESSION['Level'] != 2){
	header('Location:home.php');

}


		   $db = new Connection();
	  $query=$db->openConnection()->prepare('SELECT Titre, Chapo, Contenu, id_Blog, image FROM blog');
		  $query->execute();
		  $aAllBlog = $query->fetchAll();

?>
<html>
    <head><title>Edition/Suppression</title></head>
    <body>
        <h1>Remplir les champs</h1>

		 <div class="row">
          <?php
          $iIndent = 0;
          foreach ($aAllBlog as $aBlog) { ?>

        <form name="edit-blog-<?= $iIndent ?>" method="post" action="controllerBlogpost">
			Blog numéro : <?= $aBlog['id_Blog'] ?> <br/>
      Entrez le titre : <input type="text" name="titre" size="20" value="<?= $aBlog['Titre'] ?>"/> <br/>
      Entrez le chapo : <input type="text" name="chapo" size="20" value="<?= $aBlog['Chapo'] ?>"/> <br/>
			Entrez le contenu : <input type="text" name="contenu" size="80" value="<?= $aBlog['Contenu'] ?>"/> <br/>
			Entrez l'image associée : <input type="text" name="image" value="<?= $aBlog['image'] ?>"/><br/>
			<input type="hidden" name="id_Blog" value="<?= $aBlog['id_Blog'] ?>"/>
			<input type="hidden" name="type" value="editblog"/>
            <input type="submit" name="valider" value="Editer"/>
        </form>

		  <form name="delete" method="post" action="controllerBlogpost">
			Ecrire EFFACER pour supprimer: <input type="text" name="Validation" size="20" /> <br/>
			<input type="hidden" name="id_Blog" value="<?= $aBlog['id_Blog'] ?>"/><br/>
			<input type="hidden" name="type" value="deleteblog"/>
            <input type="submit" name="valider" value="Supprimer"/>
        </form>


          <?php
          $iIndent++;
          } ?>



    </body>
</html>
