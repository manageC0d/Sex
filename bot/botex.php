<?
include '../system/func.php';
?>

<div class="col-md-12">
<div class="panel panel-white">
<div class="panel-heading">
<h4 class="panel-title">Bot Ex Like</h4>
</div>
<div class="panel-body" id="back">
	<div class="inqbox float-e-margins">
		<div class="inqbox-content">
			<div class="form-group">
			<div class="tab-content">
<?php
$idngdung=$_SESSION['id'];
$tonguser=mysqli_num_rows(mysqli_query($connection,"SELECT * FROM `BotEx` ORDER BY RAND()"));
$timid=mysqli_num_rows(mysqli_query($connection,"SELECT * FROM `BotEx` where `idfb`='$idngdung' "));
if($timid == 1){
 ?>
			<div class="alert alert-info" id="star" style="display: none;">
				<div id="message"></div>
			</div>
			<center><i class="fa fa-toggle-on fa-2"></i> Trạng Thái: Đã Cài Đặt</center>
			<span class="fcg"><center><i class="fa fa-users fa-2"></i> Số Thành Viên Đang Sử Dụng: <?php echo $tonguser; ?> </center></span></div>
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
		 var _SERVER = $('#_SERVER').val();
         var url_login	 = 'done/post_bot.php';	
$.ajax({		
         url	 : url_login,	
        data : {
		auto : 'botex',
		yeucau : id,
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

document.title='Bot Ex Like Facebook';
</script>
