<?php
SESSION_START();
// config database
$host = "";
$username ="";
$password ="";	
$dbname = "";
$connection = @mysqli_connect($host,$username,$password);
if (!$connection)
  {
  die('Could not connect: ' . @mysqli_connect_error());
  }
@mysqli_select_db($connection,$dbname) or die(mysqli_error());
@mysqli_query($connection,"SET NAMES utf8");
?>