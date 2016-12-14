<?php
header('Content-Type: image/png');
//gia tri vao
$font = $_GET['f'];
$size = intval($_GET['size']);
$text = $_GET['text'];
$vt = intval($_GET['vt']);
$goc= 0;
//cho image
$box = imagettfbbox($size,$goc,$font,$text);
$w = $box[2]+60;
$h = $box[1]+45;
$cay=imagecreatefrompng('girl.png');
$im = imagecreatetruecolor($w,$h);
$bat=imagecreatefrompng('superkien.png');
$moon=imagecreatefrompng('sulan.png');
$broom=imagecreatefrompng('kien.png');
//tao mau sac
$trans=imagecolorallocatealpha($im,255,255,255,127);
$white=imagecolorallocate($im,229,70,71);
$black=imagecolorallocate($im,241,175,0);
imagealphablending($im,false);
imagesavealpha($im,true);
imagefilledrectangle($im,0,0,$w,$h,$trans);
//cai cay
imagecopy($im,$cay,0,0,0,0,imagesx($cay),imagesy($cay));
//con doi
imagecopyresized($im,$bat,(($w-imagesx($bat))/2+40),0,0,0,26,26,imagesx($bat),imagesy($bat));
//phu thuy
imagecopyresized($im,$broom,(imagesx($cay)+5),0,0,0,24,24,imagesx($broom),imagesy($broom));
//moon
imagecopy($im,$moon,($w-imagesx($moon)-5),0,0,0,imagesx($moon),imagesy($moon));
//chu len img
imagettftext($im,$size,$goc,$vt,44,$black,$font,$text);
//xuat du lieu
imagepng($im);
imagedestroy($im);
//Code designer by Nguyen Ary
?>
