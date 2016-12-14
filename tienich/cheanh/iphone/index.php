<!doctype html>
<html lang="en" xmlns:fb="https://www.facebook.com/2008/fbml">
<head>
    <meta charset="utf-8">
    <title>Chế ảnh tin nhắn Iphone sành điệu | Tạo ảnh tin nhắn IOS</title>
    <meta name="description" content="Tạo tin nhắn Iphone thật dễ dàng với gian diện cực đẹp mắt . Chia sẻ lên Mạng xã hội, Troll bạn bè quá dễ dàng ." />
    <meta name="keyword" content="Chế ảnh, Chế ảnh Online, Tạo tin nhắn Iphone, Chế ảnh Iphone, Ảnh tin nhắn Iphone, Chế ảnh đẹp, Chế ảnh hài hước" />
    <meta property="og:title" content="Chế ảnh tin nhắn Iphone sành điệu | Tạo ảnh tin nhắn IOS" />
    <meta property="og:description" content="Tạo tin nhắn Iphone thật dễ dàng với gian diện cực đẹp mắt . Chia sẻ lên Mạng xã hội, Troll bạn bè quá dễ dàng ." />
    <meta property="og:image" content="http://Bót.Vn/iphone/assets/img/ips.png" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Chế ảnh tại Bót.Vn" />
    <meta property="og:url" content="http://Bót.Vn/" />
    <meta property="fb:app_id" content="" />
    <link href="./assets/img/favicon.png" rel="icon" />
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="assets/css/elusive-webfont.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="assets/css/ui-lightness/jquery-ui-1.10.4.custom.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/app.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" media="screen" />
    <script type="text/javascript" src="assets/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-ui-1.10.4.custom.min.js"></script>
    <script type="text/javascript" src="assets/js/html2canvas.js"></script>
    <script type="text/javascript" src="assets/js/jquery.plugin.html2canvas.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.hcsticky-min.js"></script>
    <script type="text/javascript" src="assets/js/global.min.js"></script>
</head>

