<!DOCTYPE html>
<html lang="fr">
    <head>
        <script src="https://cdn.tiny.cloud/1/2y5ag8foxfg0jmbvv4udk2e7hi0te1liclpdpynmivjtpzq8/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>tinymce.init({selector:'textarea'});</script>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="public/css/style.css" rel="stylesheet" />
        <link rel="icon" type="image/png" href="favicon.png" /> 
        <title><?= $title ?></title>
        <meta name="description" content="Reservation de vélos sur la ville de Toulouse" />
    </head>
        
    <body style="background-color:rgb(188,254,188);">
        <?= $content ?>
    </body>
</html>