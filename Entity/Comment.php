<?php

class Comment {

	private $id;
	private $comment;
	private $author;
	private $comment_date;
	private $postId;

	public function __construct($postId, $author, $comment) 
    {
      echo 'Voici le constructeur !'; 
      $this->setComment($comment); 
      $this->setAuthor($author); 
      $this->setPostId($postId); 
    }

    public function postId()
    {
      return $this->postId;
    }

    public function author()
    {
      return $this->author;
    }

    public function comment()
    {
      return $this->comment;
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