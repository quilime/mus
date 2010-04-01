<?php
	
	putenv( 'TZ=America/Los_Angeles');
    
	define( 'DB_DSN',  "mysql:host=mysql.syzygryd.com;dbname=syzygryd");
	define( 'DB_USER', "syzygryd");
	define( 'DB_PASS', "ej7bit6nej");

    ini_set( 'include_path', ini_get('include_path')   . PATH_SEPARATOR . '/home/syzyrgryd/mus/lib');
    define('TMP_DIR', dirname(realpath(__FILE__)).'/../tmp');

	session_start();

?>
