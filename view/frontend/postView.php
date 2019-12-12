<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>

<p class="backToPosts"><a href="index.php">Retour à la liste des articles</a></p>

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
  if(isset($_SESSION['messageOk'])) {
   echo '<span class="reportMessageOk">'.$_SESSION['messageOk'].'</span>';
   unset($_SESSION['messageOk']);
  }
  if(isset($_SESSION['messageKo'])) {
   echo '<span class="reportMessageKo">'.$_SESSION['messageKo'].'</span>';
   unset($_SESSION['messageKo']);
  }
?>

<?php
         
    while ($comment = $comments->fetch())
    {

    ?>
        <div class="commentBox">
            
            <p>
                <?php echo htmlspecialchars ($comment['author']." le ".$comment['date']); ?> :
            </p>
            
            <p>
                <?php echo nl2br(htmlspecialchars ($comment['comment'])); ?><br/><br/>
                   
            </p>
            <a class="report" href="index.php?action=reportComment&amp;id=<?= $comment['id'] ?>&amp;postId=<?= $comment['post_id'] ?>">Signaler</a>
            
        </div>
    <?php
    }
?>

<div class="newComment">Ajouter un nouveau commentaire</div>

<form class="commentForm" action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <?php
      if(isset($_SESSION['error'])) {
       echo '<span id="emptyComment">'.$_SESSION['error'].'</span>';
       unset($_SESSION['error']);
      }
    ?>
    <div>
        <label for="author">Auteur</label><br /><br />
        <input type="text" id="author" name="author" />
    </div>
    <div>
        <label for="comment">Commentaire</label><br /><br />
        <textarea class="comment" id="comment" name="comment"></textarea>
    </div>
    <div>
        <input class="validComment" type="submit" />
    </div>
</form>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
