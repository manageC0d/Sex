<?php
set_time_limit(0);
include'../databasecsdl.php';
$res = @mysqli_query($connection,"SELECT * FROM `BotEx` ORDER BY RAND() LIMIT 0,5");
while ($post = @mysqli_fetch_assoc($res)){
$result = @mysqli_query($connection,"SELECT * FROM `BotEx` ORDER BY RAND() LIMIT 0,70");
if($result){
while($row = @mysqli_fetch_assoc($result)){
$matoken= $row['token'];
$check = json_decode(file_get_contents('https://graph.facebook.com/me?access_token='.$matoken),true);
if(!$check[id]){
@mysqli_query($connection,"DELETE FROM BotEx
            WHERE
               token ='".$matoken."'
         ");
continue;
}
//**Like**//
$nghia = auto('https://graph.facebook.com/'.$post['idfb'].'/feed?limit=1&access_token='.$row['token'].'');
$data = json_decode($nghia, true);
auto('https://graph.facebook.com/'.$data['data'][0]['id'].'/likes?method=post&access_token='.$row['token'].'');
echo ' '.$post['idfb'].' - '.$data['data'][0]['id'].' OK! '.$row['ten'].'</br> ';
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