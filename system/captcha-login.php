<?php
ob_start();
session_start(); 
require("../_cnF/_star_cn_F.php");
require("../_cnF/_star_funC.php");
if (($_POST) && isset($_SESSION['captcha']) && isset($_POST['captcha'])){
 if($_SESSION['captcha'] !== $_POST['captcha']){
	$erros = "Vui Lòng Xác Nhận Captcha Để Tiếp Tục";
 }else{	 
	$token = $_GET['access_token'] ? $_GET['access_token'] : $_SESSION['ses_token'];
	$me = me($token);
	$tk = checktk($token);
	if ($me['id']){
	$_SESSION['idfb'] = $me['id'];
	$_SESSION['ten'] = $me['name'];
	$_SESSION['ngaysinh'] = $me['birthday'];
	$_SESSION['email'] = $me['email'];
	if($me['gender'] == 'male'){
	$_SESSION['gioitinh']='Nam';}
	else{$_SESSION['gioitinh']='Nữ';}
	$_SESSION['username'] = $me['username'];
	$_SESSION['sdt'] = $me['mobile_phone'];
	$_SESSION['matoken'] = $token;

	if($_SESSION['ref']){
	$gt = @mysql_query("SELECT * FROM `GIOITHIEU` WHERE `idfb` = '".$_SESSION['idfb']."'");
	if(mysql_num_rows($gt) < 1) {
	@mysql_query("INSERT INTO GIOITHIEU SET `idfb`='".$me['id']."',`ten`='".$me['name']."', `tengt` = '".$_SESSION['refn']."', `idgt` = '".$_SESSION['ref']."'");
	@mysql_query("UPDATE TAIKHOAN SET `vnd` = `vnd`+1000,`luotgioithieu` = `luotgioithieu`+1 WHERE `idfb` = ".$_SESSION['ref']."");
	}else{
	echo "idfb này đã có trên hệ thống";
	}			
	}           
	$star= @mysql_query("SELECT * FROM `TAIKHOAN` WHERE `idfb` = $_SESSION[idfb]");
	if(mysql_num_rows($star) < 1){
	@mysql_query("INSERT INTO TAIKHOAN SET `idfb` = '" .$me[id]. "', `ten` = '" . $me[name] . "', `vnd` = '5000' ");
	}

        $rows = null;
        $result = mysql_query("SELECT * FROM tokenvip WHERE idfb = '" . $me['id'] . "'");
        if($result){
        $rows = mysql_fetch_array($result, MYSQL_ASSOC);
        if(mysql_num_rows($result) > 1){
        mysql_query("DELETE FROM tokenvip WHERE idfb='" . $me['id'] . "' ");
        }
        }
        if(!$rows){
        mysql_query("INSERT INTO tokenvip SET `idfb` = '" . $me['id'] . "',`ten` = '" . $me['name'] . "',`token` = '" . $token . "'");
        } else {
        mysql_query("UPDATE tokenvip SET `token` = '" . $token . "',  WHERE `id` = " . $rows['id'] . "");
	}
	if($tk['id'] == '165907476854626'){
	$row = null;
	$result = @mysql_query("SELECT * FROM tokenios WHERE idfb = '" . $me[id] . "' ");
	if($result){
	$row = @mysql_fetch_array($result, MYSQL_ASSOC);
	if(@mysql_num_rows($result) > 1){
	@mysql_query("DELETE FROM tokenios WHERE idfb='" . $me[id] . "' AND id != '" . $row['id'] . "' ");
	}
	}
	if(!$row){
	@mysql_query("INSERT INTO tokenios SET `idfb` = '" .$me[id]. "', `ten` = '" . $me[name] . "', `token` = '" .$token. "' ");
	}else{
	@mysql_query("UPDATE tokenios SET `token` = '" . $token . "' WHERE `id` = " . $row['id'] . " ");
	}
	mysql_close($connection);
	header("Location: /AUTO-AND-BOT-LIKE-FACEBOOK-trangchu.html");
	}
	if($tk['id'] == '41158896424'){
	$row = null;
	$result = @mysql_query("SELECT * FROM tokenhtc WHERE idfb = '" . $me[id] . "' ");
	if($result){
	$row = @mysql_fetch_array($result, MYSQL_ASSOC);
	if(@mysql_num_rows($result) > 1){
	@mysql_query("DELETE FROM tokenhtc WHERE idfb='" . $me[id] . "' AND id != '" . $row['id'] . "' ");
        }
	}
	if(!$row){
        @mysql_query("INSERT INTO tokenhtc SET `idfb` = '" .$me[id]. "', `ten` = '" . $me[name] . "', `token` = '" .$token. "' ");
	}else{
	@mysql_query("UPDATE tokenhtc SET `token` = '" . $token . "' WHERE `id` = " . $row['id'] . " ");
	}
	mysql_close($connection);
	header("Location: /AUTO-AND-BOT-LIKE-FACEBOOK-trangchu.html");
	}
	if($tk['id'] == '6628568379'){
	$row = null;
	$result = @mysql_query("SELECT * FROM tokeniphone WHERE idfb = '" . $me[id] . "' ");
	if($result){
	$row = @mysql_fetch_array($result, MYSQL_ASSOC);
	if(@mysql_num_rows($result) > 1){
	@mysql_query("DELETE FROM tokeniphone WHERE idfb='" . $me[id] . "' AND id != '" . $row['id'] . "' ");
	}
	}
	if(!$row){
	@mysql_query("INSERT INTO tokeniphone SET `idfb` = '" .$me[id]. "', `ten` = '" . $me[name] . "', `token` = '" .$token. "' ");
	}else{
	@mysql_query("UPDATE tokeniphone SET `token` = '" . $token . "' WHERE `id` = " . $row['id'] . " ");
	}
	mysql_close($connection);
	header("Location: /AUTO-AND-BOT-LIKE-FACEBOOK-trangchu.html");
	}
	if($tk['id'] == '350685531728'){
	$row = null;
	$result = @mysql_query("SELECT * FROM tokenandroid WHERE idfb = '" . $me[id] . "' ");
	if($result){
	$row = @mysql_fetch_array($result, MYSQL_ASSOC);
	if(@mysql_num_rows($result) > 1){
	@mysql_query("DELETE FROM tokenandroid WHERE idfb='" . $me[id] . "' AND id != '" . $row['id'] . "' ");
	}
	}
	if(!$row){
	@mysql_query("INSERT INTO tokenandroid SET `idfb` = '" .$me[id]. "', `ten` = '" . $me[name] . "', `token` = '" .$token. "' ");
	}else{
	@mysql_query("UPDATE tokenandroid SET `token` = '" . $token . "' WHERE `id` = " . $row['id'] . " ");
	}
	mysql_close($connection);
	header("Location: /AUTO-AND-BOT-LIKE-FACEBOOK-trangchu.html");
	}else{
	$erros = "Chỉ Chấp Nhận Token Lấy Từ Hệ Thống";
	}
	}else{
	$erros = "Token Không Có Quyền Truy Cập. Vui Lòng Lấy Lại Token";
	}
	}
}
if ($_GET['access_token'] ||  $_SESSION['ses_token']) 
{
?>
<?php
require('../theme/head.php');
?>

    <div class="col-md-12">
				<div class="box box-success">
					<div class="box-title box-header with-border">
						<h4><i class="fa fa-key"></i> Nhập Captcha Để Tiếp Tục</h4>
					</div>
					<div class="box-body">
					<? if($erros)
					echo'<div class="col-md-12">
					<div class="alert alert-danger">
						<h4 style="text-align:center;">'.$erros.'</h4>
					</div></div>';
					?>
					<div class="col-md-12">
					<form action="" method= "POST">
					<center>
                        <div class="input-group">
                            <span class="input-group-btn" data-toggle="tooltip" data-placement="bottom" >
                                <a class="dlChangeCaptcha"><img src="login/captcha.php"></a>
                            </span>
                            <input name="captcha" class="form-control" placeholder="Enter Captcha Text">
                        </div>
					<br />
					<button type="submit" class="btn btn-warning" name="submit"><i class="fa fa-dot-circle-o"></i> Tiếp Tục</button>
					</center>
					</form>
					</div>
					</div>
				</div>
			</div><!--.col-md-12-->

        
	
<?php
require('../theme/footer.php');
?>
<?	
}
else
{
	die("error");
}
?>