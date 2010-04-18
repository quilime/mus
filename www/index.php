<?php

    ini_set('include_path', ini_get('include_path').PATH_SEPARATOR.'../lib');
    require_once 'init.php';
	require_once 'data.php';
	require_once 'output.php';

    //list($response_format, $response_mime_type) = parse_format($_GET['format'], 'html');

	$url_string = get_url_string();
	
	if (is_string($url_string)) {
		switch(basename($url_string)) {
			
			case 'reg' :
			case 'login' :
				include('login.php');
				break;

			case 'browse' :
				include('browse.php');
				break;			
			
			case 'submit' :
				include('submit.php');
				break;
				
			case 'help' :
				include('help.php');
				break;				
			
			case 'forum' :
				include('forum.php');
				break;
			
			default :
			// check if basename equals username
			// if not throw error
				break;
		}
	}
	else
	{
		include('default.php');
	}
	
?>
