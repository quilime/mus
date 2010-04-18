<?php

    ini_set('include_path', ini_get('include_path').PATH_SEPARATOR.'../lib');
    require_once 'init.php';
	require_once 'data.php';
	require_once 'output.php';

    list($response_format, $response_mime_type) = parse_format($_GET['format'], 'html');

    $dbh =& get_db_connection();

    if(get_request_user())
    {
		// auth stuff here
    }

    $dbh = null;

    $sm = get_smarty_instance();

    if(get_request_user())
    {
		// secure template vars here
    }

    header("Content-Type: {$response_mime_type}; charset=UTF-8");
    print $sm->fetch("browse.{$response_format}.tpl");

?>
