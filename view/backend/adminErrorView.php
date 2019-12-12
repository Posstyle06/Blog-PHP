<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <script src="https://cdn.tiny.cloud/1/2y5ag8foxfg0jmbvv4udk2e7hi0te1liclpdpynmivjtpzq8/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../css/style.css" />
        <link href="https://fonts.googleapis.com/css?family=Wallpoet&display=swap" rel="stylesheet">
        <title>Erreur</title>
        <meta name="description" content="Blog billet pour l'Alaska" />
    </head>
    
    <body>
        <div id="errorMessage">
            ERREUR: <?php echo $_SESSION['error'];
            unset($_SESSION['error']);
            ?>    
                <form action="../../index.php?action=adminListPosts">
                    <button type="submit">Retour à la liste des articles</button>
                </form>
        </div>
    </body>
</html>