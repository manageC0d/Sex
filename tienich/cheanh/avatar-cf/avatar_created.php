<?php
$name = stripslashes($_GET['name']);
$size = stripslashes($_GET['size']);
$font = 'images/avatar_maker/fonts/'.stripslashes($_GET['font']).'.ttf';
$fontcolor['r'] = stripslashes($_GET['color_r']); // font color - RED
$fontcolor['g'] = stripslashes($_GET['color_g']); // font color - GREEN
$fontcolor['b'] = stripslashes($_GET['color_b']); // font color - BLUE
$shadow = stripslashes($_GET['shadow']);
$lines = stripslashes($_GET['lines']);
function arrow($im, $x1, $y1, $x2, $y2, $alength, $awidth, $color){
///
}
switch ($_GET['color']) {
case '1':
 $bgpic = 'images/avatar_maker/1.gif';
 break;
case '2':
 $bgpic = 'images/avatar_maker/2.gif';
 break;
case '3':
 $bgpic = 'images/avatar_maker/3.gif';
 break;
case '4':
 $bgpic = 'images/avatar_maker/4.gif';
 break;
case '5':
 $bgpic = 'images/avatar_maker/5.gif';
 break;
case '6':
 $bgpic = 'images/avatar_maker/6.gif';
 break;
case '7':
 $bgpic = 'images/avatar_maker/7.gif';
 break;
case '8':
 $bgpic = 'images/avatar_maker/8.gif';
 break;
case 'random':
 $num = mt_rand(1,8);
 if($num == 1){ $bgpic = 'images/avatar_maker/1.gif'; }
 elseif($num == 2){ $bgpic = 'images/avatar_maker/2.gif'; }
 elseif($num == 3){ $bgpic = 'images/avatar_maker/3.gif'; }
 elseif($num == 4){ $bgpic = 'images/avatar_maker/4.gif'; }
 elseif($num == 5){ $bgpic = 'images/avatar_maker/5.gif'; }
 elseif($num == 6){ $bgpic = 'images/avatar_maker/6.gif'; }
 elseif($num == 7){ $bgpic = 'images/avatar_maker/7.gif'; }
 elseif($num == 8){ $bgpic = 'images/avatar_maker/8.gif';}
 break;
default:
 $num = mt_rand(1,8);
 if($num == 1){ $bgpic = 'images/avatar_maker/1.gif'; }
 elseif($num == 2){ $bgpic = 'images/avatar_maker/2.gif'; }
 elseif($num == 3){ $bgpic = 'images/avatar_maker/3.gif'; }
 elseif($num == 4){ $bgpic = 'images/avatar_maker/4.gif'; }
 elseif($num == 5){ $bgpic = 'images/avatar_maker/5.gif'; }
 elseif($num == 6){ $bgpic = 'images/avatar_maker/6.gif'; }
 elseif($num == 7){ $bgpic = 'images/avatar_maker/7.gif'; }
 elseif($num == 8){ $bgpic = 'images/avatar_maker/8.gif';}
}


$im = imagecreatefromgif($bgpic);
//Calculate, the centre:
for(;;){
list($image_width, $image_height) = getimagesize($bgpic);
list($left_x, , $right_x) = imagettfbbox($size, 0, $font, $name);
$text_width = $right_x - $left_x;
if($image_width > $text_width+5){
break;
}
$size = $size - .5;
if($size == 1){
die('Script not responding to decreasing font size, in other words: try using less letters.');
}
}
$padding = ($image_width - $text_width)/2;

$textcolor = imagecolorresolve($im, $fontcolor['r'], $fontcolor['g'], $fontcolor['b']);

$grey = imagecolorallocate($im, 128, 128, 128);

if($shadow == 'y'){
imagettftext($im, $size, 0, $padding+1, 77, $grey, $font, $name);
}
if($lines == 'y'){

//imagettftext($im, $size, 0, $padding+1, 77, $grey, $font, $name);

}

imagettftext($im, $size, 0, $padding, 75, $textcolor, $font, $name);
if($_GET['dl']){
header('Content-Disposition: attachment; filename="avatar.gif"');
}
header("Content-type: image/gif");
imagegif($im);
?>