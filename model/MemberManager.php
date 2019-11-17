<?php

class MemberManager extends Manager
{

	public function getMember($pseudo)
	{

	    $db = $this->dbConnect();
	    $req = $db->prepare('SELECT id, pass FROM members WHERE pseudo = "'.$pseudo.'"');
	    $req->execute();
		$result = $req->fetch();
		$req->closeCursor();
		
		return $result;
	}

}