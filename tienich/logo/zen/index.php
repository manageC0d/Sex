<?php
$title = 'Design Logo ZenCMS';
include'../../head.php';
echo '<div class="panel panel-primary"><div class="panel-heading">Tạo Logo ZenCMS</div><div class="list-group"><div class="list-group-item"><img src="view.php?text1='.(isset($_GET['text1']) ? ''.$_GET['text1'].'':'Pro321').'&text2='.(isset($_GET['text2']) ? ''.$_GET['text2'].'':'.CF').'&text3='.(isset($_GET['text3']) ? ''.$_GET['text3'].'':'Tien ich Pro').'&vt='.(isset($_GET['vt']) ? ''.$_GET['vt'].'':'10').'" alt="logo" />';
echo '<form method="get">Nội Dung:<br/><input type="text" name="text1" value="'.(isset($_GET['text1']) ? ''.$_GET['text1'].'':'Pro321').'" /><br/>Nội Dung 2:<br/><input type="text" name="text2" value="'.(isset($_GET['text2']) ? ''.$_GET['text2'].'':'.CF').'" /> <br />Text:<br/><input type="text" name="text3" value="'.(isset($_GET['text3']) ? ''.$_GET['text3'].'':'Tien ich Pro').'" /> <br />Vị trí text:<br/><input type="text" name="vt" value="'.(isset($_GET['vt']) ? ''.$_GET['vt'].'':'10').'" /> ';
echo '<br/><input type="submit" value="Tạo" /></form></div></div></div>';
include'../../end.php';
?>