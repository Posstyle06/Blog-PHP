<?php

class Comment {

	private $id;
	private $comment;
	private $author;
	private $commentDate;
	private $postId;
  private $report;

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

    if (isset($donnees['comment-date']))
    {
      $this->setCommentDate($donnees['comment_date']);
    }

    if (isset($donnees['post_id']))
    {
      $this->setPostId($donnees['post_id']);
    }

    if (isset($donnees['report']))
    {
      $this->setReport($donnees['report']);
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

    public function getReport()
    {
      return $this->report;
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

    public function setReport($report)
    {
    $this->report = $report;
    }
}