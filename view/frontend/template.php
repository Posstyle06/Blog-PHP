<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css" />
        <link rel="icon" type="image/png" href="favicon.png" /> 
        <title><?= $title ?></title>
        <meta name="description" content="Blog billet pour l'Alaska" />
    </head>
    <header>
        <a href="http://localhost/PHP/projet4/index.php" ><img src="public/images/logo_livre.PNG" alt="logo livre"/></a>
        <button>Accès administrateur</button>
    </header>    
    <body>
        <?= $content ?>
    </body>
</html>