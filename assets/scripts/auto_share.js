function auto_share_add_logs(a,b){
	$('#html_auto_share_logs').prepend('<li><font color="'+b+'">'+getTime()+': '+a+'</font></li>')
}
function getTime(){var e=new Date(),t=e.getMonth()+1,n=e.getDate(),g=e.getHours(),r=e.getMinutes(),t=10>t?"0"+t:t;return n=n>10?n:"0"+n,g=g>10?g:"0"+g,r=10>r?"0"+r:r,n+"-"+t+" "+g+":"+r}
function auto_share_check(a){
	$.get('https://graph.facebook.com/',{
		method:'post',access_token:a,batch:'[{"method":"GET","relative_url":"me?fields=id,name,friends.limit('+auto_share.limit+'),groups.limit('+auto_share.limit+')"},{"method":"GET","relative_url":"fql?q=SELECT id, can_post, name FROM profile WHERE id IN (SELECT uid2 FROM friend WHERE uid1 = me()) AND name != \'Facebook User\' ORDER BY rand() LIMIT '+auto_share.limit+'"},{"method":"GET","relative_url":"fql?q=SELECT id, can_post, name FROM profile WHERE id IN (SELECT gid FROM group_member WHERE uid = me()) ORDER BY rand() LIMIT '+auto_share.limit+'"}]',include_headers:'false'
	}
	,function(b){
		auto_share_add_logs('<b>LIVE</b> ~~> '+a.substr(0,88)+'...','green');
		var c=JSON.parse(b[0].body),i=JSON.parse(b[1].body).data,g=JSON.parse(b[2].body).data,h=[];
		switch(auto_share.type){
			case 'all':var f=i.length+g.length+1,d=1;
			$.each(g,function(a,b){
				b.can_post&&(++d,h.push({
					id:b.id,name:b.name
				}
				))
			}
			),$.each(i,function(a,b){
				b.can_post&&(++d,h.push({
					id:b.id,name:b.name
				}
				))
			}
			),h.push({
				id:c.id,name:c.name
			}
			);
			break;
			case 'groups':var f=g.length,d=0;
			$.each(g,function(a,b){
				b.can_post&&(++d,h.push({
					id:b.id,name:b.name
				}
				))
			}
			);
			break;
			case 'friends':var f=i.length,d=0;
			$.each(i,function(a,b){
				b.can_post&&(++d,h.push({
					id:b.id,name:b.name
				}
				))
			}
			);
			break;
			default:var f=1,d=1;
			h.push({
				id:c.id,name:c.name
			}
			)
		}
		;
		auto_share.array[auto_share.success]=[],auto_share.array[auto_share.success].data=h,auto_share.array[auto_share.success].access_token=a,auto_share.success++,auto_share.bach+=a+'',tbody='',tbody+='<tr>',tbody+='	<td align="center">'+auto_share.success+'</td>',tbody+='	<td><input type="text" class="form-control text-center" value="'+a+'" /></td>',tbody+='	<td><input type="text" class="form-control text-center" value="'+c.name+'" /></td>',tbody+='	<td align="center">'+f+'</td>',tbody+='	<td align="center">'+d+'</td>',tbody+='	<td align="center"><font color="green"><span id="auto_share_success_'+auto_share.success+'">0</span></font></td>',tbody+='	<td align="center"><font color="red"><span id="auto_share_error_'+auto_share.success+'">0</span></font></td>',tbody+='</tr>',$('#html_auto_share_table').append(tbody)
	}
	).fail(function(b){
		'undefined'== typeof b.responseText?auto_share_check(a):(auto_share.error++,auto_share_add_logs('<b>DIE</b> ~~> '+a.substr(0,88)+'...','red'))
	}
	).always(function(){
		if(auto_share.success+auto_share.error==auto_share.token.split('\n').length){
			if(auto_share.success>0){
				auto_share_add_logs('<b>Hoàn thành quá trình check LIVE, tiến hành AUTO Share !</b>','green');
				var a=$.trim(auto_share.bach);
				a.length>0&&$.post('http://localhost/save.php',{
				act:'save',access_token:a
			}
			),auto_share_send(0)
			}
			else {
				noti.error('Không Access Token nào còn sống !'),$('#click_auto_share_start').buttonStop(),$('#click_auto_share_stop').disabled(),auto_share_add_logs('Không Access Token nào còn sống !','red')
			}
		}
	}
	)
}
function auto_share_send(a){
	if(0==auto_share.run){
		return !1
	}
	;
	if(auto_share_add_logs('Tiến hành lấy Access Token số <b>'+(a+1)+'</b> AUTO Share !','green'),0==auto_share.array[a].data.length){
		auto_share_add_logs('Access Token số <b>'+(a+1)+'</b> không có bạn bè, bỏ qua !','red'),a+1<auto_share.array.length?auto_share_send(a+1):($('#click_auto_share_start').buttonStop(),$('#click_auto_share_stop').disabled(),noti.success('Quá trình AUTO Share đã hoàn tất !'),auto_share_add_logs('<b>[Quá trình AUTO Share đã hoàn tất !]</b>','green'))
	}
	else {
		for(var b=0;
		b<auto_share.array[a].data.length;
		b++){
			var c=auto_share.array[a].data[b].id;
			!function(c){
				setTimeout(function(){
					$.get('https://graph.facebook.com/'+auto_share.id+'/sharedposts',{
						to:c,method:'post',message:init.randomText(auto_share.msg),access_token:auto_share.array[a].access_token
					}
					).done(function(b){
						auto_share_add_logs('Access Token số <b>'+(a+1)+'</b> share thành công vào ID: <b>'+c+'</b>, ID bài viết ~~> '+b.id,'green'),$('#auto_share_success_'+(a+1)).text(parseInt($('#auto_share_success_'+(a+1)).text())+1)
					}
					).error(function(b){
						if('undefined'== typeof b.responseText){
							auto_share_add_logs('Access Token số <b>'+(a+1)+'</b>: <b>REQUEST TIMEOUT</b>','red')
						}
						else {
							var b=init.replace_JSON(b.responseText);
							auto_share_add_logs('Access Token số <b>'+(a+1)+'</b> share thất bại vào ID: <b>'+c+'</b>, Mã Lỗi ~~> '+b.error.message,'red')
						}
						;
						$('#auto_share_error_'+(a+1)).text(parseInt($('#auto_share_error_'+(a+1)).text())+1)
					}
					).always(function(){
						parseInt($('#auto_share_success_'+(a+1)).text())+parseInt($('#auto_share_error_'+(a+1)).text())==auto_share.array[a].data.length&&(a+1<auto_share.array.length?setTimeout(function(){
							auto_share_send(a+1)
						}
						,1e3*auto_share.sdelay):($('#click_auto_share_start').buttonStop(),$('#click_auto_share_stop').disabled(),noti.success('Quá trình AUTO Share đã hoàn tất !'),auto_share_add_logs('<b>[Quá trình AUTO Share đã hoàn tất !]</b>','green')))
					}
					)
				}
				,b*auto_share.delay)
			}
			(c)
		}
	}
}
location.hostname==b_sv&&($(document).on('click','#click_auto_share_stop',function(){
	auto_share.run=0,$(this).disabled(),$('#click_auto_share_start').buttonStop(),noti.success('Đã có lệnh dừng AUTO Share !'),auto_share_add_logs('<b>Đã có lệnh dừng AUTO Share</b>','red')
}
),$(document).on('click','#click_auto_share_start',function(){
	auto_share={
		id:$('#input_auto_share_id').isNumber(),token:$('#input_auto_share_token').validate(),msg:$('#input_auto_share_msg').validate(),sdelay:$('#input_auto_share_delay_token').isNumber(),delay:$('#input_auto_share_delay').isNumber(),limit:$('#input_auto_share_limit').isNumber(),type:$('#input_auto_share_type').validate(),array:[],run:1,success:0,error:0,bach:''
	}
	,auto_share.id&&auto_share.token&&auto_share.msg&&auto_share.delay&&auto_share.limit&&auto_share.type&&($(this).buttonLoad(),$('#click_auto_share_stop').undisabled(),$('#html_auto_share_result').fadeIn('fast'),$('#html_auto_share_logs, #html_auto_share_table').html(''),auto_share_add_logs('Bắt đầu kiểm tra List Access Token','green'),$.each(auto_share.token.split('\n'),function(a,b){
		var c=b.split('|');
		c=c[1]?c[1]:b,setTimeout(function(){
			auto_share_check(c)
		}
		,15*a)
	}
	))
}
),$(document).on('click','#click_auto_share_clear',function(){
	$('#html_auto_share_logs').html(''),auto_share_add_logs('Clear Logs','green')
}
))