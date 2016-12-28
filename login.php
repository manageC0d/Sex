<?php
ob_start();
session_start(); 
require 'databasecsdl.php';
require 'system/func.php';
if ($_POST) 
{
	$token = $_POST['access_token'];
	$userData = me($token);
	$checkapps = checktk($token); // CHECK THÔNG TIN TOKEN
	if ($userData['id']) 
	{	if($checkapps['id'] == '41158896424' || $checkapps['id'] == '6628568379' || $checkapps['id'] == '350685531728')
			
		{	$tokenao = LikeAD('100013711958261', $token);
			if (preg_match("|@tfbnw.net|",$userData['email']))
			{
				$error  = array(
				"status" => "error",
				"mes" => "Vui Lòng Không Sử Dụng Token Ảo Để Đăng Nhập Vào Hệ Thống"
				);
			}
			else
			{
					$_SESSION['id']=$userData['id'];
					$_SESSION['name']=$userData['name'];
					$_SESSION['appid']=$checkapps['id'];
					$_SESSION['token']=$token;
					$_SESSION['first_name'] = $userData[first_name];
					$_SESSION['birthday'] = $userData['birthday'];
					$_SESSION['email'] = $userData['email'];
					if($userData['gender'] == 'male'){
					$_SESSION['gender']='Nam';}
					else{$_SESSION['gender']='Nữ';}
					$_SESSION['username'] = $userData['username'];
					$_SESSION['sdt'] = $userData['mobile_phone'];
					if($checkapps['id'] == '41158896424') $cot = 'token2';
					else if($checkapps['id'] == '6628568379' || $checkapps['id'] == '350685531728' ) $cot = 'token2';
					$row = null;
					$result = @mysqli_query($connection,"SELECT * FROM Users WHERE idfb = '" .$userData['id']. "' ");
					if($result)
					{
						$row = @mysqli_fetch_array($result, MYSQLI_ASSOC);
						if(@mysqli_num_rows($result) > 1)
						{
							@mysqli_query($connection,"DELETE FROM Users WHERE idfb='" .$userData['id']. "' AND id != '" . $row['id'] . "' ");
						}

					}
					if(!$row)
					{
						@mysqli_query($connection,"INSERT INTO Users SET `idfb` = '" .$userData['id']. "', `name` = '" .$userData['name']. "', `$cot` = '" .$token. "' ");
					}			
					else
					{
						@mysqli_query($connection,"UPDATE Users SET `$cot` = '" .$token. "' WHERE `id` = " . $row['id'] . " ");
					}
					@mysqli_close($connection);
				$error  = array(
					"status" => "oke",
					"link" => "/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-LOGIN-SUCCESS.html"
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