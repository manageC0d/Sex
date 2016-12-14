<!DOCTYPE html>
<html lang="vi">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="content-type" content="text/html; UTF-8" />
		<meta http-equiv="cache-control" content="cache" />
		<meta http-equiv="content-language" content="vi" />
		<meta http-equiv="revisit-after" content="1 days" />
		<meta name="google-site-verification" content="fjYz3gijSKaxHid1tZHVJtBOwvZQpduScY36YpPZb58" />
		<meta name="google-translate-customization" content="cf71270cf62d50cb-4e3fbed6dada40a9-gc44146233a047483-b" />
		<meta name="alexaVerifyID" content="RaHW4iw0UpbUvGRhJr8a95ruzn0"/>
		<meta name="detectify-verification" content="a2d8cdb86af5352ff7f7da736642689d" />
		<!-- SEO -->
		<meta name="description" content="simi hệ thống chát tự động, dạy dỗ simi, dạy simi học, simi trả lời cmt fb, simi trả lời inbox fb" />
		<meta name="author" content="Mạnh Nghĩa" />
		<meta name="copyright" content="Mạnh Nghĩa" />
		<meta name="robots" content="index, follow" />
		<meta property="fb:admins" content="https://www.facebook.com/4" />
		<meta property="og:url" content="http://bót.vn/simi" />
		<meta property="og:type" content="website" />
		<meta property="og:description" content="simi hệ thống chát tự động, dạy dỗ simi, dạy simi học, simi trả lời cmt fb, simi trả lời inbox fb" />
		<meta property="og:locale" content="vi_VN" />
		<meta property="article:author" content="Mạnh Nghĩa" />
		<meta property="article:publisher" content="https://www.facebook.com/4" />
		<link type="image/x-icon" href="https://s3.amazonaws.com/capp.simsimi.com/images/makeup/6.png" rel="shortcut icon" />
		<title>Chát - Dạy Dỗ Simi</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	</head>
	<style>
		body {
		padding-top: 20px;
		}
	</style>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="panel panel-primary">
						<div class="panel-heading bg-light-blue">
							<h4>Dạy Sim nói</h4>
						</div>
						<div class="panel-body">
							<p>Hỏi: <input type="text" name="ask" value="" id="ask" class="form-control" placeholder="Câu hỏi.."/></p>
							<p>Đáp: <input type="text" name="ans" value="" id="ans" class="form-control" placeholder="Câu trả lời.."/></p>
							<button type="button"  id="simsimi"  class="btn btn-primary" onclick="post();"><i class="fa fa-exchange"></i> Dạy Sim</button>
							<p>
								<div id="star" style="display: none;">
									<div class="alert alert-info" id="message">
										
									</div>
								</div>
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="panel panel-primary">
						<div class="panel-heading bg-light-blue">
							<h4>Cập Nhật Simsimi</h4>
						</div>
						<div class="panel-body">
							<div class="alert alert-info">
								<?
									$src = file_get_contents("log_token.log");
									$src = explode('_', $src);
									$json = json_decode(file_get_contents('https://graph.facebook.com/me?access_token='.$src[0]),true);
									if ($json['id']) 
									{
										echo 'Trạng Thái Token: Hoạt Động Với ID Simsimi là '.$json['id'].'<br>';
										echo 'ID Sử Dụng: '.$src[1].'<br>';
										echo 'Biểu Tượng Trong Cmt: '.$src[2].' (1 có nghĩa là đang dùng, 0 có nghĩa là ko dùng)';
									}
									else
									{
										echo 'Bạn cần cập nhật lại thông tin! token nick simsimi đã die';
									}
								?>	
							</div>
							<div id="starss" style="display: none;">
									<div class="alert alert-info" id="messagess">
										
									</div>
							</div>
							<p>Tài Khoản: <input type="text" name="email" value="" id="email" class="form-control" placeholder="Tài Khoản FB Sim"/></p>
							<p>Mật Khẩu: <input type="text" name="password" value="" id="password" class="form-control" placeholder="Mật Khẩu FB Sim"/></p>
							<p>ID FB Dùng Sim: <input type="text" name="id" value="" id="id" class="form-control" placeholder="ID FB Của Bạn"/></p>
							<p>Biểu Tượng Trong Cmt Của Sim: <input type="text" name="emo" value="" id="emo" class="form-control" placeholder="Nhập 1 nếu muốn dùng biểu tượng hoặc 0 nếu không muốn"/></p>
							<button type="button"  id="get_tk"  class="btn btn-primary" onclick="post_token();"><i class="fa fa-exchange"></i> Cập Nhật</button>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="panel panel-primary">
						<div class="panel-heading bg-light-blue">
							<h4>SimSimi</h4>
						</div>
						<div class="panel-body">
							<p><input type="text"  value="" id="hoi" onkeydown="if(event.keyCode == 13) posts();" class="form-control" placeholder="Viết gì đi ạ.."/></p>
							<p><button class="btn btn-primary" type="button" id="simi" onclick="posts();"><i class="fa fa-exchange"></i> Hỏi</button></p>
							<div class="list-group" id="messages">
								<div class="alert alert-info" role="alert">
								<b>Simi trả lời màu <font color="#000000">ĐEN</font> là chưa được dạy. <br/>
								Simi trả lời màu <font color="#00FF00">XANH</font> là đã được dạy.</b>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					Author: Trần Thiện - Alone_Boy </br>
					Website: bót.vn/simi - VnZim.Biz </br>
					HÃY TÔN TRỌNG TÁC GIẢ BẰNG CÁCH GIỮ LẠI CÁC DÒNG TRÊN CŨNG NHƯ ĐỂ NHẬN THÊM NHIỀU CODE KHÁC FREE!
				</div>
			</div>
			<!-- /row -->
		</div>
	</body>
