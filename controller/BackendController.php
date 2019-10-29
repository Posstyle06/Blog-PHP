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
            $result = $memberManager->getMember($pseudo);

            $isPasswordCorrect = password_verify($pseudo, $result['pass']);

            if ($result) {
           
                if ($isPasswordCorrect OR htmlspecialchars($peudo===$result['pass']) {
                    session_start();

                    if (isset($_POST['case'])) 
                    {     
                    $_SESSION['id'] = $result['id'];
                    $_SESSION['pseudo'] = $pseudo;         
                    setcookie('pseudo', $_POST['pseudo'], time() + 365*24*3600, null, null, false, true); 
                    setcookie('pass', $result['pass'], time() + 365*24*3600, null, null, false, true); 

                    require('view/backend/AdminListPostsView.php');
                    }
                    else
                    {
                    $_SESSION['id'] = $result['id'];
                    $_SESSION['pseudo'] = $pseudo;
                    setcookie('pseudo','');
                    setcookie('pass','');

                    header('view/backend/AdminListPostsView.php');
                    }
                }
            }


    //Récupère la list de tous les posts et l'affiche
    static function listPosts()
    {
        $postManager = new PostManager(); // Création d'un objet
        $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

        require('view/frontend/adminListPostsView.php');
    }

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