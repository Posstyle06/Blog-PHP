    <?php $title = "Billet pour l'Alaska";

    ob_start(); ?>
    
    <table id="moderationTable">
        <caption>Commentaires signalés</caption>
        <thead>
            <tr>
                <th class="postColumnTitle">Article</th>
                <th class="authorColumnTitle">Auteur / date</th>
                <th class="commentColumnTitle">Commentaire</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                    
                    while ($datas = $comments->fetch())
                    {
                        ?>
                        <tr>
                            <td class="postColumn"><?php echo nl2br(stripslashes($datas['content'])); ?></td>
                            <td class="authorColumn"><?php echo htmlspecialchars ($datas['author']." le ".$datas['date']); ?></td>
                            <td class="commentColumn">
                                <?php echo nl2br(htmlspecialchars ($datas['comment'])); ?>
                                <span class="postLink"><br/><a href="index.php?action=adminPost&amp;id=<?php echo $datas[0];?>"><br/>Voir l'article concerné</a></span>
                            </td>
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