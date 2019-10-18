<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p>Derniers posts du blog :</p>


<?php
while ($donnees = $posts->fetch())
{
?>
    <div class="news">
        
        <h3 style="padding: 2px;">
            <?php echo htmlspecialchars ($donnees['title']." Posté par ".$donnees['author_post']." le ".$donnees['date']); ?> :
        </h3>
        
        <p style="padding: 10px">
            <?php echo nl2br(htmlspecialchars ($donnees['content'])); ?><br/><br/>
            <?php $postId=$donnees['id'];?>
            <a href="http://index.php?action=post&amp;postId=<?php echo $postId;?>">Commentaires</a>
            
        </p>
        
    </div>

<?php
}

?>

<form style = " margin-top: 30px; margin-bottom: 50px; text-align: left;" action="index.php?action=addpost" method="post">

                <span style="color: red">Tous les champs ne sont pas remplis !</span>
                <p><label for="author_post">Auteur</label>  <input type="text" name="author_post" id="author_post"/></p>
                <p><label for="title">Titre du post</label>  <input type="text" name="title" id="title"/></p>
                <p><label for="content">Rédigez votre article</label><br /><textarea 2px" name="content" id="content" rows= "10" cols="50"></textarea></p>
                <p><input type="submit" name="newpost" value="Valider" /></p>

</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>