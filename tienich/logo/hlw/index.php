<?php
$title = 'Tạo logo Halloween';
require '../../head.php';
echo '<div class="panel panel-primary"><div class="panel-heading">'.$title.'</div><div class="list-group"><div class="list-group-item"><img src="view.php?text='.(isset($_GET['text']) ? ''.$_GET['text'].'':'Pro321.CF').'&size='.(isset($_GET['size']) ? ''.$_GET['size'].'':'20').'&vt='.(isset($_GET['vt']) ? ''.$_GET['vt'].'':'50').'&f='.(isset($_GET['f']) ? ''.$_GET['f'].'':'1').'" alt="logo" />
</div><form method="get"><div class="list-group-item">Nội dung: (không dấu)<br/><input class="form-control" type="text" name="text" value="'.(isset($_GET['text']) ? ''.$_GET['text'].'':'Pro321.CF').'" /></div>
<div class="list-group-item">Size:<br/>
<input type="text" class="form-control" name="size" value="'.(isset($_GET['size']) ? ''.$_GET['size'].'':'20').'" /><br/>Vị trí:<br/><input type="text" class="form-control" name="vt" value="'.(isset($_GET['vt']) ? ''.$_GET['vt'].'':'50').'" /></div><div class="list-group-item"><input type="submit" value="Tạo" class="btn btn-default" /></div></form>
</div></div></div>';
require '../../end.php';