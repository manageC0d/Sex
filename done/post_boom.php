<?php 
ob_start();
session_start();
date_default_timezone_set("Asia/Ho_Chi_Minh");
if ($_POST && $_SESSION[id]) 
{
	include("../system/func.php");
	$idfb = $_POST['id'];
	$token = $_POST['token'];
	$checkapps = json_decode(file_get_contents('https://graph.facebook.com/app/?access_token='.$token),true);
	$soluong = $_POST['limit'];
	$cmt = $_POST['cmt'];
	$server = $_POST['_SERVER'];
	if ($server != $_SESSION['_SERVER']) die('Đã Xảy Ra Lỗi<script type="text/javascript">toarst("error","Đã Có Lỗi Xảy Ra.","Thông Báo Lỗi")</script>');
	$loai = $_POST['auto'];
	if ( $loai == "boomlike") 
	{	$s = $c = 0;
		$getinfo = json_decode(auto('https://graph.beta.facebook.com/'.$idfb.'/feed?fields=id&limit='.$soluong.'&access_token='.$token), true);
		for ($i = 0; $i <= count($getinfo[data]); $i++) 
		{
			auto('https://graph.beta.facebook.com/'.$getinfo[data][$i][id].'/likes?method=post&access_token='.$token);
			$s++;
			if ($cmt == 1) 
			{
				$cmt = json_decode(auto('https://graph.beta.facebook.com/'.$getinfo[data][$i][id].'/comments?fields=id&limit=500&access_token='.$token), true);
				for ($j=1;$j<=count($cmt[data]);$j++) 
				{
					auto('https://graph.facebook.com/'.$cmt[data][$j][id].'/likes?method=post&access_token='.$token);
					$c++;
				}
			}
		}
		die('SUCCESS: Bão Like Thành Công.<br /> '.$s.' : Like Trạng Thái & '.$c.' : Like Comment.<script type="text/javascript">toarst("success","Bão Like Thành Công!.","Lời Nhắn Từ Hệ Thống")</script>');
	}
	elseif ($loai == "boomcmt") 
	{	$noidungs = $_POST['noidung'];
		$s = 0;
		$getinfo = json_decode(auto('https://graph.facebook.com/'.$idfb.'/feed?fields=id&limit='.$soluong.'&access_token='.$token), true);
		for ($i=0;$i<=count($getinfo[data]);$i++) 
		{	$array_noidung = explode("\n", $noidungs);
			$noidung = $array_noidung[array_rand($array_noidung)];
			auto("https://graph.facebook.com/".$getinfo[data][$i][id]."/comments?access_token=".$token."&method=post&message=".urlencode($noidung));
			$s++;
		}
		die('SUCCESS: Bão Comment Thành Công.<br /> Số Comment Bão Thành Công Là: '. $s.'.<script type="text/javascript">toarst("success","Bão Comment Thành Công!.","Lời Nhắn Từ Hệ Thống")</script>');
	}
	elseif ($loai == "boomcmt2")
	{
		$noidungs = $_POST['noidung'];
		$s = 0;
		for ($i=1;$i<=$soluong;$i++) 
		{
			$array_noidung = explode("\n", $noidungs);
			$noidung = $array_noidung[array_rand($array_noidung)];
			auto("https://graph.facebook.com/".$idfb."/comments?access_token=".$token."&method=post&message=".urlencode($noidung));
			$s++;
		}
		die('SUCCESS: Bão Comment Thành Công.<br /> Số Comment Bão Thành Công Là: '. $s.'.<script type="text/javascript">toarst("success","Bão Comment Thành Công!.","Lời Nhắn Từ Hệ Thống")</script>');
	}
	elseif ($loai == "boomcamxuc") 
	{	$camxucs = $_POST['camxuc'];
		if ($camxucs != "LOVE" && $camxucs != "WOW" && $camxucs != "HAHA" && $camxucs != "SAD" && $camxucs != "ANGRY" && $camxucs != "THANKFUL" ) die('<script type="text/javascript">toarst("success","Cảm xúc gì đây ta !!!")</script>');
		if ($checkapps['id']!='6628568379' && $checkapps['id'] != '350685531728') die('ERROR: Bão Cảm Xúc Không Thành Công.<br /> Vui lòng lấy token bằng cách đăng nhập để sử dụng chức năng này');
		$s = 0;
		$getinfo = json_decode(auto('https://graph.beta.facebook.com/'.$idfb.'/feed?fields=id&limit='.$soluong.'&access_token='.$token), true);
		for ($i = 0; $i <= count($getinfo[data]); $i++) 
		{
			auto('https://graph.beta.facebook.com/'.$getinfo[data][$i][id].'/reactions?type='.$camxucs.'&method=post&access_token='.$token.'&method=post');
			$s++;
		}
		die('SUCCESS: Bão Cảm Xúc Thành Công.<br /> Số Like Bão Thành Công Là: '. $s.'.<script type="text/javascript">toarst("success","Bão Cảm Xúc Thành Công!.","Lời Nhắn Từ Hệ Thống")</script>');
	}
	elseif ($loai == "boomwall")
	{	$noidungs = $_POST['noidung'];
		$s = 0;
		for ($i=1;$i<=$soluong;$i++)
		{	
			$array_noidung = explode("\n", $noidungs);
			$noidung = $array_noidung[array_rand($array_noidung)];
			auto('https://graph.facebook.com/'.$idfb.'/feed?message='.urlencode($noidung).'&access_token='.$token.'&method=post');
			$s++;
		}
		die('SUCCESS: Boom Wall Thành Công.<br /> Số Stt Đã Boom Là: '. $s.'.<script type="text/javascript">toarst("success","Boom Wall Thành Công!.","Lời Nhắn Từ Hệ Thống")</script>');
	}
}