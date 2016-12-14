<?php
header("Content-type: image/vnd.nok-oplogo-color");$image= $_GET['url'];
$resheight = $_GET['h'];
$reswidth = $_GET['w'];
$rever=strrev($image);
$prv=explode(".", $rever);
$extension=strrev($prv[0]);
$smallext=strtolower($extension);
$size = GetImageSize($image);
$imawidth = $size[0];
$imaheight = $size[1];
if($smallext=="gif")
{
$back = imagecreatefromgif("$image");
}
if($smallext=="jpeg")
{
$back = imagecreatefromjpeg("$image");
}
if($smallext=="jpg")
{
$back = imagecreatefromjpeg("$image");
}
if($smallext=="png")
{
$back = imagecreatefrompng("$image");
}
if($imaheight<=$resheight)
{
$resize=$back;
}
if($imaheight>$resheight)
{
$sizey = $resheight;
$sizex = $reswidth;
$resize=ImageCreateTrueColor($sizex,$sizey);
imagecopyresized($resize, $back, 0, 0, 0, 0, $sizex, $sizey, $imawidth, $imaheight);
}
imagejpeg($resize);
imagedestroy($resize);
?>