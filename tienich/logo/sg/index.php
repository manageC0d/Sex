<?php
$title = 'Design Logo SànGame';
include"../../head.php";
echo '<div class="panel panel-primary"><div class="panel-heading">Tạo Logo</div>
<div class="list-group"><div class="list-group-item"><img src="view.php?text='.(isset($_GET['text']) ? ''.$_GET['text'].'':'ChiaSe.2ola.Net').'&text2='.(isset($_GET['text2']) ? ''.$_GET['text2'].'':'The Gioi Giai Tri').'&vt='.(isset($_GET['vt']) ? ''.$_GET['vt'].'':'3').'&vt2='.(isset($_GET['vt2']) ? ''.$_GET['vt2'].'':'5').'&vt3='.(isset($_GET['vt3']) ? ''.$_GET['vt3'].'':'8').'" alt="logo" />';
echo '<form method="get">- Dòng 1:<br/><input type="text" name="text" value="'.(isset($_GET['text']) ? ''.$_GET['text'].'':'ChiaSe.2ola.Net').'" /><br/>- Vị trí 1:<br/><input type="text" name="vt" value="'.(isset($_GET['vt']) ? ''.$_GET['vt'].'':'3').'" /><br/>- Dòng 2:<br/><input type="text" name="text2" value="'.(isset($_GET['text2']) ? ''.$_GET['text2'].'':'The Gioi Giai Tri').'" /><br/>- Vị trí 2:<br/><input type="text" name="vt2" value="'.(isset($_GET['vt2']) ? ''.$_GET['vt2'].'':'5').'" /><br/>- Vị trí chữ đại diện:<br/><input type="text" name="vt3" value="'.(isset($_GET['vt3']) ? ''.$_GET['vt3'].'':'8').'" /><br/><input type="submit" value="Tạo" /></form>';
echo '</div></div></div>';
include"../../end.php";
?>