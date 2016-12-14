<?php
ob_start('ob_gzhandler');
include'../databasecsdl.php';
$result = @mysqli_query($connection,"SELECT * FROM BotCmtRd ORDER BY RAND() LIMIT 0,10");
if($result){
while ($row = @mysqli_fetch_assoc($result)){
$stat = json_decode(auto('https://graph.facebook.com/me/home?fields=id,message,from,type,created_time,comments.id,comments.message,comments.from,comments.limit(100)&access_token='.$row['token'].'&limit=10'),true);
for($i=0;$i<count($stat);$i++){
$path = 'log/cmtrd_'.$row['idfb'];
$log = @fopen($path, "r");
if(!ereg($stat['data'][0]['id'],$log)){
auto('https://graph.facebook.com/'.$stat['data'][0]['id'].'/comments?method=POST&message='.urlencode($row['noidung']).'&access_token='.$row['token'].'');
echo ' '.$row['idfb'].' - '.$stat['data'][0]['id'].' OK! '.$row['ten'].'</br> ';
luulog($row['idfb'],$stat['data'][0]['id']);
echo '<br>';
}
}
}
}

function luulog($data1,$data2)
{
	$fp = @fopen('log/cmtrd_'.$data1.'', "w");
if(!is_dir('log')){
   mkdir('log');
   }
   if(file_exists('log/cm_'.$data1)){
       $log=file_get_contents('log/cm_'.$data1);
       }else{
       $log=' ';
	   fwrite($fp, $log);
       }
fwrite($fp, $data2);
}
function auto($url){
$data = curl_init();
curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($data, CURLOPT_URL, $url);
$hasil = curl_exec($data);
curl_close($data);
return $hasil;
}
?>