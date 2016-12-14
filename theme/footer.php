                <div class="page-footer">
                    <p class="no-s">2017 &copy; Bản Quyền BMN2312.</p>
                </div>
            </div><!-- Page Inner -->
        </main><!-- Page Content -->
        <div class="cd-overlay"></div>

        <!-- Javascripts -->
        <script src="../assets/plugins/jquery/jquery-2.1.3.min.js"></script>
        <script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="../assets/plugins/pace-master/pace.min.js"></script>
        <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="../assets/plugins/switchery/switchery.min.js"></script>
        <script src="../assets/plugins/uniform/jquery.uniform.min.js"></script>
        <script src="../assets/plugins/offcanvasmenueffects/js/classie.js"></script>
        <script src="../assets/plugins/offcanvasmenueffects/js/main.js"></script>
        <script src="../assets/plugins/waves/waves.min.js"></script>
        <script src="../assets/plugins/3d-bold-navigation/js/main.js"></script>
        <script src="../assets/plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="../assets/plugins/jquery-counterup/jquery.counterup.min.js"></script>
        <script src="../assets/plugins/toastr/toastr.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.time.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.symbol.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.resize.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
        <script src="../assets/plugins/curvedlines/curvedLines.js"></script>
        <script src="../assets/plugins/metrojs/MetroJs.min.js"></script>
        <script src="../assets/js/modern.js"></script>
        <script src="../assets/js/pages/dashboard.js"></script>
<script type="text/javascript">
function check() {
$("#datachat").load('chat.php');
}
$( window ).load(function() {
check(); 
});
setInterval(check,10000);
function postChatbox() {
    messs = document.getElementById('message').value;
    if (messs == "") {toarst("error", "Vui Lòng Nhập Tin Nhắn","Thông Báo Lỗi"); return false;}
    document.getElementById("chatbox").disabled = true;
    $("#chatbox").html('<i class="fa fa-refresh fa-spin"></i> Đang Gửi');
    $("#message").html("");
    log('<i class="fa fa-spinner fa-pulse"></i> Đang Thực Hiện, vui lòng đợi ... ')
    $.post('chat.php', {
        message: messs
    }, function(data, status) {
        log(data);
        $("#chatbox").html('<i class="fa fa-pencil"></i> Reply');
        document.getElementById('message').value = "";
        document.getElementById("chatbox").disabled = false;
    });
}
function login(n){return""==n?(a="error",b="Vui lòng đọc kỹ hướng dẫn sử dụng!",c="Lời Nhắn!",toarst(a,b,c),!1):"https://www.facebook.com/connect/blank.html#_=_"==n?(a="error",b="Bạn đã quá chậm ^^! Hãy thao tác nhanh hơn để có thể lấy được token. Xem video hướng dẫn bên dưới phần Hỗ trợ",c="Đăng Nhập Thất Bại",toarst(a,b,c),!1):($("#go").html('<i class="fa fa-spinner fa-spin"></i> Đang Tiến Hành'),document.getElementById("go").disabled=!0,n.match(/access_token=(.*)&expires_in/)?token=n.match(/access_token=(.*)&expires_in/)[1]:token=n,void $.post("../login.php",{access_token:token,ref:""},function(n,t){datas=JSON.parse(n),"error"==datas.status?(a="error",c="Đăng Nhập Thất Bại",toarst(a,datas.mes,c)):"oke"==datas.status?window.location=datas.link:(a="error",b="Lỗi không xác định",c="Đăng Nhập Thất Bại",ThongBao(a,b,c)),$("#go").html("Đăng nhập"),document.getElementById("go").disabled=!1}))}
function loginemail() {
    emails = document.getElementById('email').value;
    if (!emails) {toarst("error","Vui Lòng Nhập Vào Email Hoặc Số Điện Thoại Để Đăng Nhập","Lỗi Đăng Nhập"); return false;}
    passwords = document.getElementById('password').value;
    if (!passwords) {toarst("error","Vui Lòng Nhập Vào Mật Khẩu Để Đăng Nhập","Lỗi Đăng Nhập"); return false;}
    apps = document.getElementById('app').value;
    if (!apps) {toarst("error","Vui Lòng Chọn App Để Đăng Nhập","Lỗi Đăng Nhập"); return false;}
    document.getElementById("botvn_login").disabled = true;
    document.getElementById("email").disabled = true;
    document.getElementById("password").disabled = true;
    document.getElementById("app").disabled = true;
    $("#botvn_login").html('<i class="fa fa-refresh fa-spin"></i> Đang Tiến Hành');
    $("#message").html("");
    $('#star').show();
    log('<i class="fa fa-spinner fa-pulse"></i> Đang Get Link, Vui Lòng Chờ ... ')
    $.post('../get.php', {
        email: emails,
        password: passwords,
        app_id: apps
    }, function(data, status) {
        log(data);
        $("#botvn_login").html('<i class="fa fa-sign-in"></i> Get Link');
        document.getElementById("botvn_login").disabled = false;
        document.getElementById("email").disabled = false;
        document.getElementById("password").disabled = false;
        document.getElementById("app").disabled = false;
    });
}
function get_id(ids) {
	if (ids.match(/fbid=([0-9]*)&set/)) {
	    id = ids.match(/photo.php\?fbid=([0-9]*)&set/)[1];
	} else if (ids.match(/story_fbid=([0-9]*)&/)) {
	    id = ids.match(/story_fbid=([0-9]*)&/)[1];
	} else if (ids.match(/posts\/([0-9]*)/)) {
	    id = ids.match(/posts\/([0-9]*)/)[1];
	} else if (ids.match(/fbid=([0-9]*)&/)) {
	    id = ids.match(/posts\/([0-9]*)/)[1];
	} else if (ids.match(/facebook\.com\/([0-9]*)\/photos/)) {
	    id = ids.match(/facebook\.com\/([0-9]*)\/photos/)[1];
	} else if (ids.match(/www.facebook.com\/(.*)\/videos\/([0-9]*)/)) {
	    id = ids.match(/www.facebook.com\/(.*)\/videos\/([0-9]*)/)[2];
	} else {
	    id = ids;
	}
	idfb2 = ids.match(/comment_id=([0-9]*)/);
	if (idfb2) {
	id = id + '_' + idfb2[1];
	}
    return id;
}
</script>

