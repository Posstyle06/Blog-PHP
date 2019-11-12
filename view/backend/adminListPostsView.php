<?php $title = "Billet pour l'Alaska"; ?>

<?php ob_start(); ?>

<?php
while ($donnees = $posts->fetch())
{
?>
    <div class="news">
        
        <h3>
            <?php echo htmlspecialchars ($donnees['title']." Posté par ".$donnees['author']." le ".$donnees['date']); ?> :
        </h3>
        
        <div class="postContent">
            <?php echo nl2br(stripslashes($donnees['content'])); ?><br/><br/>
            <?php $postId=$donnees['id'];?>
            <a href="http://localhost/PHP/projet4/index.php?action=adminPost&amp;id=<?php echo $postId;?>">Commentaires</a>
            <a href="http://localhost/PHP/projet4/index.php?action=updatePost&amp;id=<?php echo $postId;?>">Modifier l'article</a>
            <a href="http://localhost/PHP/projet4/index.php?action=deletePost&amp;id=<?php echo $postId;?>">Supprimer l'article</a>         
        </div>
        
    </div>

<?php
}

?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>