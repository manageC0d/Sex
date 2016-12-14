<?
require '../system/func.php';
?>
 	
 	             <div class="wrapper wrapper-content animated fadeInRight">


<div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5><b>
Auto Add Friends</b></h5>
                        
                    </div>
                    <div class="ibox-content">
                        <a class="btn btn-danger btn-xs" href="http://findmyfbid.com" target="_blank">Lấy ID Facebook</a>
<div class="form-group">
<? $_SESSION['_SERVER'] = cap(30); ?>
				<input type="hidden" name="_SERVER" id="_SERVER" value="<? echo $_SESSION['_SERVER']; ?>">
		<b>*Đã Nhập ID Facebook Của Bạn:</b>
		<input name="id_friend" placeholder="Nhập ID Facebook" value="<?Echo $_SESSION['id']?>" class="form-control" id="id_friend" style="width:100%;">	
		<div class="hr-line-dashed"></div>
<div class="row">
	<div class="col-sm-6"></div>
	<div class="col-sm-3">
			<select class="form-control" id="limit" name="limit">
				<option value="50">50 Friend</option>
				<option value="40">40 Friend</option>
				<option value="30">30 Friend</option>
				<option value="20">20 Friend</option>
				<option value="10">10 Friend</option>
				<option value="10">5 Friend</option>
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
         var id_friend = $('#id_friend').val(); 
         var limit = $('#limit').val();
		 var _SERVER = $('#_SERVER').val();
         if(id_friend == ''){ 
         $(function (){
         toastr.error('Bạn chưa nhập ID')});
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
            id : id_friend,
            limit : limit,
			auto : 'friend',
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
</div></div></div>
	</div>	
</div>


                 

		