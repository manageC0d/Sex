<html>
<head>
<meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8"/>
<title>cat anh</title>
</head>
<body>
<?php
function back(){$out='<form method="post"><input type="submit" value="Back"></form>';
return $out;}
echo'<b>Cắt ảnh online</b>';
$do=$_POST['do'];
if(!$do){echo'<form method="post" enctype="multipart/form-data">Tải lên hình ảnh từ máy(.jpg; .png; .gif):<br><input type="file" name="file"><br>Nhập link hình ảnh:<br><input type="text" name="link" value="http://"><br>Vị trí x:<br><input type="text" name="x"><br>Vị trí y:<br><input type="text" name="y"><br>Chiều rộng:<br><input type="text" name="width"><br>Chiều cao:</font><br><input type="text" name="heigh"><input type="hidden" name="do" value="create"><br><input type="submit" value="ok"></form><br>';}
if($do=="create"){$file=$_FILES['file']['name'];
$link=$_POST['link'];
$x=$_POST['x'];
$y=$_POST['y'];
$width=$_POST['width'];
$heigh=$_POST['heigh'];
if($file!=''){$type=$_FILES['file']['type'];
if($type!="image/jpeg"&&$type!="image/png"&&$type!="image/gif"){echo'Chỉ cho phép file gif,jpg,png';
echo back();
exit;}
$file="crop/".$file;
move_uploaded_file($_FILES['file']['tmp_name'],$file);}
if($link&&$link!="http://"){if(!eregi("http://",$link)){echo'Link không hợp lệ.';
echo back();
exit;}
$file=basename($link);
$file=strtok($file,"?");
$length=strlen($file);
$st=$length-3;
$type=strtolower(substr($file,$st,3));
if($type!="png"&&$type!="jpg"&&$type!="gif"){echo'Chỉ cho phép file jpg,gif,png !';
echo back();
exit;}
$file="crop/".$file;
copy($link,$file);}
if($file!=''){if(exif_imagetype($file)==IMAGETYPE_GIF){$src=imagecreatefromgif($file);}
if(exif_imagetype($file)==IMAGETYPE_PNG){$src=imagecreatefrompng($file);}
if(exif_imagetype($file)==IMAGETYPE_JPEG){$src=imagecreatefromjpeg($file);}
$dest=imagecreatetruecolor($width,$heigh);
imagecopy($dest,$src,0,0,$x,$y,$width,$heigh);
$black=imagecolorallocate($dest,0,0,0);
imagecolortransparent($dest,$black);
if(exif_imagetype($file)==IMAGETYPE_GIF){unlink($file);
imagegif($dest,$file);}
if(exif_imagetype($file)==IMAGETYPE_PNG){unlink($file);
imagepng($dest,$file);}
if(exif_imagetype($file)==IMAGETYPE_JPEG){unlink($file);
imagejpeg($dest,$file);}
imagedestroy($dest);
imagedestroy($src);
header("Location: ".$file);}
}
?>
</body>
</html>
