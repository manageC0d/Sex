<?
include '../databasecsdl.php';
$result = @mysqli_query($connection,"SELECT * FROM Account");
if($result){
while($row = mysqli_fetch_array($result))
{
$url = curl("https://m.facebook.com/profile.php",$row[cookie]);
	//echo $url;
	//exit;
	if(preg_match('#<title>(.+?)</title>#is',$url, $_puaru))
    {
    	$name = $_puaru[1];
    	echo $name.'<br>';
    }
if($name == 'Không tìm thấy trang' || $name == 'Page Not Found'){
@mysqli_query($connection,"
DELETE FROM
Account
WHERE
id='" . @mysqli_real_escape_string($connection,$row[id]) . "'
");
}
}
}



function curl($url,$cookie)
{
    $ch = @curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    $head[] = "Connection: keep-alive";
    $head[] = "Keep-Alive: 300";
    $head[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
    $head[] = "Accept-Language: en-us,en;q=0.5";
    curl_setopt($ch, CURLOPT_USERAGENT, 'Opera/9.80 (Windows NT 6.0) Presto/2.12.388 Version/12.14');
    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
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
?>