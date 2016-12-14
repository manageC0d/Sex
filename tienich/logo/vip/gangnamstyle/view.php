<?php
header('Content-Type: image/png');
//gia tri
$size= 25;
$angel= 0;
$text= $_GET['text'];
$font= 'UVNBanhMi.TTF';
$cao= 55;
$bbox= imagettfbbox($size,$angel,$font,$text);
$r = $bbox[2] + 35;
$rong= $bbox[2] + 65;
//tao anh moi
$im = imagecreatetruecolor($rong,$cao);
$icon1 = imagecreatefrompng('icon.png');
$icon3 = imagecreatefrompng('ao.png');

//dinh dang mau sac
$den = imagecolorallocate($im,253,253,255);
$trang = imagecolorallocate($im, 9, 9, 9);

//transparen
 imagesavealpha($im, true);
    //setting completely transparent color
    $transparent = imagecolorallocatealpha($im, 0, 0, 0, 127);
    //filling created image with transparent color
    imagefill($im, 0, 0, $transparent);

imagecopyresized($im,$icon1,1,4,0,0,32,40,imagesx($icon1),imagesy($icon1));
imagecopy($im,$icon3,$r,7,0,0,imagesx($icon3),imagesy($icon3));

// the shadow 
imagefttext($im, $size, 0, 37, 39, $den, $font,$text);
imagefttext($im, $size, 0, 37, 42, $den, $font,$text);
imagefttext($im, $size, 0, 40, 39, $den, $font,$text);
imagefttext($im, $size, 0, 36, 37, $den, $font,$text);

imagefttext($im, $size, 0, 38, 40, $trang, $font,$text);



imagepng($im);
imagedestroy($im);
?>