<script type="text/javascript">
function print(msg) {
	$('#message').html('');
	$('#message').append(msg);
	$('#message').fadeIn(999);
}
function post(){
	asks = document.getElementById('ask').value;
	anss = document.getElementById('ans').value;
	document.getElementById("simsimi").disabled = true;
	$("#simsimi").html('<i class="fa fa-refresh fa-spin"></i> Đang Tiến Hành');
	$("#message").html("");
	$('#star').show();
	print('<i class="fa fa-spinner fa-spin"></i> Vui Lòng Đợi ... ')
	$.post('post_sim.php', {
	ask: asks,
	type: "day",
	ans: anss
	}, function(data, status) {
	print(data);
	$("#simsimi").html('<i class="fa fa-exchange"></i> Dạy Sim');
	document.getElementById("simsimi").disabled = false;
	});

}

function posts(){
	hois = document.getElementById('hoi').value;
	if (!hois) {alert("Chưa nhập câu hỏi kìa cưng!"); return false;}
	document.getElementById("simi").disabled = true;
	$("#simi").html('<i class="fa fa-refresh fa-spin"></i> Đang Tiến Hành');
	$("#messages").html("");
	$.post('post_sim.php', {
	hoi: hois
	}, function(data, status) {
	$('#messages').html('');
	 $("#hoi").val('');
	$('<li class="list-group-item"><i class="fa fa-user" aria-hidden="true"></i> Bạn: '+hois+'</li>').insertAfter($("#messages"));
	$('<li class="list-group-item"><i class="fa fa-reddit-alien" aria-hidden="true"></i> Simsimi: '+data+'</li>').insertAfter($("#messages"));
	$("#simi").html('<i class="fa fa-exchange"></i> Hỏi');
	document.getElementById("simi").disabled = false;
	});

}
function post_token(){
	e = document.getElementById('email').value;
	p = document.getElementById('password').value;
	ids = document.getElementById('id').value;
	em = document.getElementById('emo').value;
	if (!e) 
	{
		alert("Vui lòng nhập tài khoản nick dùng làm simsimi");
		return false;
	}
	if (!p) 
	{
		alert("Vui lòng nhập mật khẩu nick dùng làm simsimi");
		return false;
	}
	if (!ids) 
	{
		alert("Vui lòng nhập ID người dùng simsimi");
		return false;
	}
	if (!em) 
	{
		alert("Bạn có muốn dùng biểu tượng không. 1 nếu muốn hoặc 0 nếu không muốn");
		return false;
	}
	$('#starss').show();
	document.getElementById("get_tk").disabled = true;
	$("#get_tk").html('<i class="fa fa-refresh fa-spin"></i> Đang Tiến Hành');
	$("#messagess").html("");
	$.post('post_token.php', {
	email: e,
	password: p,
	id: ids,
	emo: em
	}, function(data, status) {
	$('#messagess').html(data);
	$("#get_tk").html('<i class="fa fa-exchange"></i> Cập Nhật');
	document.getElementById("get_tk").disabled = false;
	});

}
</script>
</html>