<?php
//coder by chụy hiệp----------//
//site: https://chuyhiep.net--//
//facebook: itvn90------------//
include 'databasecsdl.php';
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

$token = file_get_contents("./tokencuavip.txt");
$feed=json_decode(show('https://graph.fb.me/me/feed?access_token='.$token.'&limit=1'),true); //Limit Id 1 Status
for($i=0;$i<count($feed[data]);$i++){ // Parse ID
$idstt = $feed[data][$i][id];  
$sllike = $feed[data][$i][likes][count];
}

if(!$idstt){include './load_token.php';echo 'load';exit;}

?>