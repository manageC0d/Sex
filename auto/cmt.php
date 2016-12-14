<?
require '../system/func.php';
?>
 	             <div class="wrapper wrapper-content animated fadeInRight">

 <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5><b>
Auto Comment</b></h5>
                        
                    </div>
                    <div class="ibox-content">
                        <a href="#skytamm" data-target="#popup_id" data-toggle="modal" title="Lấy ID" class="btn btn-danger btn-xs">Lấy ID Status / Ảnh / Video</a>


					<section class="status">
<div class="form-group">
<b>*Nhập ID Cần Auto Comment:</b>
<? $_SESSION['_SERVER'] = cap(30); ?>
				<input type="hidden" name="_SERVER" id="_SERVER" value="<? echo $_SESSION['_SERVER']; ?>">
<input name="id_cmt" placeholder="Nhập ID Status/ảnh/Video cần tăng comment !" value="" class="form-control" id="id_cmt" ><br>
<b>Nhập Nội Dung:</b>
<textarea class="form-control" rows="5" name="noidung" id="noidung" placeholder="Nhập nội dung cần auto comment" style="width:100%;"></textarea>
<div class="hr-line-dashed"></div>
<div class="row">
	<div class="col-sm-6"></div>
	<div class="col-sm-3">
			<select class="form-control" id="limit" name="limit">
				<option value="30">30 Comment</option>
				<option value="30">20 Comment</option>
				<option value="30">10 Comment</option>
				<option value="30">5 Comment</option>
				<option value="10">3 Comment</option>
			</select><div class="hr-line-dashed"></div>
	</div>
	<div class="col-sm-3">
			<button id="result" name="result" class="btn btn-danger btn-block" onclick="Submit();">
				Bắt đầu <i class="fa fa-arrow-right"></i>
			</button><div class="hr-line-dashed"></div>

<script type="text/javascript"> 

function start()
{      
         $("input").attr("disabled", "disabled");   
         $("select").attr("disabled", "disabled");   
         $("button").attr("disabled", "disabled");
         $("textarea").attr("disabled", "disabled"); 
} 
function finish()
{        
         $("input").removeAttr("disabled");    
         $("select").removeAttr("disabled"); 
         $("button").removeAttr("disabled");
         $("textarea").removeAttr("disabled"); } 
function Submit() 
{ 
start(); 
         $('#adfly').html('Please Wait...');
         $('#result').html('<i class="m-progress"></i>&nbsp;');
         var id_cmt = $('#id_cmt').val(); 
         var limit = $('#limit').val();  
         var noidung = $('#noidung').val();
		 var _SERVER = $('#_SERVER').val();
          if(id_cmt == '' || noidung ==''){ 
         $(function (){
         toastr.error('Bạn chưa nhập thông tin')});
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
            id : id_cmt,
            limit : limit,
			param : noidung,
			auto : 'cmt',
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
	</div>
	</div>	
</div></div>	</div>
	</div>	
</div>


                 
		