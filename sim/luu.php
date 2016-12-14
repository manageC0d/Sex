<?php
include'../databasecsdl.php';
   mysqli_query($connection,"CREATE TABLE IF NOT EXISTS `Simi` (
      `stt` int(32) NOT NULL AUTO_INCREMENT,
      `ask` varchar(5000) NOT NULL,
      `ans` varchar(5000) NOT NULL,
	  `by` varchar(50) NOT NULL,
      `time` varchar(32) NOT NULL,
      PRIMARY KEY (`stt`)
      ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
   ");
if(isset($_GET['hoi']) && isset($_GET['dap']))
{
	$hoi = $_GET['hoi'];
	$dap = $_GET['dap'];
}

if(isset($hoi) && isset($dap))
{	
$check = mysqli_num_rows(mysqli_query($connection,"SELECT * from Simi WHERE `ask` = '".$hoi."' AND `ans` = '".$dap."' "));
if($check == "0")
	{
 mysqli_query($connection,
         "INSERT INTO
         Simi
         SET
         `ask` = '".addslashes($hoi)."',
         `ans` = '".addslashes($dap)."',
		 `by` = '".addslashes($by)."',
         `time` = '".date('H:i')."' ");
	}
}		 
?>