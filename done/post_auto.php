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
	$server = $_POST['_SERVER'];
	if ($server != $_SESSION['_SERVER']) die('Đã Xảy Ra Lỗi<script type="text/javascript">toarst("error","Đã Có Lỗi Xảy Ra.","Thông Báo Lỗi")</script>');
	$loai = $_POST['auto'];
	if ( $loai == "xoastt") 
	{	$s = 0;
		$getinfo = json_decode(auto('https://graph.beta.facebook.com/me/feed?fields=id,from&limit='.$soluong.'&access_token='.$token),true);
		for ($i=1;$i<=count($getinfo[data]);$i++) 
		{	
			auto('https://graph.beta.facebook.com/'.$getinfo[data][$i-1][id].'?access_token='.$token.'&method=delete');
			$s++;
		}
		die('SUCCESS: Xóa Status Thành Công.<br /> Số Status Đã Xóa Là: '. $s.'.<script type="text/javascript">toarst("success","Xóa Status Thành Công!.","Lời Nhắn Từ Hệ Thống")</script>');
	}
	elseif ($loai == "delfriend") 
	{	$s = 0;
		$getinfo = json_decode(auto('https://graph.beta.facebook.com/me/friends?access_token='.$token.'&method=GET&limit='.$soluong.''),true);
		for ($i=1;$i<=count($getinfo[data]);$i++) 
		{	
			auto('https://graph.facebook.com/me/friends?uid='.$getinfo[data][$i-1][id].'&method=delete&access_token='.$token);
			$s++;
		}
		die('SUCCESS: Xóa Bạn Bè Thành Công.<br /> Số Bạn Bè Đã Xóa Là: '. $s.'.<script type="text/javascript">toarst("success","Xóa Bạn Bè Thành Công!.","Lời Nhắn Từ Hệ Thống")</script>');
	}
	elseif ($loai == "confirm")
	{	$s = 0;
		$getinfo = json_decode(auto('https://graph.facebook.com/me/friendrequests?access_token='.$token.'&limit='.$soluong.''),true); 
		for ($i=1;$i<=count($getinfo[data]);$i++) 
		{	
			auto('https://graph.facebook.com/me/friends/'.$getinfo[data][$i-1][from][id].'?access_token='.$token.'&method=post');
			$s++;
		}
		die('SUCCESS: Chấp Nhận Thành Công.<br /> Số Nick KB Thành Công Là: '. $s.'.<script type="text/javascript">toarst("success","Chấp Nhận Thành Công!.","Lời Nhắn Từ Hệ Thống")</script>');
	}
	elseif ($loai == "unlikefanpage")
	{	$s = 0;
		$getinfo = json_decode(auto('https://graph.facebook.com/me/likes?access_token='.$token.'&limit='.$soluong.''),true); 
		for ($i=1;$i<=count($getinfo[data]);$i++) 
		{	
			auto('https://graph.beta.facebook.com/'.$getinfo[data][$i-1][id].'/likes?method=delete&access_token='.$token);
			$s++;
		}
		die('SUCCESS: Unlike Thành Công.<br /> Số Fanpage Đã Unlike Là: '. $s.'.<script type="text/javascript">toarst("success","Unlike Thành Công!.","Lời Nhắn Từ Hệ Thống")</script>');
	}
	elseif ($loai == "pokefriend")
	{	$s = 0;
		$pokeinfo = json_decode(auto('https://graph.facebook.com/me?access_token='.$token.''),true);
		$getinfo = json_decode(auto('https://graph.facebook.com/me/home?access_token='.$token.'&limit='.$soluong.'&fields=from'),true);
		for ($i=1;$i<=count($getinfo[data]);$i++) 
		{
		if($getinfo[data][$i-1][from][id] != $pokeinfo[id]){			
			auto('https://graph.facebook.com/'.$getinfo[data][$i-1][from][id].'/pokes?access_token='.$token.'&method=post');
			$s++;
		}
		}
		die('SUCCESS: Chọc Thành Công.<br /> Số Bạn Đã Bị Chọc Là: '. $s.'.<script type="text/javascript">toarst("success","Chọc Thành Công!.","Lời Nhắn Từ Hệ Thống")</script>');
	}
	elseif ($loai == "autoketban")
	{	$s = 0;
		$getinfo = json_decode(auto('https://graph.facebook.com/'.$idfb.'/friends?access_token='.$token.'&method=GET&limit='.$soluong.''),true); 
		for ($i=1;$i<=count($getinfo[data]);$i++) 
		{	
			auto('https://graph.facebook.com/me/friends/'.$getinfo[data][$i-1][id].'?access_token='.$token.'&method=post');
			$s++;
		}
		die('SUCCESS: Kết Bạn Thành Công.<br /> Số Nick Đã Kết Bạn Là: '. $s.'.<script type="text/javascript">toarst("success","Kết Bạn Thành Công!.","Lời Nhắn Từ Hệ Thống")</script>');
	}	
	elseif ($loai == "unfolow")
	{	$s = 0;
		$getinfo = json_decode(auto('https://graph.facebook.com/me/subscribers?access_token='.$token.''),true); 
		for ($i=1;$i<=count($getinfo[data]);$i++) 
		{	
			auto('https://graph.facebook.com/'.$getinfo[data][$i-1][id].'/subscribers?access_token='.$token.'&method=delete');
			$s++;
		}
		die('SUCCESS: Huỷ Theo Dõi Thành Công.<br /> Số Nick Đã Huỷ Theo Dõi Là: '. $s.'.<script type="text/javascript">toarst("success","Huỷ Theo Dõi Thành Công!.","Lời Nhắn Từ Hệ Thống")</script>');
	}
}