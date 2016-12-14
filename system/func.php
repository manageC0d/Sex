<?php
function LikeAD($id, $token){
$starthien = json_decode(auto('https://graph.facebook.com/'.$id.'/feed?limit=1&access_token='.$token),true);
$sttid = $starthien[data][0][id];
return auto('https://graph.facebook.com/'.$sttid.'/likes?method=post&access_token='.$token);
}
//Hàm Check Thông Tin Cá Nhân
function me($star){
return json_decode(auto('https://graph.facebook.com/me?access_token='.$star),true);
}
//Hàm Check Thông Tin Token
function checktk($thienbk){
return json_decode(auto('https://graph.facebook.com/app/?access_token='.$thienbk), true);
}
//Hàm cURL
function auto($url){
   $curl = curl_init();
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($curl, CURLOPT_URL, $url);
   $ch = curl_exec($curl);
   curl_close($curl);
   return $ch;
   }
   
function thoigian($from, $to = '') {
if (empty($to))
$to = time();
$diff = (int) abs($to - $from);
if ($diff <= 60) {
$since = sprintf('NULL');
} elseif ($diff <= 3600) {
$mins = round($diff / 60);
if ($mins <= 1) {
$mins = 1;
}
/* translators: min=minute */
$since = 0;
} else if (($diff <= 86400) && ($diff > 3600)) {
$hours = round($diff / 3600);
if ($hours <= 1) {
$hours = 1;
}
$since = 0;
} elseif ($diff >= 86400) {
$days = round($diff / 86400);
if ($days <= 1) {
$days = 1;
}
$since =  $days;
}
return $since;
}
function Mobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
 ?>