<body>
    <div id="fb-root"></div>
	<div id="fb-root"></div>
	<script>
	 window.fbAsyncInit = function() {
	  FB.init({
		appId      : '283095011890855',
		status     : true, // Check login status
		cookie     : true, // Enable cookies to allow the server to access the session
		xfbml      : true  // Parse XFBML
	  });
	  };

	  // Load the SDK asynchronously
	  (function(d){
	   var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
	   if (d.getElementById(id)) {return;}
	   js = d.createElement('script'); js.id = id; js.async = true;
	   js.src = "//connect.facebook.net/vi_VN/all.js";
	   ref.parentNode.insertBefore(js, ref);
	  }(document));
	</script>
    <div id="top-panel">
        <div class="row">
            <div class="col-md-4 text-left text-white text-sm p-l m-t-n-sm hidden-sm hidden-xs"> </div>
            <div class="col-md-4 col-xs-4">
                <a href="http://bót.vn"><img src="assets/img/logo.png" onclick="renderImg();"> </a>
            </div>
            <div class="col-md-4 col-xs-4 text-right">
                <div style="display:block" id="dlbtn">
				<span class="text-white text-xs m-r">Click vào đây để xem thành quả của bạn</span> 
					<a class="btn btn-success btn-sm" onclick="downloadImg();"><i class="fa fa fa-arrow-circle-down"></i> Tải ảnh / Download</a> 				
				</div>
            </div>
        </div>
    </div>
    <div id="left-panel" class="side-panel sticky-sidebar">
        <div id="startup-help">
            <div class="pull-left m-r-xl"><i class="fa fa-info-circle m-r-xs"></i> </div>Chỉnh sửa tin nhắn iPhone của bạn. Click vào biểu tượng để mở các tùy chọn và công cụ
            <br>
            <br><i class="fa fa-exclamation-circle m-r-xs"></i> Thêm ít nhất 1 tin nhắn để xem trước và sau đó có thể tải về</div>
        <section>
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"> <header> <i class="el-icon-adjust-alt"></i> <div> Cài đặt </div> </header> </a> </h4> </div>
                    <div id="collapse1" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="p-l-lg p-r-lg m-b-xl">
                                <div class="form-group text-center">
                                    <label for="exampleInput">Tên</label>
                                    <input type="text" class="form-control text-center inputVal" placeholder="Enter name" value="BMN.2312" id="name"> </div>
                                <div class="form-group text-center">
                                    <label for="exampleInput">Nhà mạng</label>
                                    <input type="text" class="form-control text-center inputVal" placeholder="Enter operator" value="VIETTEL" id="operator"> </div>
                                <div class="form-group text-center">
                                    <label for="exampleInput"><i class="glyphicon glyphicon glyphicon-time"></i> Đồng hồ</label>
                                    <input type="text" class="form-control text-center inputVal" placeholder="Enter clock" value="9:41 AM" id="clock"> </div>
                                <div class="form-group text-center">
                                    <label for="exampleInput">"Tin nhắn"</label>
                                    <input type="text" class="form-control text-center inputVal" placeholder='Enter word for "messages"' value="Tin nhắn" id="text-messages"> </div>
                                <div class="form-group text-center">
                                    <label for="exampleInput">"Liên hệ"</label>
                                    <input type="text" class="form-control text-center inputVal" placeholder='Enter word for "contact"' value="Liên hệ" id="text-contact"> </div>
                                <div class="form-group text-center">
                                    <label for="exampleInput">"Tin nhắn"</label>
                                    <input type="text" class="form-control text-center inputVal" placeholder='Enter word for "Text Message"' value="Tin nhắn Văn bản" id="text-textmessage"> </div>
                                <div class="form-group text-center">
                                    <label for="exampleInput">"Nút gửi"</label>
                                    <input type="text" class="form-control text-center inputVal" placeholder='Enter word for "Send"' value="Gửi" id="text-send"> </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="radio" name="expandIphone" value="true" checked> <span>Mở rộng khung tin nhắn</span> </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="radio" name="expandIphone" value="false"> <span>Giữ nguyên khung tin nhắn</span> </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="line m-t-none m-b-none"></div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse4"> <header class="c-3"> <i class="fa fa-play"></i> <div> Mức % pin </div> </header> </a> </h4> </div>
                    <div id="collapse4" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="p-l-lg p-r-lg m-b-xl">
                                <p>
                                    <label for="amount"> Mức % pin:</label>
                                    <input type="text" id="battery-slider-amount" style="border:0; color:#f6931f; font-weight:bold;width:50px;font-size:12px;margin-top:-8px;text-align:right;" class="pull-right" readonly> </p>
                                <div id="battery-slider"></div>
                                <br>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="battery-show-percent" checked> <span>Ẩn/Hiện %</span> </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="line m-t-none m-b-none"></div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"> <header class="c-1"> <i class="fa fa-signal"></i> <div> Kết nối </div> </header> </a> </h4> </div>
                    <div id="collapse2" class="panel-collapse collapse ">
                        <div class="panel-body">
                            <div class="p-l-lg p-r-lg m-b-xl">
                                <div class="checkbox">
                                    <label>
                                        <input type="radio" name="connectionType" value="empty" checked> <span>Rỗng</span> </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="radio" name="connectionType" value="3g"> <span>3G</span> </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="radio" name="connectionType" value="4g"> <span>4G</span> </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="radio" name="connectionType" value="wifi" checked> <span>WiFi</span> </label>
                                </div>
                                <div class="connection-slider connection-slider-wifi m-b"> <strong>Kết nối Wifi</strong> <img src="assets/img/wifi-3.png" id="wifi" class="pull-right m-r-xs">
                                    <div id="wifi-slider"></div>
                                </div>
                                <div class="connection-slider m-b"> <strong>Tín hiệu</strong> <img src="assets/img/3g-3.png" id="connection" class="pull-right m-r-xs">
                                    <div id="connection-slider"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="line m-t-none m-b-none"></div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse3"> <header class="c-2"> <i class="fa fa-comments"></i> <div> Tin nhắn </div> </header> </a> </h4> </div>
                    <div id="collapse3" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div class="p-l-lg p-r-lg m-b-xl">
                                <!-- <form id="upload_form" enctype="multipart/form-data" method="post" action="upload.php"> <div class="fileUpload btn btn-default btn-sm"> <span><i class="el-icon-picture"></i> Click here to upload image</span> <input type="file" class="upload" value="Upload image" name="image_file" id="image_file" accept="image/*" onchange="startUploading();" capture> </div> <div id="upload_response"></div> </form>-->
                                <div class="line"></div>
                                <div class="checkbox checkbox-grey">
                                    <label>
                                        <input type="radio" name="sender" value="grey" checked> <span>Xám</span> </label>
                                </div>
                                <div class="checkbox checkbox-green">
                                    <label>
                                        <input type="radio" name="sender" value="green"> <span>Xanh</span> </label>
                                </div>
                                <div class="checkbox checkbox-blue">
                                    <label>
                                        <input type="radio" name="sender" value="blue"> <span>Xanh Lam</span> </label>
                                </div>
                                <div class="checkbox checkbox-transparent">
                                    <label>
                                        <input type="radio" name="sender" value="transparent"> <span>Thời gian gửi</span> </label>
                                </div>
                                <textarea class="form-control" id="msg-content" style="height:50px;" placeholder="Nhập nội dung tin nhắn ..."></textarea>
                                <div class="m-t-xl text-center"> <a class="btn btn-primary sendMessage"><i class="fa fa-comment"></i> Thêm tin nhắn</a> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div id="center-panel">
        <div id="download-loading"> <i class="fa fa-mobile-phone fa-spin il"></i>
            <br> <strong>Đang tạo hình ảnh &amp; Link tải ảnh</strong>
            <br> <span class="text-o">Thím đừng nóng...</span> </div>
        <div id="download-result">
            <div class="row p-n m-n m-t-xl">
                <div class="col-md-6"> <i class="fa fa-save il m-t-xl"></i>
                    <br>                
					<div id="status-text">
                        <p class="h3 text-o">Nhấn <b>Tải về máy</b> để lưu ảnh về máy tính của bạn hoặc chuột phải vào ảnh và <b>Lưu ảnh</b> !</p>
                        <br> <a id="link-result" class="btn btn-success"><i class="fa fa-download"></i> Tải về máy</a>
					</div>
                    <div id="like-response"></div>
                    <br>
                    <br>
					<div id="status-text">
                        <p class="h4">Nhấn <b>Like</b> hoặc <b>Chia sẻ</b> để giới thiệu đến bạn bè của bạn nhé !</p>
						<p><div class="fb-like" data-href="http://Bót.Vn/" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div></p>
					</div>
					<br>
                    <div id="status-text-sub"> </div>
                    <button class="btn-creat-new btn btn-danger" href="#"><i class="fa fa-pencil"></i> Tạo tin nhắn mới ? Click tại đây</button>
				</div>
                <div class="col-md-6 text-center">
                    <div id="image-container"> <img id="" id="image-result" style="display:none;"> <img id="blurred-result"> </div>
                </div>
            </div>
        </div>
        <div id="iphone">
            <div id="top"> </div>
            <div id="center">
                <div id="msg">
                    <div id="msg-top">
                        <div class="col-md-4 col-xs-4">
                            <div id="connection" class="pull-left"> <img src="assets/img/3g-3.png" id="signal-img"> </div>
                            <div id="operator" class="pull-left"> <span id="operator-result" class="result">Vina</span> </div>
                            <div id="connection-type" class="pull-left">
                                <div id="connection-type-wifi-wrapper"> <img src="assets/img/wifi-3.png" id="connection-type-wifi"> </div>
                                <div id="connection-type-3g" style="display:none;"> 3G </div>
                                <div id="connection-type-4g" style="display:none;"> 4G </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-4 text-center">
                            <div id="clock"> <span id="clock-result" class="result">21:20</span> </div>
                        </div>
                        <div class="col-md-4 col-xs-4 text-center">
                            <div class="pull-right">
                                <div id="battery">
                                    <div id="battery-percent"></div>
                                </div>
                            </div>
                            <div class="pull-right m-r-xs">
                                <div id="battery-percent-number-container"><span id="battery-percent-number">50</span> %</div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-4 col-xs-4" id="txt-messages-container">
                            <div id="txt-messages">
                                <div class="pull-left"> <img src="assets/img/iphone/messages-arrow.jpg"> </div>
                                <div class="pull-left m-l-xs m-t-xxs" id="text-messages-result-container"> <span id="text-messages-result" class="result"></span> </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-4 text-right" id="txt-name-container">
                            <div id="txt-name"> <span id="name-result" class="result"></span> </div>
                        </div>
                        <div class="col-md-4 col-xs-4 text-right" id="text-contact-result-container">
                            <div id="txt-contact"> <span id="text-contact-result" class="result"></span> </div>
                        </div>
                    </div>
                    <div id="msgs-wrapper">
                        <ul id="msgs">
                            <li class="msg-timestamp example-msg" id="example-msg">
                                <div class="content">
                                    <p> <span>Hôm nay</span> 8:32 SA </p>
                                </div>
                                <div class="sep"></div>
                            </li>
                            <li class="msg green example-msg">
                                <div class="content">
                                    <p> Hehe Đây có phải là tin nhắn vui vẻ ko nhỉ? </p>
                                    <div class="sep"></div>
                                </div>
                            </li>
                            <li class="msg example-msg">
                                <div class="content">
                                    <p> Chuẩn cmnr! Nếu thím thích, thím có thể tự tạo 1 cái cho riêng mình. </p>
                                </div>
                                <div class="sep"></div>
                            </li>
                            <li class="msg blue example-msg">
                                <div class="content">
                                    <p> Thím có thể tải ảnh về hoặc chia sẻ lên facebook để trêu bạn bè cũng thốn lắm đấy! </p>
                                </div>
                                <div class="sep"></div>
                            </li>
                        </ul>
                    </div>
                    <div id="msgs-bottom">
                        <div id="text-textmessage-result">Hoàn tất</div>
                        <div id="text-send-result">Gửi</div>
                    </div>
                </div>
            </div>
            <div id="bottom"> </div>
        </div>
    </div>
    <div id="right-panel" class="side-panel hidden-sm hidden-xs">
        <div class="text-center m-t"> </div>
        <div class="text-center m-t-xl">
			<p class="m-l-lg m-r-lg"><a class="btn btn-danger btn-sm" href="http://google.vn" target="_blank">Bot Like Facebook</a> </p>
			<p class="m-l-lg m-r-lg">Nhấn <b>Like</b> hoặc <b>Chia sẻ</b> để giới thiệu đến bạn bè của bạn nhé !</p>
			<p><div class="fb-like" data-href="http://Bót.Vn" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div></p>
            <p class="m-l-lg m-r-lg"> <strong>Chế ảnh tin nhắn Iphone <br> bởi Mạnh Nghĩa</strong> </p>
            <p class="m-l-lg m-r-lg"> Chúng tôi không chịu trách nhiệm về nội dung do người dùng thử nghiệm </p>			
        </div>
    </div>
</body>

</html>