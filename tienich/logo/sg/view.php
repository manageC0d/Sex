<?php
header('Content-Type: image/png');
$text = $_GET['text'];
$text2 = $_GET['text2'];
$vt = $_GET['vt'];
$vt2 = $_GET['vt2'];
$vt3 = $_GET['vt3'];
$font = 'soria.ttf';
$size = 21;
$size2 = 13;
$size3 = 36;
$goc = 0;
//tao kich thuoc
$bbox = imagettfbbox($size,$goc,$font, $text);
$box = imagettfbbox($size2,$goc,$font, $text2);
if($bbox[2]>=$box[2]) $rong= $bbox[2]; else $rong=$box[2];
$left = imagecreatefrompng('left.png');
$w = $rong+60;
$h = imagesy($left);
//tao anh
$im = imagecreatetruecolor($w,$h);
imagetruecolortopalette($im,true,255);
//Khai bao color
$trongsuot = imagecolorallocatealpha($im,33,33,33,127);
imagefill($im,0,0,$trongsuot);
$black = imagecolorallocate($im,33,33,33);
$white = imagecolorallocate($im,255,255,255);
//ghep icon vao img
imagecopy($im,$left,0,0,0,0,imagesx($left),imagesy($left));
//viet chu len anh
$text3 = strtoupper(substr($text,0,1));
imagettftext($im,$size3,$goc,$vt3,43,$white,$font,$text3);
imagettftext($im,$size,$goc,(imagesx($left)+$vt),25,$black,$font,$text);
imagettftext($im,$size2,$goc,(imagesx($left)+$vt2),45,$black,$font,$text2);
//xuat anh
imagepng($im);
imagedestroy($im);
?>
