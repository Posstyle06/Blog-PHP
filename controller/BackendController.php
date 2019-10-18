<?php
class BackendController {

//Ajoute un poste
static function addPost()
{
    if (empty($_POST['author_post']) || empty($_POST['title']) || empty($_POST['content'])) {

        FrontendController::listPostsError();
    }
    else{
    
        $post = new Post($_POST['author_post'], addslashes($_POST['title']), addslashes($_POST['content']));
        $postManager = new PostManager(); // Création d'un objet
        $affectedLines = $postManager->addPost($post); // Appel d'une fonction de cet objet

        if ($affectedLines != 1) {
            throw new Exception('Impossible d\'ajouter l\'article !');    
        }
        else 
        {
            header('Location: index.php');
        }

    }

}

}