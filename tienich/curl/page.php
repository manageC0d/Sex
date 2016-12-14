<?php
$page = 'dndpne'; // id page
$cmt = '1032647283524400';
$noidung = '';
$token = ''; // token full nick chÃnh
$accounts = json_decode(DS('https://graph.facebook.com/me/accounts?access_token=' . $token),true); //json get page

foreach ($accounts['data'] as $data) {
//láº¥y cÃ¡c token cá»§a page
echo DS('https://graph.facebook.com/' . $page . '/likes?method=post&access_token='.$data['access_token']) . '<br/><br/><br/>';
echo DS('https://graph.facebook.com/' . $cmt . '/comments?method=post&mmessage='.$noidung.'&access_token='.$data['access_token']) . '<br/><br/><br/>';
}

/* == HÃ m get == */
function DS ($url) {
$data = curl_init();
curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($data, CURLOPT_URL, $url);
$hasil = curl_exec($data);
curl_close($data);
return $hasil;
}

?>