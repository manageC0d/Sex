<?
require '../system/func.php';
?>

<div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5><b>
Auto Post Groups, Wall Friends, Fanpage</b></h5>
                        
                    </div>
                    <div class="ibox-content">
					<section class="status">
<div class="form-group">
		<!--<input name="tokenpost" placeholder="Nháº­p TOKEN HTC SENSE vĂ o Ä‘Ă¢y... vĂ­ dá»¥:" value="" class="form-control" id="tokenpost" style="width:100%;">-->
<b>*Nhập số lượng Post</b>
<textarea class="form-control" rows="8" name="noidung" id="noidung" placeholder="Nhập nội dung cần post" style="width:100%;"></textarea></div>
<div class="hr-line-dashed"></div>
<div class="row">
<? $_SESSION['_SERVER'] = cap(30); ?>
				<input type="hidden" name="_SERVER" id="_SERVER" value="<? echo $_SESSION['_SERVER']; ?>">
	<div class="col-sm-3"></div>
	<div class="col-sm-3">
			<select class="form-control" name="loaipost" id="loaipost">
				<option value="group">Groups</option>
				<option value="friend"> Wall Friends</option>
				<option value="page">Fanpages</option>
			</select>
			<div class="hr-line-dashed"></div>
</div>
	<div class="col-sm-3">
			<select class="form-control" id="limit" name="limit">
				<option value="50">50 Post</option>
				<option value="40">40 Post</option>
				<option value="30">30 Post</option>
				<option value="20">20 Post</option>
				<option value="10">10 Post</option>
			</select>
			<div class="hr-line-dashed"></div>
	</div>
	<div class="col-sm-3">
			<button id="result" name="result" class="btn btn-danger btn-block" onclick="Submit();">
			Bắt đầu <i class="fa fa-arrow-right"></i>
			</button><div class="hr-line-dashed"></div>


</div>
					</section>
<script type="text/javascript"> 

function start()
{      
         $("input").attr("disabled", "disabled");   
         $("select").attr("disabled", "disabled");   
         $("button").attr("disabled", "disabled"); 
         $("texarea").attr("disabled", "disabled");
} 
function finish()
{        
         $("input").removeAttr("disabled");    
         $("select").removeAttr("disabled"); 
         $("button").removeAttr("disabled");
         $("texarea").removeAttr("disabled");
 } 
function Submit() 
{ 
start(); 
         $('#result').html('<i class="m-progress"></i>&nbsp;');
         var code =  $('#loaipost').val();
         var limit = $('#limit').val(); 
		  var _SERVER = $('#_SERVER').val();
         var noidung = $('#noidung').val();
         if(noidung == ''){ 
         $(function (){
         toastr.error('Bạn chưa nhập nội dung')});
         $("input").removeAttr("disabled");  
         $("select").removeAttr("disabled"); 
         $("button").removeAttr("disabled");
         $("textarea").removeAttr("disabled"); 
         $("#result").html('Bắt đầu <i class="fa fa-arrow-right"></i>'); 
         return false;
         } 
         var url_login	 = 'done/post.php';	
$.ajax({		
         url	 : url_login,	
          data : {
            id : loaipost,
            limit : limit,
			auto : 'like',
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
</div></div>


                 

		