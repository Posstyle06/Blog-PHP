<?php $title = "Billet pour l'Alaska"; ?>

<?php ob_start(); ?>

<div class="addNewPost">Ajouter un nouvel article</div>


<form id="postForm" action="index.php?action=addpost" method="post">
	<?php
      if(isset($_SESSION['error'])) {
       echo '<span id="emptyPostError">'.$_SESSION['error'].'</span>';
       unset($_SESSION['error']);
      }
    ?>

    <p><label for="author_post">Auteur</label><br/><br/>  
    	<input type="text" name="author_post" id="author_post"/></p>
    <p><label for="title">Titre du post</label><br/><br/>  
    	<input type="text" name="title" id="title"/></p>
    <p><label for="content">Rédigez votre article</label><br/><br/>
    	<textarea name="content" id="adminContent"></textarea></p>
    <p><input id="submitPost" type="submit" name="newpost" value="Valider" /></p>

</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>