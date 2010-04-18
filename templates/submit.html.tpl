<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>

	<title>{$site_title} / submit</title>
	
	{include file="headersrc.html.tpl"}
	
</head>

<body>

	{include file="nav.html.tpl"}

    <div id="page">
	
		<pre>
		upload
		must be logged in
		do not leave the page while upload is in progress
		
		form fields
		
			submission title
			optional description
			zipfile of project
			example mp3 mixdown
			
			-if not logged in:
				name
				email
				password
				captcha
				
		</pre>
		
    </div>
	
</body>
</html>
