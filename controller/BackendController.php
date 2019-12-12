<?php
class BackendController{

    //Connexion administrateur
    static function adminConnect()
    {
        // On vérifie que les champs pseudo et mdp sont renseignés    
        if (empty($_POST['pseudo']) || empty($_POST['pass'])) {

            $error= "Tous les champs ne sont pas remplis";
            $_SESSION['error'] = $error;
            header("Location: index.php");
        }
        else{
            $pseudo= $_POST['pseudo'];
            $postManager = new PostManager(); 
            $posts = $postManager->getPosts(); 
            $memberManager = new MemberManager();
            $result = $memberManager->getMember($_POST['pseudo']);

            $isPasswordCorrect = password_verify($_POST['pass'], $result['pass']);

            if ($result && $isPasswordCorrect) {
                
                //Initialisation d'une session
                $_SESSION['id'] = $result['id'];
                $_SESSION['pseudo'] = $pseudo;
                setcookie('pseudo', $_POST['pseudo'], time() + 365*24*3600, null, null, false, true);       

                require('view/backend/adminListPostsView.php');     
                
            }
            else{
                $error= "Identifiant ou mot de passe incorrect";
                $_SESSION['error'] = $error;
                header("Location: index.php");
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
        
        header('Location: index.php');
    }


    //Récupère la liste de tous les articles et l'affiche
    static function adminlistPosts()
    {

        if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){
            
            $postManager = new PostManager(); 
            $posts = $postManager->getPosts(); 

            require('view/backend/adminListPostsView.php');
        }
        else{
            $error= "Vous devez être connectéen tant qu'administrateur pour accéder à cette page";
            $_SESSION['error'] = $error;
            header("Location: index.php?action=error");
        }
    }

    //Récupère un article et vérifie qu'il existe
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
            $error= "Vous devez être connecté en tant qu'administrateur pour accéder à cette page";
            $_SESSION['error'] = $error;
            header("Location: index.php?action=error");
        }
    }

    //Aller à la vue de création d'un nouvel article
    static function newPost()
    {
        
        if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){
            require('view/backend/newPostView.php');
        }
        else{
            $error= "Vous devez être connecté en tant qu'administrateur pour accéder à cette page";
            $_SESSION['error'] = $error;
            header("Location: index.php?action=error");
        }
    }

    //Ajoute un article
    static function addPost()
    {
        
        if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){

            if (empty($_POST['author_post']) || empty($_POST['title']) || empty($_POST['content'])) {

                $error= "Tous les champs doivent être remplis !";
                $_SESSION['error'] = $error;
                header('Location: index.php?action=newPost');
            }
            else{
            
                $post = new Post($_POST['author_post'], addslashes($_POST['title']), addslashes($_POST['content']));
                $postManager = new PostManager(); 
                $affectedLines = $postManager->addPost($post);

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
            $error= "Vous devez être connecté en tant qu'administrateur pour accéder à cette page";
            $_SESSION['error'] = $error;
            header("Location: index.php?action=error");
        }

    }

    //Récupère un article pour modification
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
            $error= "l'article selectionné n'existe pas !";
            $_SESSION['error'] = $error;
            header("Location: index.php?action=error");
        }
    }

    //Modification d'un article
    static function updatePost()
    {
        if (isset($_GET['id']) && $_GET['id'] > 0){

            $post = new Post(addslashes($_POST['author_post']), addslashes($_POST['title']), addslashes($_POST['content']));
            $post->setId($_GET['id']);
            $postManager = new PostManager();
            $updatedLines = $postManager->updatePost($post);
            
            header("Location: index.php?action=adminUpdatePost&id=".$post->getId());
        }
        else{
            $error= "l'article selectionné n'existe pas !";
            $_SESSION['error'] = $error;
            header("Location: index.php?action=error");
        }
    }

    //Suppression d'un article
    static function deletePost()
    {
        
        if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){

            $postManager = new PostManager();
            $postManager->deletePost($_GET['id']);

            header("Location: index.php?action=adminListPosts");

        }
        else{
            $error= "Vous devez être connectéen tant qu'administrateur pour accéder à cette page";
            $_SESSION['error'] = $error;
            header("Location: index.php?action=error");
        } 
    }

    //Suppression d'un commentaire (modération)
    static function deleteComment()
    {
        
        if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){

            $commentManager = new CommentManager();
            $commentManager->deleteComment($_GET['id']);
        
        header("Location: index.php?action=moderation");
        } 
        else{
            $error= "Vous devez être connectéen tant qu'administrateur pour accéder à cette page";
            $_SESSION['error'] = $error;
            header("Location: index.php?action=error");
        }  
    }

    //Conserver un commentaire (modération)
    static function keepComment()
    {
        
        if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){

            $commentManager = new CommentManager();
            $commentManager->keepComment($_GET['id']);
        
            header("Location: index.php?action=moderation");
        } 
        else{
            $error= "Vous devez être connecté en tant qu'administrateur pour accéder à cette page";
            $_SESSION['error'] = $error;
            header("Location: index.php?action=error");
        }  
    }

    //Récupère les commentaires qui ont été signalés
    static function getReportComments()
    {
        

        if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){
            
            $commentManager = new CommentManager(); // Création d'un objet
            $comments = $commentManager->getReportComments(); // Appel d'une fonction de cet objet

            require('view/backend/moderationView.php');
        }
        else{
            $error= "Vous devez être connecté en tant qu'administrateur pour accéder à cette page";
            $_SESSION['error'] = $error;
            header("Location: index.php?action=error");
        }
    }
}
