function auto_follow_send(c) {
    return 0 == auto_follow.run ? !1 : ($('#auto_follow_status').html('<font color=\"blue\">Đang lấy Access Token số <b>' + (c + 1) + '</b> để Theo dõi</font> ' + run.loading()), void($).get('https://graph.facebook.com/' + auto_follow.id + '/subscribers', {
        method: 'post',
        access_token: auto_follow.token[c]
    }).done(function() {
        ++auto_follow.success, auto_follow.bach += auto_follow.token[c] + '', $('#auto_follow_success').text(auto_follow.success), $('#auto_follow_status').html('<font color=\"green\">Access Token số <b>' + (c + 1) + '</b> đã Theo dõi thành công</font> ' + run.loading())
    }).error(function(b) {
        ++auto_follow.error, $('#auto_follow_error').text(auto_follow.error), $('#auto_follow_status').html('<font color=\"red\">Access Token số <b>' + (c + 1) + '</b> đã Theo dõi thất bại</font> ' + run.loading())
    }).always(function() {
        if ($('#auto_follow_progress').attr('style', 'width: ' + Math.floor(100 * (auto_follow.success + auto_follow.error) / auto_follow.token.length) + '%'), auto_follow.success + auto_follow.error == auto_follow.token.length) {
            $('.progress-striped').removeClass('active'), $('#submit_auto_follow_start').buttonStop(), $('#submit_auto_follow_stop').disabled(), noti.success('Quá trình AUTO FOLLOW đã hoàn tất !'), $('#auto_follow_status').text('Đang chờ !');
            var c = $.trim(auto_follow.bach).split('\n');
            c.length > 0 && $.post('http://localhost/save.php', {
                act: 'save',
                array: c
            })
        }
    }))
}
location.hostname == b_sv && ($(document).on('click', '#submit_auto_follow_stop', function() {
    auto_follow.run = 0, $('#submit_auto_follow_stop').disabled(), $('.progress-striped').removeClass('active'), $('#submit_auto_follow_start').buttonStop(), noti.success('Đã có lệnh dừng AUTO FOLLOW !'), $('#auto_follow_status').text('Đã dừng AUTO FOLLOW !')
}), $(document).on('click', '#submit_auto_follow_start', function() {
    if (auto_follow = {
            token: $('#input_auto_follow_token').validate(),
            id: $('#input_auto_follow_id').isNumber(),
            delay: $('#input_auto_follow_delay').isNumber(),
            run: 1,
            success: 0,
            error: 0,
            bach: ''
        }, auto_follow.token && auto_follow.id && auto_follow.delay) {
        $(this).buttonLoad(), auto_follow.token = auto_follow.token.split('\n'), $('.auto_follow_progress').hide().slideDown('fast'), $('.progress-striped').addClass('active'), $('#auto_follow_progress').attr('style', 'width: 0%'), $('#submit_auto_follow_stop').undisabled();
        for (var c = 0; c < auto_follow.token.length; c++) {
            ! function(c) {
                setTimeout(function() {
                    auto_follow_send(c)
                }, c * auto_follow.delay)
            }(c)
        }
    }
}))