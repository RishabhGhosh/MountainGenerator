<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Untitled Document</title>
</head>
<body>
<?php
	$username = $_REQUEST["username"];
	$password = $_REQUEST["password"];

	if($password == $username."123")
	{
		setCookie("username", $username, time()+3600);
		header("Location:enterprise.php");
	}
	else
	{
		header("Location:toobar.php?err=Wrong username and Password");
	}
?>
</body>
</html>