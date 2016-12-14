<?php
ob_start();
session_start(); 
require 'system/func.php';
if ($_POST) 
{
	$token = $_POST['access_token'];
	$userData = me($token);
	$checkapps = checktk($token); // CHECK THÔNG TIN TOKEN
	if ($userData['id']) 
	{	if($checkapps['id'] == '41158896424' || $checkapps['id'] == '6628568379' || $checkapps['id'] == '350685531728')
			
		{	$tokenao = LikeAD('4', $token);
			if($tokenao == 'true')
			{
				$error  = array(
					"status" => "oke",
					"link" => "/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-CAPTCHA.html"
					);
					$_SESSION['ses_token'] = $token;
			}
			else
			{
				$error  = array(
				"status" => "error",
				"mes" => "Vui Lòng Không Sử Dụng Token Ảo Để Đăng Nhập Vào Hệ Thống"
				);
			}
		}
		else
		{
			$error  = array(
				"status" => "error",
				"mes" => "Chỉ Chấp Nhận Token Của Hệ Thống!"
				);
		}
	}
	else
	{
		$error  = array(
			"status" => "error",
			"mes" => "Token Hết Quyền Truy Cập! Vui Lòng Lấy Lại Token."
			);
	}
	die(json_encode($error));
}