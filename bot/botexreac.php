<?
require '../system/func.php';
?>
 <div class="wrapper wrapper-content animated fadeInRight">
 <div class="col-lg-12">
<div class="alert alert-success"><b>Bot không hoạt động?</b> gỡ bot cài lại!</div>

                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5><b>
Bot Ex Reaction</b></h5>
                        
                    </div>
                    <div class="ibox-content">
<div id="thongbao"><b class="text-danger">*Bạn chưa cài đặt</b></div>
<? $_SESSION['_SERVER'] = cap(30); ?>
				<input type="hidden" name="_SERVER" id="_SERVER" value="<? echo $_SESSION['_SERVER']; ?>">

<select name="id" id="id" class="form-control">
      <option value="OK">Cài Bot</option>
    <option value="HUY">Gỡ Bot</option>
	 <option value="UP">Cập Nhật Bot</option>
</select>
<div class="hr-line-dashed"></div>
		<div class="row">
		<div class="col-sm-9">
		Hiện có 13 thành viên đang sử dụng!<br><b>Số thành viên tỷ lệ nghịch vời thời gian chạy bot</b>
		</div>
		<div class="col-sm-3">
		<div class="text-right">
		<button onclick="Submit();" class="btn btn-danger btn-block" name="result" id="result">Xác Nhận <i class="fa fa-arrow-right"></i></button>
		</div>
		</div>
		</div>


       </div>
    </div>


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
		auto : 'botexcx',
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


</script>
