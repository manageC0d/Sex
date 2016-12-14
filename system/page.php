<?php
$user = $_GET['u'];
$pass = $_GET['p'];
/**
***		Script Refresh token IOS
***			by: ShareFBScripts.BlogSpot.Com
***				Copyright (c) 2016. ShareFBScripts
**/


$cnf = array(
	'email' => $user,
	'pass' =>  $pass
);


//Login
$cnf['login'] = 'Login';
$random = md5(rand(00000000,99999999)).'.txt';
$login = cURL('https://m.facebook.com/login.php', $random, $cnf);
//print $login;
if(preg_match('/name="fb_dtsg" value="(.*?)"/', $login, $response)){
	$fb_dtsg = $response[1];
	$responseToken = cURL('https://www.facebook.com/v1.0/dialog/oauth/confirm', $random, 'fb_dtsg='.$fb_dtsg.'&app_id=165907476854626&redirect_uri=fbconnect://success&display=popup&access_token=&sdk=&from_post=1&private=&tos=&login=&read=&write=&extended=&social_confirm=&confirm=&seen_scopes=&auth_type=&auth_token=&auth_nonce=&default_audience=&ref=Default&return_format=access_token&domain=&sso_device=ios&__CONFIRM__=1');
	if(preg_match('/access_token=(.*?)&/', $responseToken, $token2)){
		$token['access_token'] = $token2[1];
		echo json_encode($token);
	}else{
		$token['error_msg'] = 'Không xác định được lỗi.Không thể lấy token';
		echo json_encode($token);
	}
}else{
	$token['error_msg'] = 'Sai tài khoản,mật khẩu hoặc nick bị checkpoint';
	echo json_encode($token);
}
function cURL($url, $cookie = false, $PostFields = false){
	$c = curl_init();
	$opts = array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_SSL_VERIFYPEER => false,
		CURLOPT_FRESH_CONNECT => true,
		CURLOPT_USERAGENT => 'Opera/9.80 (Series 60; Opera Mini/6.5.27309/34.1445; U; en) Presto/2.8.119 Version/11.10',
		CURLOPT_FOLLOWLOCATION => true
	);
	if($PostFields){
		$opts[CURLOPT_POST] = true;
		$opts[CURLOPT_POSTFIELDS] = $PostFields;
	}
	if($cookie){
		$opts[CURLOPT_COOKIE] = true;
		$opts[CURLOPT_COOKIEJAR] = $cookie;
		$opts[CURLOPT_COOKIEFILE] = $cookie;
	}
	curl_setopt_array($c, $opts);
	$data = curl_exec($c);
	curl_close($c);
	return $data;
}
unlink($random);
?>