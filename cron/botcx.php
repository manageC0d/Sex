<?php
set_time_limit(0);
ob_start('ob_gzhandler');
require("../databasecsdl.php");
$gettoken = @mysqli_query($connection,"SELECT * FROM `BotCx` ORDER BY RAND() LIMIT 0,5");
while ($row = @mysqli_fetch_array($gettoken)){
$matoken= $row['token'];
$check = json_decode(file_get_contents('https://graph.facebook.com/me?access_token='.$matoken),true);
if(!$check['id']){
@mysqli_query($connection,"DELETE FROM BotCx
            WHERE
               token ='".$matoken."'
         ");
continue;
}
$mess =  $row['camxuc'];
$likecmt =  $row['likecmt'];
$idfb = $row['idfb'];
like($idfb,$likecmt,$matoken,$mess);
}

function _req($url){
   $opts = array(
            19913 => 1,
            10002 => $url,
            10018 => 'like4vn.com',
            );
   $ch=curl_init();
   curl_setopt_array($ch,$opts);
   $result = curl_exec($ch);
   curl_close($ch);
   return $result;
  }

function getData($dir,$token,$params){
    $param = array(
        'access_token' => $token,
        );
   if($params){ 
       $arrayParams=array_merge($params,$param);
       }else{
       $arrayParams =$param;
       }
   $url = getUrl('graph',$dir,$arrayParams);
   $result = json_decode(_req($url),true);
   if($result[data]){
       return $result[data];
       }else{
       return $result;
       }
   }

function getUrl($domain,$dir,$uri=null){
   if($uri){
       foreach($uri as $key =>$value){
           $parsing[] = $key . '=' . $value;
           }
       $parse = '?' . implode('&',$parsing);
       }
   return 'https://' . $domain . '.facebook.com/' . $dir . $parse; 
   }

function getLog($x,$y){
if(!is_dir('log')){   mkdir('log');   }

   if(file_exists('log/lkk_'.$x)){
       $log=file_get_contents('log/lkk_'.$x);
       }else{
       $log=' ';
       }

  if(preg_match($y[id],$log)){
       return false;
       }else{
if(strlen($log) > 5000){
   $n = strlen($log) - 5000;
   }else{
  $n= 0;
   }
       saveFile('log/lkk_'.$x,substr($log,$n).' '.$y[id]);
       return true;
      }
 }

function saveFile($x,$y){
   $f = fopen($x,'w');
             fwrite($f,$y);
             fclose($f);
   }


function like($me,$c,$token,$mess){
$home=getData('me/home',$token,array(
   'fields' => 'id,from,comments.limit(5),comments.id',
   'limit' => 5,
   )
);

foreach($home as $post){
     if($post[id]){ if(getLog($me,$post) && $me!=$post[from][id]){
          print getData($post[id].'/reactions',$token,array(
                        'type' => ''.$mess.'',
                        'method' => 'post',
                         )
                 );

           } }
if($c==1){
$b = count($post[comments][data]);

if($b >0){
if( $b > 5){ $a = $b - 5; }else{ $a=0; }
for($i=$a;$i<$b;$i++){ if($post[comments][data][$i][id]){
if(getLog($me,$post[comments][data][$i])){
getData($post[comments][data][$i][id].'/reactions',$token,array('type' => ''.$mess.'','method'=>'post'));
}
}
}
}
}
}
}
?>