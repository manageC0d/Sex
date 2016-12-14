<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$timen = date('H:i');
echo $timen;
require("../databasecsdl.php");
function auto($url){
   $curl = curl_init();
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($curl, CURLOPT_URL, $url);
   $ch = curl_exec($curl);
   curl_close($curl);
   return $ch;
   }

$dt = @mysqli_query($connection,"SELECT * FROM UpStt where thoigian = '".$timen."' ");
while ($dts = @mysqli_fetch_array($dt)){
$check = json_decode(file_get_contents('https://graph.facebook.com/me?access_token='.$dts['token']),true);
if(!$check['id']){
@mysqli_query($connection,"DELETE FROM UpStt
            WHERE
               token ='".$dts['token']."'
         ");
continue;
}
$type = $dts['theloai'];//Thể loại stt. 1-truyện cười, 2-truyện cười vova , 3-stt tình yêu , 4-stt tâm trạng , 5-triết lí & ý nghĩa csong
           if($type == 1){
                   $get = file_get_contents('http://luudiachiweb.com/gettruyen.asp');
                   $title = explode('<b>',$get);
                   $title = explode('&nbsp;</b>',$title[1]);
                   $title = trim($title[0]);
                   $cuoi = explode(' /><BR/>',$get);
                   $cuoi = explode('<p',$cuoi[1]);
                   $cuoi = trim($cuoi[0]);
                   $cuoi = str_replace('<BR />','
',$cuoi);
                   $cuoi = str_replace('&nbsp;',' ',$cuoi);
                   $msg = 'Bót•Vn - Truyện Cười: '.$title.'
----------------
'.$cuoi.'
----------------
';
           }
           if($type == 2){
                   $get = file_get_contents('http://luudiachiweb.com/gettruyen.asp?vova=1');
                   $title = explode('<b>',$get);
                   $title = explode('&nbsp;</b>',$title[1]);
                   $title = trim($title[0]);
                   $cuoi = explode(' /><BR/>',$get);
                   $cuoi = explode('<p',$cuoi[1]);
                   $cuoi = trim($cuoi[0]);
                   $cuoi = str_replace('<BR />','
',$cuoi);
                   $msg = 'Bót•Vn - Truyện Vova: '.$title.'
----------------
'.$cuoi.'
----------------
';          }
          if($type == 5){
                    $dn=file_get_contents('http://adnet.ucoz.com/informer/20-1');
                    $dn = str_replace('document.write("','',$dn);
                    $dn = str_replace('");','',$dn);
                    $dn = str_replace('','',$dn);
                    $dn = str_replace('<div align=\"right\"><i>','
',$dn);
                    $msg = str_replace('</i></div>','',$dn);
           }
           if($type == 3 OR $type == 4){
                    include 'sttlove.php';
           }



auto('https://graph.facebook.com/me/feed?access_token='.$dts['token'].'&message='.urlencode($msg).'&method=post');

}
?>