<?php
include 'config.php';
$name= $_POST['name'];
$partner= $_POST['partner'];

if($name=="")
{
include '../head.php';
echo '<div class="main2">Máy do tình yêu</div>';
echo "<b>Bạn chưa điền tên của bạn</b><br/><a href='".$url."'>Quay lại</a>";
}
elseif($partner=="")
{
include '../head.php';
echo '<div class="main2">Máy do tình yêu</div>';
echo "<b>Bạn chưa điền tên của người yêu</b><br/><a href='".$url."'>Quay lại</a>";
}
elseif($name==$partner)
{
include '../head.php';
echo '<div class="main2">Máy do tình yêu</div>';
echo "<b>Bạn không thể yêu chính mình</b><br/><a href='".$url."'>Quay lại</a>";
}
else
{
list($msec,$sec)=explode(chr(32),microtime());
$HeadTime=$sec+$msec;

$love=rand (53,100);

include '../head.php';
echo '<div class="main2">Máy do tình yêu</div>';
echo 'Kết quả của bạn<br/><b>';

print $name."</b> + <b>".$partner."</b> = <b>$love %</b> .<br/><b>";
print $name."</b> và <b>".$partner."</b> yêu nhau đến <b>$love %</b> .<br/>";

echo "<div class='gap'></div>\n";

list($msec,$sec)=explode(chr(32),microtime());
echo "[".round(($sec+$msec)-$HeadTime,4)."]";

print '<br/><a href="'.$url.'">Quay lại</a>';
}
include '../foot.php';
?>
