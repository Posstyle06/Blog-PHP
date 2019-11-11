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
            width: 600,
            height: 300,
            entity_encoding : "raw",
        });</script>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css" />
        <link rel="icon" type="image/png" href="favicon.png" /> 
        <title><?= $title ?></title>
        <meta name="description" content="Blog billet pour l'Alaska" />
    </head>

    <body>
        <?= $content ?>

    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
        <script src="public/js/actions.js"></script>
    </body>
</html>