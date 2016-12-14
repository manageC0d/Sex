<?php
header('Content-Type: image/png');
//gia tri
$size= 22;
$angel= 0;
$text= $_GET['text'];
$font= 'VPSVILOT.TTF';
$cao= 54;
$bbox= imagettfbbox($size,$angel,$font,$text);
$r = $bbox[2] - 64;
$rong= $bbox[2] + 72;
//tao anh moi
$im = imagecreatetruecolor($rong,$cao);
$icon1 = imagecreatefrompng('icontet.png');
$icon2 = imagecreatefrompng('iconttet.png');
//dinh dang mau sac
$nau = imagecolorallocate($im,150,40,200);
$gray = imagecolorallocate($im, 255, 255, 255);


//transparen
 imagesavealpha($im, true);
    //setting completely transparent color
    $transparent = imagecolorallocatealpha($im, 0, 0, 0, 127);
    //filling created image with transparent color
    imagefill($im, 0, 0, $transparent);

imagecopyresized($im,$icon1,0,0,0,0,71,54,imagesx($icon1),imagesy($icon1));
imagecopy($im,$icon2,$r,5,0,0,imagesx($icon2),imagesy($icon2));

imagefttext($im, $size, 0, 67, 49, $gray, $font,$text);

imagefttext($im, $size, 0, 66, 45, $gray, $font,$text);

imagefttext($im, $size, 0, 69, 46, $gray, $font,$text);


imagettftext($im,$size,$angel,68,47,$nau,$font,$text);


imagepng($im);
imagedestroy($im);
?>