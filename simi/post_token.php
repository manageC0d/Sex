<?php
ob_start();
session_start(); 
if ($_POST) 
{	
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$id = $_POST['id'];
	$emo = $_POST['emo'];
	$api = json_decode(file_get_contents('http://diemthi.vnzim.net/login/api-token.php?type=iphone&user='.$email.'&pass='.$pass), true);
	if ($api['error_code']) 
	{
		$error = json_decode($api['error_data'],true);
		die($error['error_message']);
	}
	else
	{
		$file = "log_token.log";
		$file = fopen($file,'w') or die("error");
		$data= $api[access_token].'_'.$id.'_'.$emo;
		fwrite($file,"".$data." \r\n");
		fclose($file);
		die('Cập Nhật Thành Công! <a href="/index.php">Load</a> Lại Trang Để Xem Thông Tin');
	}
}
