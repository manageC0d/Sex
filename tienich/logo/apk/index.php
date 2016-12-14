<?php
$title = 'Tạo Logo Android';
include ('../../head.php');
echo '<div class="panel panel-primary"><div class="panel-heading">Tạo Logo Android</div>
<div class="list-group"><div class="list-group-item"><a href="view.php?text='.(isset($_GET['text']) ? $_GET['text'] :'xViet.Mobi').'"><img src="view.php?text='.(isset($_GET['text']) ? $_GET['text'] :'xViet.Mobi').'">';
echo '<br/><form method="get">Nội dung logo:<br/><input type="text" name="text" value="'.(isset($_GET['text']) ? ''.$_GET['text'].'':'Pro321.CF').'" /><br/><input type="submit" value="Tạo" /></form></div></div></div>';
include ('../../end.php');
?>