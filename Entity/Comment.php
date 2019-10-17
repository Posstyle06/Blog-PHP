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
      return $this->_postId;
    }

    public function author()
    {
      return $this->_author;
    }

    public function comment()
    {
      return $this->_comment;
    }

    public function setPostId($postId)
    {
    $this->_postId = $postId;
    }

    public function setComment($comment)
    {
    $this->_comment = $comment;
    }

    public function setAuthor($author)
    {
    $this->_author = $author;
    }
}