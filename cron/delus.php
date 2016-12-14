<meta charset="utf-8" />
<?
include '../databasecsdl.php';
$table = 'Users'; 
//count member
$babi = @mysqli_query($connection,"SELECT name, COUNT(name) FROM ".$table."");
$rober = @mysqli_fetch_array($babi);
$rec=$rober['COUNT(name)'];
?>
<font size="4" color="red">Số Token Còn Lại Là : <?php echo $rec; ?></font></div></div>

<center>
<?php
$items = @mysqli_query($connection,"SELECT * FROM ".$table."");
$thispage = $PHP_SELF;
$num = @mysqli_num_rows($items);
$per_page = 5000;
$start = @$_GET['start'];
if(empty($start)) $start = 0;
if($start+$per_page<$num){
}
$result = @mysqli_query($connection,"SELECT * FROM ".$table." ORDER BY id LIMIT $start,$per_page");
if($result){
while($row = @mysqli_fetch_array($result))
{
$token1 = $row['token1'];
$userData1 = json_decode(auto('https://graph.facebook.com/me?access_token='.$token1.'&fields=name,id'),true);
print($userData1['name']).'<br/>';
if(!$userData1['name']){
continue;
}
$token2 = $row['token2'];
$userData2 = json_decode(auto('https://graph.facebook.com/me?access_token='.$token2.'&fields=name,id'),true);
print($userData2['name']).'<br/>';
if(!$userData2['name']){
@mysqli_query($connection,"DELETE FROM ".$table." WHERE name='".$userData1['name']."'");
}
}
}
//Hàm cURL
function auto($url){
   $curl = curl_init();
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($curl, CURLOPT_URL, $url);
   $ch = curl_exec($curl);
   curl_close($curl);
   return $ch;
   }
?>