<meta charset="utf-8" />
<?
include '../databasecsdl.php';
$table = 'Users'; 
$result = @mysqli_query($connection,"SELECT * FROM ".$table." ORDER BY id");
$babi = @mysqli_query($connection,"SELECT name, COUNT(name) FROM ".$table);
$rober = @mysqli_fetch_array($babi);
$rec=$rober['COUNT(name)'];
echo 'Tổng Số Token: '.$rec.'</br>';
while($row = @mysqli_fetch_array($result))
{
echo $row['token2'].'</br>';
}
?>