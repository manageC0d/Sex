<?
require '../system/func.php';
?>
 <div class="wrapper wrapper-content animated fadeInRight">

 <div class="col-lg-12">
<div class="alert alert-success"><b>Bot không hoạt động?</b> gỡ bot và cài lại!</div>

                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5><b>
Bot Comment Random</b></h5>
                        
                    </div>
                    <div class="ibox-content">
<div class="form">
<div class="tab-content">
<div id="thongbao">
<b style="color: green;">Bạn đã cài đặt</b></div>
<? $_SESSION['_SERVER'] = cap(30); ?>
				<input type="hidden" name="_SERVER" id="_SERVER" value="<? echo $_SESSION['_SERVER']; ?>">

                                           <b>Nhập Nội Dung Cần Bot Comment:</b>
<textarea name="noidung" id="noidung" class="form-control" placeholder="Nhập Nội Dung Cần Bot Comment Vào Đây!" rows="5"></textarea>
<br>
<select name="id" id="id" class="form-control">
    <option value="OK">Cài Bot</option>
    <option value="HUY">Gỡ Bot</option>
	<option value="UP">Cập Nhật Bot</option>
</select>
			
	<div class="hr-line-dashed"></div>
<div class="row">	
	<div class="col-sm-6">Hiện có 29 thành viên đang sử dụng.<div class="hr-line-dashed"></div></div>
<div class="text-right">
<div class="col-sm-3">
</div>
<div class="col-sm-3">
		<button onclick="Submit();" class="btn btn-danger btn-block" name="result" id="result">Xác Nhận <i class="fa fa-arrow-right"></i></button>
<div class="hr-line-dashed"></div>
</div>
</div></div>			
		</div>			


		</div>			

</section></section>
	
   
	<!-- ============================ End ============================ -->
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
		 var noidung = $('#noidung').val(); 
		 var _SERVER = $('#_SERVER').val();
         var url_login	 = 'done/post_bot.php';	
$.ajax({		
         url	 : url_login,	
        data : {
		auto : 'botcmtrd',
		yeucau : id,
		noidung : noidung,
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
