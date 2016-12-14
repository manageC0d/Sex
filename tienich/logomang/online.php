<?php  Error_Reporting(E_ALL & ~E_NOTICE);
$data="online.dat";
$time=time();
$past_time=time()-180;
$readdata=@fopen($data,"r") or die("Error $data");
$data_array=file($data);
@fclose($readdata);
if (getenv('HTTP_X_FORWARDED_FOR'))
$user = getenv('HTTP_X_FORWARDED_FOR');
else
$user = getenv('REMOTE_ADDR');
$agent = getenv('HTTP_USER_AGENT');
$d=count($data_array);
for($i=0;$i<$d;$i++)
{
list($live_agent,$live_user,$last_time)=explode("::","$data_array[$i]");
if($live_user!=""&&$last_time!=""&&$live_agent!=""):
if($last_time<$past_time):
$live_user="";
$last_time="";
$live_agent="";
endif;
if($live_user!=""&&$last_time!=""&&$live_agent!="")
{
if($user==$live_user&&$agent==$live_agent)
{
$online_array[]="$agent::$user::$time\r\n";
}
else
$online_array[]="$live_agent::$live_user::$last_time";
}
endif;
}
if(isset($online_array)):
foreach($online_array as $i=>$str)
{
if($str=="$agent::$user::$time\r\n")
{
$ok=$i;
break;
}
}
foreach($online_array as $j=>$str)
{
if($ok==$j) { $online_array[$ok]="$agent::$user::$time\r\n"; break;}
}
endif;
$writedata=@fopen($data,"w") or die("Error on Data Entery $data");
@flock($writedata,2);
if($online_array=="") $online_array[]="$agent::$user::$time\r\n";
foreach($online_array as $str)
fputs($writedata,"$str");
@flock($writedata,3);
@fclose($writedata);
$readdata=@fopen($data,"r") or die("Data Cant Entered on $data");
$data_array=@file($data);
@fclose($readdata);
$online=count($data_array);
print 'Online [<font color="blue"><b>TH2</b></font>]: <a href="/who.php"><b>'.$online.'</b></a>';print '<br />';
?>
