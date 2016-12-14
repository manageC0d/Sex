<div class="col-md-12">
<div class="panel panel-white">
<div class="panel-heading">
<h4 class="panel-title">Boom Cảm Xúc</h4>
</div>
<div class="panel-body" id="back">
	<div class="inqbox float-e-margins">
		<div class="inqbox-content">
			<h4><strong><p class="text-danger"> Hệ Thống Bão Cảm Xúc Trang Cá Nhân Theo ID Bất Kỳ</p></strong></h4>
			<font style="color:#23c6c8;">Bước 1:</font> Sử Dụng Mục Bên " Danh Sách Bạn Bè" Để Copy ID Bạn Bè Của Bạn.  <br />
			<font style="color:#23c6c8;">Bước 2:</font> Nhập ID Vào Khung Bên Dưới Sau Đó Thực Hiện Boom. <br />
			<hr>
			<div class="alert alert-info" id="star" style="display: none;">
				<div id="message"></div>
			</div>
			<div class="input-prepend input-group ">
				<span class="input-group-addon"><i class="fa fa-paste"></i>
				</span>
					<input name="id" type="text" id="id" class="form-control" placeholder="Nhập ID Trang Cá Nhân"><span class="input-group-addon"><i class="fa fa-paste"></i></span>
				<input type="hidden" name="_SERVER" id="_SERVER" value="<? echo $_SESSION['_SERVER']; ?>">
			</div><br />
			<div class="input-prepend input-group ">
				<span class="input-group-addon"><i class="fa fa-paste"></i>
				</span>
				<select id="camxuc" class="form-control">
				<option value="LOVE">Cảm Xúc Love</option>
				<option value="HAHA">Cảm Xúc HaHa</option>
				<option value="WOW">Cảm Xúc Wow</option>
				<option value="SAD">Cảm Xúc Sad</option>
				<option value="ANGRY">Cảm Xúc Angry</option>
				<option value="THANKFUL">Cảm Xúc Thank Ful</option>
				</select>
				<span class="input-group-addon"><i class="fa fa-paste"></i></span>
			</div><br />
			<input class="form-control" type="hidden" name="token" id="token" value="<?php echo $_SESSION['token'];?>" />
			<div class="form-group">
				<label for="name">Chọn Số Lượng Cảm Xúc Sẽ Bão - Kéo Thanh Trượt Để Điều Chỉnh</label>
				<center>
					<div id="soluong" class="label label-info" align="center">1</div>
				</center>
				<input class="form-control" type="range" name="soluong" min="1" max="100" id="limit" value="1" onchange="document.getElementById('soluong').innerHTML=this.value;">
			</div>
			<div class="form-group">
				<button class="btn btn-success btn-block" id="boomcamxuc" onclick="post_BoomReaction();">
					<i class="fa fa-exchange"></i> Bão Like
				</button>
			</div>
		</div>
		<div class="inqbox-footer">
		</div>
	</div>
</div>

</div></div>
<div class="col-md-12">
<div class="panel panel-white">
<div class="panel-heading">
<h4 class="panel-title">Danh Sách Bạn Bè</h4>
</div>
	<div class="panel-body">
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Tên</th>
						<th>ID Profile</th>
						<th>Thao Tác</th>
					</tr>
				</thead>
				<tbody id="checkfriend">
					<tr>
						<td colspan="4"><br /><center><a href="#" onclick="checkfriend();">TẢI DANH SÁCH BẠN BÈ</a></center></td>
					</tr>
				</tbody>
</table>
</div></div></div>

<script type="text/javascript">
function post_BoomReaction() {
    ids = document.getElementById('id').value;
    camxucs = document.getElementById('camxuc').value;
    server = document.getElementById('_SERVER').value;
    tokens = document.getElementById('token').value;
    autos = 'boomcamxuc';
    limits = document.getElementById('limit').value;
    document.getElementById("boomcamxuc").disabled = true;
    $("#boomcamxuc").html('<i class="fa fa-refresh fa-spin"></i> Đang Tiến Hành');
    $("#message").html("");
    $('#star').show();
    log('<i class="fa fa-spinner fa-pulse"></i> Quá Trình Bão Like Đang Diễn Ra, Vui Lòng Đợi ... ')
    $.post('done/post_boom.php', {
        id: ids,
        camxuc: camxucs,
        token: tokens,
        limit: limits,
         _SERVER: server,
        auto: autos
    }, function(data, status) {
        log(data);
        $("#boomcamxuc").html('<i class="fa fa-exchange"></i> Thực Thi');
        document.getElementById("boomcamxuc").disabled = false;
    });
}
</script>