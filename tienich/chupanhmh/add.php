<html>
<head>
<title>#BotVN - Chụp Ảnh Màn Hình Web - Bót.Vn</title>
<meta http-equiv="content-type" content="application/xhtml xml; charset=utf-8"/>
<link rel="stylesheet" href="https://bót.vn/tienich/chupanhmh/css/style.css">
</head>
<body>
<?php 
include'ini.php';
echo '<div class="phdr"><div class="breadcrumb"><span class="tree" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="https://bót.vn" title="#BotVN - Chụp Ảnh Màn Hình Web - Bót.Vn"><img src="http://VipPrao.Wap.Sh/images/home2.png" alt="home" class="icon"/></a></span>
<span class="tree" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="http://bót.vn" title="#BotVN - Chụp Ảnh Màn Hình Web - Bót.Vn">Chụp ảnh màn hình wap web online</a></span></div></div>';
$url = htmlspecialchars($_POST['url']);
$morong = htmlspecialchars($_POST['morong']);
$x = htmlspecialchars($_POST['x']);
$y = htmlspecialchars($_POST['y']);
$img='http://mini.s-shot.ru/'.$x.'x'.$y.'/'.$x.'/'.$morong.'/?'.$url.'';
if (isset($img)) {
$url_down = $img;
$ch = curl_init ($url_down);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($ch);
curl_close ($ch);
$name = md5(mt_rand(1,999999999));
$savePath = 'img/'.$name.'.'.$morong.'';
$fp = fopen($savePath,'x');
fwrite($fp, $result);
fclose($fp);
}
echo '<div class="menu"><font color="black">Ảnh chụp trang <b>'.$url.'</b> ('.$x.'x'.$y.') của bạn đây!<br></font><br><center><img src="img/'.$name.'.'.$morong.'" width="320" height="320"><br/>
[<a href="http://'.$_SERVER['HTTP_HOST'].'/'.$papka.'/img/'.$name.'.'.$morong.'"><big><b>Tải về ảnh '.$x.'x'.$y.'</b></big></a>]</div>
<div class="list1">Link ảnh:<br/>
<textarea row="2">http://'.$_SERVER['HTTP_HOST'].'/'.$papka.'/img/'.$name.'.'.$morong.'</textarea>
</br>BBcode:<br/>
<textarea row="2">[img]http://'.$_SERVER['HTTP_HOST'].'/'.$papka.'/img/'.$name.'.'.$morong.'[/img]</textarea>
</center></div>';
?>