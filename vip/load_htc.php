<?php
$taikhoan = file_get_contents("./taikhoancuavip.txt");
$data = explode("|", $taikhoan);
$email = $data[0];
$pass  = $data[1];
$thongtin  =  array(
'email' => $email,
'pass' => $pass,
'apps' =>'41158896424',
);



class bot{
private $thongtin;
function __construct($thongtin){
   $this->pass = $thongtin['pass'];
   $this->email =$thongtin['email'];
   $this->apps =$thongtin['apps'];
    }


private function _req($url,$type=null,$fields=null){
   $opts = array(
            19913 => 1,
            10002 => $url,
            10018 => 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) coc_coc_browser/55.2.126 Chrome/49.2.2623.126 Safari/537.36',
            );
   $ch=curl_init();
   if($type){
       if($type == 1){
              $opts[10082] = 'log_htc.txt';
              }
       if($type == 3){
              $opts[42] = 1;
             }
       $opts[10031] = 'log_htc.txt';
    }
  if($fields){
      $opts[47] = true;
      $opts[10015] = $fields;
      }
   curl_setopt_array($ch,$opts);
   $result = curl_exec($ch);
   curl_close($ch);
   return $result;
  }


public function setToken(){
   $url = 'https://developers.facebook.com/tools/debug/accesstoken/?app_id='.$this->apps;
   
   $getToken = $this->_req($url,3); 
//echo $getToken;
   if(preg_match('/name="q" value="(.*?)" aria-label="Nh&#x1ead;p/',$getToken,$match)){
       $accessToken = $match[1];
       }
   if($accessToken){
       $this->saveFile('token_htc.txt',$accessToken);
       return  $accessToken;
       }else{
       return false;
       }
   }

private function saveFile($x,$y){
   $f = fopen($x,'w+');
        fwrite($f,$y);
        fclose($f);
   }
private function getUrl($domain,$dir,$uri=null){
    if($uri){
         foreach($uri as $key =>$value){
             $parsing[] = $key . '=' . $value;
                }
             $parse = '?' . implode('&',$parsing);
                }
     return 'https://' . $domain . '.facebook.com/' . $dir . $parse; 
       }


public function login(){
  $login = array(
     'pass' => $this -> pass,
     'email' => $this -> email,
     'login'  => 'Login',
             );
  $lg = $this->_req($this->getUrl('m','login.php'),1,$login);
//if($lg != null) unlink('log_htc.txt');
   }

}

$bot = new bot($thongtin);

if($bot->setToken()){
    echo $bot->setToken();
    }else{
	unlink('log_htc.txt');
    $bot->login();
    }
?>