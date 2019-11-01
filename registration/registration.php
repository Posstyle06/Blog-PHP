<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>Site</title>
    </head>
    <h1 style="text-align: center;">Inscription</h1>

    <body style="background-color:rgb(188,254,188);">
 

<form style = " margin-left: 30%;margin-right: 30%; padding: 10px; margin-top: 50px; margin-bottom: 50px; text-align: center; background-color: #CCCCCC" action="registration_post.php" method="post">
<p>
    <label for="pseudo">Votre pseudo</label> : <input type="text" name="pseudo" id="pseudo"/><br />
    <p><label for="pass">Mot de passe</label> : <input type="password" name="pass" id="pass"/><br /></p>
    <p style="position: relative; left: -44px"><label for="pass2">Confirmation mot de passe</label> : <input type="password" name="pass2" id="pass2"/><br /></p>
    <p style="position: relative; left: 5px"><label for="email">Votre Email</label> : <input type="text" name="email" id="email"/><br /></p>
    <p><input type="submit" value="Valider" /></p>
</p>
</form>


    </body>
</html>
