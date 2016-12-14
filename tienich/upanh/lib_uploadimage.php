<?php

if (!isset($_POST['photoimg']))
  die(header('location: ./?er=1'));
if (!isset($_FILES['file']['name']) or $_FILES['file']['name'] == null)
  die(header('location: ./?er=7'));
// Kiểm tra size
if ($_FILES['file']['size'] > 20000000)
  die(header('location: ./?er=2'));
//Kiểm tra nếu là ảnh
if (!getimagesize($_FILES['file']['tmp_name']))
  die(header('location: ./?er=3'));
// Kiểm tra phân giải
list($width, $height, $type, $attr) = getimagesize($_FILES['file']['tmp_name']);
if ($width > 30000 || $height > 30000)
  die(header('location: ./?er=4'));
# Kiểm tra định dạng file
$access = array(".gif", ".png", ".jpg", ".jpeg");
$checkimage = false;
foreach ($access as $file) {
  if (preg_match("/$file\$/i", $_FILES['file']['name'])) {
    $checkimage = true;
    $mime = $file;
    break;
  }
}

if($checkimage == false){
     die(header('location: ./?er=5'));
}

$client_id = "0591a5ffcec148f";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $client_id));
curl_setopt($ch, CURLOPT_POSTFIELDS, array('image' => base64_encode(file_get_contents($_FILES['file']['tmp_name']))));
$reply = curl_exec($ch);
curl_close($ch);
$reply = json_decode($reply,true);
if ($reply['success'] == 1) {
  die(header('location: ./?link=' . base64_encode($reply['data']['link'])));
}
else {
  die(header('location: ./?er=6'));
}
