<?php

	require_once 'auth.php';


	function &get_db_connection()
	{
	    return $dbh = new PDO(DB_DSN, DB_USER, DB_PASS);
	}


?>