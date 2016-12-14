<?php
ini_set('session.gc_maxlifetime', 1*60*60);
SESSION_START();
// config database
$host = "mysql3.gear.host";
$username = "nghia";
$password = "fujn#Lkf349@uOm!";	
$dbname = "nghia";
$connection = @mysqli_connect($host,$username,$password);
if (!$connection)
  {
  die('Không thể kết nối: ' . @mysqli_connect_error());
  }
@mysqli_select_db($connection,$dbname) or die(mysqli_error());
@mysqli_query($connection,"SET NAMES utf8");
?>