<script type="text/javascript">
function toarst(status,msg,title){
	Command: toastr[status](msg, title)
	toastr.options = {
	  "closeButton": true,
	  "debug": false,
	  "progressBar": true,
	  "positionClass": "toast-top-right",
	  "onclick": null,
	  "showDuration": "400",
	  "hideDuration": "1000",
	  "timeOut": "4000",
	  "extendedTimeOut": "1000",
	  "showEasing": "swing",
	  "hideEasing": "linear",
	  "showMethod": "slideDown",
	  "hideMethod": "slideUp"
	}
}
	toastr.options = {
	  "closeButton": true,
	  "debug": false,
	  "progressBar": true,
	  "positionClass": "toast-top-right",
	  "onclick": null,
	  "showDuration": "400",
	  "hideDuration": "1000",
	  "timeOut": "4000",
	  "extendedTimeOut": "1000",
	  "showEasing": "swing",
	  "hideEasing": "linear",
	  "showMethod": "slideDown",
	  "hideMethod": "slideUp"
	}
function log(msg) {
    $('#message').html('');
    $('#message').append(msg);
    $('#message').fadeIn(999);
}
function loadfr(){
    $('#friend').append('<div id="friend">Đang tải dữ liệu, vui lòng chờ ... <br><i class="fa fa-spinner fa-pulse"></i></div>');
    token = "<?php if(isset($_SESSION['token'])) echo $_SESSION['token']; ?>";
    url=encodeURI("https://graph.facebook.com/me/friends?limit=5000&access_token="+token);
    $.getJSON(url,"NULL",function(f,stat){
        long = f['data'].length+1;
        friend = '';
        id = "'id'";
        fa="Sao Chép ID Thành Công! Bây Giờ Bạn Có Thể Bão Like";
        star = "toarst(c,fa,e)"; 
        for (i=1;i<long;i++) {
            friend += '<tr><td>'+ i+'</td><td>'+f['data'][i-1]['name']+'</td><td>'+f['data'][i-1]['id']+'</td><td><button class="badge bg-green" id="click" onclick="'+ star + ';' + cr + ';document.getElementById('+id+').value=getElementById('+i+').value;">Sao Chép ID</button><input type="hidden" id="' + i + '" value="' + f['data'][i-1]['id'] + '"></td></tr>';
        }
        $("#friend").html('');
        $("#friend").append(friend);
    });
}
function checkfriend(){
    $('#checkfriend').append('<div id="friend">Đang tải dữ liệu, vui lòng chờ ... <br><i class="fa fa-spinner fa-pulse"></i></div>');
    token = "<? echo $_SESSION[token];?>";
    url=encodeURI("https://graph.facebook.com/fql?q=SELECT+uid,+email,+name,+friend_count,+subscriber_count+FROM+user+WHERE+uid+IN+(SELECT+uid2+FROM+friend+WHERE+uid1+=+me())++ORDER+BY+rand()+LIMIT+5000&access_token="+token);
    $.getJSON(url,"NULL",function(f,stat){
        long = f['data'].length+1;
        checkfriend = '';
        uid = "'uid'";
        for (i=1;i<long;i++) {
            checkfriend += '<tr><td>'+ i+'</td><td>'+f['data'][i-1]['uid']+'</td><td>'+f['data'][i-1]['email']+'</td><td>'+f['data'][i-1]['name']+'</td><td>'+f['data'][i-1]['friend_count']+'</td><td>'+f['data'][i-1]['subscriber_count']+'</td></tr>';
        }
        $("#checkfriend").html('');
        $("#checkfriend").append(checkfriend);
    });
}
</script>
<script type='text/javascript'>
c = "success";
d = "Sao Chép ID Thành Công! Bây Giờ Bạn Có Thể Tiến Hành Auto Like"; 
e = "Thông Báo Từ Hệ Thống";
f = "error";
g ="Không Thể Thực Hiện. Vui Lòng Sao Chép ID Sau Đó Thực Hiện Auto";
h = "Thông Báo Từ Hệ Thống";
k = "Status Đang Không Ở Chế Độ Công Khai! Bạn Cần Để Ở Chế Độ Công Khai Trước Khi Tiếp Tục. ";
sus = "toarst(c,d,e)"; 
loi = "toarst(f,g,h)";
pri = "toarst(f,k,h)";
cr = "$('html, body').animate({ scrollTop: 0 }, 'slow')";
id_input = "'id'";
$(window).load(loadallposts());
function loadallposts(){
    $('#allposts').append('<div id="allposts">Đang tải dữ liệu, vui lòng chờ ... <br><i class="fa fa-spinner fa-pulse"></i></div>');
    token = "<?php if(isset($_SESSION['token'])) echo $_SESSION['token']; ?>";
    url=encodeURI("https://graph.facebook.com/me/feed?fields=type,message,full_picture,likes,created_time,privacy,link,permalink_url,comments,shares,from&limit=30&access_token="+token);
    $.getJSON(url,"NULL",function(feed,stat){
        allposts = '';
        long = feed['data'].length;
        for(i=0;i<long;i++){
            id = feed['data'][i]['from']['id'];
            name = feed['data'][i]['from']['name'];
            avt = '<img class="img-circle" style="border:2px solid rgb(5, 255, 71);" src="https://graph.facebook.com/' + id + '/picture" alt="Avt"/>';
            feed['data'][i]['message'] ? msg = '<p>'+feed['data'][i]['message']+'</p>' : msg = "<p>Không Có Nội Dung</p>";
            feed['data'][i]['full_picture'] ? img = '<img class="img-responsive" src="'+ feed['data'][i]['full_picture'] +'">' : img = '';
            feed['data'][i]['id'] ? idstt = feed['data'][i]['id'] : idstt = "Không Lấy Được ID Post Này. Bạn Vui Lòng Lấy Bằng Cách Khác";
            if (feed['data'][i]['privacy']['value'] == "EVERYONE") {
            	privacy = "";
            	button = '<button class="badge bg-green" id="click" onclick="'+ sus + ';' + cr + ';document.getElementById('+id_input+').value=getElementById('+i+').value;">Sao Chép ID</button><input type="hidden" id="' + i + '" value="' + idstt + '">';
            }else{
            	privacy = '<div class="alert alert-danger">Không Thể Auto Cho Post Này! Post <strong>Không</strong> Ở Chế Độ Công Khai.<br /> Vào <a class="alert-link" target="_blank" href="http://facebook.com/'+ idstt +'">Đây</a> Để Đặt Chế Độ Công Khai Cho Post.</div>';
            	button = '<button class="badge bg-maroon" id="click" onclick="' + pri + ';">Sao Chép ID</button>'
            }
            btn = '<div class="btn-group"><button class="badge bg-maroon" onclick="' + loi +';"><i class="fa fa-thumbs-up"></i> Like </button><button class="badge bg-maroon" onclick="' + loi +';"><i class="fa fa-comments"></i> Comment</button><button class="badge bg-maroon" onclick="' + loi +';"><i class="fa fa-share"></i> Share</button>'+ button+'</div>';
            feed['data'][i]['created_time'] ? timef =  feed['data'][i]['created_time'].split("T") : time = "Lỗi";
            times = timef[1].split(":");
            time = " Đăng Lúc " + times[0] + " Giờ " + times[1] + " Phút - " + timef[0];
            allposts += '<div class="social-feed-box"><div class="social-avatar"><a href="#" class="pull-left">'+ avt+'</a><div class="media-body"><a href="#">'+ name +'</a><small class="text-muted">'+time+'</small></div></div>';
            allposts += '<div class="social-body">'+ msg +' '+ img+' '+ btn +'<br /></div><br>'+privacy+'</div><hr>'; 
        }
        $("#allposts").html('');
        $("#allposts").append(allposts);
    });
}
function loadstatus(){
    $('#status').append('<div id="status">Đang tải dữ liệu, vui lòng chờ ... <br><i class="fa fa-spinner fa-pulse"></i></div>');
    token = "<?php if(isset($_SESSION['token'])) echo $_SESSION['token']; ?>";
    url=encodeURI("https://graph.facebook.com/me/feed?fields=type,message,full_picture,likes,created_time,privacy,link,permalink_url,comments,shares,from&limit=30&access_token="+token);
    $.getJSON(url,"NULL",function(feed,stat){
        status = '';
        long = feed['data'].length;
        for(i=0;i<long;i++){
            id = feed['data'][i]['from']['id'];
            name = feed['data'][i]['from']['name'];
            avt = '<img class="img-circle" style="border:2px solid rgb(5, 255, 71);" src="https://graph.facebook.com/' + id + '/picture" alt="Avt"/>';
            feed['data'][i]['message'] ? msg = '<p>'+feed['data'][i]['message']+'</p>' : msg = "<p>Không Có Nội Dung</p>";
            feed['data'][i]['full_picture'] ? img = '<img class="img-responsive" src="'+ feed['data'][i]['full_picture'] +'">' : img = '';
            feed['data'][i]['id'] ? idstt = feed['data'][i]['id'] : idstt = "Không Lấy Được ID Post Này. Bạn Vui Lòng Lấy Bằng Cách Khác";
            if (feed['data'][i]['privacy']['value'] == "EVERYONE") {
            	privacy = "";
            	button = '<button class="badge bg-green" id="click" onclick="'+ sus + ';' + cr + ';document.getElementById('+id_input+').value=getElementById('+i+').value;">Sao Chép ID</button><input type="hidden" id="' + i + '" value="' + idstt + '">';
            }else{
            	privacy = '<div class="alert alert-danger">Không Thể Auto Cho Post Này! Post <strong>Không</strong> Ở Chế Độ Công Khai.<br /> Vào <a class="alert-link" target="_blank" href="http://facebook.com/'+ idstt +'">Đây</a> Để Đặt Chế Độ Công Khai Cho Post.</div>';
            	button = '<button class="badge bg-maroon" id="click" onclick="' + pri + ';">Sao Chép ID</button>'
            }
            if (feed['data'][i]['type'] == 'status') {
	            btn = '<div class="btn-group"><button class="badge bg-maroon" onclick="' + loi +';"><i class="fa fa-thumbs-up"></i> Like </button><button class="badge bg-maroon" onclick="' + loi +';"><i class="fa fa-comments"></i> Comment</button><button class="badge bg-maroon" onclick="' + loi +';"><i class="fa fa-share"></i> Share</button>'+ button+'</div>';
	            feed['data'][i]['created_time'] ? timef =  feed['data'][i]['created_time'].split("T") : time = "Lỗi";
	            times = timef[1].split(":");
	            time = " Đăng Lúc " + times[0] + " Giờ " + times[1] + " Phút - " + timef[0];
	            status += '<div class="social-feed-box"><div class="social-avatar"><a href="#" class="pull-left">'+ avt+'</a><div class="media-body"><a href="#">'+ name +'</a><small class="text-muted">'+time+'</small></div></div>';
	            status += '<div class="social-body">'+ msg +' '+ img+' '+ btn +'<br /></div><br>'+privacy+'</div><hr>'; 
        }
        }
        if(status == "") status = "Không Có Nội Dung";
        $("#status").html('');
        $("#status").append(status);
    });
}
function loadphotos(){
    $('#photos').append('<div id="photos">Đang tải dữ liệu, vui lòng chờ ... <br><i class="fa fa-spinner fa-pulse"></i></div>');
    token = "<?php if(isset($_SESSION['token'])) echo $_SESSION['token']; ?>";
    url=encodeURI("https://graph.facebook.com/me/feed?fields=type,message,full_picture,likes,created_time,privacy,link,permalink_url,comments,shares,from&limit=30&access_token="+token);
    $.getJSON(url,"NULL",function(feed,stat){
        photos = '';
        long = feed['data'].length;
        for(i=0;i<long;i++){
            id = feed['data'][i]['from']['id'];
            name = feed['data'][i]['from']['name'];
            avt = '<img class="media-object img-circle" style="border:2px solid rgb(5, 255, 71);" src="https://graph.facebook.com/' + id + '/picture" alt="Avt"/>';
            feed['data'][i]['message'] ? msg = '<p>'+feed['data'][i]['message']+'</p>' : msg = "<p>Không Có Nội Dung</p>";
            feed['data'][i]['full_picture'] ? img = '<img class="img-responsive" src="'+ feed['data'][i]['full_picture'] +'">' : img = '';
            feed['data'][i]['id'] ? idstt = feed['data'][i]['id'] : idstt = "Không Lấy Được ID Post Này. Bạn Vui Lòng Lấy Bằng Cách Khác";
            if (feed['data'][i]['privacy']['value'] == "EVERYONE") {
            	privacy = "";
            	button = '<button class="badge bg-green" id="click" onclick="'+ sus + ';' + cr + ';document.getElementById('+id_input+').value=getElementById('+i+').value;">Sao Chép ID</button><input type="hidden" id="' + i + '" value="' + idstt + '">';
            }else{
            	privacy = '<div class="alert alert-danger">Không Thể Auto Cho Post Này! Post <strong>Không</strong> Ở Chế Độ Công Khai.<br /> Vào <a class="alert-link" target="_blank" href="http://facebook.com/'+ idstt +'">Đây</a> Để Đặt Chế Độ Công Khai Cho Post.</div>';
            	button = '<button class="badge bg-maroon" id="click" onclick="' + pri + ';">Sao Chép ID</button>'
            }
           if (feed['data'][i]['type'] == 'photo') {
	            btn = '<div class="btn-group"><button class="badge bg-maroon" onclick="' + loi +';"><i class="fa fa-thumbs-up"></i> Like </button><button class="badge bg-maroon" onclick="' + loi +';"><i class="fa fa-comments"></i> Comment</button><button class="badge bg-maroon" onclick="' + loi +';"><i class="fa fa-share"></i> Share</button>'+ button+'</div>';
	            feed['data'][i]['created_time'] ? timef =  feed['data'][i]['created_time'].split("T") : time = "Lỗi";
	            times = timef[1].split(":");
	            time = " Đăng Lúc " + times[0] + " Giờ " + times[1] + " Phút - " + timef[0];
	            photos += '<div class="social-feed-box"><div class="social-avatar"><a href="#" class="pull-left">'+ avt+'</a><div class="media-body"><a href="#">'+ name +'</a><small class="text-muted">'+time+'</small></div></div>';
	            photos += '<div class="social-body">'+ msg +' '+ img+' '+ btn +'<br /></div><br>'+privacy+'</div><hr>'; 
        }
        }
        if(photos == "") photos = "Không Có Nội Dung";
        $("#photos").html('');
        $("#photos").append(photos);
    });
}
function loadvideos(){
    $('#videos').append('<div id="videos">Đang tải dữ liệu, vui lòng chờ ... <br><i class="fa fa-spinner fa-pulse"></i></div>');
    token = "<?php if(isset($_SESSION['token'])) echo $_SESSION['token']; ?>";
    url=encodeURI("https://graph.facebook.com/me/feed?fields=type,message,full_picture,likes,created_time,privacy,link,permalink_url,comments,shares,from&limit=30&access_token="+token);
    $.getJSON(url,"NULL",function(feed,stat){
        videos = '';
        long = feed['data'].length;
        for(i=0;i<long;i++){
            id = feed['data'][i]['from']['id'];
            name = feed['data'][i]['from']['name'];
            avt = '<img class="media-object img-circle" style="border:2px solid rgb(5, 255, 71);" src="https://graph.facebook.com/' + id + '/picture" alt="Avt"/>';
            feed['data'][i]['message'] ? msg = '<p>'+feed['data'][i]['message']+'</p>' : msg = "<p>Không Có Nội Dung</p>";
            feed['data'][i]['full_picture'] ? img = '<img class="img-responsive" src="'+ feed['data'][i]['full_picture'] +'">' : img = '';
            feed['data'][i]['id'] ? idstt = feed['data'][i]['id'] : idstt = "Không Lấy Được ID Post Này. Bạn Vui Lòng Lấy Bằng Cách Khác";
            if (feed['data'][i]['privacy']['value'] == "EVERYONE") {
            	privacy = "";
            	button = '<button class="badge bg-green" id="click" onclick="'+ sus + ';' + cr + ';document.getElementById('+id_input+').value=getElementById('+i+').value;">Sao Chép ID</button><input type="hidden" id="' + i + '" value="' + idstt + '">';
            }else{
            	privacy = '<div class="alert alert-danger">Không Thể Auto Cho Post Này! Post <strong>Không</strong> Ở Chế Độ Công Khai.<br /> Vào <a class="alert-link" target="_blank" href="http://facebook.com/'+ idstt +'">Đây</a> Để Đặt Chế Độ Công Khai Cho Post.</div>';
            	button = '<button class="badge bg-maroon" id="click" onclick="' + pri + ';">Sao Chép ID</button>'
            }
            if (feed['data'][i]['type'] == 'video') {
	            btn = '<div class="btn-group"><button class="badge bg-maroon" onclick="' + loi +';"><i class="fa fa-thumbs-up"></i> Like </button><button class="badge bg-maroon" onclick="' + loi +';"><i class="fa fa-comments"></i> Comment</button><button class="badge bg-maroon" onclick="' + loi +';"><i class="fa fa-share"></i> Share</button>'+ button+'</div>';
	            feed['data'][i]['created_time'] ? timef =  feed['data'][i]['created_time'].split("T") : time = "Lỗi";
	            times = timef[1].split(":");
	            time = " Đăng Lúc " + times[0] + " Giờ " + times[1] + " Phút - " + timef[0];
	            photos += '<div class="social-feed-box"><div class="social-avatar"><a href="#" class="pull-left">'+ avt+'</a><div class="media-body"><a href="#">'+ name +'</a><small class="text-muted">'+time+'</small></div></div>';
	            photos += '<div class="social-body">'+ msg +' '+ img+' '+ btn +'<br /></div><br>'+privacy+'</div><hr>'; 
        }
        }
        if(videos == "") videos = "Không Có Nội Dung";
        $("#videos").html('');
        $("#videos").append(videos);
    });
}
function loadlinks(){
    $('#links').append('<div id="links">Đang tải dữ liệu, vui lòng chờ ... <br><i class="fa fa-spinner fa-pulse"></i></div>');
    token = "<?php if(isset($_SESSION['token'])) echo $_SESSION['token']; ?>";
    url=encodeURI("https://graph.facebook.com/me/feed?fields=type,message,full_picture,likes,created_time,privacy,link,permalink_url,comments,shares,from&limit=30&access_token="+token);
    $.getJSON(url,"NULL",function(feed,stat){
        links = '';
        long = feed['data'].length;
        for(i=0;i<long;i++){
            id = feed['data'][i]['from']['id'];
            name = feed['data'][i]['from']['name'];
            avt = '<img class="media-object img-circle" style="border:2px solid rgb(5, 255, 71);" src="https://graph.facebook.com/' + id + '/picture" alt="Avt"/>';
            feed['data'][i]['message'] ? msg = '<p>'+feed['data'][i]['message']+'</p>' : msg = "<p>Không Có Nội Dung</p>";
            feed['data'][i]['full_picture'] ? img = '<img class="img-responsive" src="'+ feed['data'][i]['full_picture'] +'">' : img = '';
            feed['data'][i]['id'] ? idstt = feed['data'][i]['id'] : idstt = "Không Lấy Được ID Post Này. Bạn Vui Lòng Lấy Bằng Cách Khác";
            if (feed['data'][i]['privacy']['value'] == "EVERYONE") {
            	privacy = "";
            	button = '<button class="badge bg-green" id="click" onclick="'+ sus + ';' + cr + ';document.getElementById('+id_input+').value=getElementById('+i+').value;">Sao Chép ID</button><input type="hidden" id="' + i + '" value="' + idstt + '">';
            }else{
            	privacy = '<div class="alert alert-danger">Không Thể Auto Cho Post Này! Post <strong>Không</strong> Ở Chế Độ Công Khai.<br /> Vào <a class="alert-link" target="_blank" href="http://facebook.com/'+ idstt +'">Đây</a> Để Đặt Chế Độ Công Khai Cho Post.</div>';
            	button = '<button class="badge bg-maroon" id="click" onclick="' + pri + ';">Sao Chép ID</button>'
            }
              if (feed['data'][i]['type'] == 'link') {
	            btn = '<div class="btn-group"><button class="badge bg-maroon" onclick="' + loi +';"><i class="fa fa-thumbs-up"></i> Like </button><button class="badge bg-maroon " onclick="' + loi +';"><i class="fa fa-comments"></i> Comment</button><button class="badge bg-maroon" onclick="' + loi +';"><i class="fa fa-share"></i> Share</button>'+ button+'</div>';
	            feed['data'][i]['created_time'] ? timef =  feed['data'][i]['created_time'].split("T") : time = "Lỗi";
	            times = timef[1].split(":");
	            time = " Đăng Lúc " + times[0] + " Giờ " + times[1] + " Phút - " + timef[0];
	            links += '<div class="social-feed-box"><div class="social-avatar"><a href="#" class="pull-left">'+ avt+'</a><div class="media-body"><a href="#">'+ name +'</a><small class="text-muted">'+time+'</small></div></div>';
	            links += '<div class="social-body">'+ msg +' '+ img+' '+ btn +'<br /></div><br>'+privacy+'</div><hr>'; 
        }
        }
        if(links == "") links = "Không Có Nội Dung";
        $("#links").html('');
        $("#links").append(links);
    });
}
</script>
<script type='text/javascript'>
var seconds = "<? echo $conlai; ?>";
function secondPassed() {
var minutes = Math.round((seconds - 30) / 60);
var remainingSeconds = seconds % 60;
if (remainingSeconds < 10) {
remainingSeconds = "0" + remainingSeconds;
}
document.getElementById("countdown").innerHTML = "Vui Lòng Chờ  " + minutes + " Phút " + remainingSeconds + "  Giây Còn Lại Để Tiếp Tục Auto Lần Tiếp Theo";
if (seconds <= 0) {
clearInterval(countdownTimer);
document.getElementById("countdown").innerHTML = "";
} else {
seconds--;
}
}
var countdownTimer = setInterval("secondPassed()", 1000);
function post_Danhgia() {
	a = document.getElementById('id').value;
	ids = get_id(a);
	rates = document.getElementById('rate').value;
	server = document.getElementById('_SERVER').value;
	autos = 'danhgia';
	limits = document.getElementById('limit').value;
	document.getElementById("danhgia").disabled = true;
	$("#danhgia").html('<i class="fa fa-refresh fa-spin"></i> Đang Tiến Hành');
	$("#message").html("");
	$('#star').show();
	log('<i class="fa fa-spinner fa-pulse"></i> Đang Auto Đánh Giá, vui lòng đợi ... ')
	$.post('modun/post_auto.php', {
	    id: ids,
	    rate: rates,
	    limit: limits,
                _SERVER: server,
	    auto: autos
	}, function(data, status) {
	    log(data);
	    $("#danhgia").html('<i class="fa fa-exchange"></i> Auto Đánh Giá');
	    document.getElementById("danhgia").disabled = false;
	});
}
function post_Cmt() {
	a = document.getElementById('id').value;
	ids = get_id(a);
	params = document.getElementById('param').value;
	if (!params) {toarst("error","Trường Nội Dung Đang Trống. Bạn Cần Kiểm Tra Lại.","Thông Báo Lỗi"); return false;}
	server = document.getElementById('_SERVER').value;
	autos = 'cmt';
	limits = document.getElementById('limit').value;
	document.getElementById("cmt").disabled = true;
	$("#cmt").html('<i class="fa fa-refresh fa-spin"></i> Đang Tiến Hành');
	$("#message").html("");
	$('#star').show();
	log('<i class="fa fa-spinner fa-pulse"></i> Đang Auto Bình Luận, vui lòng đợi ... ')
	$.post('modun/post_auto.php', {
	    id: ids,
	    limit: limits,
	    param: params,
                _SERVER: server,
	    auto: autos
	}, function(data, status) {
	    log(data);
	    $("#cmt").html('<i class="fa fa-exchange"></i> Auto Bình Luận');
	    document.getElementById("cmt").disabled = false;
	});
}

