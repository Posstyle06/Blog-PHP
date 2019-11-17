<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>


<p><a href="index.php">Retour à la liste des billets</a></p>

<div class="news">
                        
    <h3>
    <?php echo htmlspecialchars ($post['title']." Posté par " .$post['author']. " le ".$post['date']); ?> :
    </h3>
                        
    <div class="postContent">
    <?php echo stripslashes($post['content']); ?><br/><br/>                                  
    </div>
</div>

<div class="titleComment">Commentaires</div>


<?php

                while ($donnees = $comments->fetch())
                {
                ?>
                    <div class="commentBox">
                        
                        <p>
                            <?php echo htmlspecialchars ($donnees['author']." le ".$donnees['date']); ?> :
                        </p>
                        
                        <p>
                            <?php echo nl2br(htmlspecialchars ($donnees['comment'])); ?><br/><br/>
                               
                        </p>
                        
                    </div>
                <?php
                }
?>

<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" />
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
