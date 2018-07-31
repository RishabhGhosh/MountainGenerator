<?php
    $em=$_POST['email'];
    $pas=$_POST['password'];
    

    /*$em = stripcslashes($em);
    $pas = stripcslashes($pas);
    $em = mysql_real_escape_string($em);
    $pas = mysql_real_escape_string($pas);
    */
    $con=mysqli_connect("localhost","root","");
    mysqli_select_db($con,"simple");

    $res=mysqli_query($con,"select * from log where email = '$em' and password = '$pas'") 
        or die("icpc ".mysql_error());
    
    $row=mysqli_fetch_array($res);
    
    if($row['email'] == $em && $row['password'] == $pas){
        session_start();
        $_SESSION['loggedin']=true;
        $_SESSION['username']=$em;
        setCookie("username", $username, time()+3600);
		header("Location:enterprise.php");
    }else{
        header("Location:toobar.php?err=Wrong username and Password");
    }

?>