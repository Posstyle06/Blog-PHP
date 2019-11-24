<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>Site</title>
    </head>
    <h1 id="registrationTitle">Inscription</h1>

    <body>
        <div id="pageContent"> 

        <form action="registration_post.php" method="post">
        <p>
            <label for="pseudo">Votre pseudo</label> : <input type="text" name="pseudo" id="pseudo"/><br />
            <p><label for="pass">Mot de passe</label> : <input type="password" name="pass" id="pass"/><br /></p>
            <p id="registrationPass2"><label for="pass2">Confirmation mot de passe</label> : <input type="password" name="pass2" id="pass2"/><br /></p>
            <p id="registrationEmail"><label for="email">Votre Email</label> : <input type="text" name="email" id="email"/><br /></p>
            <p><input type="submit" value="Valider" /></p>
        </p>
        </form>

        </div>

    </body>
</html>
