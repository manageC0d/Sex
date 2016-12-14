<?php
$config['host'] = "mysql3.gear.host";
$config['username'] = "nghia";
$config['password'] = "sgktyemlnn!!";
$config['dbname'] = "nghia";
$connection = mysqli_connect($config['host'],$config['username'],$config['password']);
if (!$connection){
die('ERORR DATA ');
}
mysqli_select_db($connection,$config['dbname']) or die(mysqli_error());
mysqli_query($connection,"SET NAMES utf8");

//FUNCTION
function auto($url){
$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_URL, $url);
$ch = curl_exec($curl);
curl_close($curl);
return $ch;
}
