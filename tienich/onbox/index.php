<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="cache-control" content="no-store" />
<meta http-equiv="pragma" content="no-cache" />
<meta content="telephone=no" name="format-detection" />
<meta http-equiv="expires" content="0" />
<meta name="keywords" content="#BotVN, Get link onbox, Video, Clip, video hot, Clip nong, Clip hài, Clip vui. Phim, Phim hd, Xem Phim, Phim Online, Phim hay." />
<meta property="og:site_name" content="#BotVN - Get Link Onbox.vn - kho nội dung clip cực Hot - Bót.Vn" />
<meta name="revisit" content="1 days" />
<meta name="robots" content="index,follow" />
<meta name="googlebot" content="index,follow" />
<meta name="language" content="vi-VN" />
<meta name="geo.country" content="VN" />
<meta name="geo.region" content="VN-HN" />
<meta name="geo.placename" content="Hà Nội" />
<meta name="geo.position" content="21.033333;105.85" />
<meta name="dc.publisher" content="onbox.vn" />
<meta name="dc.identifier" content="onbox.vn" />
<meta name="dc.language" content="vi-VN" />
<meta name="dc.title" content="#BotVN - Get Link Onbox.vn - kho nội dung clip cực Hot - Bót.Vn" />
<meta name="dc.keywords" content="Get link onbox, Video, Clip, video hot, Clip nong, Clip hài, Clip vui. Phim, Phim hd, Xem Phim, Phim Online, Phim hay." />
<meta name="news_keywords" content="Get link onbox, Video, Clip, video hot, Clip nong, Clip hài, Clip vui. Phim, Phim hd, Xem Phim, Phim Online, Phim hay." />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://xn--bt-5ja.vn/tienich/onbox/css/united.css" media="screen">
<link rel="stylesheet" href="https://xn--bt-5ja.vn/tienich/onbox/css/base.css" media="screen">
<link rel="shortcut icon" href="https://bót.vn/tienich/onbox/favicon.ico" type="image/x-icon" />
<title>#BotVN - Get Link Onbox.vn - Bót.Vn</title>
</head>
<body>
<?php
/* if(!isset($_POST['token']) && !isset($_SESSION['token'])){
$_SESSION['token'] = md5(uniqid(rand(), true));
}
*/
?>
<div class="container">
<form class="bs-example form-horizontal" method = "POST" style = "padding-top: 40px;">
<div class="form-group">
<label class="col-lg-2 control-label">URL của Video</label>
<div class="col-lg-10">
<textarea type="text" class="form-control" name="video" placeholder="http://onbox.vn/nhan-dien-nhung-co-nang-co-nguy-co-fa-ca-doi-v966418.html,http://onbox.vn/365-ngay-hanh-phuc-chia-tay-vi-muon-nhuong-ban-trai-cho-em-ho-v967065.html"></textarea>
Chú ý nếu bạn Get nhiều link cùng một lúc thì hãy sắp xếp chúng đúng theo thứ tự. Và mỗi link cách nhau bới dấu ","
</div>
</div>
<div class="form-group">
<div class="col-lg-10 col-lg-offset-2">
<button type="submit" class="btn btn-primary">Get Link ^^</button> <a href="http://onbox.vn" target="_blank" class="btn btn-primary">Trang Chủ Onbox.Vn</a>
</div>
</div>
</form>
<div class="col-lg-10 col-lg-offset-2">
<?php
function onbox($url)
{
$ch = @curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
$head[] = "Connection: keep-alive";
$head[] = "Keep-Alive: 300";
$head[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
$head[] = "Accept-Language: en-us,en;q=0.5";
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.124 Safari/537.36');
curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_TIMEOUT, 60);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Expect:'
));
$page = curl_exec($ch);
curl_close($ch);
return $page;
}

if(isset($_POST)){ 
$urls = explode(",",$_POST['video']); 
$count = count($urls); 
if($urls['0'] == NULL){$count = 0;} 
if($count != 0 ){ 
foreach($urls as $url){ 
$string= onbox(trim($url)); 
preg_match("#<iframe.*src='(.*)'.*>#imsU", $string, $onbox); 
$string2 = onbox($onbox[1]); 
preg_match("#file: '(.*)'#imsU", $string2, $link_video); 
$link_video = str_replace("8080", "8181", $link_video); 
$link_video = str_replace("203.190.170.158", "203.190.170.44", $link_video); 
$link_video = str_replace("203.190.170.159", "203.190.170.45", $link_video); 
echo '<video width="320" height="240" controls>
  <source src="'.$link_video[1].'" type="video/mp4">
  Your browser does not support the video tag.
</video><p>Nếu không xem được video <a style="color:#ff8a00;font-weight:bold;" href="'.$link_video[1].'" target="_blank" id="LinkSourceVideo">click vào đây</a>!</p>';
}
}
}
?>

</div></div></div>
</body>
</html>