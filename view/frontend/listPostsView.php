<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p>Derniers billets du blog :</p>


<?php
while ($donnees = $posts->fetch())
{
?>
    <div class="news">
        
        <h3>
            <?php echo htmlspecialchars ($donnees['title']." Posté par ".$donnees['author_post']." le ".$donnees['date']); ?> :
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

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>