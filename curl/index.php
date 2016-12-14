<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="Bùi Mạnh Nghĩa"/>
<meta property="og:image" content="http://bót.vn/curl/banner.JPG">
<link rel="shortcut icon" href="http://i.imgur.com/RJutv0H.png">
<title>Hệ Thống Tools Facebook Online - Bót.Vn</title>
<link rel="stylesheet" type="text/css" href="http://xn--bt-5ja.vn/curl/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<script src="http://api.vina4u.pro/js/jquery.min.js" type="text/javascript"></script>

</head>
<body>
<div class="container">

<center><div class="row">
                <hr />
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="/">Trang chủ</a></li>
                    <li><a href="/curl/share">Tools Auto Share</a></li>
                    <li><a href="/curl/like">Tools Auto Like</a></li>
					<li><a href="/curl/cmt">Tools Auto CMT</a></li>
					<li><a href="/curl/gettoken">GET Token Full Quyền</a></li>
       </ul>
</div> </center>
<br/>   
<center><h1>Hệ Thống Tool Facbook - Bót.Vn</h1></center>
<br/>



<div class="row">

<div class="col-sm-6">

<div class="panel panel-primary">
  <div class="panel-heading">
<center><h4><b>
Curl Like
</b></h4></center></div>
<div class="panel-body">
<center>
<b color="black">Tình trạng: </b><b style="color:green">Hoạt Động <i class="fa fa-check-circle" style="color: #5cb85c;"></i></b>
</center>
<center>
<p><div class="btn btn-success" role="button"><a href="/curl/like">Sử Dụng</a></div></p>
</center>
</div>
</div>
<br/>


</div><div class="col-sm-6">

<div class="panel panel-primary">
  <div class="panel-heading">
<center><h4><b>
Curl Comment
</b></h4></center></div>
<div class="panel-body">
<center>
<b color="black">Tình trạng: </b><b style="color:green">Hoạt Động <i class="fa fa-check-circle" style="color: #5cb85c;"></i></b>
</center>
<center>
<p><div class="btn btn-danger" role="button"><a href="/curl/cmt">Sử Dụng</a></div></p>
</center>
</div>
</div>
<br/>

</div><div class="col-sm-6">

<div class="panel panel-primary">
  <div class="panel-heading">
<center><h4><b>
Curl Share
</b></h4></center></div>
<div class="panel-body">
<center>
<b color="black">Tình trạng: </b><b style="color:green">Hoạt Động <i class="fa fa-check-circle" style="color: #5cb85c;"></i></b>
</center>
<center>
<p><div class="btn btn-warning" role="button"><a href="/curl/share">Sử Dụng</a></div></p>
</center>
</div>
</div>
<br/>

</div><div class="col-sm-6">

<div class="panel panel-primary">
  <div class="panel-heading">
<center><h4><b>
Curl Sub
</b></h4></center></div>
<div class="panel-body">
<center>
<b color="black">Tình trạng: </b><b style="color:red">Bảo Trì <i class="fa fa-times-circle" style="color: red;"></i></b>
</center>
<center>
<p><div class="btn btn-primary" role="button"><a href="/">Sử Dụng</a></div></p>
</center>
</div>
</div>
<br/>

</div><div class="col-sm-6">


<div class="panel panel-primary">
  <div class="panel-heading">
<center><h4><b>
Simsimi Reply Cmt
</b></h4></center></div>
<div class="panel-body">
<center>
<b color="black">Tình trạng: </b><b style="color:red">Bảo Trì <i class="fa fa-times-circle" style="color: red;"></i></b>
</center>
<center>
<p><div class="btn btn-info" role="button"><a href="/">Sử Dụng</a></div></p>
</center>
</div>
</div>
<br/>

</div><div class="col-sm-6">

<div class="panel panel-primary">
  <div class="panel-heading">
<center><h4><b>
Tool lấy Token Full Quyền
</b></h4></center></div>
<div class="panel-body">
<center>
<b color="black">Tình trạng: </b><b style="color:green">Hoạt Động <i class="fa fa-check-circle" style="color: #5cb85c;"></i></b>
</center>
<center>
<p><div class="btn btn-success" role="button"><a href="/curl/gettoken">Sử Dụng</a></div></p>
</center>
</div>
</div>
<br/>

</div>
<div class="col-sm-12">
<?php
$url = 'http://api.vina4u.pro';
$get = file_get_contents($url);

$dau1 = strstr($get,'<div id="grabsim"></div>');
$cuoi1 = strstr($dau1,'<div id="endgrabsim"></div>');
$nd2 = str_replace($cuoi1,'',$dau1);
$nd2 = str_replace('<div id="grabsim"></div>','',$nd2);
$nd2 = str_replace('<h3 class="panel-title" style="text-align: center;">Bot Chat</h3>','<center><h3>Chát Với Bé Sim</h3></center>',$nd2);

$nd2 = str_replace('<input type="submit" name="btn-day" id="btn-day" class="btn btn-danger" value="Chat" />','<input type="submit" name="btn-day" id="btn-day" class="btn btn-danger" value="Gửi Nội Dung" />',$nd2);



echo $nd2;
?>
</div>
</div>


<script type="text/javascript">
$(document).ready(function (){
    
   
    $('form#fchat').submit(function(event) {
    	$('#loadchat').html('<i class="fa fa-check-circle" style="color: #5cb85c;"></i>');
        var formData = {
            'msg'              : $('#fchat input[name=msg]').val()
        };
		$('ul#listchat').prepend('<li class="list-group-item"><b>Bạn</b>: '+$('#fchat input[name=msg]').val()+'</li>');
        $.ajax({
            type        : 'POST',
            url         : 'http://api.vina4u.pro/api.php?type=ajax',
            data        : formData,
            dataType	: "jsonp",
      		crossDomain	: true,
            encode      : true
                        
        })
            
            .done(function(data) {
   				if(data == "error")
   				{
   					$('ul#listchat').prepend('<li class="list-group-item"><font color="red"><b>Bé Sim</b></font>: Câu này mình không biết trả lời, hãy dạy cho mình cách trả lời nhé. <a href="#day">Click here</a></li>');
   					$('#fday input[name=msg]').val($('#fchat input[name=msg]').val());
   					$('#loadchat').html('');
   				}
   				else
   				{
   					$('ul#listchat').prepend('<li class="list-group-item"><font color="red"><b>Bé Sim</b></font>: '+data+'</li>');
                	$('#fchat input[name=msg]').val('');
                	$('#loadchat').html('');
   				}
                

            });
        event.preventDefault();
    });
    
    

    
  
});

</script>


<br><br><br>
<center><img src="http://graph.facebook.com/100006617344881/picture" class="img-circle" /></center>
<center><h3><b style="color:red">Mạnh Nghĩa</b></h3></center>

</div>
</body>