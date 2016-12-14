<?php
include 'config.php';
list($msec,$sec)=explode(chr(32),microtime());
$HeadTime=$sec+$msec;
include '../head.php';
echo '<div class="menu">Máy đo tình yêu!</div>
<b>Tình yêu của các bạn có hoàn hảo không ?</b><br>
</div>
<div class="menu"><form name="love" method="post" action="rez.php">
Tên của bạn<br/>
<input name="name" title="Name"/><br/>
Tên của người yêu<br/>
<input name="partner" title="Name"/><br/><br/>
<input type="image" value="Calculate" src="cal.gif"/><br/><br/>
</form>';
echo "Tổng số tình yêu: "; include 'hit.php';
echo '<br/>';
list($msec,$sec)=explode(chr(32),microtime());
echo "[".round(($sec+$msec)-$HeadTime,4)."]";
echo '</div>';
include '../foot.php';


?>
