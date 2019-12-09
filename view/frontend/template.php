<!DOCTYPE html>
<html lang="fr">
    <head>
        <script src="https://cdn.tiny.cloud/1/2y5ag8foxfg0jmbvv4udk2e7hi0te1liclpdpynmivjtpzq8/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>tinymce.init({
            selector:'textarea#adminContent', 
            plugins: [
              'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
              'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
              'save table directionality emoticons template paste'
            ],
            toolbar: 'undo redo | bold italic underline | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify  |  numlist bullist checklist | forecolor casechange | emoticons | fullscreen  preview | showcomments addcomment',
            width: 600,
            height: 300,
            entity_encoding : "raw",
        });</script>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css" />
        <link href="https://fonts.googleapis.com/css?family=Wallpoet&display=swap" rel="stylesheet">
        <link rel="icon" type="image/png" href="favicon.png" /> 
        <title><?= $title ?></title>
        <meta name="description" content="Blog billet pour l'Alaska" />
    </head>
    <body>
    <header>
        <a id="displayConnectForm">Connexion<br/>administrateur</a>
        <a href="index.php"><img id="logo" src="public/images/logo_livre.PNG" alt="logo livre"/></a>
        <h1>Billet pour l'Alaska</h1>
        <form id="connectForm" action="index.php?action=connectAdmin" method="post">
            <span> Connexion administrateur</span><br/><br/>
            
            <label for="pseudo">Votre pseudo</label>    <input type="text" name="pseudo" id="pseudo" value= "<?php if (isset ($_COOKIE['pseudo'])) echo htmlspecialchars($_COOKIE['pseudo']); ?>"/><br />
            <label for="pass">Mot de passe</label>    <input type="password" name="pass" id="pass" value= ""/><br />
            <button id="Connexion" type="submit">Valider</button>
        </form>
        
        <?php
          if(isset($_SESSION['error'])) {
           echo '<span id="connexionError">'.$_SESSION['error'].'</span>';
           unset($_SESSION['error']);
          }
        ?>       
    </header>    

        <?= $content ?>

        <script src="https://code.jquery.com/jquery-3.4.1.js"
            integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
            crossorigin="anonymous"></script>
        <script src="public/js/actions.js"></script>
    </body>
</html>