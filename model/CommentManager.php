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

    public function getComment($idComment)
    {
        $db = $this->dbConnect();
        $comment = $db->prepare('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date FROM comments WHERE id = ? ');
        $comment->execute(array($idComment));
        $comment = $comment->fetch();

        return $comment;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->exec("INSERT INTO comments(post_id, author, comment) VALUES('$postId', '$author', '$comment')");
       

        return $comments;
    }

    public function updateComment($idComment, $author, $newcomment)
    {

        $db = $this->dbConnect();
        $updatedLines = $db->exec("UPDATE comments SET author = '$author', comment = '$newcomment', comment_date = CURRENT_TIME WHERE id = '$idComment'");
        

        return $updatedLines;
    }
}