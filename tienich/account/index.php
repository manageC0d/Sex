<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ứng Dụng Tạo Nick Ảo Facebook !!!</title>
</head>
<body>
	
	<h1>Tạo Nick Ảo Facebook</h1>
	
	<?php
		if (!isset($_GET['name']) || empty($_GET['name'])) :
			include 'pages/form.php';
		else :
			include 'pages/results.php';
		endif;
	?>
	
</body>
</html>