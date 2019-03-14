<?php

	session_start();
if($_SESSION['Level'] != 2){

	header('Location:home.php');
}

?>
<html>
    <head><title>Ajout de blog</title></head>
    <body>
        <h1>modifier les champs</h1>

        <form name="inscription" method="post" action="controllerBlogpost">

      Modifier le titre : <input type="text" name="titre"/> <br/>
      Modifier le chapo : <input type="text" name="chapo"/><br/>
			Modifier le contenu : <input type="text" name="contenu"/><br/>
			Modifier l'image associée : <input type="text" name="image"/><br/>

			<input type="hidden" name="type" value="addblog"/>

            <input type="submit" name="valider" value="OK"/>
        </form>
    </body>
</html>
