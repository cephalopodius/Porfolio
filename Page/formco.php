
<html>
    <head><title>Connection</title></head>
    <body>
      <h1>Identifiez-vous</h1>
      <h2>Rentrez vos identifiant</h2>
      <form name="inscription" method="post" action="../controleur/controleurUser.php">

          Entrez votre adresse mail : <input type="mail" name="mail"/> <br/>
          Entrez votre mot de passe : <input type="password" name="password"/><br/>
          <input type="hidden" name="type" value="connection"/>
          <input type="submit" name="valider" value="OK"/>

    <p> Vous n'avez pas de compte ? </p> <a href="forminscription.php">Cliquez ici</a>
        </form>
    </body>
</html>
