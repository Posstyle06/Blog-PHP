<?php

require_once("model/Manager.php");

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
        $comment = $db->prepare('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date FROM comments WHERE id = ? ');
        $comment->execute(array($idComment));
        $comment = $comment->fetch();

        return $comment;
    }

    public function addComment(Comment $comment)
    {
        $a=$comment->getPostId();
        $b=$comment->getAuthor();
        $c=$comment->getComment();
        $db = $this->dbConnect();
        $req = $db->prepare("INSERT INTO comments(post_id, author, comment) VALUES(?, ?, ?)");
        $req->bindParam(1, $a);
        $req->bindParam(2, $b);
        $req->bindParam(3, $c);
        $req->execute();

        return $req->rowCount();
    }

    public function updateComment($idComment, $author, $newcomment)
    {

        $db = $this->dbConnect();
        $updatedLines = $db->exec("UPDATE comments SET author = '$author', comment = '$newcomment', comment_date = CURRENT_TIME WHERE id = '$idComment'");
        

        return $updatedLines;
    }
}