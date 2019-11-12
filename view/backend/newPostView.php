<?php $title = "Billet pour l'Alaska"; ?>

<?php ob_start(); ?>

<h1>Nouvel article</h1>


<form id="postForm" action="index.php?action=addpost" method="post">

    <p><label for="author_post">Auteur</label>  <input type="text" name="author_post" id="author_post"/></p>
    <p><label for="title">Titre du post</label>  <input type="text" name="title" id="title"/></p>
    <p><label for="content">Rédigez votre article</label><br /><textarea 2px name="content" id="adminContent" rows= "10" cols="50"></textarea></p>
    <p><input type="submit" name="newpost" value="Valider" /></p>

</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>