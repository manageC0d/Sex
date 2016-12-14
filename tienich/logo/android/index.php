<?php
$title = 'Design Logo Android';
include '../../head.php';
echo '<div class="panel panel-primary"><div class="panel-heading">Tạo Logo Android</div>
<div class="list-group"><div class="list-group-item"><img src="view.php?text='.(isset($_GET['text']) ? ''.$_GET['text'].'':'Pro321.CF').'&color='.(isset($_GET['color']) ? ''.$_GET['color'].'':'1').'" alt="logo" />';
include '../dl.php';
echo '<br/><form method="get">Nội Dung:<br/><input type="text" name="text" value="'.(isset($_GET['text']) ? ''.$_GET['text'].'':'Pro321.CF').'" /><br/><input type="radio" name="color" value="1" '.(!isset($_GET['color']) || $_GET['color'] == 1 ? 'checked="checked"':'').' /> Màu Xanh<br/><input type="radio" name="color" value="2" '.($_GET['color'] == 2 ? 'checked="checked"':'').' /> Màu Đỏ<br/><input type="submit" value="Tạo" /></form></div></div></div>';
include '../../end.php';
?>