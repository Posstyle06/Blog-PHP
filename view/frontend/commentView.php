<?php $title = "Modif commentaire"; ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p><a href="index.php?action=post&amp;id=<?= $comment['post_id'] ?>">Retour au post</a></p>



<h2>Modifier le commentaire</h2>

<form action="index.php?action=update&amp;id=<?= $_GET['id'] ?>" method="post">
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

<?php

?>
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['date'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?> 
<?php

?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>