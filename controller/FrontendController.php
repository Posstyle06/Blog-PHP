<?php
class FrontendController {

//Récupère la list de tous les posts et l'affich
static function listPosts()
{
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

    require('view/frontend/listPostsView.php');
}

//Affiche la liste des poste avec un message d'erreur
static function listPostsError()
{
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

    require('view/frontend/listPostsViewError.php');
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
            throw new Exception('l\'article selectionné n\'existe pas !');
        }
    }
    else{
        FrontendController::listPosts();
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

                if ($affectedLines != 1) {
                    throw new Exception('Impossible d\'ajouter le commentaire !');    
                }
                else 
                {
                    header('Location: index.php?action=post&id=' . $comment->getPostId());
                }
            }
            else 
            {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }
        else {
            throw new Exception('Aucun identifiant de billet envoyé');
        }  
    
}

static function comment()
{
    

    $commentManager = new CommentManager();
    $comment = $commentManager->getSingleComment($_GET['id']);

    if(!empty($comment))
    {
        require('view/frontend/CommentView.php');
    }
    else
    {
        throw new Exception('l\'article selectionné n\'existe pas !');
    }

}


static function updateComment($idComment, $author, $newcomment)
{
    

    $commentManager = new CommentManager();
    $comment = $commentManager->updateComment($idComment, $author, $newcomment);
    $comment = $commentManager->getSingleComment($idComment);

   
      require('view/frontend/CommentView.php');
    

}

}