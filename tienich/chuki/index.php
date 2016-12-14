<?php
$nick = $_GET['ki'];
$size = $_GET['size'];
if(($size<20)||($size>80)) $size="40";
$title = 'Tạo chữ ký Online';
include 'head.php';
echo'<div class="title">Tạo chữ ký Online</div><div class="left">';
if(!isset($nick)){
echo '<form action="index.php" method="get">
Nhập tên bạn:<br><input name="ki" value="hoangbi"><br>Chọn kích thước:<br><select name="size" title="Kích thước">
<option value= "20" > 20 </option> <option value= "25" > 25 </option> <option value= "30" > 30 </option> <option value= "35" > 35 </option> <option value= "40" > 40 </option> <option value= "45" > 45 </option> <option value= "50" > 50 </option> <option value= "55" > 55 </option> <option value= "60" > 60 </option> <option value= "65" > 65 </option> <option value= "70" > 70 </option> <option value= "75" > 75 </option> <option value= "80" > 80 </option> </select> <br>
<input type="submit" value="Xem ngay"></form>';
}else{

print "<div class=center><img src=\"view.php?ki=$nick&size=$size\" width=\"100\"></div>";
}echo'</div>';
include 'foot.php';
?>
