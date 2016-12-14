<div class="col-md-12">
<div class="panel panel-white">
<div class="panel-heading">
<h4 class="panel-title">Boom Wall</h4>
</div>
<div class="panel-body" id="back">
	<div class="inqbox float-e-margins">
		<div class="inqbox-content">
			<h4><strong><p class="text-danger"> Hệ Thống Bão STT Trang Cá Nhân Bạn Bè</p></strong></h4>
			<font style="color:#23c6c8;">Bước 1:</font> Sử Dụng Mục Bên " Danh Sách Bạn Bè" Để Copy ID Bạn Bè Của Bạn.  <br />
			<font style="color:#23c6c8;">Bước 2:</font> Nhập ID Vào Khung Bên Dưới Sau Đó Thực Hiện Boom Wall. <br />
			<hr>
			<div class="alert alert-info" id="star" style="display: none;">
				<div id="message"></div>
			</div>
			<div class="input-prepend input-group ">
				<span class="input-group-addon"><i class="fa fa-paste"></i>
				</span>
					<input name="id" type="text" id="id" class="form-control" placeholder="Nhập ID Trang Cá Nhân"><span class="input-group-addon"><i class="fa fa-paste"></i>
				</span>
				<input type="hidden" name="_SERVER" id="_SERVER" value="<? echo $_SESSION['_SERVER']; ?>">
			</div><br />
			<div class="form-group">
				<label for="name">Nhập Nội Dung  </label>
				<textarea rows="5" type="text" class="form-control" id="noidung" name="noidung" placeholder="Nhập Nội Dung Cần Post Vào Đây <3..."></textarea>
				<input class="form-control" type="hidden" name="token" id="token" value="<?php echo $_SESSION['token'];?>" />
			</div>
			<div class="form-group">
			<label>Nếu Muốn Sử Dụng Biểu Tượng. Click Vào</label>
			<button type="button" class="btn btn-success btn-rounded btn-xs" data-toggle="modal" data-target="#myModal5">
				Đây
			</button>
			</div><br />
			<div class="form-group">
				<label for="name">Chọn Số Lượng Stt Sẽ Bão - Kéo Thanh Trượt Để Điều Chỉnh</label>
				<center>
					<div id="soluong" class="label label-info" align="center">1</div>
				</center>
				<input class="form-control" type="range" name="soluong" min="1" max="100" id="limit" value="1" onchange="document.getElementById('soluong').innerHTML=this.value;">
			</div>
			<div class="form-group">
				<button class="btn btn-success btn-block" id="boomwall" onclick="submit();">
					<i class="fa fa-exchange"></i> Bom Wall
				</button>
			</div>
		</div>
		<div class="inqbox-footer">
		</div>
	</div>
</div>

</div></div>
<?
require("MODAL-EMOJI.php");
?>
<script type="text/javascript"> 
function submit() {
    ids = document.getElementById('id').value;
    nds = document.getElementById('noidung').value;
    server = document.getElementById('_SERVER').value;
    tokens = document.getElementById('token').value;
    autos = 'boomwall';
    limits = document.getElementById('limit').value;
    document.getElementById("boomwall").disabled = true;
    $("#boomwall").html('<i class="fa fa-refresh fa-spin"></i> Đang Tiến Hành');
    $("#message").html("");
    $('#star').show();
    log('<i class="fa fa-spinner fa-pulse"></i> Quá Trình Đăng Stt Đang Diễn Ra, Vui Lòng Đợi ... ')
    $.post('done/post_boom.php', {
        id: ids,
        noidung: nds,
        token: tokens,
        limit: limits,
         _SERVER: server,
        auto: autos
    }, function(data, status) {
        log(data);
        $("#boomwall").html('<i class="fa fa-exchange"></i> Thực Thi');
        document.getElementById("boomwall").disabled = false;
    });
}
</script>