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
            toolbar: 'undo redo | bold italic underline | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify  |  numlist bullist checklist | forecolor casechange | fullscreen  preview | showcomments addcomment',
            menubar:false,  
            height:400,

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

    <header id="adminHeader">
        <?session_start();?>
        <span id="hello"><?php echo 'Bonjour ' . $_SESSION['pseudo'];?></span>

        <a href="index.php?action=adminListPosts"><img id="logo" src="public/images/logo_livre.PNG" alt="logo livre"/></a>
        <form id="connectForm" action="index.php?action=disconnectAdmin" method="post">
            <button id="disconnect" type="submit">Déconnexion</button>
        </form>

        <h1>Billet pour l'Alaska</h1>

        <nav>
            <ul>
                <li><a href="index.php?action=adminListPosts" title="Liste des articles">liste des articles</a></li>
                <li><a href="index.php?action=newPost" title="Nouvel article">Créer un nouvel article</a></li>
                <li><a href="index.php?action=moderation" title="Modérer les commentaires">Modération des commentaires</a></li>
            </ul>
        </nav>
    </header>    

    <body>
        <?= $content ?>

    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
        <script src="public/js/actions.js"></script>
    </body>
</html>