<?php
header('Content-Type: image/png');
//gia tri
$size= 22;
$angel= 0;
$text= $_GET['text'];
$font= 'apk.ttf';
$cao= 40;
$bbox= imagettfbbox($size,$angel,$font,$text);
$rong= $bbox[2] + 38;
//tao anh moi
$im = imagecreatetruecolor($rong,$cao);
$icon = imagecreatefrompng('logo11.png');
//dinh dang mau sac
$nau = imagecolorallocate($im,1,169,62);
$gray = imagecolorallocate($im, 255, 3, 3);

$trans = imagecolorallocatealpha($im,255,255,255,127);
imagealphablending($im, FALSE);
imagesavealpha($im,TRUE);
//in van ban
imagefilledrectangle($im,0,0,$rong,$cao,$trans);

imagecopy($im,$icon,1,4,0,0,imagesx($icon),imagesy($icon));




imagettftext($im,$size,$angel,32,35,$nau,$font,$text);
imagepng($im);
imagedestroy($im);

?>
