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
               
                while ($datas = $comments->fetch())
                {
                ?>
        <tr>
            <td id="postCol"><?php echo nl2br($datas['content']); ?></td>
            <td><?php echo htmlspecialchars ($datas['author']." le ".$datas['date']); ?></td>
            <td><?php echo nl2br(htmlspecialchars ($datas['comment'])); ?></td>
            <td>
                <form action="index.php?action=keepComment&id=<?php echo $datas['id'];?>" method="post">
                    <button id="keepCommentButton" type="submit">Conserver</button>
                </form><br/>
                <form action="index.php?action=deleteComment&id=<?php echo $datas['id'];?>" method="post">
                    <button id="deleteCommentButton" type="submit">Supprimer</button>
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