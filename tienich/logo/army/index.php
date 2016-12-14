<?php
$title = 'Design Logo Army';
include ('../../head.php');
echo '<div class="panel panel-primary"><div class="panel-heading">Tạo Logo Army - Teamobi</div>
<div class="list-group"><div class="list-group-item"><img src="view.php?text='.(isset($_GET['text']) ? $_GET['text'] :'Pro321.CF').'">';
echo '<br/><form method="get">Nội dung logo:<br/><input type="text" name="text" value="'.(isset($_GET['text']) ? ''.$_GET['text'].'':'Pro321.CF').'" /><br/><input type="submit" value="Tạo" /></form></div></div></div>';
include ('../end.php');
?>