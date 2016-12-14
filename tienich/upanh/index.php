<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://bót.vn/tienich/upanh/theme/style.css">
<link href="//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="shortcut icon" href="https://fbstatic-a.akamaihd.net/rsrc.php/yl/r/H3nktOa7ZMg.ico">
<link rel="author" href="https://plus.google.com/116321786479544279806?rel=author" />
<link rel="stylesheet" href="https://bót.vn/tienich/upanh/theme/bootstrap.min.css">
<link rel="stylesheet" href="https://bót.vn/tienich/upanh/theme/bootstrap-theme.min.css">
<title>#BotVN - Upload Ảnh Online - Bót.Vn</title>
<meta charset="utf-8">
<meta name='revisit-after' content='1 days'/>
<meta http-equiv="content-language" content="vi"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="#BotVN - Upload Ảnh IMGUR - FLICKR">
<meta name="google-site-verification" content="rzHvb9XZvpdkncSSaQ6IJLlx0dx65HGYf5ulIbUcpMM" />
<meta property="og:title" content="#BotVN - Upload Ảnh Online - Bót.Vn">
<meta property="og:type" content="website">
<meta property="og:locale" content="vi_VN"/>
<meta property="og:image" content="assets/images/banner.JPG">
<meta property="og:description" content="#BotVN - Upload Ảnh IMGUR - FLICKR"/>
<meta property="og:site_name" content="Bót.Vn"/>
<meta property="article:author" content="https://www.facebook.com/4"/>
<meta property="article:publisher" content="https://www.facebook.com/4"/>
<meta name="twitter:card" content="Bót.Vn">
<meta name="twitter:site" content="Bót.Vn">
<meta name="twitter:title" content="#BotVN - Upload Ảnh Online - Bót.Vn">
<meta name="twitter:description" content="#BotVN - Upload Ảnh IMGUR - FLICKR">
<meta name="description" content="#BotVN - Upload Ảnh IMGUR - FLICKR"/>
<meta name="keywords" content="#BotVN, bot like, bot ex like, ex like, auto like, auto sub, auto share, hack like, hack sub, hack share, auto like facebook,hack like fanpage, autolike fanpage, autolike anh fb, hack like facebook, hack like fb, auto like fb , hack sub facebook , auto comments facebook, hack comments facebook, auto sub facebook, auto friends facebook, hack friends facebook"/>
<meta name="distribution" content="global"/>
<meta name="copyright" content="Bót.Vn copyright 2016"/>
<meta name="rating" content="General"/>
<meta name="language" content="vietnammese"/>
<meta name="robots" content="all"/>
<meta name="expires" content="never"/>
</head>
<body>
<div class="maintxt">
<div class="phdr"><a href="https://bót.vn">#BotVN - Upload Ảnh Online</a></div>
</br><form id="imageform" method="post" enctype="multipart/form-data" action="lib_uploadimage.php">
<p><input type="file" name="file" /></p>
<p><input type="submit" name="photoimg" value="Upload Ảnh"/></p>

<?
function er($text)
{
  return '<div style="width: 95%; padding: 6px; border-radius: 5px;background: #D7C042;"><b style="color: green">Lỗi: </b>' . $text . '</div>';
}
if($_GET['er']==7) $error = er("Bạn hãy chọn file để upload nhé!!!");
if($_GET['er']==2) $error = er("File Quá Lớn, vui lòng chọn file < 20MB");
if($_GET['er']==3) $error = er("Có Vẻ File Bạn Chọn Không Phải Là Ảnh");
if($_GET['er']==4) $error = er("Chiều dài và rộng của ảnh quá lớn. Hãy upload ảnh nhỏ hơn 20000x20000 px");
if($_GET['er']==5) $error = er("Định Dạng File Không Được Phép Upload");
if($_GET['er']==6) $error = er("Không thể upload ảnh của bạn, hãy thử lại!");
if($_GET['er']==1) $error = er("Hành động của bạn không hợp lệ !!!");
if(isset($error)){ echo $error;} else if(isset($_GET['link'])){ 
	echo '<center><img src="' . $url . '" /><br/></center>';
    echo '<div class="phdr">Link Trực Tiếp :<br/></div>';
    echo '<div class="rmenu"><textarea onclick="this.focus();this.select();" readonly="readonly">' . base64_decode($_GET['link']) . '</textarea><br/></div>';
    echo '<div class="phdr">BBcode :<br/></div>';
    echo '<div class="rmenu"><textarea onclick="this.focus();this.select();" readonly="readonly">[img]' . base64_decode($_GET['link']) . '[/img]</textarea><br/></div>';
    echo '<div class="phdr">Html :<br/></div>';
    echo '<div class="rmenu"><textarea onclick="this.focus();this.select();" readonly="readonly"><img src="' . base64_decode($_GET['link']) . '" alt="" /></textarea></div>
';}
?>
</form>
</div>
<div class="phdr"><a href="https://bót.vn"><i class="fa fa-home"></i> Trang Chủ</a></div><div class="endwap">
<a href="#"><i class="fa fa-twitter-square" style="font-size:33px;color:#67B945"></i></a> &#160;&#160;
<a href="https://facebook.com/4"><i class="fa fa-facebook-square" style="font-size:33px;color:#E74946"></i></a> &#160;&#160;
<a href="#"><i class="fa fa-windows" style="font-size:32px;color:#67B945"></i></a> &#160;&#160;
<a href="https://plus.google.com/"><i class="fa fa-google-plus-square" style="font-size:33px;color:#E74946"></i></a>  &#160;&#160;
<a href="https://https://www.youtube.com/vipcsvn"><i class="fa fa-youtube-square" style="font-size:33px;color:#67B945"></i></a> &#160;&#160;
</body>
</html>