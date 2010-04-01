<?php

 	require_once ('Smarty/Smarty.class.php');

	/**
	* @return   Smarty  Locally-usable Smarty instance.
	*/
	function get_smarty_instance()
	{
	    $s = new Smarty();
    
	    $s->compile_dir = join(DIRECTORY_SEPARATOR, array(dirname(__FILE__), '..', 'templates', 'cache'));
	    $s->cache_dir = join(DIRECTORY_SEPARATOR, array(dirname(__FILE__), '..', 'templates', 'cache'));

	    $s->template_dir = join(DIRECTORY_SEPARATOR, array(dirname(__FILE__), '..', 'templates'));
	    $s->config_dir = join(DIRECTORY_SEPARATOR, array(dirname(__FILE__), '..', 'templates'));
    
	    $s->register_modifier('url_domain', 'get_url_domain');
	    $s->register_modifier('nice_relative_time', 'get_relative_time');
    
	    $s->assign('domain', get_domain_name());
	    $s->assign('base_dir', get_base_dir());
	    $s->assign('base_href', get_base_href());
    
//	    $s->clear_all_cache();
    
	    return $s;
	}

	/**
	* @param    string  $format     "text", "xml", etc.
	* @param    string  $default    Default format
	* @return   array   Format, mime-type
	*/
	function parse_format($format, $default)
	{
	    $types = array('html' => 'text/html',
	                   'text' => 'text/plain',
	                   'atom' => 'application/atom+xml',
	                   'json' => 'text/json',
	                   'js'   => 'application/x-javascript',
	                   'xspf' => 'application/xspf+xml',
	                   'xml'  => 'text/xml',
	                   'jpg'  => 'image/jpeg',
	                   'png'  => 'image/png',
	                   'm3u'  => 'audio/x-mpegurl');

	    $format = empty($format) ? $default : $format;
    
	    return array($format, $types[$format]);
	}
	

    function get_domain_name()
    {
        if(php_sapi_name() == 'cli')
            return CLI_DOMAIN_NAME;
        
        return $_SERVER['SERVER_NAME'];
    }

    
    function get_base_dir()
    {
        if(php_sapi_name() == 'cli')
            return CLI_BASE_DIRECTORY;
        
        return rtrim(dirname($_SERVER['SCRIPT_NAME']), DIRECTORY_SEPARATOR);
    }


    function get_base_href()
    {
        if(php_sapi_name() == 'cli')
            return '';
        
        $query_pos = strpos($_SERVER['REQUEST_URI'], '?');
        
        return ($query_pos === false) ? $_SERVER['REQUEST_URI']
                                      : substr($_SERVER['REQUEST_URI'], 0, $query_pos);
    }

    
    function get_url_domain($url)
    {
        $parsed = parse_url($url);
        return $parsed['host'];
    }	


   /**
    * @param    int     $seconds    Number of seconds to convert into a human-readable timestamp
    * @return   tring   Human-readable approximate timestamp like "2 hours"
    */
    function approximate_time($seconds)
    {
        switch(true)
        {
            case abs($seconds) <= 90:
                return 'moments';

            case abs($seconds) <= 90 * 60:
                return round(abs($seconds) / 60).' minutes';

            case abs($seconds) <= 36 * 60 * 60:
                return round(abs($seconds) / (60 * 60)).' hours';

            default:
                return round(abs($seconds) / (24 * 60 * 60)).' days';
        }
    }


   /**
    * @param    int     $time   Unix timestamp
    * @return   string  Relative time string like "2 hours earlier"
    */
    function get_relative_time($time)
    {
        $diff = $time - time();

        return approximate_time($diff) . ($diff < 0 ? ' ago' : ' from now');
    }

    function die_with_code($code, $message)
    {
        header("HTTP/1.1 {$code}");
        die($message);
    }


?>
