<? session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi">
<HEAD>
<TITLE>CPANEL - Mạnh Nghĩa</TITLE>
<meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8"/>
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="./css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</HEAD><BODY>
<?php
//coder by Mạnh Nghĩa----------//
//site: https://chuyhiep.net--//
//facebook: itvn90------------//
$id = 'sgktyemlnn';
if(isset($_POST['check'])){
if($_POST['check']==$id){
$_SESSION['checkn'] = $_POST['check'];
}
else{
$thongbao ='Sai mã xác nhận!';
}
}
if($_SESSION['checkn'] != $id)
{
echo'
Từ chối truy cập! Vui lòng nhập mã xác nhận<br />
<form action ="?" method="post">
<font color="red">'.$thongbao.'</font><br />
<input type ="password" name ="check">
<input type ="submit" value="xác nhận">
</form>
';
exit;
}
if(isset($_POST['update']))
{
	$fp = fopen('./taikhoancuavip.txt','w');
	fwrite($fp,$_POST['email']."|".$_POST['pass']."|".$_POST['id_like']."|".$_POST['idstt']);
	fclose($fp);
	$tb = 'Thành Công';
}
include './config2.php';

echo '
<div class="container">
<div class="row">
<div class="col-md-7">
<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title"><span class="glyphicon glyphicon-signal"></span> THÔNG TIN CURL</h3></div>

	<div id="bodyupcmt" class="panel-body">
<li class="list-group-item">Nick Clone: <font color="red"><b>'.$email.'</b></font>.</li>
<li class="list-group-item">Pass: <font color="red"><b>'.$pass.'</b></font>.</li>
<li class="list-group-item">Tổng số Clone: <font color="red"><b>'.($tongtoken + 1).'</b></font>.</li>
<li class="list-group-item">ID Curl: <font color="red"><b>'.$id.'</b></font>.</li>';
if($idstt)
{
echo '<li class="list-group-item">Đang Like Stt: <font color="red"><b>'.$idstt.'</b></font>.</li>
<li class="list-group-item">Đã Like Được: <font color="red"><b>'.$sllike.'</b></font>.</li>
<li class="list-group-item"><a href="cron.php">Chạy Thử</a></li>';
}
else
{
	echo '<li class="list-group-item"><font color="red">Token Chết.</font></li>
	<li class="list-group-item"><a href="check.php">Load token</a></li>';
}
echo'
<li class="list-group-item"><font color="red">Cpanel Curl By:</font> <font color="#00FF00">Mạnh Nghĩa</font></li>
</div></div></div>
<div class="col-md-5">
<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title"><span class="glyphicon glyphicon-signal"></span> CẬP NHẬT THÔNG TIN</h3></div>
<div class="panel-body">
<form name="tdt_form_2" action="?" method="POST">
<font color="red">'.$tb.'</font>
<label>Nhập ID</label>
<input type="text" name="id_like" class="form-control" value="'.$id_like.'|'.$id_like2.'|'.$limit.'" placeholder="Nhập ID thì thôi IDSTT">
<label>Nhập IDSTT</label>
<input type="text" name="idstt" class="form-control" value="" placeholder="Nhập IDSTT thì thôi ID">
<label>Tài Khoản Clone</label>
<input type="text" name="email" class="form-control" value="'.$email.'" placeholder="" autofocus="" required="">
<label>Mật Khẩu</label>
<input type="text" name="pass" class="form-control" value="'.$pass.'" placeholder="" autofocus="">
<br />                             
<span class="input-group-btn">
	<center>	<button type="submit" name="update" onClick="done()" class="btn btn-primary">
						<span id="btn-click">
						<span class="glyphicon glyphicon-transfer"></span> CẬP NHẬT
						</span>
				</button>			</center>			</span>	</br>		

</form>
';

?>