<?php $title = "Billet pour l'Alaska"; ?>

<?php ob_start(); ?>

<header>
    <a href="http://localhost/PHP/projet4/index.php"><img id="logo" src="public/images/logo_livre.PNG" alt="logo livre"/></a>

    <form id="connectForm" action="index.php?action=connectAdmin">
      Connexion administrateur<br/><br/>
      Pseudo: <input type="text" name="pseudo" id="pseudo" value=><br>
      Password: <input type="password" name="pass" id="pass" value=><br>
      <button id="Connexion" type="submit">Valider</button>
    </form>
    <h1>Billet pour l'Alaska</h1>
</header>    

<p>Derniers articles:</p>

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