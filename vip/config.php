<?php
function show($site){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Opera/9.80 (Series 60; Opera Mini/6.5.27309/34.1445; U; en) Presto/2.8.119 Version/11.10');
    curl_setopt($ch, CURLOPT_TIMEOUT, 40);
    curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
    curl_setopt($ch, CURLOPT_URL, $site);
    ob_start();
    return curl_exec ($ch);
    ob_end_clean();
    curl_close ($ch);
}
$taikhoan = file_get_contents("./taikhoancuavip.txt");
$data     = explode("|", $taikhoan);
$email    = $data[0];
$pass     = $data[1];
$id_like  = $data[2];
$id_like2 = $data[3];
$limit    = $data[4];
$sttlike  = $data[5];

$token = file_get_contents("./token_ios.txt");

if(!$sttlike)
{
$id = $id_like;
$feed=json_decode(show('https://graph.fb.me/'.$id.'/feed?access_token='.$token.'&limit=1'),true);
$idstt = $feed[data][0][id];  
$sllike = $feed[data][0][likes][count];
if($sllike > $limit)
{
$id = $id_like2;
$feed=json_decode(show('https://graph.fb.me/'.$id.'/feed?access_token='.$token.'&limit=1'),true);
$idstt = $feed[data][0][id];  
$sllike = $feed[data][0][likes][count];
}
}
else
{
	$idstt = $sttlike;
	$sllike = 'không lấy được số like';
}
?>