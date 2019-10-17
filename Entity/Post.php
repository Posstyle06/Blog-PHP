<?php

class Post {

	private $id;
	private $title;
	private $author_post;
	private $creation_date;
	private $content;

	public function __construct($author_post, $title, $content) 
    {
      echo 'Voici le constructeur !'; 
      $this->setAuthor($author_post); 
      $this->setTitle($title); 
      $this->setContent($content); 
    }

    public function author_post()
    {
      return $this->_author_post;
    }

    public function title()
    {
      return $this->_title;
    }

    public function content()
    {
      return $this->_content;
    }

    public function setAuthor($author_post)
    {
    $this->_author_post = $author_post;
    }

    public function setTitle($title)
    {
    $this->_title = $title;
    }

    public function setContent($content)
    {
    $this->_content = $content;
    }
}