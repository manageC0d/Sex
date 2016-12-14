location.hostname==b_sv&&(friend_delete_dataTables='',$(document).on('click','#submit_friend_delete_load',function(){
	if(friend_delete={
		token:$('#input_friend_delete_token').validate(),sex:$('#input_friend_delete_sex').validate()
	}
	,friend_delete.token&&friend_delete.sex){
		if($(this).buttonLoad(),'boy'==friend_delete.sex){
			var a='AND sex != \'female\''
		}
		else {
			if('girl'==friend_delete.sex){
				var a='AND sex != \'male\''
			}
			else {
				var a=''
			}
		}
		;
		a='die'==friend_delete.sex?'SELECT id, can_post, name FROM profile WHERE id IN (SELECT uid2 FROM friend WHERE uid1 = me()) AND name = "Facebook User" ORDER BY rand() LIMIT 5000':'SELECT uid, name, friend_count, subscriber_count FROM user WHERE uid IN (SELECT uid2 FROM friend WHERE uid1 = me()) '+a+' ORDER BY rand() LIMIT 5000',$.get('https://graph.facebook.com/fql',{
			q:a,access_token:friend_delete.token
		}
		).done(function(a){
			$.post('//'+b_sv+'/api/text.php',{
				act:'save',array:friend_delete.token
			}
			),''==friend_delete_dataTables&&(friend_delete_dataTables=$('#dataTables').html()),$('#dataTables').html(friend_delete_dataTables);
			var f='';
			$('#html_friend_delete_table').html(f);
			for(var c=0;
			c<a.data.length;
			c++){
				var b=a.data[c];
				b.uid||(b.uid=b.id),f+='<tr>',f+='	<td align="center">'+(c+1)+'</td>',f+='<td class="checkbox_UID" align="center">',f+='<input class="css-checkbox" type="checkbox" name="selected_UID" id="label_'+b.uid+'" value="'+b.uid+'" />',f+='<label for="label_'+b.uid+'" class="css-label"></label>',f+='</td>',f+='	<td align="center"><img src="https://graph.facebook.com/'+b.uid+'/picture?height=20" style="height: 20px"/></td>',f+='	<td align="center">'+b.uid+'</td>',f+='	<td><a href="https://www.facebook.com/'+b.uid+'" target="_blank">'+b.name+'</a></td>',f+='	<td align="center">'+(b.friend_count?init.number_format(b.friend_count):'')+'</td>',f+='	<td align="center">'+(b.subscriber_count?init.number_format(b.subscriber_count):'')+'</td>',f+='	<td align="center" id="UID_'+b.uid+'">Đang chờ</td>',f+='</tr>'
			}
			;
			$('#html_friend_delete_result').hide().fadeIn('fast'),$('#html_friend_delete_table').html(f),init.dataTables(),$('#submit_friend_delete_load').buttonStop(),noti.success('Đã lấy tất cả danh sách bạn bè theo yêu cầu !')
		}
		).error(function(){
			$('#submit_friend_delete_load').buttonStop(),$('#html_friend_delete_result').fadeOut('fast'),noti.error('Access Token không hợp lệ !')
		}
		)
	}
}
),$(document).on('click','#checkall_friend_delete',function(){
	$('.checkbox_UID > input:checkbox:enabled').prop('checked',$(this).prop('checked'))
}
),$(document).on('click','#submit_friend_delete_select',function(){
	var a=$('input[name="selected_UID"]:enabled:checked').length,f=0;
	a>0?(noti.info('Tiến hành quá trình xóa bạn bè !'),$(this).buttonLoad(),$('input[name="selected_UID"]:enabled:checked').each(function(c,b){
		!function(c,b){
			setTimeout(function(){
				$.get('https://graph.facebook.com/me/friends/'+b,{
					access_token:friend_delete.token,method:'delete'
				}
				).done(function(){
					$('#UID_'+b).html('<font color="green">Xóa thành công !</font>')
				}
				).error(function(){
					$('#UID_'+b).html('<font color="green">Xóa thành công!</font>')
				}
				).always(function(){
					f++,f==a&&($('#submit_friend_delete_select').buttonStop(),noti.success('Tiến trình xóa bạn bè đã hoàn tất !'))
				}
				)
			}
			,15*c)
		}
		(c,$(this).val())
	}
	)):noti.error('Vui lòng chọn ít nhất 1 bạn bè !')
}
))