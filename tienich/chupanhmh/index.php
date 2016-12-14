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
<span class="tree" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="http://bót.vn" title="#BotVN - Chụp Ảnh Màn Hình Web - Bót.Vn">Chụp ảnh màn hình wap web online</a></span></div></div>

<div class="menu"><font color="black">Tool giúp bạn chụp ảnh màn hình wap hay website trực tuyến.<br></font></div>';

echo'
<div class="list1"><form action="add.php" method="post">Nhập địa chỉ trang web:<br/>
<input type="text" size="20" name="url" value="https://bót.vn"><br/>
Kích thước :<br/>
<input type="text" size="3" value="640" name="x"/>x<input type="text" size="3" value="480" name="y"/><br/>
Chọn định dạng ảnh <select name ="morong">
<option value = "png">png</option>
<option value ="jpg">jpg</option>
</select><br>
<input type="submit" value="Xong"></form></div>';

if ( $tubotocdo = opendir("img/" ) ) {
	while ( false !== ( $dat = readdir ( $tubotocdo ) ) ) {
		if ( $dat != "." && $dat != ".." ) {
			if ( ( substr ( $dat, 0, 30 ) + ( 15 * 60 ) ) <= time ( ) ) {
				unlink ( "img/$dat" );
			}
		}
	}
	closedir ( $tubotocdo );
}
?>