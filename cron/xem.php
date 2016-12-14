<meta charset="utf-8" />
<?
include '../databasecsdl.php';
$table = 'Users'; 
$result = @mysqli_query($connection,"SELECT * FROM ".$table." ORDER BY id");
while($row = @mysqli_fetch_array($result))
{
echo $row['token1'].'</br>';
echo $row['token2'].'</br>';
}
?>