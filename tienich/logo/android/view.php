<?php
header('Content-Type: image/png');
//gia tri
$size= 20;
$angel= 0;
$text= $_GET['text'];
$font= 'FELTMARK.TTF';
$cao= 30;
$bbox= imagettfbbox($size,$angel,$font,$text);
$rong= $bbox[2] + 34;
//tao anh moi
$im = imagecreatetruecolor($rong,$cao);
$bird = imagecreatefrompng('anroid.png');
//dinh dang mau sac
$white = imagecolorallocate($im,255,255,255);
$red= imagecolorallocate($im,255,0,0);
$trans = imagecolorallocatealpha($im,255,255,255,127);
$xanh = imagecolorallocate($im,51,
204,
0);
imagealphablending($im, FALSE);
imagesavealpha($im,TRUE);
//in van ban
imagefilledrectangle($im,0,0,$rong,$cao,$trans);
imagecopy($im,$bird,0,1,0,0,imagesx($bird),imagesy($bird));
if($_GET['color'] == 1 || !isset($_GET['color']))
$color = $xanh;
else
if($_GET['color'] == 2)
$color = $red;

imagettftext($im,$size,$angel,29,23,$color,$font,$text);
//Xuat and pha huy
imagepng($im);
imagedestroy($im);
?>
