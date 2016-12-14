<?php
header('Content-Type: image/png');
//gia tri
$size= 20;
$angel= 0;
$text= $_GET['text'];
$font= 'angry.ttf';
$cao= 33;
$bbox= imagettfbbox($size,$angel,$font,$text);
$rong= $bbox[2] + 34;
//tao anh moi
$im = imagecreatetruecolor($rong,$cao);
$bird = imagecreatefrompng('birds.png');
//dinh dang mau sac
$white = imagecolorallocate($im,255,255,255);
$grey = imagecolorallocate($im,128,128,128);
$trans = imagecolorallocatealpha($im,255,255,255,127);
$black = imagecolorallocate($im,1,0,0);
imagealphablending($im, FALSE);
imagesavealpha($im,TRUE);
//in van ban
imagefilledrectangle($im,0,0,$rong,$cao,$trans);
imagecopy($im,$bird,0,3,0,0,imagesx($bird),imagesy($bird));
if($_GET['color'] == 1 || !isset($_GET['color']))
$color = $black;
else
if($_GET['color'] == 2)
$color = $grey;

imagettftext($im,$size,$angel,31,26,$color,$font,$text);
//Xuat and pha huy
imagepng($im);
imagedestroy($im);
?>
