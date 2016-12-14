<?php
header('Content-Type: image/png');
//gia tri
$size= 22;
$angel= 0;
$text= $_GET['text'];
$font= 'Teamobi.ttf';
$cao= 80;
$bbox= imagettfbbox($size,$angel,$font,$text);
$rong= $bbox[2] + 38;
$vt  = $_GET['vt'];
//tao anh moi
$im = imagecreatetruecolor($rong,$cao);
$icon = imagecreatefrompng('rk.png');
//dinh dang mau sac
$nau = imagecolorallocate($im,253,253,252);
$den = imagecolorallocate($im, 252, 171, 33);

//transparen
 imagesavealpha($im, true);
    //setting completely transparent color
    $transparent = imagecolorallocatealpha($im, 0, 0, 0, 127);
    //filling created image with transparent color
    imagefill($im, 0, 0, $transparent);


imagecopyresized($im,$icon,$vt,3,0,0,28,30,imagesx($icon),imagesy($icon));

imagefttext($im, 22, 0, 3, 53, $den, $font,$text);
imagefttext($im, $size, 0, 7, 57, $den, $font,$text);
imagefttext($im, $size, 0, 3, 59, $den, $font,$text);
imagefttext($im, $size, 0, 5, 59, $den, $font,$text);
imagefttext($im, $size, 0, 6, 59, $den, $font,$text);
imagefttext($im, $size, 0, 10, 59, $den, $font,$text);
imagefttext($im, $size, 0, 10, 57, $den, $font,$text);
imagefttext($im, $size, 0, 10, 55, $den, $font,$text);
imagefttext($im, $size, 0, 10, 53, $den, $font,$text);
imagefttext($im, $size, 0, 10, 52, $den, $font,$text);
imagefttext($im, $size, 0, 8, 52, $den, $font,$text);
imagefttext($im, $size, 0, 6, 52, $den, $font,$text);
imagefttext($im, $size, 0, 5, 52, $den, $font,$text);
imagefttext($im, $size, 0, 4, 52, $den, $font,$text);
imagefttext($im, $size, 0, 3, 52, $den, $font,$text);
imagefttext($im, $size, 0, 2, 52, $den, $font,$text);
imagefttext($im, $size, 0, 1, 58, $den, $font,$text);
imagefttext($im, $size, 0, 1, 53, $den, $font,$text);

imagefttext($im, $size, 0, 5, 55, $nau, $font,$text);

imagepng($im);
imagedestroy($im);

?>
