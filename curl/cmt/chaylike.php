<meta charset="UTF-8">
<meta http-equiv="refresh" content="0">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CUrl CMT - Online</title>
<link rel="stylesheet" href="/css/style.css" type="text/css" media="all">
</head>
<?php
set_time_limit(0);
 error_reporting(0);
  class bcs
{

   public $id;
private function get_html($url) {
	$cookies = dirname(__FILE__).'/liker.txt';
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_COOKIEJAR, $cookies);  
	curl_setopt($ch, CURLOPT_COOKIEFILE, $cookies);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 2);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_FAILONERROR, 0);
    $data = trim(curl_exec($ch));
    curl_close($ch);
	return $data;
}
 private function Submit($url,$fields)
    {
		$random_IP = "".mt_rand(0,255).".".mt_rand(0,255).".".mt_rand(0,255).".".mt_rand(0,255);
		$cookies = dirname(__FILE__).'/liker.txt';
		$field_string = http_build_query($fields);
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);
                curl_setopt($ch,CURLOPT_FRESH_CONNECT,true);
                curl_setopt($ch,CURLOPT_TCP_NODELAY,true);
		curl_setopt($ch,CURLOPT_HTTPHEADER,array("REMOTE_ADDR: $random_IP", "HTTP_X_FORWARDED_FOR: $random_IP"));		
		curl_setopt($ch,CURLOPT_REFERER,$url);          
		curl_setopt($ch,CURLOPT_TIMEOUT,5);		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 10.0; rv:49.0) Gecko/20100101 Firefox/49.0');
		curl_setopt($ch,CURLOPT_COOKIEFILE,$cookies);
		curl_setopt($ch,CURLOPT_COOKIEJAR,$cookies);
		curl_setopt($ch, CURLOPT_POST, count($field_string));
		curl_setopt($ch,CURLOPT_POSTFIELDS,$field_string);   
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$body = curl_exec($ch);
		if(!curl_errno($ch)){
		$info = curl_getinfo($ch);
		$redir = $info['redirect_url'];
		$code = $info['http_code'];
		curl_close($ch);
		return "<br>".$redir;
		}
   }
private function dmm1($tok)
	{
	$II = "http://hublaalike.com/verify.php";
        $III = array(
        "user" => $tok,
        );
        $IIII = "http://hublaalike.com/englishcommenter.php?type=custom";
        $IIIII = array(
        "id" => $this->id,
        "submit" => "Submit",
        );
		echo $this->Submit($II,$III);
		echo $this->Submit($IIII,$IIIII);	     	
	  }
private function dmm2($tok)
	{
	
		$II = "http://likelo.in/login.php?user=".$tok;
		$III = array(
		"null" => "null",
		);
		$IIII = "http://likelo.in/commenter.php?type=custom";
		$IIIII = array(
		"id" => $this->id,
		"submit" => "Submit",
		);
		echo $this->Submit($II,$III);
		echo $this->Submit($IIII,$IIIII);
	  } 
 
private function dmm3($tok)
	{
        $II = "http://postlikes.in/login.php?user=".$tok;
        $III = array(
        "null" => "null",
        );
        $IIII = "http://postlikes.in/commenter.php?type=custom";
        $IIIII = array(
        "id" => $this->id,
        "submit" => "Submit",
        );
		echo $this->Submit($II,$III);
		echo $this->Submit($IIII,$IIIII);	
	  }
private function dmm4($tok)
	        {
		        $II = "http://www.autolikerfb.in/login.php?access_token=".$tok;
                $III = array(
                "null" => "null",
                );
                $IIII = "http://www.autolikerfb.in/?type=custom";
                $IIIII = array(
                "id" => $this->id,
                "submit" => "Submit",
                );
				echo $this->Submit($II,$III);
                echo $this->Submit($IIII,$IIIII);
		    }
