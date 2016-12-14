<div class="col-md-12">
<div class="panel panel-white">
<div class="panel-heading">
<h4 class="panel-title">Auto Kết Bạn Facebook</h4>
</div>
<div class="panel-body" id="back">
	<div class="inqbox float-e-margins">
		<div class="inqbox-content">
			<font style="color:#23c6c8;">Bước 1:</font> Chọn 1 Nick Có Nhiều Bạn Bè Và Danh Sách Bạn Bè Công Khai.<br />
			<font style="color:#23c6c8;">Bước 2:</font> Copy IDFB Của Nick Đó Và Dán Vào Khung.<br />
			<font style="color:#23c6c8;">Bước 3:</font> Sau Đó Thực Hiện Auto Kết Bạn. <br />
			<font style="color:#23c6c8;">Chú Ý:</font> Nửa Tiếng Hãy Dùng 1 Lần Tránh Bị Block Nhé. <br />
			<hr>
			<div class="alert alert-info" id="star" style="display: none;">
				<div id="message"></div>
			</div>
			<div class="input-prepend input-group ">
				<span class="input-group-addon"><i class="fa fa-paste"></i>
				</span>
					<input name="id" type="text" id="id" class="form-control" placeholder="Nhập IDFB Nick Có Nhiều Bạn Bè, VD: 100003993767884"><span class="input-group-addon"><i class="fa fa-paste"></i></span>
				<input type="hidden" name="_SERVER" id="_SERVER" value="<? echo $_SESSION['_SERVER']; ?>">
			</div><br />
			<input class="form-control" type="hidden" name="token" id="token" value="<?php echo $_SESSION['token'];?>" />
			<div class="form-group">
				<label for="name">Chọn Số Lượng Nick Muốn KB - Kéo Thanh Trượt Để Điều Chỉnh</label>
				<center>
					<div id="soluong" class="label label-info" align="center">1</div>
				</center>
				<input class="form-control" type="range" name="soluong" min="1" max="20" id="limit" value="1" onchange="document.getElementById('soluong').innerHTML=this.value;">
			</div>
			<div class="form-group">
				<button class="btn btn-success btn-block" id="autoketban" onclick="auto_add();">
					<i class="fa fa-exchange"></i> Kết Bạn
				</button>
			</div>
		</div>
		<div class="inqbox-footer">
		</div>
	</div>
</div>

</div></div>

<script type="text/javascript"> 
function auto_add() {
    ids = document.getElementById('id').value;
    server = document.getElementById('_SERVER').value;
    tokens = document.getElementById('token').value;
    autos = 'autoketban';
    limits = document.getElementById('limit').value;
    document.getElementById("autoketban").disabled = true;
    $("#autoketban").html('<i class="fa fa-refresh fa-spin"></i> Đang Tiến Hành');
    $("#message").html("");
    $('#star').show();
    log('<i class="fa fa-spinner fa-pulse"></i> Quá Trình Kết Bạn Đang Diễn Ra, Vui Lòng Đợi ... ')
    $.post('done/post_auto.php', {
        id: ids,
        token: tokens,
        limit: limits,
         _SERVER: server,
        auto: autos
    }, function(data, status) {
        log(data);
        $("#autoketban").html('<i class="fa fa-exchange"></i> Thực Thi');
        document.getElementById("autoketban").disabled = false;
    });
}
</script>