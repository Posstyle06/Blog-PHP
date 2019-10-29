<?php

class Post {

	private $id;
	private $title;
	private $authorPost;
	private $creationDate;
	private $content;

	public function __construct($authorPost, $title, $content) 
    {
      $this->setAuthor($authoPost); 
      $this->setTitle($title); 
      $this->setContent($content); 
    }

    public function getId()
    {
      return $this->id;
    }

    public function getAuthorPost()
    {
      return $this->authorPost;
    }

    public function getTitle()
    {
      return $this->title;
    }

    public function getContent()
    {
      return $this->content;
    }

    public function getCreationDate()
    {
      return $this->creationDate;
    }

    public function setAuthor($authorPost)
    {
    $this->authorPost = $authorPost;
    }

    public function setTitle($title)
    {
    $this->title = $title;
    }

    public function setContent($content)
    {
    $this->content = $content;
    }
}