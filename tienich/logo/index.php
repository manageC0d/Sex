<?php
$title = 'Tạo logo cực đẹp';
include '../../head.php';
if($_GET['mau']) {
$mau = $_GET['mau'];
header("location: $mau");
}
$text1 = 'Bot.Vn';
$text = $text1;
$text2 = 'Auto Bot Facebook';
echo '<div class="panel panel-primary"><div class="panel-heading">Danh Sách Logo</div><div class="list-group">';
echo '<form method="get" action="'.$mau.'/tienich/logo/index.php">
<div class="list-group-item"><input type="radio" name="mau" value="wapvip" /> <img src="https://bót.vn/tienich/logo/wapvip/view.php?text='.$text1.'&size=20&vt=50"></div>
<div class="list-group-item"><input type="radio" name="mau" value="gangnamstyle" /> <img src="https://bót.vn/tienich/logo/gangnamstyle/view.php?text='.$text.'"></div>
<div class="list-group-item"><input type="radio" name="mau" value="game" /> <img src="https://bót.vn/tienich/logo/game/view.php?text='.$text.'"></div>
<div class="list-group-item"><input type="radio" name="mau" value="demo" /> <img src="https://bót.vn/tienich/logo/demo/view.php?text1=Bot&text2=.Vn"></div>
<div class="list-group-item"><input type="radio" name="mau" value="android" /> <img src="https://bót.vn/tienich/logo/android/view.php?text='.$text.'"></div>
<div class="list-group-item"><input type="radio" name="mau" value="angry" /> <img src="https://bót.vn/tienich/logo/angry/view.php?text='.$text1.'"></div>
<div class="list-group-item"><input type="radio" name="mau" value="love" /> <img src="https://bót.vn/tienich/logo/love/view.php?text='.$text1.'&size=20&vt=25&f=1"></div>

<div class="list-group-item"><input type="radio" name="mau" value="apk" /> <img src="https://bót.vn/tienich/logo/apk/view.php?text='.$text1.'"></div>

<div class="list-group-item"><input type="radio" name="mau" value="army" /> <img src="https://bót.vn/tienich/logo/army/view.php?text='.$text1.'"></div>

<div class="list-group-item"><input type="radio" name="mau" value="angry2" /> <img src="https://bót.vn/tienich/logo/angry2/view.php?text='.$text1.'"></div>

<div class="list-group-item"><input type="radio" name="mau" value="nd" /> <img src="https://bót.vn/tienich/logo/nd/view.php?text='.$text1.'"></div>

<div class="list-group-item"><input type="radio" name="mau" value="zen" /> <img src="https://bót.vn/tienich/logo/zen/view.php?text1=Bot&text2=.Vn&text3='.$text2.'&vt=10">
</div>

<div class="list-group-item"><input type="radio" name="mau" value="tet" /> <img src="https://bót.vn/tienich/logo/tet/view.php?text='.$text1.'"></div>
<div class="list-group-item"><input type="radio" name="mau" value="dep" /> <img src="https://bót.vn/tienich/logo/dep/view.php?text='.$text1.'"></div>
<div class="list-group-item"><input type="radio" name="mau" value="win" /> <img src="https://bót.vn/tienich/logo/win/view.php?text='.$text.'"></div>
<div class="list-group-item"><input type="radio" name="mau" value="sg" /> <img src="https://bót.vn/tienich/logo/sg/view.php?text='.$text1.'&text2='.$text2.'&vt=3&vt2=5&vt3=8"></div>
<div class="list-group-item"><input type="radio" name="mau" value="hlw" /> <img src="https://bót.vn/tienich/logo/hlw/view.php?text='.$text1.'&size=20&vt=50&f=1"></div>
<div class="list-group-item"><input type="radio" name="mau" value="rocket" /> <img src="https://bót.vn/tienich/logo/rocket/view.php?text='.$text1.'"></div>

<div class="list-group-item"><input type="radio" name="mau" value="team" /> <img src="https://bót.vn/tienich/logo/team/view.php?text='.$text.'"></div>
<div class="list-group-item"><input type="submit" value="Chọn" class="btn btn-default" /></div>
</form>';

echo '</div></div></div>';
include 'https://bót.vn/theme/footer.php';
?>