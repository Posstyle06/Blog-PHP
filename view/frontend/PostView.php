<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>

<div class="news">
                        
    <h3 style="border:black double 2px; border-top-right-radius: 4px; border-top-left-radius: 4px; padding: 5px;">
    <?php echo htmlspecialchars ($post['title']." Posté par " .$post['author']. " le ".$post['date']); ?> :
    </h3>
                        
    <p style="border:black double 4px; border-bottom-left-radius: 4px; border-bottom-right-radius: 4px; padding: 10px">
    <?php echo htmlspecialchars ($post['content']); ?><br/><br/>                                  
    </p>
</div>

<h2>Commentaires</h2>


<?php

                while ($donnees = $comments->fetch())
                {
                ?>
                    <div style="border: black solid 1px; border-radius: 4px; width: 30%; word-wrap: break-word; padding-left: 5px" class="comm">
                        
                        <p style="font-weight: bold;">
                            <?php echo htmlspecialchars ($donnees['author']." le ".$donnees['date']); ?> :
                        </p>
                        
                        <p>
                            <?php echo nl2br(htmlspecialchars ($donnees['comment'])); ?><br/><br/>
                               
                        </p>
                        <a style="position: relative; left: 85%" href="index.php?action=Comment&amp;id=<?= $donnees['id'] ?>&amp;postId=<?= $donnees['post_id'] ?>">Modifier</a>
                        
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
