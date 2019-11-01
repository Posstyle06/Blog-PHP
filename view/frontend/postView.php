<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<header>
    <a href="http://localhost/PHP/projet4/index.php"><img id="logo" src="public/images/logo_livre.PNG" alt="logo livre"/></a>
    <h1>Billet pour l'Alaska</h1>
</header>   
<p><a href="index.php">Retour à la liste des billets</a></p>

<div class="news">
                        
    <h3>
    <?php echo htmlspecialchars ($post['title']." Posté par " .$post['author']. " le ".$post['date']); ?> :
    </h3>
                        
    <div class="postContent">
    <?php echo stripslashes($post['content']); ?><br/><br/>                                  
    </div>
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
                        <a style="position: relative; left: 85%" href="index.php?action=Comment&amp;id=<?= $donnees['id'] ?>&amp;postId=<?= $donnees['post_id'] ?>">Modifier</a><br/>
                        <a style="position: relative; left: 85%" href="index.php?action=report&amp;id=<?= $donnees['id'] ?>&amp;postId=<?= $donnees['post_id'] ?>">Signaler</a>
                        
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
