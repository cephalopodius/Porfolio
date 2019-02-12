<html>
    <head><title>Inscription</title></head>
    <body>
        <h1>Inscrivez-vous</h1>
        <h2>Rentrez vos identifiant</h2>
        <form name="inscription" method="post" action="../repository/User.php">

			Entrez votre nom : <input type="text" name="nom"/> <br/>
            Entrez votre prénom : <input type="text" name="prenom"/><br/>
            Entrez votre adresse mail : <input type="mail" name="Mail"/> <br/>
            Entrez votre mot de passe : <input type="password" name="Password"/><br/>

            <input type="submit" name="valider" value="OK"/>


        </form>
    </body>
</html>