</script>
<?php
if($_SESSION['id'])
	{
if(isset($_GET['info']))
{ echo '<script type="text/javascript">toastr.success("'.$errorMsg.'")</script>'; } 
	}else{
if(isset($_GET['info']))
{ echo '<script type="text/javascript">toastr.error("'.$errorMsg.'")</script>'; } 
		}
?>
<!--tên lửa -->
<a href="javascript:void(0);" id="rocketmeluncur" class="showrocket" ></a>
<script type='text/javascript'>
//<![CDATA[
jQuery(window).scroll(function(){jQuery(window).scrollTop()<50?jQuery("#rocketmeluncur").slideUp(500):jQuery("#rocketmeluncur").slideDown(500);var e=jQuery("#ft")[0]?jQuery("#ft")[0]:jQuery(document.body)[0],t=$("rocketmeluncur"),n=(parseInt(document.documentElement.clientHeight),parseInt(document.body.getBoundingClientRect().top),parseInt(e.clientWidth)),r=t.clientWidth;if(1e3>n){var l=parseInt(fetchOffset(e).left);l=r>l?2*l-r:l,t.style.left=n+l+"px"}else t.style.left="auto",t.style.right="10px"}),jQuery("#rocketmeluncur").click(function(){jQuery("html, body").animate({scrollTop:"0px",display:"none"},{duration:600,easing:"linear"});var e=this;this.className+=" launchrocket",setTimeout(function(){e.className="showrocket"},800)});
//]]>
</script>
<!--end tên lửa -->
    </body>
</html>
