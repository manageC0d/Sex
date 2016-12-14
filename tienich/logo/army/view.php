<?php
header('Content-Type: image/png');
//gia tri
$size= 22;
$angel= 0;
$text= $_GET['text'];
$font= 'font.ttf';
$cao= 80;
$bbox= imagettfbbox($size,$angel,$font,$text);
$rong= $bbox[2] + 38;
$vt  = $bbox[2] -75;
//tao anh moi
$im = imagecreatetruecolor($rong,$cao);
$icon = imagecreatefrompng('army.png');
//dinh dang mau sac
$nau = imagecolorallocate($im,218,182,3);
$den = imagecolorallocate($im, 9, 9, 9);

//transparen
 imagesavealpha($im, true);
    //setting completely transparent color
    $transparent = imagecolorallocatealpha($im, 0, 0, 0, 127);
    //filling created image with transparent color
    imagefill($im, 0, 0, $transparent);


imagecopyresized($im,$icon,$vt,3,0,0,55,43,imagesx($icon),imagesy($icon));

// the shadow 
imagefttext($im, $size, 0, 4, 54, $den, $font,$text);
imagefttext($im, $size, 0, 6, 56, $den, $font,$text);
imagefttext($im, $size, 0, 3, 53, $den, $font,$text);
imagefttext($im, $size, 0, 6, 57, $den, $font,$text);

imagefttext($im, $size, 0, 5, 55, $nau, $font,$text);

imagepng($im);
imagedestroy($im);

?>
