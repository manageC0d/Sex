<?php
//by Trợ lý Bé Điệu - https://trolyfacebook.com
error_reporting(0);
include "dom.php";

function getlink($id)
{
	$link = "https://drive.google.com/uc?export=download&id=$id";
	$ch = curl_init();
	curl_setopt ($ch, CURLOPT_URL, $link);
	curl_setopt($ch, CURLOPT_HEADER, TRUE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_COOKIEJAR, dirname(__FILE__) . "/google.mp3");
	curl_setopt($ch, CURLOPT_COOKIEFILE, dirname(__FILE__) . "/google.mp3");

	$page = curl_exec($ch);
	$chuyen =  locheader($page);
	if ($chuyen != ""){
		
	} else {
	$html = str_get_html($page);
	$link = urldecode(trim($html->find('a[id=uc-download-link]',0)->href));
	$tmp = explode("confirm=",$link);
	$tmp2 = explode("&",$tmp[1]);
	$confirm = $tmp2[0];
	$linkdowngoc = "https://drive.google.com/uc?export=download&id=$id&confirm=$confirm";
	curl_setopt ($ch, CURLOPT_URL, $linkdowngoc);
	curl_setopt($ch, CURLOPT_HEADER, TRUE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_COOKIEJAR, dirname(__FILE__) . "/google.mp3");
	curl_setopt($ch, CURLOPT_COOKIEFILE, dirname(__FILE__) . "/google.mp3");

	// Getting binary data
	$page = curl_exec($ch);
	$chuyen =  locheader($page);
		
}
curl_close($ch);
return $chuyen; 
}
function locheader($page)
{
	$temp = explode("\r\n", $page);
	foreach ($temp as $item) {
		$temp2 = explode(": ", $item);
		$infoheader[$temp2[0]] = $temp2[1];
	}
	$location = $infoheader['Location'];
	return $location;
}

if($_POST['submit'] != "")
{
	$url = $_POST['url'];
	$tmp = explode("file/d/",$url);
	$tmp2 = explode("/",$tmp[1]);
	$id = $tmp2[0];
	$linkdown = trim(getlink($id));
}




?>
<html>
<head>
	<title>Get link Google Drive</title>
</head>
<body>
	<form action="" method="POST">
	
	<input type="text" size="50" name="url" value="https://drive.google.com/file/d/0BxG6kVC7OXgrYW1DVVVuZTZndmM/view?usp=sharing"/>
	<input type="submit" value="GET" name="submit" />
	</form>
	<br />
	<?php echo $linkdown;?>
</body>
</html>
