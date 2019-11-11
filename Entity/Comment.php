<?php

class Comment {

	private $id;
	private $comment;
	private $author;
	private $commentDate;
	private $postId;

	public function __construct($postId=null, $author="", $comment="") 
    { 
      $this->setComment($comment); 
      $this->setAuthor($author); 
      $this->setPostId($postId); 
    }

  public function hydrate(array $donnees)
  {
    if (isset($donnees['id']))
    {
      $this->setId($donnees['id']);
    }

    if (isset($donnees['comment']))
    {
      $this->setComment($donnees['comment']);
    }

    if (isset($donnees['author']))
    {
      $this->setAuthor($donnees['author']);
    }

    if (isset($donnees['commentDate']))
    {
      $this->setCommentDate($donnees['commentDate']);
    }

    if (isset($donnees['postId']))
    {
      $this->setPostId($donnees['postId']);
    }
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

    public function setId($id)
    {
    $this->id = $id;
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

    public function setCommentDate($commentDate)
    {
    $this->commentDate = $commentDate;
    }
}