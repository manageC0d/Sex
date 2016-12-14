<?php
header('Content-Type: image/png');
//gia tri
$size= 25;
$angel= 0;
$text= $_GET['text'];
$font= 'VPSVILOT.TTF';
$cao= 54;
$bbox= imagettfbbox($size,$angel,$font,$text);
$rong= $bbox[2] + 70;
//tao anh moi
$im = imagecreatetruecolor($rong,$cao);
$cv = imagecreatefrompng('cv.png');
//dinh dang mau sac
$white = imagecolorallocate($im,255,255,255);
$grey = imagecolorallocate($im,72,118,255);
$trans = imagecolorallocatealpha($im,255,255,255,127);
$black = imagecolorallocate($im,255,69,0);
imagealphablending($im, FALSE);
imagesavealpha($im,TRUE);
//in van ban
imagefilledrectangle($im,0,0,$rong,$cao,$trans);
imagecopy($im,$cv,0,5,0,0,imagesx($cv),imagesy($cv));
if($_GET['color'] == 1 || !isset($_GET['color']))
$color = $black;
else
if($_GET['color'] == 2)
$color = $grey;

imagettftext($im,$size,$angel,50,45,$color,$font,$text);//Xuat and pha huy
imagepng($im);
imagedestroy($im);
?>
