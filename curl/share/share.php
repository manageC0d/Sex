<title>Đang Hack Share</title>
<?php
 include'../head.php';
$user = $_GET['idfb'];
$token = $_GET['token'];
if(!$user || !$token){
echo 'Hãy Nhập Đầy Đủ Thông Tin';
}
else{
$accounts = json_decode(cURL('https://graph.facebook.com/me/accounts?access_token=' . $token),true);

$feed = json_decode(cURL('https://graph.facebook.com/' . $user . '/feed?access_token='.$token.'&limit=1'),true);
//echo $feed;


if($accounts['error']){
echo 'Token Sai Hoặc Token đã chết, hãy lấy token mới để sử dụng';
}
else if($feed['error']){
echo '<b color="red">ID Facbook Không Hợp Lệ</b><br>';
}
}
foreach ($accounts['data'] as $data) {
    cURL('https://graph.facebook.com/' . $feed['data'][0]['id'] . '/sharedposts?method=post&access_token='.$data['access_token']) . '<br/>';
//echo 'Đang Hack Share Cho ID Stt: ' .$feed['data'][0]['id'];
}
echo "Đang Hack Share Cho ID: $user <br>";
echo 'Hack Cho STT ID: ' .$feed['data'][0]['id'] ;
echo '<br>';
$dem = count($accounts['data']);
echo "Số Share Nhận Được: $dem share/1s";
function cURL ($url) {
    $data = curl_init();
    curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($data, CURLOPT_URL, $url);
    $hasil = curl_exec($data);
    curl_close($data);
    return $hasil;
}
 
?>
 
<meta http-equiv="refresh" content="0">