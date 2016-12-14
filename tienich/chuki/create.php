<?php
//code design by Mr.hoangbi
$im = imagecreatefromjpeg ('dau.jpg');

$black = imagecolorallocate ( $im , 0 , 0 , 0 );
$white = imagecolorallocate ( $im , 255 , 255 , 255 );
$red = imagecolorallocate($im,255,0,0);
//Get var
$text1 = $_GET['t1'];
$text2 = $_GET['t2'];
$size = $_GET['size'];
$goc = $_GET['goc'];

if(!isset($size) || $size<20)$size=40;
if(!isset($goc) || $goc>40)$goc=0;
if(!isset($text1))$text1="Nguyen viet";
if(!isset($text2))$text2="Dung";

// Path to our font file
$font = './wind.ttf' ;
$ki = './hand.ttf';
//Create our bounding box for the first text
$bbox = imagettfbbox ( $size , $goc , $ki , $text1);
$box = imagettfbbox($size,0,$font,$text1);
$space = abs($box[1]) + abs($box[5])+15;
// Do dai cua text

$x = abs($bbox[0]) + abs($bbox[2]);
$y = abs($bbox[1]) + abs($bbox[5]);
//Dat but
$downx = (240-$x)/2;
$downy = (240/2);

imagettftext ( $im , $size-20 , $goc , $downx , $downy , $black , $ki , $text1.$text2);

// Write line 2
//$space = ($x*sin($goc))/2;
imagettftext ( $im , $size , $goc , $downx , $downy-$space , $black , $font , $text2);

// Output to browser
header ('Content-Type: image/png');
imagepng($im);
imagedestroy($im);
?>
