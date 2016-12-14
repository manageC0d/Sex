<?php
header('Content-Type: image/png');
//gia tri
$size= 30;
$size1 = 15;
$angel= 0; 
$text1 = $_GET['text1'];
$text2 = $_GET['text2'];
$text3 = $_GET['text3'];
$text = $text1.''.$text2;
$font= 'UVNBanhMi.TTF';
$font1 = 'DaLat.TTF';
$bird = imagecreatefrompng('ten.png'); 
$cao= 40;
$bbox1 = imagettfbbox($size,$angel,$font,$text1);
$bbox= imagettfbbox($size,$angel,$font,$text);
$bbox3 = imagettfbbox($size1,$angel,$font1,$text3);
$rong= $bbox[2] + 70;
$w = $bbox1[2] + 2;
$w1 = $bbox3[2] + 1;
$vt = $_GET['vt'];
//tao anh moi
$im = imagecreatetruecolor($rong,$cao);
//dinh dang mau sac
$white = imagecolorallocate($im,255,255,255);
$red= imagecolorallocate($im,117,214,19);
$trans = imagecolorallocatealpha($im,255,255,255,127);
$xanh = imagecolorallocate($im,89,90,88);
imagealphablending($im, FALSE);
imagesavealpha($im,TRUE);
//in van ban


imagefilledrectangle($im,0,0,$rong,$cao,$trans);
imagecopyresized($im,$bird,($w1+$vt+2),33,0,0,20,12,imagesx($bird),imagesy($bird));
imagettftext($im,$size,$angel,2,30,$red,$font,$text1);
imagettftext($im,$size,$angel,($w+3),30,$xanh,$font,$text2);
imagettftext($im,$size1,$angel,$vt,45,$xanh,$font1,$text3);
 
 
 
//Xuat and pha huy
imagepng($im);
imagedestroy($im);
?>
