<?php

    function login($url,$data,$cookie)
{
    $login = curl_init();
    curl_setopt($login, CURLOPT_COOKIE, $cookie);
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
$htc = login('https://developers.facebook.com/tools/debug/accesstoken/?app_id=41158896424',null,$cookie);

if(preg_match('/name="q" value="(.*?)" aria-label=/',$htc,$match))
{
$token = $match[1];
echo $token;
$_POST['access_token'] = $token;
echo $_POST['access_token'];
}
?>