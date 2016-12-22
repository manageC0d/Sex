<?
include '../system/func.php';
?>

<div class="col-md-12">
<div class="panel panel-white">
<div class="panel-heading">
<h4 class="panel-title">Auto Like</h4>
</div>
<div class="panel-body" id="back">
	<div class="inqbox float-e-margins">
		<div class="inqbox-content">
			<div class="form-group">
			<div class="alert alert-info" id="star" style="display: none;">
				<div id="message"></div>
			</div>
			<input type="hidden" name="_SERVER" id="_SERVER" value="<? echo $_SESSION['_SERVER']; ?>">
			<input name="id" placeholder="Nhập ID Status/ảnh/Video cần tăng Like !" class="form-control" id="id" style="width:100%;"></br>
			<select name="limit" id="limit" class="form-control">
				<option value="50">50 Like</option>
				<option value="30">30 Like</option>
				<option value="10">10 Like</option>
				<option value="70">70 Like</option>
				<option value="100">100 Like</option>
			</select><br/>
			<div  align="center">
			<button onclick="Submit();" class="btn btn-success" name="result" id="like">Bắt đầu <i class="fa fa-arrow-right"></i></button>
			</div>
			</div>
		</div>
	</div>
</div>
</div></div>

<!--
<div class="col-md-12">
<div class="panel panel-white">
<div class="panel-heading">
<h4 class="panel-title">Gần Đây</h4>
</div>
<div class="panel-body" id="back">
	<div class="inqbox float-e-margins">
		<div class="inqbox-content">
			<div class="form-group">
				<div class="tabs-container">
				<ul class="nav nav-tabs tab-border-top-info">
					<li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="false"> All Post</a></li>
					<li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="true" onclick="loadstatus();"> Status</a></li>
					<li class=""><a data-toggle="tab" href="#tab-3" aria-expanded="true" onclick="loadphotos();">Photos</a></li>
					<li class=""><a data-toggle="tab" href="#tab-4" aria-expanded="true" onclick="loadvideos();">Video</a></li>
					<li class=""><a data-toggle="tab" href="#tab-5" aria-expanded="true" onclick="loadlinks();">Link</a></li>

				</ul>
				<div class="tab-content">
					<div id="tab-1" class="tab-pane active">
						<div class="panel-body">
							<div id="allposts"></div>
						</div>
					</div>
					<div id="tab-2" class="tab-pane active">
						<div class="panel-body">
							<div id="status"></div>
						</div>
					</div>
					
					<div id="tab-3" class="tab-pane active">
						<div class="panel-body">
							<div id="photos"></div>
						</div>
					</div>
					<div id="tab-4" class="tab-pane">
						<div class="panel-body">
							<div id="videos"></div>
						</div>
					</div>
					<div id="tab-5" class="tab-pane">
						<div class="panel-body">
							<div id="links"></div>
						</div>
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>
</div>
</div></div>-->

<script type="text/javascript">
function Submit() {
	a = document.getElementById('id').value;
	if (!a) {toarst("error","Bạn Chưa Nhập ID","Lỗi ID"); return false;}
	ids = get_id(a);
	server = document.getElementById('_SERVER').value;
	autos = 'like';
	limits = document.getElementById('limit').value;
	document.getElementById("like").disabled = true;
	$("#like").html('<i class="fa fa-refresh fa-spin"></i> Đang Tiến Hành');
	$("#message").html("");
	$('#star').show();
	log('<i class="fa fa-spinner fa-pulse"></i> Đang Auto Like, vui lòng đợi ... ')
	$.post('modun/post_auto_cu.php', {
	    id: ids,
	    limit: limits,
                _SERVER: server,
	    auto: autos
	}, function(data, status) {
	    log(data);
	    $("#like").html('<i class="fa fa-exchange"></i> Auto Like');
	    document.getElementById("like").disabled = false;
	});
}
document.title='Auto Like Facebook';
</script>
