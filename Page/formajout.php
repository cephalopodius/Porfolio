<?php

	session_start();
if($_SESSION['Level'] != 2){

	header('Location:../index.php');
}


?>
<html>
    <head><title>Edition/suppression</title></head>
    <body>
        <h1>modifier les champs</h1>

        <form name="inscription" method="post" action="../controleur.php">

      Modifier le titre : <input type="text" name="titre"/> <br/>
      Modifier le chapo : <input type="text" name="chapo"/><br/>
			Modifier le contenu : <input type="text" name="contenu"/><br/>
			Modifier l'image associée : <input type="text" name="image"/><br/>

	<input type="hidden" name="type" value="addblog"/><br/>

            <input type="submit" name="valider" value="OK"/>
        </form>
    </body>
</html>
