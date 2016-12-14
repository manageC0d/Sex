<?php
$title='Chuyển hình ảnh sang logo mạng';
include '../head.php';
echo '<h1>Công cụ chuyển đổi hình ảnh sang logo mạng</h1><form action="tao.php" method="get">
Đường dẫn ảnh:<br>
<input type="text" name="url" value="http://"><br>
Chiều rộng:<br>
<input type="text" name="w" value="128"><br>
Chiều dài:<br>
<input type="text" name="h" value="34">
<input type="submit" value="Ok"></form></div>';
include '../foot.php';
?>