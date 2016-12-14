<?php


echo '<div class="list1">';
echo '<div align="center"><img src="tao.php?text1='.(isset($_GET['text1']) ? ''.$_GET['text1'].'':'TangDaik').'&text2='.(isset($_GET['text2']) ? ''.$_GET['text2'].'':'.Com').'&text3='.(isset($_GET['text3']) ? ''.$_GET['text3'].'':'').'&vt='.(isset($_GET['vt']) ? ''.$_GET['vt'].'':'10').'" alt="logo" />';
echo '<form method="get">Tên Domain: <input type="text" name="text1" value="'.(isset($_GET['text1']) ? ''.$_GET['text1'].'':'TangDaik').'" /><br/>Đuôi Domain: <input type="text" name="text2" value="'.(isset($_GET['text2']) ? ''.$_GET['text2'].'':'.Com').'" />'; 



 echo '<br/><input type="submit" value="Tạo" /></form>';
echo '</div>';

?>
