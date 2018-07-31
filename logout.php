<?php
	setCookie("username", "", time()-214);
    session_start();
    $_SESSION['loggedin']=false;
	header("Location:toobar.php?err=logged out!");
?>