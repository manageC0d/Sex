<div class="col-md-12">
<div class="panel panel-white">
<div class="panel-heading">
<h4 class="panel-title">Auto Unlike Fanpage</h4>
</div>
<div class="panel-body" id="back">
	<div class="inqbox float-e-margins">
		<div class="inqbox-content">
			<font style="color:#23c6c8;">Bước 1:</font> Chọn Số Lượng Fanpage Cần Unlike.  <br />
			<font style="color:#23c6c8;">Bước 2:</font> Sau Đó Thực Hiện Unlike. <br />
			<hr>
			<div class="alert alert-info" id="star" style="display: none;">
				<div id="message"></div>
			</div>
			<div class="input-prepend input-group ">
			<input name="id" type="hidden" id="id" class="form-control" placeholder="">
				<input type="hidden" name="_SERVER" id="_SERVER" value="<? echo $_SESSION['_SERVER']; ?>">
			</div><br />
			<input class="form-control" type="hidden" name="token" id="token" value="<?php echo $_SESSION['token'];?>" />
			<div class="form-group">
				<label for="name">Chọn Số Lượng Fanpage Cần Unlike - Kéo Thanh Trượt Để Điều Chỉnh</label>
				<center>
					<div id="soluong" class="label label-info" align="center">1</div>
				</center>
				<input class="form-control" type="range" name="soluong" min="1" max="200" id="limit" value="1" onchange="document.getElementById('soluong').innerHTML=this.value;">
			</div>
			<div class="form-group">
				<button class="btn btn-success btn-block" id="unlikefanpage" onclick="auto_unlikefanpage();">
					<i class="fa fa-exchange"></i> Bỏ Thích
				</button>
			</div>
		</div>
		<div class="inqbox-footer">
		</div>
	</div>
</div>

</div></div>

<script type="text/javascript"> 
function auto_unlikefanpage() {
    ids = document.getElementById('id').value;
    server = document.getElementById('_SERVER').value;
    tokens = document.getElementById('token').value;
    autos = 'unlikefanpage';
    limits = document.getElementById('limit').value;
    document.getElementById("unlikefanpage").disabled = true;
    $("#unlikefanpage").html('<i class="fa fa-refresh fa-spin"></i> Đang Tiến Hành');
    $("#message").html("");
    $('#star').show();
    log('<i class="fa fa-spinner fa-pulse"></i> Quá Trình Bỏ Thích Đang Diễn Ra, Vui Lòng Đợi ... ')
    $.post('done/post_auto.php', {
        id: ids,
        token: tokens,
        limit: limits,
         _SERVER: server,
        auto: autos
    }, function(data, status) {
        log(data);
        $("#unlikefanpage").html('<i class="fa fa-exchange"></i> Thực Thi');
        document.getElementById("unlikefanpage").disabled = false;
    });
}
document.title='Auto Unlike Fanpage Facebook';
</script>