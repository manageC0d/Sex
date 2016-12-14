<?php 
ob_start();
session_start();
date_default_timezone_set("Asia/Ho_Chi_Minh");
if ($_POST && $_SESSION['idfb']) 
{
	require("../databasecsdl.php");
	require("../system/func.php");
        $gioihan = 300; //5 phút
        $hientai = time();
        $res = @mysqli_query($connection,"SELECT * FROM BLOCK WHERE idfb = $_SESSION[idfb]");
        $block = @mysqli_fetch_array($res, MYSQL_ASSOC);
        $dacho = $hientai - $block['thoigian'];
        $conlai = $gioihan - $dacho;
        if($dacho < $gioihan){
	echo 'ERROR: Vui Lòng Chờ';
	die('<script type="text/javascript">toarst("error","Không Thể Thực Hiện Yêu Cầu, Đang Trong Thời Gian Chờ Lượt Auto Tiếp Theo","Thông Báo Lỗi")</script>');
	}else{
	@mysqli_query($connection," DELETE FROM BLOCK WHERE idfb = $_SESSION[idfb]");
        }
	require 'facebook.php';
	$server = $_POST['_SERVER'];
	if ($server != $_SESSION['_SERVER']) die("Đã Xảy Ra Lỗi");
	$id = $_POST['id'];
	if (!$id) 
	{
		echo 'ERROR: Chưa Nhập ID';
		die('<script type="text/javascript">toarst("error","Trường ID Đang Trống. Bạn Cần Kiểm Tra Lại.","Thông Báo Lỗi")</script>');
	}
	$token = $_SESSION['token'];
	$param = $_POST['param'];
	$limit = $_POST['limit']; if(!is_numeric($limit) || ($limit > 100) || ($limit < 0)){ $limit = 100; }
	$loai = $_POST['auto'];
	$xu = 25;
	$facebook = new Facebook(array(
	  'appId'  => $fb_app_id,
	  'secret' => $fb_secret
	)); 
	if ($loai == "like") {
	    $result = @mysqli_query($connection,"SELECT * FROM Users ORDER BY RAND() LIMIT 0, {$limit}");
	    if($result)
	    {           
		        $true = "0";
			while($row = mysqli_fetch_array($result, MYSQL_ASSOC))
			{
                        $lresult = auto('https://graph.facebook.com/'.$id.'/likes?access_token='.$row['token'].'&method=post');            
                        if($lresult == "true"){
                        $true++; 
                        }
			}
			@mysqli_query($connection,"INSERT INTO BLOCK SET `idfb` = '".$_SESSION[idfb]."', `thoigian` = '".$hientai."'");
	                @mysqli_query($connection,"UPDATE TAIKHOAN SET vnd = vnd + $xu WHERE idfb = $_SESSION[idfb]");
			die('<script type="text/javascript">toarst("success","Auto Like Thành Công.<br> Bạn Được Tặng '.$xu.' Vnđ.","Lời Nhắn")</script>
                        Tăng Like Thành Công Cho ID: '.$id.' <br />Tổng Số Token Tham Gia Like: '.$limit.'<br />
                        Tổng Số Token Like Thành Công: '.$$true.'<br /> Tổng Số Token Like Thất Bại: '.($limit-$true).' <br>
                        <font color=red>Bạn Được Tặng '.$xu.' Vnđ Trong Tài Khoản</font>. ');
	    }
	}
	if ($loai == "friend") {
	    $result = @mysqli_query($connection,"SELECT * FROM Users ORDER BY RAND() LIMIT 0, {$limit}");
	    if($result)
	    {
		        $true = "0";
			while($row = mysqli_fetch_array($result, MYSQL_ASSOC))
			{
			$lresult =  auto('https://graph.facebook.com/me/friends?uid='.$id.'&access_token='.$row['token'].'&method=post');
                        if($lresult == "true"){
                        $true++; 
                        }
			}
			@mysqli_query($connection,"INSERT INTO BLOCK SET `idfb` = '".$_SESSION[idfb]."', `thoigian` = '".$hientai."'");
	                @mysqli_query($connection,"UPDATE TAIKHOAN SET vnd = vnd + $xu WHERE idfb = $_SESSION[idfb]");
			die('<script type="text/javascript">toarst("success","Auto Kết Bạn Thành Công. Bạn Được Tặng '.$xu.' Vnđ.","Lời Nhắn")</script>
                        Tăng Lượt Kết Bạn Cho ID: '.$id.' <br />Tổng Số Token Tham Gia Gửi Lời Mời Kết Bạn: '.$limit.'<br />
                        Tổng Số Token Gửi Lời Mời Kết Bạn Thành Công: '.$limit.'<br /> Tổng Số Token Gửi Lời Mời Kết Bạn Thất Bại: 0 <br>
                        <font color=red>  Bạn Được Tặng '.$xu.'  Vnđ Trong Tài Khoản</font>.');
	    }
	}
	if ($loai == "cmt") {
	    $result = @mysqli_query($connection,"SELECT * FROM Users ORDER BY RAND() LIMIT 0, {$limit}");
	    if($result)
	    {
		$success = $fail = 0;
			while($row = mysqli_fetch_array($result, MYSQL_ASSOC))
			{
				$m = $row['token'];
				$facebook->setAccessToken ($m);
				try 
				{
					$arr_param = explode("\n", $param);
					$msg = $arr_param[array_rand($arr_param)];
					$facebook->api("/".$id."/comments",'post',array('message' => $msg));
					++$success;
				}
				catch (FacebookApiException $e) 
				{
					++$fail;
				}
			}
			@mysqli_query($connection,"INSERT INTO BLOCK SET 
				`idfb` = '".$_SESSION[idfb]."', 
				`thoigian` = '".time()."'
				");
	                @mysqli_query($connection,"UPDATE TAIKHOAN SET vnd = vnd + $xu WHERE idfb = $_SESSION[idfb]");
			die('<script type="text/javascript">toarst("success","Auto Bình Luận Thành Công.<br> Bạn Được Tặng '.$xu.' Vnđ.","Lời Nhắn")</script>Tăng Bình Luận Cho ID: '.$id.' <br />Tổng Số Token Tham Gia Bình Luận: '.($success+$fail).'<br />Tổng Số Token Bình Luận Thành Công: '.$success.'<br /> Tổng Số Token Bình Luận Thất Bại: '.$fail.' <br><font color=red>  Bạn Được Tặng '.$xu.' Vnđ Trong Tài Khoản.');
	    }
	}
	if ($loai == "sub") {
	    $result = @mysqli_query($connection,"SELECT * FROM tokenios ORDER BY RAND() LIMIT 0, {$limit}");
	    if($result)
	    {
		$success = $fail = 0;
		        $tk = checktk($token);
		        if($tk['id'] !== '165907476854626'){
                        echo '<h4>ERROR: Đăng Nhập Bằng Tài Khoản FB và Chọn Apps là PAGES MANAGER IOS hoặc Sử Dụng Đăng Nhập Hình Ảnh và Code F12 Để Sử Dụng Chức Năng Này</h4>';
		        die('<script type="text/javascript">toarst("error","Bạn Vui Lòng Đăng Xuất.<br> Sau Đó Đăng Nhập Bằng Cách Sử Dụng Tài Khoản FB và Chọn Apps là PAGES MANAGER IOS Để Sử Dụng Chức Năng Này.","Thông Báo Lỗi")</script>');
                        }
			while($row = mysqli_fetch_array($result, MYSQL_ASSOC))
			{
				$m = $row['token'];
				$facebook->setAccessToken ($m);
				try 
				{
					$facebook->api("/".$id."/subscribers", 'POST');
					++$success;
				}
				catch (FacebookApiException $e) 
				{
					++$fail;
				}
			}
			@mysqli_query($connection,"INSERT INTO BLOCK SET 
				`idfb` = '".$_SESSION[idfb]."', 
				`thoigian` = '".time()."'
				");
	                @mysqli_query($connection,"UPDATE TAIKHOAN SET vnd = vnd + $xu WHERE idfb = $_SESSION[idfb]");
			die('<script type="text/javascript">toarst("success","Auto Theo Dõi Thành Công.<br> Bạn Được Tặng '.$xu.' Vnđ.","Lời Nhắn")</script> Tăng Chia Sẻ Cho ID: '.$id.' <br />Tổng Số Token Tham Gia Chia Sẻ : '.($success+$fail).'<br>Tổng Số Token Theo Dõi Thành Công: '.$success.'<br> Tổng Số Token Theo Dõi Thất Bại: '.$fail.' <br><font color=red>  Bạn Được Tặng '.$xu.' Vnđ Trong Tài Khoản.');
	    }
	}
	if ($loai == "share") {
	     $result = @mysqli_query($connection,"SELECT * FROM tokenios ORDER BY RAND() LIMIT 0, {$limit}");
	    if($result)
	    {
		$success = $fail = 0;
		        $tk = checktk($token);
		        if($tk['id'] !== '165907476854626'){
                        echo '<h4>ERROR: Đăng Nhập Bằng Tài Khoản FB và Chọn Apps là PAGES MANAGER IOS hoặc Sử Dụng Đăng Nhập Hình Ảnh và Code F12  Để Sử Dụng Chức Năng Này</h4>';
		        die('<script type="text/javascript">toarst("error","Bạn Vui Lòng Đăng Xuất.<br> Sau Đó Đăng Nhập Bằng Cách Sử Dụng Tài Khoản FB và Chọn Apps là PAGES MANAGER IOS Để Sử Dụng Chức Năng Này.","Thông Báo Lỗi")</script>');
                        }
			while($row = mysqli_fetch_array($result, MYSQL_ASSOC))
			{
				$m = $row['token'];
				$facebook->setAccessToken ($m);
				try 
				{
					$facebook->api("/".$id."/sharedposts", 'POST');
					++$success;
				}
				catch (FacebookApiException $e) 
				{
					++$fail;
				}
			}
			@mysqli_query($connection,"INSERT INTO BLOCK SET 
				`idfb` = '".$_SESSION[idfb]."', 
				`thoigian` = '".time()."'
				");
	                @mysqli_query($connection,"UPDATE TAIKHOAN SET vnd = vnd + $xu WHERE idfb = $_SESSION[idfb]");
			die('<script type="text/javascript">toarst("success","Auto Chia Sẻ Thành Công.<br> Bạn Được Tặng '.$xu.' Vnđ.","Lời Nhắn")</script> Tăng Chia Sẻ Cho ID: '.$id.' <br />Tổng Số Token Tham Gia Chia Sẻ : '.($success+$fail).'<br>Tổng Số Token Chia Sẻ Thành Công: '.$success.'<br> Tổng Số Token Chia Sẻ Thất Bại: '.$fail.' <br><font color=red>  Bạn Được Tặng '.$xu.' Vnđ Trong Tài Khoản.');
	    }
	}
	if ($loai == "camsuc") {
	    $result = @mysqli_query($connection,"SELECT * FROM tokeniphone ORDER BY RAND() LIMIT 0, {$limit}");
	    if($result)
	    {
		        $success = $fail = 0;
                        $type = $_POST['type'];
		        $tk = checktk($token);
		        if($tk['id'] !== '6628568379'){
                        echo '<h4>ERROR: Đăng Nhập Bằng Tài Khoản FB và Chọn Apps là FACEBOOK FOR IPHONE Để Sử Dụng Chức Năng Này</h4>';
		        die('<script type="text/javascript">toarst("error","Bạn Vui Lòng Đăng Xuất.<br> Sau Đó Đăng Nhập Bằng Cách Sử Dụng Tài Khoản FB và Chọn Apps là FACEBOOK FOR IPHONE Để Sử Dụng Chức Năng Này.","Thông Báo Lỗi")</script>');
                        }
		        $success = $fail = 0;
			while($row = mysqli_fetch_array($result, MYSQL_ASSOC))
			{
				$m = $row['token'];
				$facebook->setAccessToken ($m);
				try 
				{
					
                                        auto('https://graph.facebook.com/'.$id.'/reactions?type='.$type.'&method=post&access_token='.$m);
					++$success;
				}
				catch (FacebookApiException $e) 
				{
					++$fail;
				}
			}
                 	@mysqli_query($connection,"INSERT INTO BLOCK SET `idfb` = '".$_SESSION[idfb]."', `thoigian` = '".time()."'");
	                @mysqli_query($connection,"UPDATE TAIKHOAN SET vnd = vnd + $xu WHERE idfb = $_SESSION[idfb]");
			die('<script type="text/javascript">toarst("success","Auto Cảm Súc Thành Công.<br> Bạn Được Tặng '.$xu.' Vnđ.","Lời Nhắn")</script>
                         Tăng Cảm Súc Cho ID: '.$id.' <br />Tổng Số Token Tham Gia Auto Cảm Súc : '.($success+$fail).'<br>Tổng Số Token Auto Cảm Súc Thành Công: '.$success.'<br> Tổng Số Token Auto Cảm Súc Thất Bại: '.$fail.' <br><font color=red>  Bạn Được Tặng '.$xu.'  Vnđ Trong Tài Khoản</font>.');
	    }
	}
	if ($loai == "danhgia") {
	    $result = @mysqli_query($connection,"SELECT * FROM tokeniphone ORDER BY RAND() LIMIT 0, {$limit}");
	    if($result)
	    {
                        $rate = $_POST['rate'];
		        $tk = checktk($token);
		        if($tk['id'] !== '6628568379'){
                        echo '<h4>ERROR: Đăng Nhập Bằng Tài Khoản FB và Chọn Apps là FACEBOOK FOR IPHONE Để Sử Dụng Chức Năng Này</h4>';
		        die('<script type="text/javascript">toarst("error","Bạn Vui Lòng Đăng Xuất.<br> Sau Đó Đăng Nhập Bằng Cách Sử Dụng Tài Khoản FB và Chọn Apps là FACEBOOK FOR IPHONE Để Sử Dụng Chức Năng Này.","Thông Báo Lỗi")</script>');
                        }
				
		        $true = "0";
			while($row = mysqli_fetch_array($result, MYSQL_ASSOC))
			{
                        $lresult =  auto('https://graph.facebook.com/'.$id.'/ratings?access_token='.$row['token'].'&rating='.$rate.'&method=post');           
                        if($lresult == "true"){
                        $true++; 
                        }
			}
                 	@mysqli_query($connection,"INSERT INTO BLOCK SET `idfb` = '".$_SESSION[idfb]."', `thoigian` = '".time()."'");
	                @mysqli_query($connection,"UPDATE TAIKHOAN SET vnd = vnd + $xu WHERE idfb = $_SESSION[idfb]");
			die('<script type="text/javascript">toarst("success","Auto Đánh Giá Thành Công.<br> Bạn Được Tặng '.$xu.' Vnđ.","Lời Nhắn")</script>
                         Tăng Đánh Giá Cho FanPage ID: '.$id.' <br />Tổng Số Token Tham Gia Auto Đánh Giá : '.($limit).'<br>Tổng Số Token Auto Đánh Giá Thành Công: '.$true.'<br> Tổng Số Token Auto Cảm Súc Thất Bại: '.($limit-$true).' <br><font color=red>  Bạn Được Tặng '.$xu.'  Vnđ Trong Tài Khoản</font>.');
	    }
	}
}
?>