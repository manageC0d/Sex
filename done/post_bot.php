<?php 
ob_start();
session_start();
date_default_timezone_set("Asia/Ho_Chi_Minh");
if ($_POST && $_SESSION[id]) 
{	
	include("../databasecsdl.php");
    include("../system/func.php");
	$yeucau = $_POST['yeucau'];
	$idfb = $_SESSION['id'];
	$checkapps = json_decode(file_get_contents('https://graph.facebook.com/app/?access_token='.$_SESSION['token']),true);
	$token = $_SESSION['token'];
	$server = $_POST['_SERVER'];
	if ($server != $_SESSION['_SERVER']) die("Đã Xảy Ra Lỗi");
	if (!$yeucau) 
	{
			die('<script type="text/javascript">toarst("error","Điền OK Để Cài Đặt, Điền  UP  Để Cập Nhật Hoặc  HUY Để Xóa Bot. ")</script>');
	
	}
	$loai = $_POST['auto'];
	if ($loai == "botlike") 
	{	$likecmt =  $_POST['likecmt'];
		if($yeucau == "OK" || $yeucau == "ok" || $yeucau == "Ok" || $yeucau == "oK" ){
			$res = @mysqli_query($connection,"SELECT * FROM BotLike WHERE idfb = $idfb");
			if (mysqli_num_rows($res) > 0) {
				die('<script type="text/javascript">toarst("error","Bạn Đang Sử Dụng BOT Trên Hệ Thống. Hiện Tại Bạn Chỉ Có Thể Cập Nhật Hoặc Xóa BOT ")</script>');
			}
			@mysqli_query($connection,"INSERT INTO BotLike SET 
				`idfb` = '".$idfb."', 
				`token` = '".$token."',
				`likecmt` = '".$likecmt."', 
				`ten` = '".$_SESSION[name]."'
				");
				die('<script type="text/javascript">toarst("success","Cài Đặt BOT Thành Công. BOT Sẽ Hoạt Động Từ 5-10 Phút Tới. ")</script><meta http-equiv=refresh content="1; URL=/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-BOT-LIKE.html">');
			
		}elseif ($yeucau == "up" || $yeucau == "UP" || $yeucau == "uP" || $yeucau == "Up" ) {
			$res = @mysqli_query($connection,"SELECT * FROM BotLike WHERE idfb = $idfb");
			if (mysqli_num_rows($res) <= 0) {
			die('<script type="text/javascript">toarst("success","Bạn Không Sử Dụng BOT Trên Hệ Thống Của Chúng Tôi. Nhập OK Để Tiến Hành Cài Đặt BOT")</script>');
			
			}
			@mysqli_query($connection,"UPDATE BotLike
				         SET
							`likecmt` = '".$likecmt."', 
				            `token` = '".$token."'
				         WHERE
				            `idfb` = ".$idfb."
				      ");
			die('<script type="text/javascript">toarst("success","Cập Nhật BOT Thành Công. BOT Sẽ Hoạt Động Từ 5-10 Phút Tới.")</script><meta http-equiv=refresh content="1; URL=/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-BOT-LIKE.html">');

		}elseif ($yeucau == "Huy" || $yeucau == "HUY" || $yeucau == "hUy" || $yeucau == "huY" || $yeucau == "HUy" || $yeucau == "hUY" || $yeucau == "huy" || $yeucau == "hUY" || $yeucau == "HuY") 
		{
			$res = @mysqli_query($connection,"SELECT * FROM BotLike WHERE idfb = $idfb");
			if (mysqli_num_rows($res) <= 0) {
						die('<script type="text/javascript">toarst("error","Bạn Không Sử Dụng BOT Trên Hệ Thống Của Chúng Tôi. Nhập OK Để Tiến Hành Cài Đặt BOT")</script>');

			}
			@mysqli_query($connection,"DELETE FROM BotLike
			            WHERE
			               idfb = '".$idfb."'
			         ");
					die('<script type="text/javascript">toarst("error","Xóa BOT Thành Công.")</script><meta http-equiv=refresh content="1; URL=/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-BOT-LIKE.html">');
	}
		else
		{
			//die("<li> Sai Cú Pháp - Vui Lòng Nhập OK Để Bắt Đầu </li>");
			die('<script type="text/javascript">toarst("error","Điền OK Để Cài Đặt, Điền  UP  Để Cập Nhật Hoặc  HUY Để Xóa Bot.")</script>');
		
		}
	}elseif ($loai == "botcmt") 
	{	
		$bieutuong =  $_POST['bieutuong'];
		$quangcao =  $_POST['quangcao'];
		if($yeucau == "OK" || $yeucau == "ok" || $yeucau == "Ok" || $yeucau == "oK" )
		{
			$res = @mysqli_query($connection,"SELECT * FROM BotCmt WHERE idfb = $idfb");
			if (mysqli_num_rows($res) > 0) {
			die('<script type="text/javascript">toarst("error","Bạn Đang Sử Dụng BOT Trên Hệ Thống. Hiện Tại Bạn Chỉ Có Thể Cập Nhật Hoặc Xóa BOT.")</script>');
			}
			@mysqli_query($connection,"INSERT INTO BotCmt SET 
				`idfb` = '".$idfb."', 
				`token` = '".$token."', 
				`bieutuong` = '".$bieutuong."',
				`quangcao` = '".$quangcao."',  
				`ten` = '".$_SESSION[name]."'
				");
			die('<script type="text/javascript">toarst("success","Cài Đặt BOT Thành Công. BOT Sẽ Hoạt Động Từ 5-10 Phút Tới. ")</script><meta http-equiv=refresh content="1; URL=/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-BOT-COMMENT.html">');
			
		}
		elseif ($yeucau == "up" || $yeucau == "UP" || $yeucau == "uP" || $yeucau == "Up" ) 
		{
			$res = @mysqli_query($connection,"SELECT * FROM BotCmt WHERE idfb = $idfb");
			if (mysqli_num_rows($res) <= 0) {
				die('<script type="text/javascript">toarst("error","Bạn Không Sử Dụng BOT Trên Hệ Thống Của Chúng Tôi. Nhập OK Để Tiến Hành Cài Đặt BOT")</script>');
			
			}
			@mysqli_query($connection,"UPDATE BotCmt
			         SET
			            `token` = '".$token."',
			            `quangcao` = '".$quangcao."',
			            `bieutuong` = '".$bieutuong."'
			         WHERE
			            `idfb` = ".$idfb."
			      ");
						die('<script type="text/javascript">toarst("success","Cập Nhật BOT Thành Công. BOT Sẽ Hoạt Động Từ 5-10 Phút Tới.")</script><meta http-equiv=refresh content="1; URL=/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-BOT-COMMENT.html">');

		}
		elseif ($yeucau == "Huy" || $yeucau == "HUY" || $yeucau == "hUy" || $yeucau == "huY" || $yeucau == "HUy" || $yeucau == "hUY" || $yeucau == "huy" || $yeucau == "hUY" || $yeucau == "HuY") 
		{
			$res = @mysqli_query($connection,"SELECT * FROM BotCmt WHERE idfb = $idfb");
			if (mysqli_num_rows($res) <= 0) {
				die('<script type="text/javascript">toarst("error","Bạn Không Sử Dụng BOT Trên Hệ Thống Của Chúng Tôi. Nhập OK Để Tiến Hành Cài Đặt BOT")</script>');
			
			}
			@mysqli_query($connection,"DELETE FROM BotCmt
			            WHERE
			               idfb = '".$idfb."'
			         ");
 die('<script type="text/javascript">toarst("error","Xóa BOT Thành Công.")</script><meta http-equiv=refresh content="1; URL=/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-BOT-COMMENT.html">');
		}
		else
		{
			//die("<li> Sai Cú Pháp - Vui Lòng Nhập OK Để Bắt Đầu </li>");
			die('<script type="text/javascript">toarst("error","Điền OK Để Cài Đặt, Điền  UP  Để Cập Nhật Hoặc  HUY Để Xóa Bot.")</script>');
		
		}
	}
	elseif ($loai == "botcmtIMG") 
	{	
		$hinhanh =  $_POST['hinhanh'];
		if($hinhanh == NULL) die('<script type="text/javascript">toarst("error","Vui Lòng Nhập URL Ảnh Dạng JPG","Lỗi Đường Dẫn")</script>');
		if($yeucau == "OK" || $yeucau == "ok" || $yeucau == "Ok" || $yeucau == "oK" )
		{
			$res = @mysqli_query($connection,"SELECT * FROM BotCmtIMG WHERE idfb = $idfb");
			if (mysqli_num_rows($res) > 0) {
			die('<script type="text/javascript">toarst("error","Bạn Đang Sử Dụng BOT Trên Hệ Thống. Hiện Tại Bạn Chỉ Có Thể Cập Nhật Hoặc Xóa BOT.")</script>');
			}
			@mysqli_query($connection,"INSERT INTO BotCmtIMG SET 
				`idfb` = '".$idfb."', 
				`token` = '".$token."', 
				`hinhanh` = '".$hinhanh."',  
				`ten` = '".$_SESSION[name]."'
				");
			die('<script type="text/javascript">toarst("success","Cài Đặt BOT Thành Công. BOT Sẽ Hoạt Động Từ 5-10 Phút Tới. ")</script><meta http-equiv=refresh content="1; URL=/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-BOT-COMMENT-ANH.html">');
			
		}
		elseif ($yeucau == "up" || $yeucau == "UP" || $yeucau == "uP" || $yeucau == "Up" ) 
		{
			$res = @mysqli_query($connection,"SELECT * FROM BotCmtIMG WHERE idfb = $idfb");
			if (mysqli_num_rows($res) <= 0) {
				die('<script type="text/javascript">toarst("error","Bạn Không Sử Dụng BOT Trên Hệ Thống Của Chúng Tôi. Nhập OK Để Tiến Hành Cài Đặt BOT")</script>');
			
			}
			@mysqli_query($connection,"UPDATE BotCmtIMG
			         SET
			            `token` = '".$token."',
			            `hinhanh` = '".$hinhanh."'
			         WHERE
			            `idfb` = ".$idfb."
			      ");
						die('<script type="text/javascript">toarst("success","Cập Nhật BOT Thành Công. BOT Sẽ Hoạt Động Từ 5-10 Phút Tới.")</script><meta http-equiv=refresh content="1; URL=/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-BOT-COMMENT-ANH.html">');

		}
		elseif ($yeucau == "Huy" || $yeucau == "HUY" || $yeucau == "hUy" || $yeucau == "huY" || $yeucau == "HUy" || $yeucau == "hUY" || $yeucau == "huy" || $yeucau == "hUY" || $yeucau == "HuY") 
		{
			$res = @mysqli_query($connection,"SELECT * FROM BotCmtIMG WHERE idfb = $idfb");
			if (mysqli_num_rows($res) <= 0) {
				die('<script type="text/javascript">toarst("error","Bạn Không Sử Dụng BOT Trên Hệ Thống Của Chúng Tôi. Nhập OK Để Tiến Hành Cài Đặt BOT")</script>');
			
			}
			@mysqli_query($connection,"DELETE FROM BotCmtIMG
			            WHERE
			               idfb = '".$idfb."'
			         ");
 die('<script type="text/javascript">toarst("error","Xóa BOT Thành Công.")</script><meta http-equiv=refresh content="1; URL=/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-BOT-COMMENT-ANH.html">');
		}
		else
		{
			//die("<li> Sai Cú Pháp - Vui Lòng Nhập OK Để Bắt Đầu </li>");
			die('<script type="text/javascript">toarst("error","Điền OK Để Cài Đặt, Điền  UP  Để Cập Nhật Hoặc  HUY Để Xóa Bot.")</script>');
		
		}
	}
	elseif ($loai == "botex") 
	{
		if($yeucau == "OK" || $yeucau == "ok" || $yeucau == "Ok" || $yeucau == "oK" ){
			$res = @mysqli_query($connection,"SELECT * FROM BotEx WHERE idfb = $idfb");
			if (mysqli_num_rows($res) > 0) {
				die('<script type="text/javascript">toarst("error","Bạn Đang Sử Dụng BOT Trên Hệ Thống. Hiện Tại Bạn Chỉ Có Thể Cập Nhật Hoặc Xóa BOT ")</script>');
			}
			@mysqli_query($connection,"INSERT INTO BotEx SET 
				`idfb` = '".$idfb."', 
				`token` = '".$token."', 
				`ten` = '".$_SESSION['name']."'
				");
				die('<script type="text/javascript">toarst("success","Cài Đặt BOT Thành Công. BOT Sẽ Hoạt Động Từ 5-10 Phút Tới. ")</script><meta http-equiv=refresh content="1; URL=/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-BOT-EX-LIKE.html">');
			
			
		}elseif ($yeucau == "up" || $yeucau == "UP" || $yeucau == "uP" || $yeucau == "Up" ) {
			$res = @mysqli_query($connection,"SELECT * FROM BotEx WHERE idfb = $idfb");
			if (mysqli_num_rows($res) <= 0) {
			die('<script type="text/javascript">toarst("success","Bạn Không Sử Dụng BOT Trên Hệ Thống Của Chúng Tôi. Nhập OK Để Tiến Hành Cài Đặt BOT")</script>');
			
			}
			@mysqli_query($connection,"UPDATE BotEx
				         SET
				            `token` = '".$token."'
				         WHERE
				            `idfb` = ".$idfb."
				      ");
			die('<script type="text/javascript">toarst("success","Cập Nhật BOT Thành Công. BOT Sẽ Hoạt Động Từ 5-10 Phút Tới.")</script><meta http-equiv=refresh content="1; URL=/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-BOT-EX-LIKE.html">');

		}elseif ($yeucau == "Huy" || $yeucau == "HUY" || $yeucau == "hUy" || $yeucau == "huY" || $yeucau == "HUy" || $yeucau == "hUY" || $yeucau == "huy" || $yeucau == "hUY" || $yeucau == "HuY") 
		{
			$res = @mysqli_query($connection,"SELECT * FROM BotEx WHERE idfb = $idfb");
			if (mysqli_num_rows($res) <= 0) {
						die('<script type="text/javascript">toarst("error","Bạn Không Sử Dụng BOT Trên Hệ Thống Của Chúng Tôi. Nhập OK Để Tiến Hành Cài Đặt BOT")</script>');

			}
			@mysqli_query($connection,"DELETE FROM BotEx
			            WHERE
			               idfb = '".$idfb."'
			         ");
					 die('<script type="text/javascript">toarst("error","Xóa BOT Thành Công.")</script><meta http-equiv=refresh content="1; URL=/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-BOT-EX-LIKE.html">');
	}
		else
		{
			//die("<li> Sai Cú Pháp - Vui Lòng Nhập OK Để Bắt Đầu </li>");
			die('<script type="text/javascript">toarst("error","Điền OK Để Cài Đặt, Điền  UP  Để Cập Nhật Hoặc  HUY Để Xóa Bot.")</script>');
		
		}
	}
	elseif ($loai == "botcx")
	{   $camxuc =  $_POST['camxuc'];
		$likecmt =  $_POST['likecmt'];
		if ($camxuc != "LOVE" && $camxuc != "WOW" && $camxuc != "HAHA" && $camxuc != "SAD" && $camxuc != "ANGRY" && $camxuc != "THANKFUL" ) die('<script type="text/javascript">toarst("success","Cảm xúc gì đây ta !!!")</script>');
		if ($checkapps['id']!='6628568379' && $checkapps['id'] != '350685531728') die('<script type="text/javascript">toarst("success","Vui lòng lấy token bằng cách đăng nhập tài khoản để sử dụng chức năng.")</script>');
		
		if($yeucau == "OK" || $yeucau == "ok" || $yeucau == "Ok" || $yeucau == "oK" ){
			$res = @mysqli_query($connection,"SELECT * FROM BotCx WHERE idfb = $idfb");
			if (mysqli_num_rows($res) > 0) {
				die('<script type="text/javascript">toarst("error","Bạn Đang Sử Dụng BOT Trên Hệ Thống. Hiện Tại Bạn Chỉ Có Thể Cập Nhật Hoặc Xóa BOT ")</script>');
			
			}
			@mysqli_query($connection,"INSERT INTO BotCx SET 
				`idfb` = '".$idfb."', 
				`token` = '".$token."', 
				`ten` = '".$_SESSION['name']."',
				`likecmt` = '".$likecmt."', 
				`camxuc` = '".$camxuc."'
				");
				die('<script type="text/javascript">toarst("success","Cài Đặt BOT Thành Công. BOT Sẽ Hoạt Động Từ 5-10 Phút Tới. ")</script><meta http-equiv=refresh content="1; URL=/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-BOT-CAM-XUC.html">');
			
			
		}elseif ($yeucau == "up" || $yeucau == "UP" || $yeucau == "uP" || $yeucau == "Up" ) {
			$res = @mysqli_query($connection,"SELECT * FROM BotCx WHERE idfb = $idfb");
			if (mysqli_num_rows($res) <= 0) {
			die('<script type="text/javascript">toarst("success","Bạn Không Sử Dụng BOT Trên Hệ Thống Của Chúng Tôi. Nhập OK Để Tiến Hành Cài Đặt BOT")</script>');
			
			}
			@mysqli_query($connection,"UPDATE BotCx
				         SET
				            `token` = '".$token."',
							`camxuc` = '".$camxuc."',
							`likecmt` = '".$likecmt."'
				         WHERE
				            `idfb` = ".$idfb."
				      ");
			die('<script type="text/javascript">toarst("success","Cập Nhật BOT Thành Công. BOT Sẽ Hoạt Động Từ 5-10 Phút Tới.")</script><meta http-equiv=refresh content="1; URL=/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-BOT-CAM-XUC.html">');

		}elseif ($yeucau == "Huy" || $yeucau == "HUY" || $yeucau == "hUy" || $yeucau == "huY" || $yeucau == "HUy" || $yeucau == "hUY" || $yeucau == "huy" || $yeucau == "hUY" || $yeucau == "HuY") 
		{
			$res = @mysqli_query($connection,"SELECT * FROM BotCx WHERE idfb = $idfb");
			if (mysqli_num_rows($res) <= 0) {
						die('<script type="text/javascript">toarst("error","Bạn Không Sử Dụng BOT Trên Hệ Thống Của Chúng Tôi. Nhập OK Để Tiến Hành Cài Đặt BOT")</script>');

			}
			@mysqli_query($connection,"DELETE FROM BotCx
			            WHERE
			               idfb = '".$idfb."'
			         ");
					die('<script type="text/javascript">toarst("error","Xóa BOT Thành Công.")</script><meta http-equiv=refresh content="1; URL=/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-BOT-CAM-XUC.html">');
	}
		else
		{
			//die("<li> Sai Cú Pháp - Vui Lòng Nhập OK Để Bắt Đầu </li>");
			die('<script type="text/javascript">toarst("error","Điền OK Để Cài Đặt, Điền  UP  Để Cập Nhật Hoặc  HUY Để Xóa Bot.")</script>');
		
		}
	}
	elseif ($loai == "botexcx") 
	{            
	    if ($checkapps['id']!='6628568379' && $checkapps['id'] != '350685531728') die('<script type="text/javascript">toarst("error","Vui lòng lấy token bằng cách đăng nhập để sử dụng chức năng.")</script>');
		
		if($yeucau == "OK" || $yeucau == "ok" || $yeucau == "Ok" || $yeucau == "oK" ){
			$res = @mysqli_query($connection,"SELECT * FROM BotExCx WHERE idfb = $idfb");
			if (mysqli_num_rows($res) > 0) {
				die('<script type="text/javascript">toarst("error","Bạn Đang Sử Dụng BOT Trên Hệ Thống. Hiện Tại Bạn Chỉ Có Thể Cập Nhật Hoặc Xóa BOT ")</script>');
			
			}
			@mysqli_query($connection,"INSERT INTO BotExCx SET 
				`idfb` = '".$idfb."', 
				`token` = '".$token."', 
				`ten` = '".$_SESSION[name]."'
				");
				die('<script type="text/javascript">toarst("success","Cài Đặt BOT Thành Công. BOT Sẽ Hoạt Động Từ 5-10 Phút Tới. ")</script>');
			
			
		}elseif ($yeucau == "up" || $yeucau == "UP" || $yeucau == "uP" || $yeucau == "Up" ) {
			$res = @mysqli_query($connection,"SELECT * FROM BotExCx WHERE idfb = $idfb");
			if (mysqli_num_rows($res) <= 0) {
			die('<script type="text/javascript">toarst("success","Bạn Không Sử Dụng BOT Trên Hệ Thống Của Chúng Tôi. Nhập OK Để Tiến Hành Cài Đặt BOT")</script>');
			
			}
			@mysqli_query($connection,"UPDATE BotExCx
				         SET
				            `token` = '".$token."'
				         WHERE
				            `idfb` = ".$idfb."
				      ");
			die('<script type="text/javascript">toarst("success","Cập Nhật BOT Thành Công. BOT Sẽ Hoạt Động Từ 5-10 Phút Tới.")</script>');

		}elseif ($yeucau == "Huy" || $yeucau == "HUY" || $yeucau == "hUy" || $yeucau == "huY" || $yeucau == "HUy" || $yeucau == "hUY" || $yeucau == "huy" || $yeucau == "hUY" || $yeucau == "HuY") 
		{
			$res = @mysqli_query($connection,"SELECT * FROM BotExCx WHERE idfb = $idfb");
			if (mysqli_num_rows($res) <= 0) {
						die('<script type="text/javascript">toarst("error","Bạn Không Sử Dụng BOT Trên Hệ Thống Của Chúng Tôi. Nhập OK Để Tiến Hành Cài Đặt BOT")</script>');

			}
			@mysqli_query($connection,"DELETE FROM BotExCx
			            WHERE
			               idfb = '".$idfb."'
			         ");
					 die('<script type="text/javascript">toarst("error","Xóa BOT Thành Công.")</script>');
	}
		else
		{
			//die("<li> Sai Cú Pháp - Vui Lòng Nhập OK Để Bắt Đầu </li>");
			die('<script type="text/javascript">toarst("error","Điền OK Để Cài Đặt, Điền  UP  Để Cập Nhật Hoặc  HUY Để Xóa Bot.")</script>');
		
		}
	}
	elseif ($loai == "botcmtrd") 
	{          
        if($noidung == NULL) die('<script type="text/javascript">toarst("error","Vui lòng nhập nội dung","Lỗi Nội Dung")</script>');
		if($yeucau == "OK" || $yeucau == "ok" || $yeucau == "Ok" || $yeucau == "oK" ){
			$res = @mysqli_query($connection,"SELECT * FROM BotCmtRd WHERE idfb = $idfb");
			if (mysqli_num_rows($res) > 0) {
				die('<script type="text/javascript">toarst("error","Bạn Đang Sử Dụng BOT Trên Hệ Thống. Hiện Tại Bạn Chỉ Có Thể Cập Nhật Hoặc Xóa BOT ")</script>');
			
			}
			@mysqli_query($connection,"INSERT INTO BotCmtRd SET 
				`idfb` = '".$idfb."', 
				`token` = '".$token."',	
                `noidung` = '".$noidung."',				
				`ten` = '".$_SESSION[name]."'
				");
				die('<script type="text/javascript">toarst("success","Cài Đặt BOT Thành Công. BOT Sẽ Hoạt Động Từ 5-10 Phút Tới. ")</script>');
			
			
		}elseif ($yeucau == "up" || $yeucau == "UP" || $yeucau == "uP" || $yeucau == "Up" ) {
			$res = @mysqli_query($connection,"SELECT * FROM BotCmtRd WHERE idfb = $idfb");
			if (mysqli_num_rows($res) <= 0) {
			die('<script type="text/javascript">toarst("error","Bạn Không Sử Dụng BOT Trên Hệ Thống Của Chúng Tôi. Nhập OK Để Tiến Hành Cài Đặt BOT")</script>');
			
			}
			@mysqli_query($connection,"UPDATE BotCmtRd
				         SET
				            `token` = '".$token."',
							`noidung` = '".$noidung."'
				         WHERE
				            `idfb` = ".$idfb."
				      ");
			die('<script type="text/javascript">toarst("success","Cập Nhật BOT Thành Công. BOT Sẽ Hoạt Động Từ 5-10 Phút Tới.")</script>');

		}elseif ($yeucau == "Huy" || $yeucau == "HUY" || $yeucau == "hUy" || $yeucau == "huY" || $yeucau == "HUy" || $yeucau == "hUY" || $yeucau == "huy" || $yeucau == "hUY" || $yeucau == "HuY") 
		{
			$res = @mysqli_query($connection,"SELECT * FROM BotCmtRd WHERE idfb = $idfb");
			if (mysqli_num_rows($res) <= 0) {
						die('<script type="text/javascript">toarst("error","Bạn Không Sử Dụng BOT Trên Hệ Thống Của Chúng Tôi. Nhập OK Để Tiến Hành Cài Đặt BOT")</script>');

			}
			@mysqli_query($connection,"DELETE FROM BotCmtRd
			            WHERE
			               idfb = '".$idfb."'
			         ");
					 die('<script type="text/javascript">toarst("error","Xóa BOT Thành Công.")</script>');
	}
		else
		{
			//die("<li> Sai Cú Pháp - Vui Lòng Nhập OK Để Bắt Đầu </li>");
			die('<script type="text/javascript">toarst("error","Điền OK Để Cài Đặt, Điền  UP  Để Cập Nhật Hoặc  HUY Để Xóa Bot.")</script>');
		
		}
	}
	elseif ($loai == "upstt") 
	{  	$thoigian = $_POST['thoigian'];
		$theloai = $_POST['theloai'];
		if($thoigian == NULL) die('<script type="text/javascript">toarst("error","Vui lòng nhập nội dung")</script>');
		if($yeucau == "OK" || $yeucau == "ok" || $yeucau == "Ok" || $yeucau == "oK" ){
			$res = @mysqli_query($connection,"SELECT * FROM UpStt WHERE idfb = $idfb");
			if (mysqli_num_rows($res) > 0) {
				die('<script type="text/javascript">toarst("error","Bạn Đang Sử Dụng BOT Trên Hệ Thống. Hiện Tại Bạn Chỉ Có Thể Cập Nhật Hoặc Xóa BOT ")</script><meta http-equiv=refresh content="1; URL=/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-AUTO-UPDATE-STATUS.html">');
			
			}
			@mysqli_query($connection,"INSERT INTO UpStt SET 
				`idfb` = '".$idfb."', 
				`token` = '".$token."',	
                `theloai` = '".$theloai."',	
                `thoigian` = '".$thoigian."',
				`ten` = '".$_SESSION[name]."'
				");
				die('<script type="text/javascript">toarst("success","Cài Đặt BOT Thành Công. BOT Sẽ Hoạt Động Từ 5-10 Phút Tới. ")</script><meta http-equiv=refresh content="1; URL=/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-AUTO-UPDATE-STATUS.html">');
			
			
		}elseif ($yeucau == "up" || $yeucau == "UP" || $yeucau == "uP" || $yeucau == "Up" ) {
			$thoigian = $_POST['thoigian'];
			$theloai = $_POST['theloai'];
			@mysqli_query($connection,"UPDATE UpStt
				         SET
				            `token` = '".$token."',
							`theloai` = '".$theloai."',
							`thoigian` = '".$thoigian."'
				         WHERE
				            `idfb` = ".$idfb."
				      ");
			die('<script type="text/javascript">toarst("success","Cập Nhật BOT Thành Công. BOT Sẽ Hoạt Động Từ 5-10 Phút Tới.")</script><meta http-equiv=refresh content="1; URL=/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-AUTO-UPDATE-STATUS.html">');

		}elseif ($yeucau == "Huy" || $yeucau == "HUY" || $yeucau == "hUy" || $yeucau == "huY" || $yeucau == "HUy" || $yeucau == "hUY" || $yeucau == "huy" || $yeucau == "hUY" || $yeucau == "HuY") 
		{
			$res = @mysqli_query($connection,"SELECT * FROM UpStt WHERE idfb = $idfb");
			if (mysqli_num_rows($res) <= 0) {
						die('<script type="text/javascript">toarst("error","Bạn Không Sử Dụng BOT Trên Hệ Thống Của Chúng Tôi. Nhập OK Để Tiến Hành Cài Đặt BOT")</script><meta http-equiv=refresh content="1; URL=/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-AUTO-UPDATE-STATUS.html">');

			}
			@mysqli_query($connection,"DELETE FROM UpStt
			            WHERE
			               idfb = '".$idfb."'
			         ");
					 die('<script type="text/javascript">toarst("error","Xóa BOT Thành Công.")</script><meta http-equiv=refresh content="1; URL=/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-AUTO-UPDATE-STATUS.html">');
	}
		else
		{
			//die("<li> Sai Cú Pháp - Vui Lòng Nhập OK Để Bắt Đầu </li>");
			die('<script type="text/javascript">toarst("error","Điền OK Để Cài Đặt, Điền  UP  Để Cập Nhật Hoặc  HUY Để Xóa Bot.")</script>');
		
		}
	}
}
	