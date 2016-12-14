<?
include '../system/func.php';
?>

<div class="col-md-12">
<div class="panel panel-white">
<div class="panel-heading">
<h4 class="panel-title">Bot Comment Image</h4>
</div>
<div class="panel-body" id="back">
	<div class="inqbox float-e-margins">
		<div class="inqbox-content">
			<div class="form-group">
			<div class="tab-content">
<?php
$idngdung=$_SESSION['id'];
$tonguser=mysqli_num_rows(mysqli_query($connection,"SELECT * FROM `BotCmtImg` ORDER BY RAND()"));
$timid=mysqli_num_rows(mysqli_query($connection,"SELECT * FROM `BotCmtImg` where `idfb`='$idngdung' "));
if($timid == 1){
 ?>
			<div class="alert alert-info" id="star" style="display: none;">
				<div id="message"></div>
			</div>
			<center><i class="fa fa-toggle-on fa-2"></i> Trạng Thái: Đã Cài Đặt</center>
			<span class="fcg"><center><i class="fa fa-users fa-2"></i> Số Thành Viên Đang Sử Dụng: <?php echo $tonguser; ?> </center></span></div>
			<input name="hinhanh" type="text" id="hinhanh" class="form-control" value="<?php 
			$infotv = mysqli_query($connection,"SELECT * FROM `BotCmtImg` where `idfb`='$idngdung' ");
			$getinfo = mysqli_fetch_array($infotv); echo $getinfo['hinhanh']; ?>" placeholder="Nhập URL ảnh định dạng JPG, VD: http://i.imgur.com/b56sQKc.jpg"></br>
			<input type="hidden" name="_SERVER" id="_SERVER" value="<? echo $_SESSION['_SERVER']; ?>">
			<select name="id" id="id" class="form-control">
				<option value="UP">Cập Nhật</option>
				<option value="HUY">Gỡ Bot</option>
			</select><br/>
			<div  align="center">
			<button onclick="Submit();" class="btn btn-success" name="result" id="result">Cập Nhật <i class="fa fa-arrow-right"></i></button>
			</div>
<?php
} else {
?>		
			<div id="thongbao"><b class="text-danger"></b></div>
			<center> <i class="fa fa-toggle-off fa-2"></i> Trạng Thái: Chưa Được Cài Đặt</center>
			<span class="fcg"><center><i class="fa fa-users fa-2"></i> Số Thành Viên Đang Sử Dụng: <?php echo $tonguser; ?> </center></span></div>
			<input name="hinhanh" type="text" id="hinhanh" class="form-control" placeholder="Nhập URL ảnh định dạng JPG, VD: http://i.imgur.com/b56sQKc.jpg"></br>
			<input type="hidden" name="_SERVER" id="_SERVER" value="<? echo $_SESSION['_SERVER']; ?>">
			<select name="id" id="id" class="form-control">
				<option value="OK">Cài Bot</option>
			</select><br/>
			<div  align="center">
			<button onclick="Submit();" class="btn btn-danger" name="result" id="result">Cài Đặt <i class="fa fa-arrow-right"></i></button>
			</div>
<?php
}
?>
			</div>
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
		 var hinhanh = $('#hinhanh').val();
		 if (!hinhanh) {toarst("error","Vui Lòng Nhập URL Ảnh Dạng JPG","Lỗi Đường Dẫn"); return false;}
		 var _SERVER = $('#_SERVER').val();
         var url_login	 = 'done/post_bot.php';	
$.ajax({		
         url	 : url_login,	
        data : {
		auto : 'botcmtIMG',
		yeucau : id,
		hinhanh : hinhanh,
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


</script>
