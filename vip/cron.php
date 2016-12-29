<?php
	set_time_limit(0);
	error_reporting(0);
	class curllikestarleo
	{
	public $id;
	private function thongtin()
    {
	$w = '<pre>

<div class="table-responsive">		       
<h2>cURL Like Facebook </h2>
Đang tang LIKE cho ID: '.$this->id.'
<hr><hr><br>
</pre>';
    echo $w;
    }

        private function getCaptcha($lokasi)
	{
		$ch = curl_init($lokasi);
		curl_setopt($ch,CURLOPT_COOKIEJAR,'cookie.txt');      
		curl_setopt($ch,CURLOPT_COOKIEFILE,'cookie.txt');
		curl_setopt($ch,CURLOPT_FRESH_CONNECT,true);		
		curl_setopt($ch,CURLOPT_TCP_NODELAY,true);		
		curl_setopt($ch,CURLOPT_COOKIESESSION,true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch,CURLOPT_REFERER,$lokasi);
		curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.52 Safari/537.36');
		curl_setopt($ch,CURLOPT_FOLLOWLOCATION,false);
		curl_setopt($ch,CURLOPT_HEADER,0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$y = curl_exec($ch);
		$tmpFile = uniqid();
		$file = $tmpFile.'.jpg';
		$x = fopen($file,"w");
		fwrite($x,$y);
		fclose($x);
		$up = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/'.$file;
		$xa = file_get_contents('https://bót.vn/api/ocr.php?key=294775256&img='.$up); //API
		//unlink($file);
		return $xa;
		curl_close($ch);
    }
	
 private function Submit($url,$fields)
    {
		$userAgents=array( 
			"Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0; chromeframe/11.0.696.57)",
		  "Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/4.0; GTB7.4; InfoPath.3; SV1; .NET CLR 3.1.76908; WOW64; en-US)",
		  "Mozilla/5.0 (Windows; U; MSIE 9.0; WIndows NT 9.0; en-US))",
		  "Mozilla/5.0 (Windows; U; MSIE 9.0; Windows NT 9.0; en-US)",
		  "Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 7.1; Trident/5.0)",
		  "Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; WOW64; Trident/5.0; SLCC2; Media Center PC 6.0; InfoPath.3; MS-RTC LM 8; Zune 4.7)",
		  "Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; WOW64; Trident/5.0; SLCC2; Media Center PC 6.0; InfoPath.3; MS-RTC LM 8; Zune 4.7",
			"Mozilla/5.0 (Windows NT 6.2; rv:21.0) Gecko/20130326 Firefox/21.0",
		  "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:21.0) Gecko/20130401 Firefox/21.0",
		  "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:21.0) Gecko/20130331 Firefox/21.0",
		  "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:21.0) Gecko/20130330 Firefox/21.0",
		  "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:21.0) Gecko/20100101 Firefox/21.0",
		  "Mozilla/5.0 (Windows NT 6.1; rv:21.0) Gecko/20130401 Firefox/21.0",
		  "Mozilla/5.0 (Windows NT 6.1; rv:21.0) Gecko/20130328 Firefox/21.0",
		  "Mozilla/5.0 (Windows NT 6.1; rv:21.0) Gecko/20100101 Firefox/21.0",
		  "Opera/9.80 (X11; Linux i686; U; en-GB) Presto/2.2.15 Version/10.00",
		  "Opera/9.80 (X11; Linux i686; U; en) Presto/2.2.15 Version/10.00",
		  "Opera/9.80 (X11; Linux i686; U; Debian; pl) Presto/2.2.15 Version/10.00",
		  "Opera/9.80 (X11; Linux i686; U; de) Presto/2.2.15 Version/10.00",
		  "Opera/9.80 (Windows NT 6.1; U; zh-cn) Presto/2.2.15 Version/10.00",
		  "Opera/9.80 (Windows NT 6.1; U; fi) Presto/2.2.15 Version/10.00",
		  "Opera/9.80 (Windows NT 6.1; U; en) Presto/2.2.15 Version/10.00",
			"Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_3; ru-ru) AppleWebKit/533.16 (KHTML, like Gecko) Version/5.0 Safari/533.16",
		  "Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_3; ko-kr) AppleWebKit/533.16 (KHTML, like Gecko) Version/5.0 Safari/533.16",
		  "Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_3; it-it) AppleWebKit/533.16 (KHTML, like Gecko) Version/5.0 Safari/533.16",
		  "Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_3; HTC-P715a; en-ca) AppleWebKit/533.16 (KHTML, like Gecko) Version/5.0 Safari/533.16",
		  "Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_3; en-us) AppleWebKit/534.1+ (KHTML, like Gecko) Version/5.0 Safari/533.16",
		  "Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_3; en-au) AppleWebKit/533.16 (KHTML, like Gecko) Version/5.0 Safari/533.16",
			"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.9 Safari/536.5",
		  "Mozilla/5.0 (Windows NT 6.0) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.36 Safari/536.5",
		  "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.3 (KHTML, like Gecko) Chrome/19.0.1063.0 Safari/536.3",
		  "Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.3 (KHTML, like Gecko) Chrome/19.0.1063.0 Safari/536.3",
		  "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_0) AppleWebKit/536.3 (KHTML, like Gecko) Chrome/19.0.1063.0 Safari/536.3",
		  "Mozilla/5.0 (Windows NT 6.2) AppleWebKit/536.3 (KHTML, like Gecko) Chrome/19.0.1062.0 Safari/536.3",
		  "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.3 (KHTML, like Gecko) Chrome/19.0.1062.0 Safari/536.3",
		  "Mozilla/5.0 (Windows NT 6.2) AppleWebKit/536.3 (KHTML, like Gecko) Chrome/19.0.1061.1 Safari/536.3",
		  "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.3 (KHTML, like Gecko) Chrome/19.0.1061.1 Safari/536.3"
		);
		$this->proxy1 = explode(':', $this->proxy);
		$field_string = http_build_query($fields);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION,false);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT,true);
		//curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
		//curl_setopt($ch, CURLOPT_PROXY, $this->proxy1[0]);
		//curl_setopt($ch, CURLOPT_PROXYPORT, $this->proxy1[1]);
        //curl_setopt($ch, CURLOPT_HTTPHEADER,array("REMOTE_ADDR: $this->proxy1[0]", "HTTP_X_FORWARDED_FOR: $this->proxy1[0]"));
        curl_setopt($ch, CURLOPT_TCP_NODELAY,true);       
		curl_setopt($ch, CURLOPT_REFERER,$url);		
		curl_setopt($ch, CURLOPT_TIMEOUT,5);		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_USERAGENT, $userAgents[$random]);
		curl_setopt($ch, CURLOPT_COOKIEFILE,'liker1.txt');
		curl_setopt($ch, CURLOPT_COOKIEJAR,'liker1.txt');
		curl_setopt($ch, CURLOPT_POST, count($field_string));
		curl_setopt($ch, CURLOPT_POSTFIELDS,$field_string);   
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$body = curl_exec($ch);
		if(!curl_errno($ch)){
		$info = curl_getinfo($ch);
		$redir = $info['redirect_url'];
		$code = $info['http_code'];
		curl_close($ch);
		return $redir." <br> Dengan Code = ".$code."";
		}
		unlink("liker1.txt");
		curl_close($ch);
	}
		private function BMN1($tok)
	{
		$I = "http://like.vipvui.vn/login/htclike.php?user=".$tok;
		$IIX = "http://like.vipvui.vn/login/captcha.php";
		$II = array(
		"capt" => $this->getCaptcha($IIX),
		"submit" => "Đăng Nhập Auto Like",
		);
		$III = "http://like.vipvui.vn/vnlikehtc.php?type=status";
		$IIII = array(
		"id"=> $this->id,
		"submit" => "Tang Like",
		);
		echo $this->Submit($I,$II);
		echo $this->Submit($III,$IIII);
	}
		public function CHAYLIKE($tok)
	{
		echo $this->thongtin();
		echo $this->BMN1($tok);
	}
}

function getid($uid,$tk){
$feed=json_decode(file_get_contents('https://graph.fb.me/'.$uid.'/feed?access_token='.$tk.'&limit=1'),true); 
$idstt = $feed['data'][0]['id'];
$kubon = explode("_", $idstt);
$iduser = $kubon[0];
$id = $kubon[1]; 
return $id;
}
include 'taikhoan.php';
$try = new curllikestarleo;
$tk = file_get_contents("".$linktoken."");
$id= getid($uid,$tk);
if (!$id){
echo '<font color="red"><font><font>Sai ID hoặc TOKEN chết</font></font></font>';
}else{
$try->id = $id; 
$try->CHAYLIKE(file_get_contents("".$linktoken."")); 
}
?>