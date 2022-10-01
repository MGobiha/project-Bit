<?php
require('DB_connection.php');
$id=$_GET['id'];
$query = "DELETE FROM registration WHERE id=$id"; 
$result = mysqli_query($connection,$query) or die ( mysqli_error());
header("Location: UI.php"); 
?>