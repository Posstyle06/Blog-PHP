<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>

<div class="news">
                        
    <h3>
    <?php echo htmlspecialchars ($post['title']." Posté par " .$post['author']. " le ".$post['date']); ?> :
    </h3>
                        
    <div class="postContent">
    <?php echo stripslashes($post['content']); ?><br/><br/>                                  
    </div>
</div>

<div class="titleComment">Modifier l'article</div>




<form id="postForm" action="index.php?action=updatePost&id=<?php echo $post['id']; ?>" method="post">

    <p><label for="author_post">Auteur</label>  <input type="text" name="author_post" id="author_post" value="<?php echo $post['author']?>" /></p>
    <p><label for="title">Titre du post</label>  <input type="text" name="title" id="title" value="<?php echo $post['title']?>"/></p>
    <p><label for="content">Rédigez votre article</label><br /><textarea 2px name="content" id="adminContent" rows= "10" cols="50" value="<?php echo "salut"?>"></textarea></p>
    <p><input type="submit" name="updatedPost" value="Valider" /></p>

</form>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
