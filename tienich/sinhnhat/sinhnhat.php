<?php
$id = $_GET['id'];
$mo = @file('dat.dat');
$arr = explode('|',$mo[$id]);
$ngay = $arr[0];
$thang = $arr[1];
$nam = $arr[2];
$name = $arr[3];
$ten = $arr[4];
$name1 = $arr[5];
$ten1 = $arr[6];
echo'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><script language="javascript" src="chuot.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Happy Birthday '.$ten1.''.$name1.' </title>
<style type="text/css">
body{
	background:#000;
	font-family:Verdana, Geneva, sans-serif;
	font-size:14px;
	color:#fff;
}
#wrapper{
	margin:0 auto;
	margin-top:80px;
	width:890px;
}
#col1{
	float:left;
	width:500px;
}
#col2{
	float:left;
	width:380px;
}
h1{
	font-size:18px;
	margin:5px 0px;
	
}
.date, .title{
	text-align:center;
}
.date{
	color:#ccc;
	font-size:11px;
}
#content p{
	
}
#content{
	color:#dcdcdc;
	font-size:11px;
	margin-top:25px;
}
#nav li{
	display:inline;
	margin-right:15px;
}
#nav ul{
	margin:inherit 0;
	display:block;
	text-align:center;
}
li a{
	color:#e68787;
	text-decoration:none;
}
.snhg {
	height:43px;
	width:114px;
	text-align:center;
	font-size:15px;
	color:#FFFFFF;
	font-weight:bold;
	cursor:pointer;
	border:none;
	padding-bottom: 6px;
}
</style>
</head>
<SPAN style="top: 0px; left: 11px;position: absolute; width: 800px; height: 600px; z-index:1"> <EMBED pluginspage=http://www.macromedia.com/go/getflashplayer src="http://imgfree.21cn.com/free/flash/7.swf" width=800 height=600 type=application/x-shockwave-flash wmode="transparent" menu="false" ;; quality="high"></EMBED></SPAN>

<body>
<div id="wrapper">
	<div id="col1">
    	<img src="cil/sn.jpg">
    </div><!--/#col1-->
    
    <div id="col2">
    	<div class="title"><h1>Chúc Mừng Sinh Nhật '.$ten1.''.$name1.'</h1></div>
        <div class="date">'.$ngay.'/'.$thang.'/'.$nam.' -> '.$ngay.'/'.$thang.'/2011</div>
        <div id="content">
	    <p>Thời gian trôi thật nhanh, năm nay '.$name1.' thêm 1 tuổi nữa rồi nhỉ ?</p>
           <img src="cil/qua.gif"</img>.<img src="cil/qua.gif"</img>.<img src="cil/qua.gif"</img>.<img src="cil/qua.gif"</img>.<img src="cil/qua.gif"</img>
            <p><br>
            <b><font size="2" color="#FBF806">I.Lời đầu tiên '.$name.' chúc '.$name1.' có một buổi tối sinh nhật thật ý nghĩa và tràn đầy niềm vui:</font><br></b><br>

<b><font color="red">1.</font>  Chúc '.$name1.' luôn ấm áp, cả bên trong lẫn bên ngoài.<br>
<font color="red">2.</font>  Tuổi mới ăn no chóng lớn, tiền bạc đầy nhà, kiến thức đầy đặn  <br>
<font color="red">3.</font>  Chúc '.$name1.' tuổi mới ngày càng xinh hơn và luôn có nhiều người theo đuổi.<br>
<font color="red">4.</font> Cầu mong những gì tốt đẹp nhất và hạnh phúc nhất sẽ đến với '.$name1.' trong tuổi mới.
và gặp nhiều may mắn trong cuộc sống.<br>
<blink><font color="red">=></font></blink>Cảm ơn đã đọc những lời này của '.$name.'. Chúc '.$name1.' có những gì mà '.$name1.' muốn ^^! Hỳ hỳ<b></br>
            <p style="text-align:right;margin-right:25px"><span style="margin-right:5px;">Thân bạn của '.$name1.' . '.$ten.' '.$name.'</span><br>  </p>
            <p style="display:block;text-align:center"> 
				<iframe scrolling="no" width="300" height="61" src="http://mp3.zing.vn/embed/song/ZW6A796B?start=true" frameborder="0" allowfullscreen="true"></iframe>
           </p>
            
        </div>
    </div><!--/#col1-->
   


</div><!--/#wrapper-->


</body></html>';
?>