private function dmm5($tok)
	{
		$II = "http://www.superlike.net/login.php?user=".$tok;
		$III = array(
		"null" => "null",
		);
		$IIII = "http://www.superlike.net/Comments.php?type=custom&lang=";
		$IIIII = array(
		"id" => $this->id,
		"submit" => "Submit",
		);
		echo $this->Submit($II,$III);
		echo $this->Submit($IIII,$IIIII);	     	
	  }
private function dmm6($tok)
	        { 
		        $II = "http://www.on-liker.com/verify.php?user=".$tok;
                $III = array(
                "null" => "null",
                );
                $IIII = "http://www.on-liker.com/ecomment.php?type=custom";
                $IIIII = array(
                "id" => $this->id,
                "submit" => "Submit",
                );
				echo $this->Submit($II,$III);
                echo $this->Submit($IIII,$IIIII);
		    }  
private function dmm7($tok)
	{
		$II = "http://auto-fb-tools.com/verify.php?user=".$tok;
        $III = array(
        "null" => "null",
        );
        $IIII = "https://auto-fb-tools.com/englishcommenter.php?type=custom";
        $IIIII = array(
        "id" => $this->id,
        "submit" => "Submit",
        );
	echo $this->Submit($II,$III);
	echo $this->Submit($IIII,$IIIII);
	  }
private function dmm8($tok)
        {
				$II = "http://autoliker4fb.com/verified.php?user=".$tok;
                $III = array(
                "null" => "null",
                );
                $IIII = "http://autoliker4fb.com/dashboard.php?type=custom";
                $IIIII = array(
                "id" => $this->id,
                "submit" => "submit",
                );
                echo $this->Submit($II,$III);
                echo $this->Submit($IIII,$IIIII);       
        }

private function dmm9($tok)
		{
                $II = "http://www.balkan-autoliker.com/index.php";
                $III = array(
                "token" => $tok,
                );
                $IIII = "http://www.balkan-autoliker.com/custom.php";
                $IIIII = array(
                "postid" => $this->id,
				"br_lajkova" => "30",
                "submit" => "Like",
                );
                echo $this->Submit($II,$III);
                echo $this->Submit($IIII,$IIIII);         
		}
private function dmm10($tok)
	{
		  $II = "http://www.sexyliker.com/login.php?user=".$tok;
		$III = array(
		"null" => "null",
		);
		$IIII = "http://www.sexyliker.com/commenter.php?type=custom";
		$IIIII = array(
                "id" => $this->id,
                "submit" => "Submit",
                "count" => "00001,00010000",
                );
		echo $this->Submit($II,$III);
		echo $this->Submit($IIII,$IIIII);	
	  }
private function dmm11($tok)
	{
        $II = "http://postlikes.in/login.php?user=".$tok;
        $III = array(
        "null" => "null",
        );
        $IIII = "http://postlikes.in/commenter.php?type=custom";
        $IIIII = array(
        "id" => $this->id,
        "submit" => "Submit",
        );
		echo $this->Submit($II,$III);
		echo $this->Submit($IIII,$IIIII);	
	  }
private function dmm12($tok)
	{
		$II = "http://auto-fb-tools.com/verify.php?user=".$tok;
        $III = array(
        "null" => "null",
        );
        $IIII = "https://auto-fb-tools.com/englishcommenter.php?type=custom";
        $IIIII = array(
        "id" => $this->id,
        "submit" => "Submit",
        );
	echo $this->Submit($II,$III);
	echo $this->Submit($IIII,$IIIII);
	  }
private function dmm13($tok)
        {
				$II = "http://fbautolikerapp.com/verify.php?user=".$tok;
                $III = array(
                "pass" => $tok,
                );
                $IIII = "http://fbautolikerapp.com/dashboard.php?type=custom";
                $IIIII = array(
                "id" => $this->id,
                "submit" => "Submit",
                );
		        echo $this->Submit($II,$III);
		        echo $this->Submit($IIII,$IIIII);       
        }

   private function dmm14($tok)
	        {
		        $II = "http://fblikeaddicts.com/test2/Go.login.php?user=".$tok;
                $III = array(
                "null" => "null",
                );
                $IIII = "http://fblikeaddicts.com/test2/englishcommenter.php?type=custom";
                $IIIII = array(
                "id" => $this->id,
                "submit" => "Submit",
                );
				echo $this->Submit($II,$III);
                echo $this->Submit($IIII,$IIIII);
		    }

