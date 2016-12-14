<div class="col-md-12">
	<div class="box box-success">
		<div class="box-title box-header with-border">
			<h4><i class="fa fa-thumbs-up"></i> Token Page</h4>
		</div>
		<div class="box-body">

<?php
$feed1=json_decode(auto('https://graph.fb.me/me/accounts?access_token='.$_SESSION['matoken']),true);
for($u=0;$u<count($feed1[data]);$u++){  
?>
<li class="list-group-item clearfix">
<b>Tên Page: <font color="red"><b><?php echo $feed1[data][$u][name]; ?></b></font><br>
<b>ID Page: <font color="red"><b><?php echo $feed1[data][$u][id]; ?></b></font>
<br>
Mã Token: <textarea cols="150" rows="3"><?php echo $feed1[data][$u][access_token]; ?></textarea>
</li>
<?
}
?>
		</div>
		<div class="box-footer">
		</div>
	</div>
</div>