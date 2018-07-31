<?php

    /*if(!isset($_POST["code"])){
        die("Post was empty.");
    }*/
    
    $sql="insert into picsdb(image) values(':image')";

    //$conn = mysqli_connect('localhost', "root", "");
    //mysqli_select_db($con,"simple");

    $conn=new PDO("localhost","simple","root","");
    $stmt = $conn->prepare($sql);
    $stmt->bindValue("':image'",$_POST["image"]);
    $stmt->execute();
    $affected_rows = $stmt->rowCount();
    echo $affected_rows;
/*
  
  $res=mysqli_query($con,"INSERT INTO picsdb(image) VALUES('$_POST[image]')") 
        or die("icpc ".mysql_error());
   */
?>