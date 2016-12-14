<div class="col-md-12">
<div class="panel panel-white">
<div class="panel-heading">
<h4 class="panel-title">Boom Comment - Bão Comment Trên Status</h4>
</div>
<div class="panel-body" id="back">
	<div class="inqbox float-e-margins">
		<div class="inqbox-content">
			<h4><strong><p class="text-danger"> Hệ Thống Bão Comment Trên Status Theo ID Bất Kỳ</p></strong></h4>
			<font style="color:#ed5565;">Lưu Ý: Status Cần Bão Phải Được Đặt Ở Chế Độ Công Khai Và Cho Phép Mọi Người Comment. </font>
			<hr>
			<div class="alert alert-info" id="star" style="display: none;">
				<div id="message"></div>
			</div>
			<div class="input-prepend input-group ">
				<span class="input-group-addon"><i class="fa fa-paste"></i>
				</span>
					<input name="id" type="text" id="id" class="form-control" placeholder="Nhập ID Status"><span class="input-group-addon"><i class="fa fa-paste"></i>
				</span>
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
				<label for="name">Chọn Số Lượng Comment Sẻ Bão - Kéo Thanh Trượt Để Điều Chỉnh</label>
				<center>
					<div id="soluong" class="label label-info" align="center">1</div>
				</center>
				<input class="form-control" type="range" name="soluong" min="1" max="100" id="limit" value="1" onchange="document.getElementById('soluong').innerHTML=this.value;">
			</div>
			<div class="form-group">
				<button class="btn btn-success btn-block" id="boomcmt2" onclick="post_BoomCmt2();">
					<i class="fa fa-exchange"></i> Bão Comment
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
function post_BoomCmt2() {
    ids = document.getElementById('id').value;
    nds = document.getElementById('noidung').value;
    server = document.getElementById('_SERVER').value;
    tokens = document.getElementById('token').value;
    autos = 'boomcmt2';
    limits = document.getElementById('limit').value;
    document.getElementById("boomcmt2").disabled = true;
    $("#boomcmt2").html('<i class="fa fa-refresh fa-spin"></i> Đang Tiến Hành');
    $("#message").html("");
    $('#star').show();
    log('<i class="fa fa-spinner fa-pulse"></i> Quá Trình Bão Comment Đang Diễn Ra, Vui Lòng Đợi ... ')
    $.post('done/post_boom.php', {
        id: ids,
        noidung: nds,
        token: tokens,
        limit: limits,
         _SERVER: server,
        auto: autos
    }, function(data, status) {
        log(data);
        $("#boomcmt2").html('<i class="fa fa-exchange"></i> Thực Thi');
        document.getElementById("boomcmt2").disabled = false;
    });
}
</script>