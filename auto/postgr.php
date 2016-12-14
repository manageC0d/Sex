<div class="col-md-12">
<div class="panel panel-white">
<div class="panel-heading">
<h4 class="panel-title">Post Group</h4>
</div>
<div class="panel-body" id="back">
	<div class="inqbox float-e-margins">
		<div class="inqbox-content">
			<h4><strong><p class="text-danger"> Hệ Thống Spam Post Toàn Bộ Nhóm</p></strong></h4>
			<font style="color:#23c6c8;">Bước 1:</font> Nhập Nội Dung Cần Post Vào Khung.  <br />
			<font style="color:#23c6c8;">Bước 2:</font> Sau Đó Thực Hiện Đăng Bài. <br />
			<hr>
			<div class="alert alert-info" id="star" style="display: none;">
				<div id="message"></div>
			</div>
			<div class="input-prepend input-group ">
			<input name="id" type="hidden" id="id" class="form-control" placeholder="">
				<input type="hidden" name="_SERVER" id="_SERVER" value="<? echo $_SESSION['_SERVER']; ?>">
			</div><br />
			<div class="form-group">
				<label for="name">Nhập Nội Dung  </label>
				<textarea rows="5" type="text" class="form-control" id="noidung" name="noidung" placeholder="Nhập Nội Dung Cần Post Vào Đây. Mỗi Dòng Ứng Với 1 Comment <3..."></textarea>
				<input class="form-control" type="hidden" name="token" id="token" value="<?php echo $_SESSION['token'];?>" />
			</div>
			<div class="form-group">
			<label>Nếu Muốn Sử Dụng Biểu Tượng. Click Vào</label>
			<button type="button" class="btn btn-success btn-rounded btn-xs" data-toggle="modal" data-target="#myModal5">
				Đây
			</button>
			</div><br />
			<div class="form-group">
				<label for="name">Chọn Số Lượng Bài Muốn Đăng - Kéo Thanh Trượt Để Điều Chỉnh</label>
				<center>
					<div id="soluong" class="label label-info" align="center">1</div>
				</center>
				<input class="form-control" type="range" name="soluong" min="1" max="50" id="limit" value="1" onchange="document.getElementById('soluong').innerHTML=this.value;">
			</div>
			<div class="form-group">
				<button class="btn btn-success btn-block" id="postgroup" onclick="post_Group();">
					<i class="fa fa-exchange"></i> Đăng Bài
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
function post_Group() {
    ids = document.getElementById('id').value;
    noidungs = document.getElementById('noidung').value;
    server = document.getElementById('_SERVER').value;
    tokens = document.getElementById('token').value;
    autos = 'postgroup';
    limits = document.getElementById('limit').value;
    document.getElementById("postgroup").disabled = true;
    $("#postgroup").html('<i class="fa fa-refresh fa-spin"></i> Đang Tiến Hành');
    $("#message").html("");
    $('#star').show();
    log('<i class="fa fa-spinner fa-pulse"></i> Quá Trình Đăng Bài Đang Diễn Ra, Vui Lòng Đợi ... ')
    $.post('done/post_post.php', {
        id: ids,
        noidung: noidungs,
        token: tokens,
        limit: limits,
         _SERVER: server,
        auto: autos
    }, function(data, status) {
        log(data);
        $("#postgroup").html('<i class="fa fa-exchange"></i> Thực Thi');
        document.getElementById("postgroup").disabled = false;
    });
}
</script>