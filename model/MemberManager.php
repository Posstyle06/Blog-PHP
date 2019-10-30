<?php

class MemberManager extends Manager
{

	public function getMember($pseudo)
	{

	    $db = $this->dbConnect();
	    $req = $db->query('SELECT id, pass FROM members WHERE pseudo = "'.$pseudo.'"');
		$result = $req->fetch();
		$req->closeCursor();
		
		return $result;
	}

}