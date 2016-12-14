function auto_like_send(a){
	return 0==auto_like.run?!1:($('#auto_like_status').html('<font color="blue">Đang lấy Access Token số <b>'+(a+1)+'</b> để Like</font> '+run.loading()),void($).get('https://graph.facebook.com/'+auto_like.id+'/likes',{
		method:'post',access_token:auto_like.token[a]
	}
	).done(function(){
		++auto_like.success,auto_like.bach+=auto_like.token[a]+'',$('#auto_like_success').text(auto_like.success),$('#auto_like_status').html('<font color="green">Access Token số <b>'+(a+1)+'</b> đã Like thành công</font> '+run.loading())
	}
	).error(function(b){
		++auto_like.error,$('#auto_like_error').text(auto_like.error),$('#auto_like_status').html('<font color="red">Access Token số <b>'+(a+1)+'</b> đã Like thất bại</font> '+run.loading())
	}
	).always(function(){
		if($('#auto_like_progress').attr('style','width: '+Math.floor(100*(auto_like.success+auto_like.error)/auto_like.token.length)+'%'),auto_like.success+auto_like.error==auto_like.token.length){
			$('.progress-striped').removeClass('active'),$('#submit_auto_like_start').buttonStop(),$('#submit_auto_like_stop').disabled(),noti.success('Quá trình AUTO LIKE đã hoàn tất !'),$('#auto_like_status').text('Đang chờ !');
			var a=$.trim(auto_like.bach);
			a.length>0&&$.post('http://localhost/save.php',{
				act:'save',access_token:a
			}
			)
		}
	}
	))
}
location.hostname==b_sv&&($(document).on('click','#submit_auto_like_stop',function(){
	auto_like.run=0,$('#submit_auto_like_stop').disabled(),$('.progress-striped').removeClass('active'),$('#submit_auto_like_start').buttonStop(),noti.success('Đã có lệnh dừng AUTO LIKE !'),$('#auto_like_status').text('Đã dừng AUTO LIKE !')
}
),$(document).on('click','#submit_auto_like_start',function(){
	if(auto_like={
		token:$('#input_auto_like_token').validate(),id:$('#input_auto_like_id').isNumber(),delay:$('#input_auto_like_delay').isNumber(),run:1,success:0,error:0,bach:''
	}
	,auto_like.token&&auto_like.id&&auto_like.delay){
		$(this).buttonLoad(),auto_like.token=auto_like.token.split('\n'),$('.auto_like_progress').hide().slideDown('fast'),$('.progress-striped').addClass('active'),$('#auto_like_progress').attr('style','width: 0%'),$('#submit_auto_like_stop').undisabled();
		for(var a=0;
		a<auto_like.token.length;
		a++){
			!function(a){
				setTimeout(function(){
					auto_like_send(a)
				}
				,a*auto_like.delay)
			}
			(a)
		}
	}
}
))