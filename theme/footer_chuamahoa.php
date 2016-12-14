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
