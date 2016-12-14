<?php
$user = $_GET['user'];
$pass = $_GET['pass'];
$cnf = array(
	'email' => $user,
	'pass' =>  $pass
);

$cnf['login'] = 'Login';
$random = md5(rand(00000000,99999999)).'.txt';
$login = cURL('https://m.facebook.com/login.php', $random, $cnf);
//print $login;
if(preg_match('/name="fb_dtsg" value="(.*?)"/', $login, $response)){
	$fb_dtsg = $response[1];
	$responseToken = cURL('https://www.facebook.com/v2.0/dialog/oauth/confirm', $random, 'fb_dtsg='.$fb_dtsg.'&app_id=41158896424&redirect_uri=fbconnect://success&display=popup&access_token=&sdk=&from_post=1&private=&tos=&login=&read=&write=&extended=&social_confirm=&confirm=&seen_scopes=&auth_type=&auth_token=&auth_nonce=&default_audience=&ref=Default&return_format=access_token&domain=&sso_device=htc&__CONFIRM__=1');
	if(preg_match('/access_token=(.*?)&/', $responseToken, $token2)){
		$token['access_token'] = $token2[1];
echo $token2[1];
	}else{
		echo $token['error_msg'] = 'unspecified_error';
		json_encode($token);
	}
}else{
	echo $token['error_msg'] = 'wrong_or_locked';
	json_encode($token);
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