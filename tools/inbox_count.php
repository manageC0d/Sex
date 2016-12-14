<div class="col-md-12" id="html_inbox_count">
<div class="panel panel-white">
<div class="panel-heading">
<h4 class="panel-title">Đếm Số Tin Nhắn Đã Gửi Trên Facebook</h4>
</div>
<div class="panel-body" id="back">
	<div class="inqbox float-e-margins">
		<div class="inqbox-content"><br>
		<input class="form-control" id="input_inbox_count" placeholder="Dán Access Token có quyền đọc tin nhắn vào đây ..." value="<?php echo $_SESSION['token']; ?>"/>
		</br>
		<div class="hr-line-dashed"></div>
		Trạng thái: <span id="inbox_count_status">Đang chờ !</span>
		<div class="hr-line-dashed"></div>
		<div class="text-right">
			<a class="btn btn-danger" id="submit_inbox_count">
				Xem số tin nhắn đã gửi
			</a>
		</div>
	</div>
</div>
</div>
</div>
</div>
<div class="col-md-12" id="html_inbox_count_result" style="display:none;">
<div class="panel panel-white">
<div class="panel-heading">
<h4 class="panel-title">Đếm Số Tin Nhắn Đã Gửi Trên Facebook</h4>
</div>
	<div class="ibox-content">
		<textarea class="form-control" id="input_inbox_count_result" rows="8"></textarea>
		<div class="hr-line-dashed"></div>
		<div class="text-right">
			<a class="btn btn-success" id="click_inbox_post_fb">
				Đăng lên Facebook
			</a>
		</div>
	</div>
</div>
</div>

<script type="text/javascript"> 
$(document).ready(function() {
    // This WILL work because we are listening on the 'document', 
    // for a click on an element with an ID of #test-element
    $(document).on("click","#submit_inbox_count",function() {
        alert("click bound to document listening for #test-element");
    });

    // This will NOT work because there is no '#test-element' ... yet
    $("#test-element").on("click",function() {
        alert("click bound directly to #test-element");
    });

    // Create the dynamic element '#test-element'
    $('body').append('<div id="test-element">Click mee</div>');
});
</script>