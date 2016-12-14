<?php
$title = 'Design Logo Rocket';
include '../../head.php';
echo '<div class="panel panel-primary"><div class="panel-heading">Tạo Logo Rocket</div><div class="list-group"><div class="list-group-item"><img src="view.php?text='.(isset($_GET['text']) ? $_GET['text'] :'Pro321.CF').'&vt='.(isset($_GET['vt']) ? $_GET['vt'] : '80').'">';
echo '<br/><form method="get">Nội dung logo:<br/><input type="text" name="text" value="'.(isset($_GET['text']) ? ''.$_GET['text'].'':'Pro321.CF').'" /><br/>Vị trí Rocket:<br />
<input type="text" name="vt" value="'.(isset($_GET['vt']) ? ''.$_GET['vt'].'':'80').'" /><br/><input type="submit" value="Tạo ngay" /></form></div></div></div>';
include '../../end.php';
?>