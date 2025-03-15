<?php 
    $sname="localhost";
    $uname="root";
    $pass="";
    $dbname="booknow";
    $conn=new mysqli($sname,$uname,$pass,$dbname);
    if($conn->connect_error){
        die("Connection failed:".$conn->connect_error);
    }
    
?>