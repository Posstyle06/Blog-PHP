<?php $title = "Billet pour l'Alaska"; ?>

<?php ob_start(); ?>

<table border="1" id="moderationTable">
    <caption>Commentaires signalés</caption>
    <thead>
        <tr>
            <th>Article</th>
            <th>Auteur / date</th>
            <th>Commentaire</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
               
                while ($donnees = $comments->fetch())
                {
                ?>
        <tr>
            <td id="postCol"><?php echo nl2br($donnees['content']); ?></td>
            <td><?php echo htmlspecialchars ($donnees['author']." le ".$donnees['date']); ?></td>
            <td><?php echo nl2br(htmlspecialchars ($donnees['comment'])); ?></td>
            <td>
                <form action="">
                    <button type="button">Conserver</button>
                </form><br/>
                <form action="index.php?action=deleteComment&id=id=<?php echo $donnees['id'];?>" method="post">
                    <button type="button">Supprimer</button>
                </form>
            </td>
        </tr>
        <?php
                }
                ?>
    </tbody>
</table>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>