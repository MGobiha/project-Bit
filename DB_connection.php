<?php
$host="localhost";
$user_name="root";
$password="";
$database_name="test";
$connection=mysqli_connect($host,$user_name,$password,$database_name);
if(!$connection){die("database is not connected".mysqli_error($connection));}
?>
