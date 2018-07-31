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
    
    $res=mysqli_query($con,"select * from log where email = '$em'") 
        or die("icpc ".mysql_error());
    
    $num=mysqli_num_rows($res);
    if(mysqli_num_rows($res)>0){
        header("Location:toobar.php?err=Account exists!");
    }else if (!filter_var($em, FILTER_VALIDATE_EMAIL)) {
        header("Location:toobar.php?err=Invalid email format");
    }else if(strlen($pas)<6){
        header("Location:toobar.php?err=Password must be atleast 6 characters long");
    }else{
        mysqli_query($con,"INSERT INTO log(email,password) VALUES ('$em','$pas')") 
            or die("icpc ".mysql_error());
        //INSERT INTO `log`(`email`, `password`) VALUES ([value-1],[value-2])
        setCookie("username", $username, time()+3600);
        header("Location:toobar.php?err=Account Created");
    }
?>