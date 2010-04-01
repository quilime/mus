<?

	function user_authenticate(&$dbh, $username, $password)
	{
		$_SESSION['user'] = "username";
		return false;
	}
	
	
    function get_request_user()
    {
        return $_SESSION['user'];
    }	

?>
