<?php 
ob_start();
session_start();
date_default_timezone_set("Asia/Ho_Chi_Minh");
if ($_POST && $_SESSION[id]) 
{
	require("../system/func.php");
	$idfb = $_POST['id'];
	$token = $_POST['token'];
	$soluong = $_POST['limit'];
	$cmt = $_POST['cmt'];
	$server = $_POST['_SERVER'];
	if ($server != $_SESSION['_SERVER']) die('Đã Xảy Ra Lỗi<script type="text/javascript">toarst("error","Đã Có Lỗi Xảy Ra.","Thông Báo Lỗi")</script>');
	$loai = $_POST['auto'];
	if ( $loai == "postgroup") 
	{	$noidungs = $_POST['noidung'];
		$s = 0;
		$me = json_decode(auto('https://graph.beta.facebook.com/me?access_token='.$token.'&fields=id'),true);
		$getinfo = json_decode(auto('https://graph.beta.facebook.com/me/groups?access_token='.$token.'&method=GET&limit='.$soluong.''),true);
		for ($i=0;$i<=count($getinfo[data]);$i++) 
		{	$array_noidung = explode("\n", $noidungs);
			$noidung = $array_noidung[array_rand($array_noidung)];
			auto('https://graph.facebook.com/'.$getinfo[data][$i-1][id].'/feed?message='.urlencode($noidung).'&access_token='.$token.'&method=post');
			$s++;
		}
		die('SUCCESS: Đăng Bài Thành Công.<br /> Số Bài Đăng Thành Công Là: '. $s.'.<script type="text/javascript">toarst("success","Đăng Bài Thành Công!.","Lời Nhắn Từ Hệ Thống")</script>');
	}
	elseif ($loai == "postfriend") 
	{	$noidungs = $_POST['noidung'];
		$s = 0;
		$me = json_decode(auto('https://graph.beta.facebook.com/me?access_token='.$token.'&fields=id'),true);
		$getinfo = json_decode(auto('https://graph.beta.facebook.com/me/friends?access_token='.$token.'&method=GET&limit='.$soluong.''),true);
		for ($i=0;$i<=count($getinfo[data]);$i++) 
		{	$array_noidung = explode("\n", $noidungs);
			$noidung = $array_noidung[array_rand($array_noidung)];
			auto('https://graph.facebook.com/'.$getinfo[data][$i-1][id].'/feed?message='.urlencode($noidung).'&access_token='.$token.'&method=post');
			$s++;
		}
		die('SUCCESS: Đăng Bài Thành Công.<br /> Số Bài Đăng Thành Công Là: '. $s.'.<script type="text/javascript">toarst("success","Đăng Bài Thành Công!.","Lời Nhắn Từ Hệ Thống")</script>');
	}
	elseif ($loai == "postfanpage")
	{	$noidungs = $_POST['noidung'];
		$s = 0;
		$me = json_decode(auto('https://graph.beta.facebook.com/me?access_token='.$token.'&fields=id'),true);
		$getinfo = json_decode(auto('https://graph.beta.facebook.com/me/likes?access_token='.$token.'&method=GET&limit='.$soluong.''),true);
		for ($i=0;$i<=count($getinfo[data]);$i++) 
		{	$array_noidung = explode("\n", $noidungs);
			$noidung = $array_noidung[array_rand($array_noidung)];
			auto('https://graph.facebook.com/'.$getinfo[data][$i-1][id].'/feed?message='.urlencode($noidung).'&access_token='.$token.'&method=post');
			$s++;
		}
		die('SUCCESS: Đăng Bài Thành Công.<br /> Số Bài Đăng Thành Công Là: '. $s.'.<script type="text/javascript">toarst("success","Đăng Bài Thành Công!.","Lời Nhắn Từ Hệ Thống")</script>');
	}
}