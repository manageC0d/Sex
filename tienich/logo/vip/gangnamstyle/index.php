<?php
echo '<div class="list1"><img src="view.php?text='.(isset($_GET['text']) ? $_GET['text'] :'TangDaik.Com').'">';
echo '<br/><form method="get">Nội dung logo:<br/><input type="text" name="text" value="'.(isset($_GET['text']) ? ''.$_GET['text'].'':'TangDaik.Com').'" /><br/><input type="submit" value="Tạo ngay" /></form></div>';
?>
