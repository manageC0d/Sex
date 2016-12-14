<meta charset="utf-8">
<?
include '../databasecsdl.php';
$table = 'Users'; 

$layinfo = mysqli_query($connection,"SELECT * FROM ".$table." ORDER BY RAND() LIMIT 0,200");
while ($row = mysqli_fetch_array($layinfo)){
$matoken= $row['token'];
$check = json_decode(file_get_contents('https://graph.facebook.com/me?access_token='.$matoken),true);
if(!$check['id']){
$idfb= $row['idfb'];	
$name = $row['ten'];
mysqli_query($connection,"DELETE FROM ".$table." WHERE access_token ='".$matoken."'");
Echo 'Đã xóa token của. '.$name.'</br>';
}
	
}

mysqli_free_result($layinfo);
function auto($url){
   $curl = curl_init();
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($curl, CURLOPT_URL, $url);
   $ch = curl_exec($curl);
   curl_close($curl);
   return $ch;
   }
?>