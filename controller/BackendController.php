<?php
class BackendController{

    //Connexion administrateur
    static function adminConnect()
    {
        // On vérifie que les champs pseudo et mdp sont renseignés    
        if (empty($_POST['pseudo']) || empty($_POST['pass'])) {

            $error= "Tous les champs ne sont pas remplis";
            $_SESSION['error'] = $error;
            header("Location: index.php?action=listPosts");


        }
        else{
            $pseudo= $_POST['pseudo'];
            $postManager = new PostManager(); // Création d'un objet
            $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet
            $memberManager = new MemberManager();
            $result = $memberManager->getMember($_POST['pseudo']);

            $isPasswordCorrect = password_verify($_POST['pass'], $result['pass']);

            if ($result && $isPasswordCorrect) {
           
                $_SESSION['id'] = $result['id'];
                $_SESSION['pseudo'] = $pseudo;
                setcookie('pseudo', $_POST['pseudo'], time() + 365*24*3600, null, null, false, true);       

                require('view/backend/adminListPostsView.php');     
                
            }
            else{
                $error= "Identifiant ou mot de passe incorrect";
                $_SESSION['error'] = $error;
                header("Location: index.php?action=error");
            }
        }
    }

    //Déconnexion administrateur
    static function adminDisconnect()
    {
        
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

        if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){
            
            $postManager = new PostManager(); // Création d'un objet
            $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

            require('view/backend/adminListPostsView.php');
        }
        else{
            $error= "Vous devez être connectéen tant qu'administrateur pour accéder à cette page";
            $_SESSION['error'] = $error;
            header("Location: index.php?action=error");
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
                $error= "l'article selectionné n'existe pas !";
                $_SESSION['error'] = $error;
                header("Location: index.php?action=error");
            }
        }
        else{
            header('Location: index.php');
        }
    }

    //Aller à la vue de création d'un article
    static function newPost()
    {
        
        if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){
            require('view/backend/newPostView.php');
        }
        else{
            $error= "Vous devez être connectéen tant qu'administrateur pour accéder à cette page";
            $_SESSION['error'] = $error;
            header("Location: index.php?action=error");
        }
    }

    //Ajoute un poste
    static function addPost()
    {
        
        if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){

            if (empty($_POST['author_post']) || empty($_POST['title']) || empty($_POST['content'])) {

                FrontendController::listPostsError();
            }
            else{
            
                $post = new Post($_POST['author_post'], addslashes($_POST['title']), addslashes($_POST['content']));
                $postManager = new PostManager(); // Création d'un objet
                $affectedLines = $postManager->addPost($post); // Appel d'une fonction de cet objet

                if ($affectedLines != 1) {
                    $error= "Impossible d'ajouter l'article !";
                    $_SESSION['error'] = $error;
                    header("Location: index.php?action=error");    
                }
                else 
                {
                    header("Location: index.php?action=adminListPosts");
                }

            }
        }
        else{
            $error= "Vous devez être connectéen tant qu'administrateur pour accéder à cette page";
            $_SESSION['error'] = $error;
            header("Location: index.php?action=error");
        }

    }

    //Récupère un post pour modification
    static function adminUpdatePost()
    {
        if (isset($_GET['id']) && $_GET['id'] > 0){

            $postManager = new PostManager();
            $post = $postManager->getPost($_GET['id']);
           
            if(!empty($post))
            {
                require('view/backend/adminUpdatePostView.php');
            }
            else
            {
                $error= "l'article selectionné n'existe pas !";
                $_SESSION['error'] = $error;
                header("Location: index.php?action=error");
            }
        }
        else{
            $error= "Vous devez être connectéen tant qu'administrateur pour accéder à cette page";
            $_SESSION['error'] = $error;
            header("Location: index.php?action=error");
        }
    }

    //Modification d'un post
    static function updatePost()
    {
        if (isset($_GET['id']) && $_GET['id'] > 0){

            $post = new Post(addslashes($_POST['author_post']), addslashes($_POST['title']), addslashes($_POST['content']));
            $post->setId($_GET['id']);
            $postManager = new PostManager();
            $updatedLines = $postManager->updatePost($post);
            
            header("Location: index.php?action=adminUpdatePost&id=".$post->getId());

        }
    }

    //Suppression d'un post
    static function deletePost()
    {
        
        if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){

            $postManager = new PostManager();
            $postManager->deletePost($_GET['id']);

            BackendController::adminListPosts();

        }
        else{
            $error= "Vous devez être connectéen tant qu'administrateur pour accéder à cette page";
            $_SESSION['error'] = $error;
            header("Location: index.php?action=error");
        } 
    }


    static function deleteComment()
    {
        
        if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){

            $commentManager = new CommentManager();
            $commentManager->deleteComment($_GET['id']);
        
        BackendController::getReportComments();
        } 
        else{
            $error= "Vous devez être connectéen tant qu'administrateur pour accéder à cette page";
            $_SESSION['error'] = $error;
            header("Location: index.php?action=error");
        }  
    }

    static function keepComment()
    {
        
        if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){

            $commentManager = new CommentManager();
            $commentManager->keepComment($_GET['id']);
        
            BackendController::getReportComments();
        } 
        else{
            $error= "Vous devez être connectéen tant qu'administrateur pour accéder à cette page";
            $_SESSION['error'] = $error;
            header("Location: index.php?action=error");
        }  
    }

    static function getReportComments()
    {
        

        if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){
            
            $commentManager = new CommentManager(); // Création d'un objet
            $comments = $commentManager->getReportComments(); // Appel d'une fonction de cet objet

            require('view/backend/moderationView.php');
        }
        else{
            $error= "Vous devez être connectéen tant qu'administrateur pour accéder à cette page";
            $_SESSION['error'] = $error;
            header("Location: index.php?action=error");
        }
    }
}
