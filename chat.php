<?php
session_start();
hienChatbox();

if($_POST[message]){
if($_SESSION['id'] == NULL) die('<script type="text/javascript">toarst("error","Đăng nhập đi bạn hiền :P","Lời Nhắn")</script>');
$message=htmlentities($_POST[message]);
$xxx=array('cc','cặc','ngu','loz','con mẹ mày','sủa','đòi','web như cc','địt','mẹ','lồn','cac','lon','cái loz','cái lồn','con cặc','địt mẹ mày','con me may',);
foreach($xxx as $xn=> $chuibay){
if(ereg($chuibay,strtolower($message))){
$camchuibay=true;
}
}
if($camchuibay){
print '<script type="text/javascript">toarst("error","Không chửi bậy, quảng cáo trên Website !!!","Lời Nhắn")</script>';
}else{
luuNoidung($_SESSION['id'],$_SESSION['name'],$message); 
print '<script type="text/javascript">toarst("success","Gửi Tin Nhắn Thành Công.","Lời Nhắn")</script><script type="text/javascript">check()</script>';
}
}

function ngaygio() {
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $weekday = date("l");
    $weekday = strtolower($weekday);
    switch($weekday) {
        case 'monday':
            $weekday = 'Thứ Hai';
            break;
        case 'tuesday':
            $weekday = 'Thứ Ba';
            break;
        case 'wednesday':
            $weekday = 'Thứ Tư';
            break;
        case 'thursday':
            $weekday = 'Thứ Năm';
            break;
        case 'friday':
            $weekday = 'Thứ Sáu';
            break;
        case 'saturday':
            $weekday = 'Thứ Bảy';
            break;
        default:
            $weekday = 'Chủ Nhật';
            break;
    }
    return $weekday.' - '.date('H:i');
}

function luuNoidung($id,$name,$message){
$date = ngaygio();
$data[] = array(
'id' => $id,
'name' => $name,
'message' => $message,
'date' => $date,
);
if(file_exists('chat.txt')){
$view = json_decode(file_get_contents('chat.txt'),true);}else{ $view = array();}
$x=json_encode(array_merge($data,$view));
$f = fopen('chat.txt','w');
fwrite($f,$x);
fclose($f);
}

function hienChatbox(){
$data=json_decode(file_get_contents('chat.txt'),true);
require("./system/emoticon.php");

for($i=0;$i<15;$i++){
if($data[$i]){   
//$data[$i][name] = str_replace('Hoàng Tử','<font color="#8f0b0b">Hoàng Tử</font>', $data[$i][name]);
print '
                                        <a href="#">
                                            <div class="inbox-item">
                                                <div class="inbox-item-img"><img src="http://graph.facebook.com/'.$data[$i][id].'/picture" width="40" class="img-circle" alt=""></div>
                                                <p class="inbox-item-author"><a href="https://facebook.com/'.$data[$i][id].'" target="_blank">'.$data[$i][name].'</a></p>
                                                <p class="inbox-item-text">'.strtr($data[$i][message], $emoticon).'</p>
                                                <p class="inbox-item-date">'.$data[$i][date].'</p>
                                            </div>
                                        </a>
';
}
}
}


?>