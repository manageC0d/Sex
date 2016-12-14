<?php
set_time_limit(0);
include'../databasecsdl.php';
$res = @mysqli_query($connection,"SELECT * FROM `BotExCx` ORDER BY RAND() LIMIT 0,5");
while ($post = mysqli_fetch_assoc($res)){
$result = @mysqli_query($connection,"SELECT * FROM `BotExCx` ORDER BY RAND() LIMIT 0,70");
$camxuc= array('LOVE', 'WOW', 'HAHA', 'SAD', 'ANGRY', 'THANKFUL');
if($result){
while($row = @mysqli_fetch_assoc($result))
{
$type=$camxuc[rand(0,count($camxuc)-1)];
//**Like**//
$puaru = auto('https://graph.facebook.com/'.$post['idfb'].'/feed?limit=1&access_token='.$row['token'].'');
$arraykhanh = json_decode($puaru, true);
auto('https://graph.facebook.com/'.$arraykhanh['data'][0]['id'].'/reactions?type='.$type.'&method=post&access_token='.$row['token'].'');
echo ' '.$post['idfb'].' - '.$arraykhanh['data'][0]['id'].' OK! '.$row['ten'].' Cảm Xúc : '.$type.'</br> ';
}}}
// giai phong


@mysqli_free_result ($result);
unset ($result);


function auto($url) {
   $ch = curl_init();
   curl_setopt_array($ch, array(
      CURLOPT_CONNECTTIMEOUT => 5,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_URL            => $url,
      )
   );
   $result = curl_exec($ch);
   curl_close($ch);
   return $result;
}
?>