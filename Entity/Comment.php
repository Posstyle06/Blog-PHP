<?php

class Comment {

	private $id;
	private $comment;
	private $author;
	private $commentDate;
	private $postId;

	public function __construct($postId, $author, $comment) 
    { 
      $this->setComment($comment); 
      $this->setAuthor($author); 
      $this->setPostId($postId); 
    }

    public function getId()
    {
      return $this->id;
    }

    public function getPostId()
    {
      return $this->postId;
    }

    public function getAuthor()
    {
      return $this->author;
    }

    public function getComment()
    {
      return $this->comment;
    }

    public function getCommentDate()
    {
      return $this->commentDate;
    }

    public function setPostId($postId)
    {
    $this->postId = $postId;
    }

    public function setComment($comment)
    {
    $this->comment = $comment;
    }

    public function setAuthor($author)
    {
    $this->author = $author;
    }
}