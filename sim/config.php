<?php
session_start();
$host = "localhost";
$username = "";//tài khoản data
$password = "";	// mật khẩu data
$dbname = "";//tên data

$connection = mysql_connect($host,$username,$password);
if (!$connection){
die('Could not connect: ' . mysql_error());
}
mysql_select_db($dbname) or die(mysql_error());
mysql_query("SET NAMES utf8");
?>