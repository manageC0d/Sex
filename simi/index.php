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
				<div class="col-md-12">
					<div class="panel panel-primary">
						<div class="panel-heading bg-light-blue">
							<h4>SimSimi</h4>
						</div>
						<div class="panel-body">
							<p><input type="text"  value="" id="hoi" onkeydown="if(event.keyCode == 13) posts();" class="form-control" placeholder="Viết gì đi ạ.."/></p>
							<p><button class="btn btn-primary" type="button" id="simi" onclick="posts();"><i class="fa fa-exchange"></i> Hỏi</button></p>
							<div class="list-group" id="messages">
							</div>
						</div>
					</div>
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
</script>
</html>