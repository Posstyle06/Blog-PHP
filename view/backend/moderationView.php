<?php $title = "Billet pour l'Alaska"; ?>

<?php ob_start(); ?>

<header>
    
    <span id="hello"><?php echo 'Bonjour ' . $_SESSION['pseudo'];?></span>
    
    <a href="http://localhost/PHP/projet4/index.php?action=adminListPosts"><img id="logo" src="public/images/logo_livre.PNG" alt="logo livre"/></a>
    <form id="connectForm" action="index.php?action=disconnectAdmin" method="post">
        <button id="disconnect" type="submit">Déconnexion</button>
    </form>

    <h1>Billet pour l'Alaska</h1>
</header>    

<?php
                
                while ($donnees = $comments->fetch())
                {
                ?>
                    <div style="border: black solid 1px; border-radius: 4px; width: 30%; word-wrap: break-word; padding-left: 5px" class="comm">
                        <p>
                            <?php echo nl2br($donnees['content']); ?><br/><br/>
                               
                        </p>
                        <p style="font-weight: bold;">
                            <?php echo htmlspecialchars ($donnees['author']." le ".$donnees['date']); ?> :
                        </p>
                        
                        <p>
                            <?php echo nl2br(htmlspecialchars ($donnees['comment'])); ?><br/><br/>
                               
                        </p>
                        <a style="position: relative; left: 85%" href="index.php?action=deleteComment&amp;id=<?= $donnees['id'] ?>">supprimer</a>
                        
                    </div>
                <?php
                }
?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>