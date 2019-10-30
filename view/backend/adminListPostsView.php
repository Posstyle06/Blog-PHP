<?php $title = "Billet pour l'Alaska"; ?>

<?php ob_start(); ?>

<header>
    <a href="http://localhost/PHP/projet4/index.php"><img id="logo" src="public/images/logo_livre.PNG" alt="logo livre"/></a>
    <h1>Billet pour l'Alaska</h1>
</header>    

<p>Derniers articles:</p>

<?php
while ($donnees = $posts->fetch())
{
?>
    <div class="news">
        
        <h3>
            <?php echo htmlspecialchars ($donnees['title']." Posté par ".$donnees['author']." le ".$donnees['date']); ?> :
        </h3>
        
        <p style="padding: 10px">
            <?php echo nl2br(htmlspecialchars ($donnees['content'])); ?><br/><br/>
            <?php $postId=$donnees['id'];?>
            <a href="http://localhost/PHP/projet4/index.php?action=post&amp;id=<?php echo $postId;?>">Commentaires</a>
            
        </p>
        
    </div>

<?php
}

?>

<form id="postForm" action="index.php?action=addpost" method="post">

    <p><label for="author_post">Auteur</label>  <input type="text" name="author_post" id="author_post"/></p>
    <p><label for="title">Titre du post</label>  <input type="text" name="title" id="title"/></p>
    <p><label for="content">Rédigez votre article</label><br /><textarea name="content" id="content" rows= "10" cols="50"></textarea></p>
    <p><input type="submit" name="newpost" value="Valider" /></p>

</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>