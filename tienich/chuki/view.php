<?php
// code design by Mr.hoangbi
$im = imagecreatefromjpeg ('dau.jpg');
$black = imagecolorallocate ( $im , 0 , 0 , 0 );
$white = imagecolorallocate ( $im , 255 , 255 , 255 );
$red = imagecolorallocate($im,255,0,0);
//Get var
$kiten = $_GET['ki'];
$size = $_GET['size'];
$goc = $_GET['goc'];
if(!isset($size) || $size<20)$size=40;
if(!isset($goc) || $goc>40)$goc=0;
if(!isset($kiten))$kiten="hoangbi";
// font chu
$font = './wind.ttf' ;
$ki = './hand.ttf';
//Create our bounding box for the first text
$bbox = imagettfbbox($size,$goc,$ki,$kiten);
// Do dai cua text
$x = abs($bbox[0]) + abs($bbox[2]);
$y = abs($bbox[1]) + abs($bbox[5]);
//Dat but
$downx = (240-$x)/2;
$downy = (240-$y)/2;
// Write line 1
imagettftext($im,$size-2,$goc,$downx,$downy,$black,$ki, $kiten);
// Output to browser
header ('Content-Type: image/png');
imagepng ($im);
imagedestroy ( $im );
?>
