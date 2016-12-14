<?php
$text=$_GET['text'];
if($text==''){echo'<html>
<head>
<meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8"/>
<title>tao logo teamobi</title>
</head>
<body>';
echo'<b>Tạo Logo Teamobi</b><br><form method="get"><font color="red">Nội dung:<br><input type="text" name="text" value="'.$_SERVER["HTTP_HOST"].'"><br><input type="submit" value="Tạo logo"></form><br>';
echo'</body>
</html>';}
if($text!=''){$array=array("a"=>13,"b"=>14,"c"=>13,"d"=>14,"e"=>14,"f"=>13,"g"=>14,"h"=>14,"i"=>8,"j"=>11,"k"=>14,"l"=>8,"m"=>22,"n"=>14,"o"=>15,"p"=>14,"q"=>14,"r"=>12,"s"=>12,"t"=>12,"u"=>13,"v"=>14,"w"=>19,"x"=>13,"y"=>13,"z"=>13,"A"=>19,"B"=>19,"C"=>18,"D"=>19,"E"=>18,"F"=>14,"G"=>19,"H"=>20,"I"=>9,"J"=>15,"K"=>20,"L"=>14,"M"=>23,"N"=>19,"O"=>21,"P"=>17,"Q"=>21,"R"=>20,"S"=>17,"T"=>17,"U"=>18,"V"=>19,"W"=>27,"X"=>17,"Y"=>18,"Z"=>17," "=>9,"0"=>18,"1"=>12,"2"=>18,"3"=>16,"4"=>19,"5"=>17,"6"=>19,"7"=>16,"8"=>17,"9"=>20,"."=>8);
$array1=array("a"=>0,"b"=>13,"c"=>27,"d"=>40,"e"=>54,"f"=>68,"g"=>88,"h"=>102,"i"=>116,"j"=>124,"k"=>135,"l"=>149,"m"=>157,"n"=>179,"o"=>193,"p"=>208,"q"=>222,"r"=>236,"s"=>248,"t"=>260,"u"=>272,"v"=>285,"w"=>299,"x"=>318,"y"=>331,"z"=>344,"A"=>357,"B"=>376,"C"=>395,"D"=>413,"E"=>432,"F"=>450,"G"=>464,"H"=>483,"I"=>503,"J"=>512,"K"=>527,"L"=>547,"M"=>561,"N"=>584,"O"=>603,"P"=>624,"Q"=>641,"R"=>662,"S"=>682,"T"=>699,"U"=>716,"V"=>734,"W"=>753,"X"=>780,"Y"=>797,"Z"=>815," "=>832,"0"=>841,"1"=>859,"2"=>871,"3"=>889,"4"=>905,"5"=>924,"6"=>941,"7"=>960,"8"=>976,"9"=>993,"."=>1013);
$text=str_split($text);
$count=count($text);
$width=0;
for($a=0; $a<$count; $a++){$ki=$text[$a];
$width=$width+$array[$ki];}
$image=imagecreate($width,65);
$white=imagecolorallocate($image,255,255,255);
imagecolortransparent($image,$white);
$xn=0;
$src=imagecreatefrompng("view.png");
for($a=0; $a<$count; $a++){$ki=$text[$a];
$ki0=$array[$ki];
$ki1=$array1[$ki];
imagecopy($image,$src,$xn,25,$ki1,0,$ki0,40);
$xn=$xn+$ki0;}
$heart=imagecreatefrompng("heart_view.png");
$vtx=$width-55;
imagecopy($image,$heart,$vtx,0,0,0,50,25);
header("Content-type: image/png");
imagepng($image);
imagedestroy($image);
imagedestroy($src);
imagedestroy($heart);
exit;}
?>