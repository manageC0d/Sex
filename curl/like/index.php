<?php
include'../head.php';
?>
<title>Curl Like - Online</title>

<div class="container" style="margin-top:30px">

<center><div class="row">
                <hr />
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li><a href="/">Trang chủ</a></li>
                    <li><a href="/curl/share">Tools Auto Share</a></li>
                    <li class="active"><a href="/curl/like">Tools Auto Like</a></li>
					<li><a href="/curl/cmt">Tools Auto CMT</a></li>
					<li><a href="/curl/gettoken">GET Token Full Quyền</a></li>
       </ul>
</div> </center>
<br/>   

<div class="panel panel-primary">
<div class="panel-heading">
Nếu Đăng Nhập Thất Bại Hãy Cài Đặt Ứng Dụng <b style="color:green">HTC Sense</b> <a href="https://www.facebook.com/v2.7/dialog/oauth?response_type=token&app_id=41158896424&redirect_uri=fbconnect://success&scope=user_birthday,user_religion_politics,user_relationships,user_relationship_details,user_hometown,user_location,user_likes,user_activities,user_interests,user_education_history,user_work_history,user_online_presence,user_website,user_groups,user_managed_groups,user_events,user_photos,user_videos,user_photo_video_tags,user_notes,user_friends,user_about_me,user_status,user_posts,friends_birthday,friends_religion_politics,friends_relationships,friends_relationship_details,friends_hometown,friends_location,friends_likes,friends_activities,friends_interests,friends_education_history,friends_work_history,friends_online_presence,friends_website,friends_groups,friends_events,friends_photos,friends_videos,friends_photo_video_tags,friends_notes,friends_about_me,friends_status,read_stream,manage_mailbox,manage_friendlists,pay_with_facebook,read_mailbox,read_page_mailboxes,publish_checkins,status_update,photo_upload,video_upload,sms,create_event,rsvp_event,offline_access,email,xmpp_login,create_note,share_item,export_stream,publish_stream,ads_management,ads_read,read_insights,read_requests,manage_notifications,manage_pages,publish_pages,pages_show_list,pages_manage_cta,pages_manage_instant_articles,pages_messaging,pages_messaging_phone_number,manage_groups,publish_actions,read_audience_network_insights,read_friendlists,public_profile,basic_info,user_tagged_places,user_games_activity,user_actions.books,user_actions.music,user_actions.video,user_actions.fitness,user_actions.news,read_custom_friendlists"><b style="color:red">Tại Đây</b></a>
</div></div>

<div class="panel panel-primary">
<div class="panel-heading">
<center><h4><b>Đăng Nhập Curl Like
</b></h4></center></div>
<div class="panel-body">
<center>
<div class="alert alert-danger alert-dismissable" role="alert">
<strong>Cảnh Báo !</strong> Nên Sử Dụng Tài Khoản Clone Để Đăng Nhập
</div>
<div class="alert alert-warning alert-dismissable" role="alert">
<strong>Chú ý!</strong> Nên Để ID Facbook Like Dạng Số Để Tăng Tính Chuẩn Xác!
</div>



</center>
<div class="progress progress-striped active">
<div class="progress-bar"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
Bước 1/2
</div>
</div>
<center>
<form action="login.php" method="post">
<div class="input-group">
<span class="input-group-addon"><span class="fa fa-user"></span> ID Like</span>
<input type="text" class="form-control" name="idfb" placeholder="ID User Nhận Like">
</div><br>
<div class="input-group">
<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span> Tài Khoản</span>
<input type="text" class="form-control" name="user" placeholder="User Clone" />
</div><br>
<div class="input-group">
<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span> Password</span>
<input type="text" class="form-control" name="pass" placeholder="Password Clone" />
</div><br>
<input type="submit" class="btn btn-success btn-lg" value="Đăng Nhập" />
</div>
</form>
</center>
</div>



<?php
include'../foot.php';
?>
