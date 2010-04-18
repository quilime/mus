<?php

	$ini = parse_ini_file("config", true);

	putenv($ini['local']['timezone']);
	define('LOGO', $ini['local']['logo']);
	define('SITE_TITLE', $ini['local']['site_title']);

	define('DB_DSN' , $ini['db']['dsn']);
	define('DB_USER', $ini['db']['username']);
	define('DB_PASS', $ini['db']['password']);
    define('TMP_DIR', dirname(realpath(__FILE__)) . $ini['local']['temp']);
    ini_set( 'include_path', ini_get('include_path')   . PATH_SEPARATOR . $ini['local']['include_path']);

	session_start();

?>
