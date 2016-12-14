<?php
header('Content-Type: image/png');
//gia tri
$size= 22;
$angel= 0;
$text= $_GET['text'];
$font= 'thuphap.ttf';
$cao= 52;
$bbox= imagettfbbox($size,$angel,$font,$text);
$rong= $bbox[2] + 38;
//tao anh moi
$im = imagecreatetruecolor($rong,$cao);
$icon = imagecreatefrompng('icon.png');
//dinh dang mau sac
$nau = imagecolorallocate($im,203,187,4);
$gray = imagecolorallocate($im, 4, 4, 4);


//transparen
 imagesavealpha($im, true);
    //setting completely transparent color
    $transparent = imagecolorallocatealpha($im, 0, 0, 0, 127);
    //filling created image with transparent color
    imagefill($im, 0, 0, $transparent);

imagecopyresized($im,$icon,1,4,0,0,50,48,imagesx($icon),imagesy($icon));

imagefttext($im, $size, 0, 38, 40, $den, $font,$text);

imagefttext($im, $size, 0, 37, 37, $den, $font,$text);

imagefttext($im, $size, 0, 40, 38, $den, $font,$text);


imagettftext($im,$size,$angel,39,39,$nau,$font,$text);


imagepng($im);
imagedestroy($im);
?>