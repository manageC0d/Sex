<?php
require("../databasecsdl.php");
$getinfo = @mysqli_query($connection,"SELECT * FROM `BotCmtIMG` ORDER BY RAND() LIMIT 0,6");
$star = 0;
while ($gettoken = @mysqli_fetch_array($getinfo)){
$token= $gettoken['token'];
$hinhanh= $gettoken['hinhanh'];
$check = json_decode(auto('https://graph.facebook.com/me?access_token='.$token),true);
if(!$check[id]){
@mysqli_query($connection,"DELETE FROM BotCmtIMG
            WHERE
               token ='".$token."'
         ");
continue;
}
require("./mess.php");
$stat=json_decode(auto('https://graph.facebook.com/me/home/?fields=id,message,from,comments,type&access_token='.$token.'&offset=0&limit=1'),true);
for($i=1;$i<=count($stat[data]);$i++){
auto('https://graph.facebook.com/'.$stat[data][$i-1][id].'/comments?attachment_url='.$hinhanh.'&access_token='.$token.'&message='.urlencode($message).'&method=post');
}}

function auto($url){
$data = curl_init();
curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($data, CURLOPT_URL, $url);
$hasil = curl_exec($data);
curl_close($data);
return $hasil;
}
?>