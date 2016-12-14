<?php
$title =' Tạo Logo Đẹp ';
include '../../head.php';
echo '<div class="list-group-item">';
echo '<div align="center"><img src="view.php?text1='.(isset($_GET['text1']) ? ''.$_GET['text1'].'':'Pro321').'&text2='.(isset($_GET['text2']) ? ''.$_GET['text2'].'':'.CF').'&text3='.(isset($_GET['text3']) ? ''.$_GET['text3'].'':'').'&vt='.(isset($_GET['vt']) ? ''.$_GET['vt'].'':'10').'" alt="logo" />';
echo '<form method="get">Tên Domain: <input type="text" name="text1" value="'.(isset($_GET['text1']) ? ''.$_GET['text1'].'':'Pro321').'" /></br>Đuôi Domain: <input type="text" name="text2" value="'.(isset($_GET['text2']) ? ''.$_GET['text2'].'':'.CF').'" />'; 



 echo '<br/><input type="submit" value="Tạo" /></form>';
echo '</div></div>';
include '../../end.php';
?>
