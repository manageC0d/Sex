<?php
$title =' Tạo Logo GangNam Style ';
include '../../head.php';
echo '<div class="list-group-item"><img src="view.php?text='.(isset($_GET['text']) ? $_GET['text'] :'Pro321.CF').'">';
echo '<br/><form method="get">Nội dung logo:<br/><input type="text" name="text" value="'.(isset($_GET['text']) ? ''.$_GET['text'].'':'Pro321.CF').'" /><br/><input type="submit" value="Tạo ngay" /></form></div>';
include '../../end.php';
?>
