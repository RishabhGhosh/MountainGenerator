<?php
	if(!isset($_COOKIE["username"]))header("Location:index.php?err=Please login to access secured pages.");
?>