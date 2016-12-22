<div class="col-md-12">
<div class="panel panel-white">
<div class="panel-heading">
<h4 class="panel-title">Auto Update Status</h4>
</div>
<div class="panel-body" id="back">
	<div class="inqbox float-e-margins">
		<div class="inqbox-content">
<?php
$idngdung=$_SESSION['id'];
$tonguser=mysqli_num_rows(mysqli_query($connection,"SELECT * FROM `UpStt` ORDER BY RAND()"));
$timid=mysqli_num_rows(mysqli_query($connection,"SELECT * FROM `UpStt` where `idfb`='$idngdung' "));
if($timid == 1){
 ?>			<center><i class="fa fa-toggle-on fa-2"></i> Trạng Thái: Đã Cài Đặt</center>
			<span class="fcg"><center><i class="fa fa-users fa-2"></i> Số Thành Viên Đang Sử Dụng: <?php echo $tonguser; ?> </center></span>
 			<br>
			<div class="form-group">
			<select name="id" id="id" class="form-control">
				<option value="UP">Cập Nhật</option>
				<option value="HUY">Gỡ Bot</option>
			</select>
			</div>
			<div class="form-group">
			<label for="name">Chọn Thể Loại Stt</label>
			<select name="theloai" id="theloai" class="form-control">
				<option value="1">Truyện Cười</option>
				<option value="2">Truyện Vova</option>
				<option value="3">Status Tình Yêu</option>
				<option value="4">Status Tâm Trạng</option>
				<option value="5">Triết Lý Cuộc Sống</option>
			</select>
				<input type="hidden" name="_SERVER" id="_SERVER" value="<? echo $_SESSION['_SERVER']; ?>">
			</div>
			<input class="form-control" type="hidden" name="token" id="token" value="<?php echo $_SESSION['token']; ?>" />
			<div class="form-group">
				<label for="name">Nhập Thời Gian Bot Đăng Stt</label>
					<input type="text" name="thoigian" id="thoigian" class="form-control" value="<?php $time = mysqli_query($connection,"SELECT * FROM UpStt where idfb = '".$idngdung."' ");
					while ($timen = mysqli_fetch_array($time)){ 
					echo $timen['thoigian'];
					} ?>" placeholder="Định Dạng hh:ii - Sáng 09:30 - Chiều 21:30" autofocus="" required="">
			</div>
			<div  align="center">
			<button onclick="Submit();" class="btn btn-danger" name="result" id="result">Cài Đặt <i class="fa fa-arrow-right"></i></button>
			</div>
<?php
} else {
?>			<center> <i class="fa fa-toggle-off fa-2"></i> Trạng Thái: Chưa Được Cài Đặt</center>
			<span class="fcg"><center><i class="fa fa-users fa-2"></i> Số Thành Viên Đang Sử Dụng: <?php echo $tonguser; ?> </center></span>
			<br>
			<div class="form-group">
			<label for="name">Chọn Thể Loại Stt</label>
			<select name="theloai" id="theloai" class="form-control">
				<option value="1">Truyện Cười</option>
				<option value="2">Truyện Vova</option>
				<option value="3">Status Tình Yêu</option>
				<option value="4">Status Tâm Trạng</option>
				<option value="5">Triết Lý Cuộc Sống</option>
			</select>
				<input type="hidden" name="_SERVER" id="_SERVER" value="<? echo $_SESSION['_SERVER']; ?>">
				<input type="hidden" name="id" id="id" value="OK">
			</div>
			<input class="form-control" type="hidden" name="token" id="token" value="<?php echo $_SESSION['token']; ?>" />
			<div class="form-group">
				<label for="name">Nhập Thời Gian Bot Đăng Stt</label>
					<input type="text" name="thoigian" id="thoigian" class="form-control" value="" placeholder="Định Dạng hh:ii - Sáng 09:30 - Chiều 21:30" autofocus="" required="">
			</div>
			<div  align="center">
			<button onclick="Submit();" class="btn btn-danger" name="result" id="result">Cài Đặt <i class="fa fa-arrow-right"></i></button>
			</div>
<?php
}
?>
		</div>
		<div class="inqbox-footer">
		</div>
	</div>
</div>

</div></div>

<script type="text/javascript"> 

function start()
{      
         $("input").attr("disabled", "disabled");   
         $("select").attr("disabled", "disabled");   
         $("button").attr("disabled", "disabled"); 
} 
function finish()
{        
         $("input").removeAttr("");    
         $("select").removeAttr("disabled"); 
         $("button").removeAttr("disabled"); }  
function Submit() 
{ 
start(); 
         $('#result').html('<i class="m-progress"></i>&nbsp;');
         var id = $('#id').val(); 
		 var _SERVER = $('#_SERVER').val();
		 var theloai = $('#theloai').val(); 
		 var thoigian = $('#thoigian').val(); 
         var url_login	 = 'done/post_bot.php';	
$.ajax({		
         url	 : url_login,	
        data : {
		auto : 'upstt',
		yeucau : id,
		theloai : theloai,
		thoigian : thoigian,
		_SERVER : _SERVER
        },
         type	 : 'POST',	
         dataType: 'html', 
         success : function(pesan){ 
finish();	
         $("#result").html(pesan);
         $("#thongbao").load("bot/thongbao.php",{'tb':'like'});
         $("#result").html('Xác nhận <i class="fa fa-arrow-right"></i>');

    },
   }); 
}

document.title='Auto Update Status Facebook';
</script>
