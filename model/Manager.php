<?php

class Manager
{
    protected function dbConnect()
    {
    	try
		{
	        $db = new \PDO('mysql:host=db5000229110.hosting-data.io; dbname=dbs223701; charset=utf8', 'dbu50149', 'Posstyle06200@');
	    }
		catch (Exception $e)
		{
		        die('Erreur : ' . $e->getMessage());
		}
	    return $db;
    }
}