private function dmm15($tok)
        {
                $II = "http://www.moelikes.net/official/login.php?access_token=".$tok;
                $III = array(
                "null" => "null",
                );
                $IIII = "http://www.moelikes.net/official/index.php?type=custom";
                $IIIII = array(
                "id" => $this->id,
                "limit" => "250",
                "pancal" => "Submit",
                );
                echo $this->Submit($II,$III);
                echo $this->Submit($IIII,$IIIII);
           
        }

   		
 public function vn($tok)
	{
  ignore_user_abort(true);
	while (@ob_end_flush());      
	ob_implicit_flush(true);
$fp = fopen('liker.txt', 'w ');
fclose($fp);	
echo $this-> dmm20($tok);
echo $this-> dmm21($tok); 
echo $this-> dmm23($tok); 
echo $this-> dmm24($tok); 
echo $this-> dmm25($tok); 
echo $this-> dmm26($tok);

}

 public function all($tok)
	{
  ignore_user_abort(true);
	while (@ob_end_flush());      
	ob_implicit_flush(true);
$fp = fopen('liker.txt', 'w ');
fclose($fp);
echo $this-> id;
echo $this-> dmm1($tok);
echo $this-> dmm2($tok);
echo $this-> dmm3($tok);
echo $this-> dmm4($tok);
echo $this-> dmm5($tok);
echo $this-> dmm6($tok);
echo $this-> dmm7($tok);
echo $this-> dmm8($tok); 
echo $this-> dmm9($tok); 
echo $this-> dmm10($tok); 
echo $this-> dmm11($tok);
echo $this-> dmm12($tok); 
echo $this-> dmm14($tok); 
echo $this-> dmm15($tok);
echo $this-> dmm16($tok);
echo $this-> dmm17($tok);
echo $this-> dmm18($tok);
echo $this-> dmm20($tok);
echo $this-> dmm21($tok); 
echo $this-> dmm23($tok); 
echo $this-> dmm24($tok); 
echo $this-> dmm25($tok); 
echo $this-> dmm26($tok);
echo $this-> dmm27($tok);
echo $this-> dmm28($tok);
echo $this-> dmm29($tok);
echo $this-> dmm30($tok);
echo $this-> dmm31($tok);
echo $this-> dmm32($tok);
echo $this-> dmm33($tok);
echo $this-> dmm34($tok);
echo $this-> dmm35($tok);
echo $this-> dmm36($tok);
 }
}
include'config.php';
$uid = $_GET['idf'];
$user = $_GET['u'];
$pass = $_GET['p'];
 $try = new bcs;
 $token= file_get_contents(''.$domain.'/token/htc.php?laytoken=ok&user='.urlencode($user).'&pass='.urlencode($pass).'');
 $feed=json_decode(file_get_contents('https://graph.fb.me/'.$uid.'/feed?access_token='.$token.'&limit=1'),true); 
for($i=0;$i<count($feed['data']);$i++){ // Parse ID
$id = $feed['data'][$i]['id'];  
$sllike = $feed['data'][$i]['likes']['count']; 
} 
$stt = explode("_", $id);
$iduser= $stt[0];
$post_id= $stt[1];
if(!$post_id){
	echo "Không Xác Đinh Được ID Người Dùng Này ! Hãy Vui Lòng Kiểm Tra Lại";
}else{
echo "ID Status : " .$post_id. "</br>" ;
if(isset($sllike)) echo "Số like hiện tại : " .$sllike. "<br>" ;
echo "<hr><hr>";	
$try->id = $post_id;
if($location=='3'){
$try->vn($token); 
}else{
	$try->all($token); 
}
} 
?>