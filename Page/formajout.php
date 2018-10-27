<?php

	session_start();
if($_SESSION['level'] != 2){
	
	
}


?>
<html>
    <head><title>Ajout</title></head>
    <body>
        <h1>Remplir les champs</h1>

        <form name="inscription" method="post" action="../Fonction/ajout.php">
		
            Entrez le titre : <input type="text" name="titre"/> <br/>
            Entrez le chapo : <input type="text" name="chapo"/><br/>
			Entrez le contenu : <input type="text" name="contenu"/><br/>
			Entrez l'image associée : <input type="text" name="image"/><br/>
			
            <input type="submit" name="valider" value="OK"/>
        </form>
    </body>
</html>