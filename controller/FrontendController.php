<?php
class FrontendController {

//Récupère la list de tous les posts et l'affiche
static function listPosts()
{
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

    require('view/frontend/listPostsView.php');
}

//Affiche la liste des poste avec un message d'erreur
static function error()
{
    header("Location: http://localhost/PHP/projet4/view/frontend/errorView.php");
}


//Récupère un post et vérifie qu'il existe
static function post()
{
    if (isset($_GET['id']) && $_GET['id'] > 0) 
    {
        $postManager = new PostManager();
        $commentManager = new CommentManager();

        $post = $postManager->getPost($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);

        if(!empty($post))
        {
            require('view/frontend/postView.php');
        }
        else
        {
            $error= "l'article selectionné n'existe pas !";
            $_SESSION['error'] = $error;
            header("Location: index.php?action=error");
        }
    }
    else{
        header('Location: index.php');
    }
}

//Ajoute un commentaire
static function addComment()
{
    if (isset($_GET['id']) && $_GET['id'] > 0) 
        {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) 
            {
                
                $comment = new Comment($_GET['id'], addslashes($_POST['author']), addslashes($_POST['comment']));
                $commentManager = new CommentManager();
                $affectedLines = $commentManager->addComment($comment);
                //var_dump($affectedLines);
                //die;

                if ($affectedLines != 1) {
                    $error= "Impossible d'ajouter le commentaire !";
                    $_SESSION['error'] = $error;
                    header("Location: index.php?action=error");    
                }
                else 
                {
                    header('Location: index.php?action=post&id=' . $comment->getPostId());
                }
            }
            else 
            {
                $error= "Tous les champs doivent être remplis !";
                $_SESSION['error'] = $error;
                header("Location: index.php?action=error");
            }
        }
        else {
            $error= "Aucun identifiant d'article envoyé !";
            $_SESSION['error'] = $error;
            header("Location: index.php?action=error");
        }  
    
}


static function reportComment()
{
    $commentManager = new CommentManager();
    $comment = $commentManager->reportComment($_GET['id']);

    if ($comment->getReport() != 0) {

        ?>
 
        <script type="text/javascript">

        var variableRecuperee = <?php echo $comment->getPostId(); ?>;
         
        alert("le commentaire a bien été signalé à l administrateur");
        window.location = "http://localhost/PHP/projet4/index.php?action=post&id="+variableRecuperee;
         
        </script>
         
        <?php

    }
    
    header('Location: index.php');
}

}