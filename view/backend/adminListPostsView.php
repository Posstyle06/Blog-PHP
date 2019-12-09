<?php $title = "Billet pour l'Alaska"; ?>

<?php ob_start(); ?>

<?php
while ($datas = $posts->fetch())
{
?>
    <div class="news">
        
        <h3>
            <?php echo htmlspecialchars ($datas['title']." Posté par ".$datas['author']." le ".$datas['date']); ?> :
        </h3>
        
        <div class="postContent">
            <?php echo nl2br(stripslashes($datas['content'])); ?><br/><br/>
            <?php $postId=$datas['id'];?>
            <div class="postContentButtons">
                <a href="index.php?action=adminPost&amp;id=<?php echo $postId;?>">Commentaires</a>
                <a href="index.php?action=adminUpdatePost&amp;id=<?php echo $postId;?>">Modifier</a>
                <a class="delete" href="index.php?action=deletePost&amp;id=<?php echo $postId;?>">Supprimer</a> 
            </div>        
        </div>
        
    </div>

<?php
}

?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>