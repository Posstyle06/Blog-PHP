<?php

class MemberManager extends Manager
{

	public function getMember($pseudo)
	{

	    $db = $this->dbConnect();
	    $req = $db->prepare('SELECT id, pass FROM members WHERE id = ? ');
	    $req->execute(array($pseudo));
	    $req = $req->fetch();

	    return $req;

	    $req->closeCursor();
	}

}