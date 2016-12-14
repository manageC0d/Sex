<?php
$title = 'Tạo logo Cực Dị';
require '../../head.php';
echo '<div class="row"><div class="col-sm-8"><div class="panel panel-primary"><div class="panel-heading">'.$title.'</div><div class="list-group">';
echo '<div class="list-group-item"><img src="view.php?text='.(isset($_GET['text']) ? ''.$_GET['text'].'':'Pro321.CF').'&size='.(isset($_GET['size']) ? ''.$_GET['size'].'':'20').'&vt='.(isset($_GET['vt']) ? ''.$_GET['vt'].'':'25').'&f='.(isset($_GET['f']) ? ''.$_GET['f'].'':'1').'" alt="logo" />';
echo '</div><form method="get"><div class="list-group-item">Nội dung: (không dấu)<br/><input class="form-control" type="text" name="text" value="'.(isset($_GET['text']) ? ''.$_GET['text'].'':'Pro321.CF').'" /></div><div class="list-group-item">Kiểu chữ:<br/><select class="select-control"  name="f">';
for($i=1;$i<=11;$i++){
echo '<option value="'.$i.'">Kiểu '.$i.'</option>';
}
echo '</select>
</div><div class="list-group-item">Size:<br/>
<input type="text" class="form-control" name="size" value="'.(isset($_GET['size']) ? ''.$_GET['size'].'':'20').'" /><br/>Vị trí:<br/><input type="text" class="form-control" name="vt" value="'.(isset($_GET['vt']) ? ''.$_GET['vt'].'':'25').'" /></div><div class="list-group-item"><input type="submit" value="Tạo" class="btn btn-default" /></div></form>';
echo '</div></div>';
require '../../end.php';
?>