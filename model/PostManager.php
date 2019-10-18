<?php

require_once("model/Manager.php");

class PostManager extends Manager
{
    
//récupère la liste des posts

    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, author_post, title, content, date_format(creation_date, "%d/%m/%Y à %Hh%i") AS date FROM posts ORDER BY id DESC LIMIT 5');

        return $req;

        $req->closeCursor(); // Termine le traitement de la requête
    }

//Récupère un post

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, author_post, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;

        $req->closeCursor(); // Termine le traitement de la requête
    }

//Ajoute un post

    public function addPost(Post $post)
    {
        $a=$post->getAuthorPost();
        $b=$post->title();
        $c=$post->content();
        $db = $this->dbConnect();
        $req = $db->prepare("INSERT INTO posts (author_post, title, content, creation_date) VALUES
        (?, ?, ?, NOW())");
        $req->bindParam(1, $a);
        $req->bindParam(2, $b);
        $req->bindParam(3, $c);
        $req->execute();

        return $req->rowCount();

    }

}