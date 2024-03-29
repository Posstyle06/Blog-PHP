<?php

class PostManager extends Manager
{
        
    //récupère la liste des articles
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, author, title, content, date_format(creation_date, "%d/%m/%Y à %Hh%i") AS date FROM posts ORDER BY id DESC');
        $req->execute();
        return $req;

        $req->closeCursor(); // Termine le traitement de la requête
    }

    //Récupère un article précis
    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, author, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;

        $req->closeCursor(); // Termine le traitement de la requête
    }

    //Ajoute un article
    public function addPost(Post $post)
    {
        $a=$post->getAuthorPost();
        $b=$post->getTitle();
        $c=$post->getContent();
        $db = $this->dbConnect();
        $req = $db->prepare("INSERT INTO posts (author, title, content, creation_date) VALUES
        (?, ?, ?, NOW())");
        $req->bindParam(1, $a);
        $req->bindParam(2, $b);
        $req->bindParam(3, $c);
        $req->execute();

        return $req->rowCount();

    }

    //Supprime un article
    public function deletePost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM posts WHERE id = ?');
        $req->execute(array($postId));
       
    }

    //Modifie un article
    public function updatePost(Post $post)
    {
        $db = $this->dbConnect();
        $req = $db->prepare("UPDATE posts SET author = :author, title = :title, content = :content, creation_date = CURRENT_TIME WHERE id = :id");
        $req->bindValue(':author', $post->getAuthorPost(), PDO::PARAM_STR);
        $req->bindValue(':title', $post->getTitle(), PDO::PARAM_STR);
        $req->bindValue(':content', $post->getContent(), PDO::PARAM_STR);
        $req->bindValue(':id', $post->getId(), PDO::PARAM_INT);
       
        $req->execute();

        return $req->rowCount();
    }

}