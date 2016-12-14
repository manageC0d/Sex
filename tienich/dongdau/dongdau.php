<?php

$text2 = $_GET["t1"];
$text1 = $_GET["t2"];
$text3 = $_GET["t3"];
//$text1 = "  dung";
//$text2 = " kute";
//$text3 = "ly nhan";
$dodai = strlen($text1);
$chu1 = str_split($text1);
$chu2 = str_split($text2);
$chu3 = str_split($text3);
$xbatdau = 43;
$ybatdau = 80;

$luu = array();
$luu[" "]=970;
$luu["a"]=1;
$luu["b"]=484;
$luu["c"]=411;
$luu["d"]=78;
$luu["e"]=685;
$luu["f"]=116;
$luu["g"]=150;
$luu["i"]=870;
$luu["h"]=189;
$luu["j"]=226;
$luu["k"]=263;
$luu["l"]=301;
$luu["m"]=562;
$luu["n"]=522;
$luu["o"]=896;
$luu["p"]=937;
$luu["q"]=601;
$luu["r"]=720;
$luu["s"]=38;
$luu["w"]=640;
$luu["u"]=832;
$luu["v"]=447;
$luu["z"]=334;
$luu["x"]=373;
$luu["t"]=758;
$luu["y"]=798;
if(count($chu1)>7)
echo '<br>so ki tu phai it hon :'.count($chu1);

/*
function chuoimang($chuoi) {
$atext[] = array();
$atext = str_split($chuoi);
while($i = each($atext))
{

echo $i["value"];

return $i["value"];
}
}
*/
$targetfile = "dadong.jpg";
$logo_file = "text.png";
$image_file = "dau.jpg";

$photo = imagecreatefromjpeg($image_file);
$fotoW = imagesx($photo);
$fotoH = imagesy($photo);
$logoImage = imagecreatefrompng($logo_file);
//$logoW = imagesx($logoImage);
//$logoH = imagesy($logoImage);
$photoFrame = imagecreatetruecolor($fotoW,$fotoH);
//$dest_x = $fotoW - $logoW;
//$dest_y = $fotoH - $logoH;
//imagecopyresampled($photoFrame, $photo, 0, 0, 0, 0, $fotoW, $fotoH, $fotoW, $fotoH);
imagecopy($photoFrame, $photo, 0, 0, 0, 0, $fotoW, $fotoH);
//vong lap de viet tung chu

while($i = each($chu1)){
$so = $i["value"];
imagecopy($photoFrame, $logoImage, $xbatdau, $ybatdau, $luu[$so], 0, 30,50 );
$xbatdau+=20;
//echo '<br>'.$luu[$so];
}
$xbatdau=66;
while($i = each($chu2)){
$so2 = $i["value"];
imagecopy($photoFrame, $logoImage, $xbatdau, 40, $luu[$so2], 0, 30,50 );
$xbatdau+=20;
//echo '<br>'.$luu[$so];
}

$xbatdau=55;
while($i = each($chu3)){
$so2 = $i["value"];
imagecopy($photoFrame, $logoImage, $xbatdau, 120, $luu[$so2], 0, 30,50 );
$xbatdau+=20;
//echo '<br>'.$luu[$so];
}

// luu va xu ly
header('Content-Type: image/jpeg');
imagejpeg($photoFrame);
//imagejpeg($photoFrame, $targetfile);
//echo '<img src="'.$targetfile.'" />';

?>