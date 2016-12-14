<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Cảnh báo an ninh</title>
	<style type="text/css">
html, body {
	background: #0b1933;
	text-align: center;
}
body {
	font: 80% Tahoma;
}
#wrapper {
	margin: 100px auto;
	width: 500px;
	text-align: left;
	background: #fff;
	padding: 10px;
   border: 5px solid #ccc;
}
form { 
   text-align: center;
}
	</style>
   <base href="<?php echo GLYPE_URL; ?>/">
</head>
<body>
	<div id="wrapper">
		<h1>Cảnh báo!</h1>
		<p>Trang web bạn đang cố gắng truy cập là trên một kết nối an toàn . Nhưng Proxy này không phải là trên một kết nối an toàn .</p>
      <p>Các trang web mục tiêu có thể gửi dữ liệu nhạy cảm , có thể bị chặn khi proxy sẽ gửi lại cho bạn .</p>
      <form action="includes/process.php" method="get">
         <input type="hidden" name="action" value="sslagree">
			<input type="submit" value="Vẫn tiếp tục...">
         <input type="button" value="Return to index" onclick="window.location='.';">
		</form>
      <p><b>Chú ý:</b> Cảnh báo này sẽ không hiện lại lần nữa.</p>
	</div>
</body>
</html>