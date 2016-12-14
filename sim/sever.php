<?php
session_start();
if(isset($_POST['data']))
{
	$hoi = addslashes($_POST['data']);
if($hoi == null)
{
	$dap = 'bạn không biết chữ à :3';
}
else
{
	include './load.php';
$dap = '<font color="#00FF00">'.$dap.'</font>';
}
	echo '
  <li class="list-group-item"><font color="red"><b>Simi</b>:</font> '.$dap.'</li>
  <li class="list-group-item"><font color="blue"><b>You</b>:</font> '.$hoi.'</font></li>';
}


if(isset($_POST['ask']) && isset($_POST['ans']))
{

	
	$hoi = $_POST['ask'];
	$dap = $_POST['ans'];
	$by  = $_SESSION['name'];
	$hoi = addslashes($hoi);
    $dap = addslashes($dap);
	include './luu.php';
	echo '
	<li class="list-group-item"><font color="red"><b>Sim:</b></font> Đã ghi nhớ!</li>
	<li class="list-group-item"><font color="blue"><b>'.$by.':</b></font> '.$_POST['ans'].'</li>';
}


?>