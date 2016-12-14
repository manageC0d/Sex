<?php
header('Content-Type: image/png');
//gia tri vao
$f = intval($_GET['f']);
$font = 'broad.ttf';
$size = intval($_GET['size']);
$text = $_GET['text'];
$vt = intval($_GET['vt']);
$goc= 0;
//cho image
$box = imagettfbbox($size,$goc,$font,$text);
$w = $box[2] + 22;
$h = $box[1] + 60;
$mb=imagecreatefrompng('mb.png');
$im = imagecreatetruecolor($w,$h);
$tl=imagecreatefrompng('tl.png');
$o=imagecreatefrompng('o.png');
//tao mau sac
$trans=imagecolorallocatealpha($im,255,255,255,127);
$trang=imagecolorallocate($im,255,255,255);
$den=imagecolorallocate($im,0,0,0);
imagealphablending($im,false);
imagesavealpha($im,true);
imagefilledrectangle($im,0,0,$w,$h,$trans);
//may bay
imagecopy($im,$mb,($w-imagesx($mb)-150),0,0,0,imagesx($mb),imagesy($mb));
//ten lua
imagecopyresized($im,$tl,(($w-imagesx($tl))/2+40),0,0,0,62,30,imagesx($tl),imagesy($tl));
//tam
imagecopy($im,$o,($w-imagesx($o)-1),0,0,0,imagesx($o),imagesy($o));
//chu len img

imagefttext($im, $size, 0, 5, 55, $den, $font,$text);
//xuat du lieu
imagepng($im);
imagedestroy($im);
?>
