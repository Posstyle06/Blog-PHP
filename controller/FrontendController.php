<?php
class FrontendController {

    //Récupère la liste de tous les articles et l'affiche
    static function listPosts()
    {
        $postManager = new PostManager(); 
        $posts = $postManager->getPosts(); 

        require('view/frontend/listPostsView.php');
    }

    //Affiche une page avec l'erreur récupérée
    static function error()
    {
        header("Location: view/frontend/errorView.php");
    }


    //Récupère un article et vérifie qu'il existe
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
            $error= "l'article selectionné n'existe pas !";
            $_SESSION['error'] = $error;
            header("Location: index.php?action=error");
        }
    }

    //Ajoute un commentaire
    static function addComment()
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) 
        {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                
                $comment = new Comment($_GET['id'], addslashes($_POST['author']), addslashes($_POST['comment']));
                $commentManager = new CommentManager();
                $affectedLines = $commentManager->addComment($comment);

                if ($affectedLines != 1) {
                    $error= "Impossible d'ajouter le commentaire !";
                    $_SESSION['error'] = $error;
                    header("Location: index.php?action=error");    
                }
                else 
                {
                    if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){
                        header('Location: index.php?action=adminPost&id=' . $comment->getPostId());
                    }
                    else{
                        header('Location: index.php?action=post&id=' . $comment->getPostId());
                    }
                }
            }
            else 
            {
                $error= "Tous les champs doivent être remplis !";
                $_SESSION['error'] = $error;
                header('Location: index.php?action=post&id=' . $_GET['id']);
            }
        }
        else {
            $error= "Aucun identifiant d'article envoyé !";
            $_SESSION['error'] = $error;
            header("Location: index.php?action=error");
        }  
    }

    //Signalement d'un commentaire
    static function reportComment()
    {
        $commentManager = new CommentManager();
        $comment = $commentManager->reportComment($_GET['id']);

        $comment = new Comment();
        $comment = $commentManager->getSingleComment($_GET['id']);

        if ($comment->getReport() != 0) {
            $messageOk= "le commentaire a été signalé avec succès !";
            $_SESSION['messageOk'] = $messageOk;
        }
        else{
            $message= "Nous n'avons pas réussi à signaler le commentaire !";
            $_SESSION['messageKo'] = $messageKo;
        }
        
        header('Location: index.php?action=post&id=' . $_GET['postId']);
    }

}