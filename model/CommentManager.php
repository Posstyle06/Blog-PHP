<?php

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function getSingleComment($idComment)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date FROM comments WHERE id = ? ');
        $req->execute(array($idComment));
        $donnees = $req->fetch();
        $comment = new Comment();
        $comment->hydrate($donnees);

        return $comment;
    }

    public function addComment(Comment $comment)
    {
        
        $db = $this->dbConnect();
        $req = $db->prepare("INSERT INTO comments(post_id, author, comment, comment_date) VALUES(:post_id, :author, :comment, NOW())");
        $req->bindValue(':post_id', $comment->getPostId(), PDO::PARAM_INT);
        $req->bindValue(':author', $comment->getAuthor(), PDO::PARAM_STR);
        $req->bindValue(':comment', $comment->getComment(),PDO::PARAM_STR);
        $req->execute();

        return $req->rowCount();
    }

    public function updateComment(Comment $comment)
    {
        $db = $this->dbConnect();
        $req = $db->prepare("UPDATE comments SET author = :author, comment = :comment, comment_date = CURRENT_TIME WHERE id = :id");
        $req->bindValue(':author', $comment->getAuthor(), PDO::PARAM_STR);
        $req->bindValue(':comment', $comment->getComment(), PDO::PARAM_STR);
        $req->bindValue(':id', $comment->getId(), PDO::PARAM_INT);
       
        $req->execute();

        return $req->rowCount();
    }

    public function deleteComment($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comments WHERE id = ?');
        $req->execute(array($id));
       
    }

    public function reportComment($idComment)
    {
        $db = $this->dbConnect();
        $req = $db->prepare("UPDATE comments SET report = 1 WHERE id = '$idComment'");
        
        $req->execute();

        $req = $db->prepare('SELECT id, post_id, author, comment, report, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date FROM comments WHERE id = ? ');
        $req->execute(array($idComment));
        $donnees = $req->fetch();
        $comment = new Comment();
        $comment->hydrate($donnees);

        return $comment;
    }

    public function getReportComments()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT P.content, C.id, C.author, C.comment, date_format(C.comment_date, "%d/%m/%Y à %Hh%i") AS date FROM posts P, comments C WHERE C.post_id = P.id AND C.report = 1');

        return $req;

        $req->closeCursor(); // Termine le traitement de la requête  
    }
}