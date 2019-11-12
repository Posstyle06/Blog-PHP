<?php
class BackendController {

    //Connexion administrateur
    static function adminConnect()
    {
        // On vérifie que les champs pseudo et mdp sont renseignés    
        if (empty($_POST['pseudo']) || empty($_POST['pass'])) {

            FrontendController::listPostsError();

        }
        else{
            $pseudo= $_POST['pseudo'];
            $postManager = new PostManager(); // Création d'un objet
            $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet
            $memberManager = new MemberManager();
            $result = $memberManager->getMember($_POST['pseudo']);

            $isPasswordCorrect = password_verify($pseudo, $result['pass']);

            if ($result) {
           
                if ($isPasswordCorrect OR htmlspecialchars($peudo===$result['pass'])) {
                    session_start();

                    if (isset($_POST['case'])) 
                    {     
                    $_SESSION['id'] = $result['id'];
                    $_SESSION['pseudo'] = $pseudo;         
                    setcookie('pseudo', $_POST['pseudo'], time() + 365*24*3600, null, null, false, true); 
                    setcookie('pass', $result['pass'], time() + 365*24*3600, null, null, false, true); 

                    require('view/backend/adminListPostsView.php');
                    }
                    else
                    {
                    $_SESSION['id'] = $result['id'];
                    $_SESSION['pseudo'] = $pseudo;
                    setcookie('pseudo','');
                    setcookie('pass','');

                    require('view/backend/adminListPostsView.php');
                    }
                }
                else{
                    throw new Exception("Identifiant ou mot de passe incorrect");      
                }
            }
            else{
                throw new Exception("Identifiant ou mot de passe incorrect");
            }
        }
    }

    //Déconnexion administrateur
    static function adminDisconnect()
    {
        session_start();

        // Suppression des variables de session et de la session
        $_SESSION = array();
        session_destroy();

        // Suppression des cookies de connexion automatique
        setcookie('login', '');
        setcookie('pass_hache', '');
        
        header('Location: index.php');
    }


    //Récupère la list de tous les posts et l'affiche
    static function adminlistPosts()
    {
        session_start();
        if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){
            
            $postManager = new PostManager(); // Création d'un objet
            $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

            require('view/backend/adminListPostsView.php');
        }
        else{
            echo "Vous devez être connecté pour accéder à cette page";
        }
    }

    //Récupère un post et vérifie qu'il existe
    static function adminPost()
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) 
        {
            $postManager = new PostManager();
            $commentManager = new CommentManager();

            $post = $postManager->getPost($_GET['id']);
            $comments = $commentManager->getComments($_GET['id']);

            if(!empty($post))
            {
                require('view/backend/adminPostView.php');
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

    //Aller à la vue de création d'un article
    static function newPost()
    {
        session_start();
        if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){
            require('view/backend/newPostView.php');
        }
    }

    //Ajoute un poste
    static function addPost()
    {
        session_start();
        if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){

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
                    header("Location: index.php?action=adminListPosts");
                }

            }
        }
        else{
            echo "Vous devez être connecté pour accéder à cette page";
        }

    }

    //Modification d'un post
    static function updatePost()
    {
        session_start();
        if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){


        }
    }

    //Suppression d'un post
    static function deletePost()
    {
        session_start();
        if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){

            $postManager = new PostManager();
            $postManager->deletePost($_GET['id']);

        }
    }

    //Ajout d'un commentaire
    static function adminComment()
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) {

            $commentManager = new CommentManager();
            $comment = $commentManager->getSingleComment($_GET['id']);

            if(!empty($comment))
            {
                require('view/backend/adminCommentView.php');
            }
            else
            {
                throw new Exception('l\'article selectionné n\'existe pas !');
            }
        }
        else{
            BackendController::adminListPosts();
        }

    }

    static function updateComment()
    {
        $comment = new Comment($_GET['postId'], addslashes($_POST['author']), addslashes($_POST['comment']));
        $comment->setId($_GET['id']);
        $commentManager = new CommentManager();
        $updatedLines = $commentManager->updateComment($comment);
        
        header("Location: index.php?action=adminComment&id=".$comment->getId()."&postId=".$_GET['postId']);
    }

    static function deleteComment()
    {
        session_start();
        if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){

            $commentManager = new CommentManager();
            $commentManager->deleteComment($_GET['id']);
        
        BackendController::getReportComments();
        } 
        else{
            ?>
 
        <script type="text/javascript">
         
        alert("Vous devez être connecter en tant qu'administrateur pour supprimer un commentaire");
         
        </script>
         
        <?php

        BackendController::adminListPosts();
        }  
    }

    static function getReportComments()
    {
        session_start();
        if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){
            
            $commentManager = new CommentManager(); // Création d'un objet
            $comments = $commentManager->getReportComments(); // Appel d'une fonction de cet objet

            require('view/backend/moderationView.php');
        }
        else{
            ?>
 
        <script type="text/javascript">
         
        alert("Vous devez être connecter en tant qu'administrateur pour supprimer un commentaire");
         
        </script>
         
        <?php

        BackendController::adminListPosts();
        }
    }

}