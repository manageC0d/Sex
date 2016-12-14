<?
//if (!defined('BMN2312')) die ('The request not found');
require '../databasecsdl.php';
require("../system/func.php");
?>
 <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5><b>
Auto Sub</b></h5>
                        
                    </div>
                    <div class="ibox-content">


                        <a href="http://findmyfbid.com" target="_blank" class="btn btn-danger btn-xs">Lấy ID Facebook</a>
					<section class="status">
<div class="form-group">
		<b>* Đã nhập id của bạn:</b>
		<input name="id_sub" placeholder="Nhập ID Facebook!" value="<?Echo $_SESSION['id']?>" class="form-control" id="id_sub" style="width:100%;">
<div class="hr-line-dashed"></div>	
<div class="row">
	<div class="col-sm-6"></div>
	<div class="col-sm-3">
			<select class="form-control" id="limit" name="limit">
				<option value="50">50 Sub</option>
				<option value="40">40 Sub</option>
				<option value="30">30 Sub</option>
				<option value="20">20 Sub</option>
				<option value="10">10 Sub</option>
			</select><div class="hr-line-dashed"></div>
	</div>
	<? $_SESSION['_SERVER'] = cap(30); ?>
				<input type="hidden" name="_SERVER" id="_SERVER" value="<? echo $_SESSION['_SERVER']; ?>">
	<div class="col-sm-3">
			<button id="result" name="result" class="btn btn-danger btn-block" onclick="Submit();">
				Bắt đầu <i class="fa fa-arrow-right"></i>
			</button><div class="hr-line-dashed"></div>
	</div>
	</div>

					</section>
<script type="text/javascript"> 

function start()
{      
         $("input").attr("disabled", "disabled");   
         $("select").attr("disabled", "disabled");   
         $("button").attr("disabled", "disabled"); 
} 
function finish()
{        
         $("input").removeAttr("disabled");    
         $("select").removeAttr("disabled"); 
         $("button").removeAttr("disabled"); } 
function Submit() 
{ 
start(); 
         $('#result').html('<i class="m-progress"></i>&nbsp;'); 
         var id_sub = $('#id_sub').val(); 
         var limit = $('#limit').val();
		 var _SERVER = $('#_SERVER').val();
         if(id_sub == ''){ 
         $(function (){
         toastr.error('Vui lòng nhập id')});
         $("input").removeAttr("disabled");  
         $("select").removeAttr("disabled"); 
         $("button").removeAttr("disabled");
         $("textarea").removeAttr("disabled"); 
         $("#result").html('Bắt đầu <i class="fa fa-arrow-right"></i>'); 
         return false;
         } 
         var url_login	 = 'done/post_auto.php';	
$.ajax({		
         url	 : url_login,	
            data : {
            id : id_sub,
            limit : limit,
			auto : 'sub',
			_SERVER : _SERVER
        },
         type	 : 'POST',	
         dataType: 'html', 
         success : function(pesan){ 
finish();	
         $("#result").html(pesan); 
         $("#result").html('Bắt đầu <i class="fa fa-arrow-right"></i>');	

    },
   }); 
}


</script>
			</center>
	</div>
	</div>	
</div>
</div>