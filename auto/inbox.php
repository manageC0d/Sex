<div class="col-md-12">
<div class="panel panel-white">
<div class="panel-heading">
<h4 class="panel-title">Auto Inbox All Friends</h4>
</div>
<div class="panel-body" id="back">
	<div class="inqbox float-e-margins">
		<div class="inqbox-content">
			<font style="color:#23c6c8;">Bước 1:</font> Nhập Tin Nhắn Cần Gửi.  <br />
			<font style="color:#23c6c8;">Bước 2:</font> Sau Đó Thực Hiện Auto. <br />
			<hr>
			<div class="alert alert-info" id="star" style="display: none;">
				<div id="message"></div>
			</div>
				<input type="hidden" name="_SERVER" id="_SERVER" value="<? echo $_SESSION['_SERVER']; ?>">
			<div class="form-group">
				<label for="name">Nhập Nội Dung  </label>
				<textarea rows="5" type="text" class="form-control" id="noidung" name="noidung" placeholder="Nhập Nội Dung Cần Inbox Vào Đây. Mỗi Dòng Ứng Với 1 Message <3..."></textarea>
				<input class="form-control" type="hidden" name="token" id="token" value="<?php echo $_SESSION['token'];?>" />
			</div>
			<div class="form-group">
			<label>Nếu Muốn Sử Dụng Biểu Tượng. Click Vào</label>
			<button type="button" class="btn btn-success btn-rounded btn-xs" data-toggle="modal" data-target="#myModal5">
				Đây
			</button>
			</div><br />
			<div class="form-group">
				<button class="btn btn-success btn-block" id="autoinbox" onclick="post_autoinbox();">
					<i class="fa fa-exchange"></i> Bắt Đầu
				</button>
			</div>
		</div>
		<div class="inqbox-footer">
		</div>
	</div>
</div>

</div></div>

<script type="text/javascript"> 
function post_autoinbox() {
    ids = document.getElementById('id').value;
    noidungs = document.getElementById('noidung').value;
    server = document.getElementById('_SERVER').value;
    tokens = document.getElementById('token').value;
    autos = 'autoinbox';
    document.getElementById("autoinbox").disabled = true;
    $("#autoinbox").html('<i class="fa fa-refresh fa-spin"></i> Đang Tiến Hành');
    $("#message").html("");
    $('#star').show();
    log('<i class="fa fa-spinner fa-pulse"></i> Quá Trình Bom Inbox Đang Diễn Ra, Vui Lòng Đợi ... ')
    $.post('done/post_auto.php', {
        id: ids,
        token: tokens,
		noidung: noidungs,
         _SERVER: server,
        auto: autos
    }, function(data, status) {
        log(data);
        $("#autoinbox").html('<i class="fa fa-exchange"></i> Thực Thi');
        document.getElementById("autoinbox").disabled = false;
    });
}
</script> 