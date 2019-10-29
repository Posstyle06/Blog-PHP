<?php

class Member {

	private $id;
	private $pseudo;
	private $pass;
	private $email;
	private $registrationDate;
  private $isAdmin;

	public function __construct($pseudo, $pass, $email) 
    {
      echo 'Voici le constructeur !'; 
      $this->setPseudo($pseudo); 
      $this->setPass($pass); 
      $this->setEmail($email); 
    }

    public function getId()
    {
      return $this->id;
    }

    public function getPseudo()
    {
      return $this->pseudo;
    }

    public function getPass()
    {
      return $this->pass;
    }

    public function getEmail()
    {
      return $this->email;
    }

    public function getRegistrationDate()
    {
      return $this->registrationDate;
    }

    public function setPseudo($pseudo)
    {
    $this->pseudo = $pseudo;
    }

    public function setPass($pass)
    {
    $this->pass = $pass;
    }

    public function setEmail($email)
    {
    $this->email = $email;
    }
}