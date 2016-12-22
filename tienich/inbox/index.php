<?php
session_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
		<title>#BotVN - Facebook Inbox Manager - Bót.Vn</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="description" content="#BotVN - Đọc tin nhắn với access token !">
		<meta name="keyword" content="#BotVN, đọc trộm tin nhắn facebook online , đọc trộm tin nhắn facebook , đọc tin nhắn face bằng token , đọc tin nhắn , read inbox , đọc trộm tin nhắn không hiện đã xem ,đọc inbox , đọc ib , đọc tin nhắn facebook , hệ thống đọc tin nhắn , hệ thông inbox , Auto like, sub, share ,tools facebook" />
		<meta name="author" content="#BotVN - Hệ Thống Đọc Tin Nhắn Số 1 VN">
		<meta name="robots" content="index, follow">
		<meta property="og:url" content="http://Bót.Vn">
		<meta property="og:description" content="#BotVN - Đọc tin nhắn với access token !">
		<meta property="og:title" content="#BotVN - Facebook Inbox Manager">
		<meta property="og:image" content="http://i.imgur.com/GsRwFeI.jpg">
<link rel="shortcut icon" href="http://fb.com/favicon.ico" />
		<!-- Bootstrap  -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<style type="text/css" >
.direct-chat-messages,.direct-chat.chat-pane-open .direct-chat-contacts{-webkit-transform:translate(0,0);-ms-transform:translate(0,0);-o-transform:translate(0,0)}.contacts-list>li:after,.direct-chat-msg:after{clear:both}.contacts-list-name,.direct-chat-name{font-weight:600}.direct-chat.chat-pane-open .direct-chat-contacts{transform:translate(0,0)}.direct-chat-messages{transform:translate(0,0);padding:10px;height:250px;overflow:auto}.direct-chat-msg,.direct-chat-text{display:block}.direct-chat-msg{margin-bottom:10px}.direct-chat-msg:after,.direct-chat-msg:before{content:" ";display:table}.direct-chat-contacts,.direct-chat-messages{-webkit-transition:-webkit-transform .5s ease-in-out;-moz-transition:-moz-transform .5s ease-in-out;-o-transition:-o-transform .5s ease-in-out;transition:transform .5s ease-in-out}.direct-chat-text{border-radius:5px;position:relative;padding:5px 10px;background:#d2d6de;border:1px solid #d2d6de;margin:5px 0 0 50px;color:#444}.direct-chat-text:after,.direct-chat-text:before{position:absolute;right:100%;top:15px;border:solid transparent;border-right-color:#d2d6de;content:' ';height:0;width:0;pointer-events:none}.direct-chat-text:after{border-width:5px;margin-top:-5px}.direct-chat-text:before{border-width:6px;margin-top:-6px}.right .direct-chat-text{margin-right:50px;margin-left:0}.right .direct-chat-text:after,.right .direct-chat-text:before{right:auto;left:100%;border-right-color:transparent;border-left-color:#d2d6de}.direct-chat-img{border-radius:50%;float:left;width:40px;height:40px}.right .direct-chat-img{float:right}.direct-chat-info{display:block;margin-bottom:2px;font-size:12px}.direct-chat-timestamp{color:#999}.direct-chat-contacts-open .direct-chat-contacts{-webkit-transform:translate(0,0);-ms-transform:translate(0,0);-o-transform:translate(0,0);transform:translate(0,0)}.direct-chat-contacts{-webkit-transform:translate(101%,0);-ms-transform:translate(101%,0);-o-transform:translate(101%,0);transform:translate(101%,0);position:absolute;top:0;bottom:0;height:250px;width:100%;background:#222d32;color:#fff;overflow:auto}.contacts-list>li{border-bottom:1px solid rgba(0,0,0,.2);padding:10px;margin:0}.contacts-list>li:after,.contacts-list>li:before{content:" ";display:table}.contacts-list>li:last-of-type{border-bottom:none}.contacts-list-img{border-radius:50%;width:40px;float:left}.contacts-list-info{margin-left:45px;color:#fff}.contacts-list-name,.contacts-list-status{display:block}.contacts-list-status{font-size:12px}.contacts-list-date{color:#aaa;font-weight:400}.contacts-list-msg{color:#999}.direct-chat-danger .right>.direct-chat-text{background:#dd4b39;border-color:#dd4b39;color:#fff}.direct-chat-danger .right>.direct-chat-text:after,.direct-chat-danger .right>.direct-chat-text:before{border-left-color:#dd4b39}.direct-chat-primary .right>.direct-chat-text{background:#3c8dbc;border-color:#3c8dbc;color:#fff}.direct-chat-primary .right>.direct-chat-text:after,.direct-chat-primary .right>.direct-chat-text:before{border-left-color:#3c8dbc}.direct-chat-warning .right>.direct-chat-text{background:#f39c12;border-color:#f39c12;color:#fff}.direct-chat-warning .right>.direct-chat-text:after,.direct-chat-warning .right>.direct-chat-text:before{border-left-color:#f39c12}.direct-chat-info .right>.direct-chat-text{background:#00c0ef;border-color:#00c0ef;color:#fff}.direct-chat-info .right>.direct-chat-text:after,.direct-chat-info .right>.direct-chat-text:before{border-left-color:#00c0ef}.direct-chat-success .right>.direct-chat-text{background:#00a65a;border-color:#00a65a;color:#fff}.direct-chat-success .right>.direct-chat-text:after,.direct-chat-success .right>.direct-chat-text:before{border-left-color:#00a65a}.right>.direct-chat-text{background:#3c8dbc;border-color:#3c8dbc;color:#fff}.direct-chat-primary .right>.direct-chat-text:before,.right>.direct-chat-text:after{border-left-color:#3c8dbc}.blur{box-shadow:0 0 20px 20px rgba(255,255,255,1);pointer-events:none;opacity:.6}*,:focus{outline:0}a::-moz-focus-inner,img,img::-moz-focus-inner,img:focus{border:0;outline:0}a:active,a:focus,a:hover,button,img,img:focus{outline:0;text-decoration:none}::-webkit-scrollbar{width:6px;height:6px}::-webkit-scrollbar-track-piece{background:#f2f4f8}::-webkit-scrollbar-button:end:increment,::-webkit-scrollbar-button:start:decrement{display:block;height:12px;background-color:#d5d9df}::-webkit-scrollbar-thumb:vertical{height:25px;background-color:#d5d9df}::-webkit-scrollbar-button:start:decrement{-webkit-border-top-right-radius:5px;-webkit-border-top-left-radius:5px}::-webkit-scrollbar-button:end:increment{-webkit-border-bottom-right-radius:5px;-webkit-border-bottom-left-radius:5px}.overlay{background:url(https://i.imgur.com/pRJNYdE.gif) center center no-repeat rgba(0,0,0,.5);float:right;width:85px;height:30px;z-index:999}.dim{height:100%;width:100%;position:fixed;left:0;top:0;z-index:99999999999!important;background-color:#000;cursor:wait;opacity:.05}img{border-radius:8px;-moz-border-radius:2px;-webkit-border-radius:2px;transition:all .3s ease;-webkit-transition:all .3s ease;-moz-transition:all .3s ease}
</style>

	</head>
	<body role="document">
<!-- Main -->
	<main>
	<div class="col-sm-12" >
	<h3>Đọc Tin Nhắn Qua Token <small>[<a href="https://developers.facebook.com/tools/debug/accesstoken/?app_id=41158896424" target="_blank" >GET TOKEN</a>]</small></h3>
	<hr/><b>Nhập MÃ TOKEN: </b>
	<div class="input-group" >
	<span class="input-group-addon" ><span class="glyphicon glyphicon-lock" ></span></span>
	<input type="text" placeholder="Access token :  EAAAACZAVC6ygBAKroCJrHS......" id="access_token" value="<?php echo $_SESSION['access_token'];?>" class="form-control" />
	<div class="input-group-btn" >
	<button type="button" class="btn btn-default" id="ancms" ><span class="glyphicon glyphicon-log-in" ></span> ENTER</button>
	</div>
	</div>
	<p></p>
<div id="ProGress" class="" style="top: 0px; left: 0px; position: fixed;"><div style="overflow: hidden; display: none;" class="overlay"></div></div>
<div class="dim" style="display: none;"></div>
	<div class="row" style="display:none">
	<div class="col-sm-4 ancms" >
	<div class="panel panel-default">
			<div class="panel-heading">
			<span class="glyphicon glyphicon-inbox" ></span> Inbox <div class="pull-right" ><span class="badge" id="countmsg" >0</span></div>
			</div>
			<div class="panel-body"  >
			<div class="input-group" >
			<input type="text" class="form-control" id="input_search" placeholder="Search...." />
			<div class="input-group-btn" >
			<button type="button" id="search" class="btn btn-default" ><span  class="glyphicon glyphicon-search" ></span></button>
			</div>
			</div>
						</div>
			<div class="list-group" >
			<div id="select" style="overflow-y: auto; max-height: 280px;" ></div>
			<div class="search-empty" style="display:none" ><span class="list-group-item"  ><b>Không có kết quả</b></span></div>
			</div>
			</div>
	</div>
	<div class="col-sm-8">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<span class="glyphicon glyphicon-user"></span> <span id="user_inbox" >Mạnh Nghĩa</span><div class="pull-right" ><span class="badge" id="ducan">9999</span></div>
			</div>
			<ul class="list-group" >
			<div class="panel-body"  style="overflow-y: auto; max-height: 300px;">

			<div class="direct-chat-messages"  id="inbox_main" >
                  </div>
			</div>
			</ul>
			<div class="panel-footer">
				<button type="button" id="download"  class="btn btn-primary" >Save conversation </button>
				<div class="pull-right" >
				<button type="button" id="reload" class="btn btn-primary" >Reload</button>
				</div>
			</div>
		</div>
	</div>
</div> <!--/row-->

			</div>
</main>
<!-- Javascript -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js" ></script>
<script type="text/javascript" src="b.php"></script>
</script-->
<?php
include './foot.php';
?>
</body>
</html>