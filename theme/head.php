<?
if (!defined('BMN2312')) die ('The request not found');
if(isset($_GET['info'])){
        switch($_GET['info']) {
            case 400:
                $errorMsg = "Bạn Phải Đăng Nhập Để Sử Dụng Chức Năng Này!";
            break;
            case thongbao:
                $errorMsg = "Hãy <b>Like</b> và <b>+1</b> cho Website để chúng tôi có thêm động lực duy trì và phát triển những chức năng tốt nhất đến với các bạn ! Thân.";
            break;
			case logout:
                $errorMsg = "Đăng xuất thành công! Nhớ thường xuyên truy cập để cập nhật bot nhé!";
            break;
            case success:
                $errorMsg = "Đăng nhập thành công! Chào mừng <b>$_SESSION[name]</b> đến với <b>#BotVN</b>";
            break;
            default:
                $errorMsg = "#BotVN - Hệ Thống Bot Facebook Đồn Như Lời ^^!";
            break;
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        
		<title>Bot Like | Bot Cảm Xúc | Ex Like | Bot Comment | Auto Like</title>
		<!-- BEGIN META -->
		<meta charset="utf-8">
		<meta name='revisit-after' content='1 days'/>
		<meta http-equiv="content-language" content="vi"/>
		<link rel="alternate" href="https://bót.vn" hreflang="vi-vn" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="#BotVN - Bot Like - Auto Like - Bot Cảm Xúc - Bot Ex Like - Bot Comment - Hàng Đầu Việt Nam.">
		<meta name="google-site-verification" content="rzHvb9XZvpdkncSSaQ6IJLlx0dx65HGYf5ulIbUcpMM" />
	    <meta property="og:title" content="Bot Like | Bot Cảm Xúc | Ex Like | Bot Comment | Auto Like">
	    <meta property="og:type" content="website">
		<meta property="og:locale" content="vi_VN"/>
	    <meta property="og:image" content="assets/images/banner.JPG">
	    <meta property="og:description" content="#BotVN - Bot Like - Auto Like - Bot Cảm Xúc - Bot Ex Like - Bot Comment - Hàng Đầu Việt Nam."/>
		<meta property="og:site_name" content="Bót.Vn"/>
	    <meta property="article:author" content="https://www.facebook.com/4"/>
	    <meta property="article:publisher" content="https://www.facebook.com/4"/>
	    <meta name="twitter:card" content="Bót.Vn">
	    <meta name="twitter:site" content="Bót.Vn">
	    <meta name="twitter:title" content="Bot Like | Bot Cảm Xúc | Ex Like | Bot Comment | Auto Like">
	    <meta name="twitter:description" content="#BotVN - Bot Like - Auto Like - Bot Cảm Xúc - Bot Ex Like - Bot Comment - Hàng Đầu Việt Nam.">
	    <meta name="description" content="#BotVN - Bot Like - Auto Like - Bot Cảm Xúc - Bot Ex Like - Bot Comment - Hàng Đầu Việt Nam."/>
	    <meta name="keywords" content="#BotVN, bot like, bot ex like, ex like, auto like, auto sub, auto share, hack like, hack sub, hack share, auto like facebook,hack like fanpage, autolike fanpage, autolike anh fb, hack like facebook, hack like fb, auto like fb , hack sub facebook , auto comments facebook, hack comments facebook, auto sub facebook, auto friends facebook, hack friends facebook"/>
	    <meta name="distribution" content="global"/>
	    <meta name="copyright" content="Bót.Vn copyright 2016"/>
	    <meta name="rating" content="General"/>
	    <meta name="language" content="vietnammese"/>
		<meta name="robots" content="index, follow" />
	    <meta name="expires" content="never"/>
		<!-- END META -->
		
		<!-- PopAds.net Popunder Code for xn--bt-5ja.vn -->
<script type="text/javascript" data-cfasync="false">
//<![CDATA[
  var _pop = _pop || [];
  _pop.push(['siteId', 1602046]);
  _pop.push(['minBid', 0]);
  _pop.push(['popundersPerIP', 0]);
  _pop.push(['delayBetween', 0]);
  _pop.push(['default', false]);
  _pop.push(['defaultPerDay', 0]);
  _pop.push(['topmostLayer', false]);
  (function() {
    var pa = document.createElement('script'); pa.type = 'text/javascript'; pa.async = true;
    var s = document.getElementsByTagName('script')[0]; 
    pa.src = '//c1.popads.net/pop.js';
    pa.onerror = function() {
      var sa = document.createElement('script'); sa.type = 'text/javascript'; sa.async = true;
      sa.src = '//c2.popads.net/pop.js';
      s.parentNode.insertBefore(sa, s);
    };
    s.parentNode.insertBefore(pa, s);
  })();
//]]>
</script>
<!-- PopAds.net Popunder Code End -->

		<!-- BEGIN ADS -->
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<script>
			(adsbygoogle = window.adsbygoogle || []).push({
				google_ad_client: "ca-pub-4086306007303680",
				enable_page_level_ads: true
			});
		</script>
		<!-- END ADS -->
		
		<!-- BEGIN GA -->
		<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-77969313-1']);
  _gaq.push(['_setDomainName', 'xn--bt-5ja.vn']);
  _gaq.push(['_trackPageview']);

  _gaq.push(['b._setAccount', 'UA-77969313-1']);
  _gaq.push(['b._setDomainName', 'xn--bt-5ja.vn']);
  _gaq.push(['b._trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
		</script>
		<!-- END GA -->

		<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-NXNGNQ');</script>
		<!-- End Google Tag Manager -->
	
        <!-- Styles -->
		<link rel="icon" type="image/png" href="https://fbstatic-a.akamaihd.net/rsrc.php/yl/r/H3nktOa7ZMg.ico" sizes="32x32">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
        <link href="../assets/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
        <link href="../assets/plugins/uniform/css/uniform.default.min.css" rel="stylesheet"/>
        <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/slidepushmenus/css/component.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/weather-icons-master/css/weather-icons.min.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/metrojs/MetroJs.min.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css"/>	
		<link href="../assets/plugins/rocket/style.css" rel="stylesheet" type="text/css"/>		
        	
        <!-- Theme Styles -->
        <link href="../assets/css/modern.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/themes/white.css" class="theme-color" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>
		<script src="../assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
        <script src="../assets/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>
		<script src="../assets/js/fuck.js"></script>
        
    </head>
		<!-- Bắt đầu ruồi
		<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
		<script src='../assets/plugins/ruoi2/ruoi.js' var_1='true' var_2='false' var_3='false'></script>
		 Kết thúc ruồi -->
		
    <body class="page-header-fixed compact-menu">
		<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXNGNQ"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	
        <form class="search-form">
            <div class="input-group">
                <input type="text" name="search" class="form-control search-input" placeholder="Search...">
                <span class="input-group-btn">
                    <button class="btn btn-default close-search waves-effect waves-button waves-classic" type="button"><i class="fa fa-times"></i></button>
                </span>
            </div><!-- Input Group -->
        </form><!-- Search Form -->
        <main class="page-content content-wrap">
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="sidebar-pusher">
                        <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                    <div class="logo-box">
                        <a href="/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-SMS.html" class="logo-text"><span>Bót.Vn</span></a>
                    </div><!-- Logo Box -->
                    <div class="search-button">
                        <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i class="fa fa-search"></i></a>
                    </div>
                    <div class="topmenu-outer">
                        <div class="top-menu">
                            <ul class="nav navbar-nav navbar-left">
                                <li>		
                                    <a href="javascript:void(0);"class="waves-effect waves-button waves-classic sidebar-toggle"><i class="fa fa-bars"></i></a>
                                </li>
                                <li>		
                                    <a href="javascript:void(0);"class="waves-effect waves-button waves-classic toggle-fullscreen"><i class="fa fa-expand"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
                                        <i class="fa fa-cogs"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-md dropdown-list theme-settings" role="menu">
                                        <li class="li-group">
                                            <ul class="list-unstyled">
                                                <li class="no-link" role="presentation">
                                                    Fixed Header 
                                                    <div class="ios-switch pull-right switch-md">
                                                        <input type="checkbox" class="js-switch pull-right fixed-header-check" checked>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="li-group">
                                            <ul class="list-unstyled">
                                                <li class="no-link" role="presentation">
                                                    Fixed Sidebar 
                                                    <div class="ios-switch pull-right switch-md">
                                                        <input type="checkbox" class="js-switch pull-right fixed-sidebar-check">
                                                    </div>
                                                </li>
                                                <li class="no-link" role="presentation">
                                                    Horizontal bar 
                                                    <div class="ios-switch pull-right switch-md">
                                                        <input type="checkbox" class="js-switch pull-right horizontal-bar-check">
                                                    </div>
                                                </li>
                                                <li class="no-link" role="presentation">
                                                    Toggle Sidebar 
                                                    <div class="ios-switch pull-right switch-md">
                                                        <input type="checkbox" class="js-switch pull-right toggle-sidebar-check">
                                                    </div>
                                                </li>
                                                <li class="no-link" role="presentation">
                                                    Compact Menu 
                                                    <div class="ios-switch pull-right switch-md">
                                                        <input type="checkbox" class="js-switch pull-right compact-menu-check" checked>
                                                    </div>
                                                </li>
                                                <li class="no-link" role="presentation">
                                                    Hover Menu 
                                                    <div class="ios-switch pull-right switch-md">
                                                        <input type="checkbox" class="js-switch pull-right hover-menu-check">
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="li-group">
                                            <ul class="list-unstyled">
                                                <li class="no-link" role="presentation">
                                                    Boxed Layout 
                                                    <div class="ios-switch pull-right switch-md">
                                                        <input type="checkbox" class="js-switch pull-right boxed-layout-check">
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="li-group">
                                            <ul class="list-unstyled">
                                                <li class="no-link" role="presentation">
                                                    Choose Theme Color
                                                    <div class="color-switcher">
                                                        <a class="colorbox color-blue" href="?theme=blue" title="Blue Theme" data-css="blue"></a>
                                                        <a class="colorbox color-green" href="?theme=green" title="Green Theme" data-css="green"></a>
                                                        <a class="colorbox color-red" href="?theme=red" title="Red Theme" data-css="red"></a>
                                                        <a class="colorbox color-white" href="?theme=white" title="White Theme" data-css="white"></a>
                                                        <a class="colorbox color-purple" href="?theme=purple" title="purple Theme" data-css="purple"></a>
                                                        <a class="colorbox color-dark" href="?theme=dark" title="Dark Theme" data-css="dark"></a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="no-link"><button class="btn btn-default reset-options">Reset Options</button></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
								<li id="menu_help">
									<a href="/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-HELP.html"><i class="fa fa-support"></i> Hỗ Trợ</a>
								</li>
								<li id="menu_about">
									<a href="/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-ABOUT.html"><i class="fa fa-briefcase"></i> Giới Thiệu</a>
								</li>
								<li id="menu_contact">
									<a href="/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-CONTACT.html"><i class="fa fa-envelope-o"></i> Liên Hệ</a>
								</li>
                                <li>	
                                    <a href="javascript:void(0);"class="waves-effect waves-button waves-classic show-search"><i class="fa fa-search"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
                                <?php if(($_SESSION['id'])) {
								print '<span class="user-name">'.$_SESSION['name'].'<i class="fa fa-angle-down"></i></span>';
								}else{
								print'<span class="user-name">User<i class="fa fa-angle-down"></i></span>';}?>
                                        <?php if(($_SESSION['id'])) {
								print '<img src="https://graph.facebook.com/'.$_SESSION['id'].'/picture" alt="Member" class="img-circle avatar" width="40" height="40">';
								}else{
								print'<img src="https://graph.facebook.com/4/picture" class="img-circle avatar" width="40" height="40">';}?>
                                    </a>
                                    <ul class="dropdown-menu dropdown-list" role="menu">
                                        <li role="presentation"><a href="profile.html"><i class="fa fa-user"></i>Profile</a></li>
                                        <li role="presentation"><a href="BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-LOGOUT.html"><i class="fa fa-sign-out m-r-xs"></i>Log out</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-LOGOUT.html" class="log-out waves-effect waves-button waves-classic">
                                        <span><i class="fa fa-sign-out m-r-xs"></i>Log out</span>
                                    </a>
                                </li>
                            </ul><!-- Nav -->
                        </div><!-- Top Menu -->
                    </div>
                </div>
            </div><!-- Navbar -->
            <div class="page-sidebar sidebar">
                <div class="page-sidebar-inner slimscroll">
                    <ul class="menu accordion-menu">
                        <li class="active"><a href="/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-trangchu.html" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-home"></span><p>Dashboard</p></a></li>
                        <li class="droplink"><a href="#" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-list"></span><p>Menu Bot</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li><a href="/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-BOT-LIKE.html">Bot Like</a></li>
                                <li><a href="/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-BOT-CAM-XUC.html">Bot Cảm Xúc</a></li>
								<li><a href="/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-BOT-COMMENT.html">Bot Comment</a></li>
								<li><a href="/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-BOT-COMMENT-ANH.html">Bot Comment Ảnh</a></li>
                                <li><a href="/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-BOT-EX-LIKE.html">Bot Ex Like</a></li>
                            </ul>
                        </li>
                        <li class="droplink"><a href="#" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-list"></span><p>Menu Bom</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li><a href="/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-BOM-LIKE.html">Bom Like</a></li>
								<li><a href="/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-BOM-WALL.html">Bom Wall</a></li>
                                <li><a href="/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-BOM-COMMENT.html">Bom Comment</a></li>
                                <li><a href="/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-BOM-COMMENT-2.html">Bom Comment 2</a></li>
                                <li><a href="/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-BOM-CAM-XUC.html">Bom Cảm Xúc</a></li>
                            </ul>
                        </li>
                        <li class="droplink"><a href="#" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-list"></span><p>Menu Post</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li><a href="/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-POST-GROUP.html">Post Group</a></li>
                                <li><a href="/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-POST-FRIEND.html">Post Friends</a></li>
                                <li><a href="/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-POST-FANPAGE.html">Post Fanpage</a></li>
								<li><a href="/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-GET-TOKEN-FANPAGE.html">Lấy Token Fanpage</a></li>
                            </ul>
                        </li>
                        <li class="droplink"><a href="#" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-list"></span><p>Menu Auto</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li><a href="/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-AUTO-LIKES.html">Auto Like</a></li>
								<li><a href="/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-AUTO-XOA-STATUS.html">Auto Xóa Status</a></li>
								<li><a href="/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-AUTO-DELETE-FRIEND.html">Auto Xóa Bạn Bè</a></li>
								<li><a href="/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-AUTO-CONFIRM-FRIEND.html">Auto Chấp Nhận KB</a></li>
								<li><a href="/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-AUTO-UNFOLOW-FRIEND.html">Auto Huỷ Theo Dõi</a></li>
								<li><a href="/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-AUTO-INBOX-FRIEND.html">Auto Inbox</a></li>
								<li><a href="/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-AUTO-ADD-FRIEND.html">Auto Kết Bạn</a></li>
                                <li><a href="/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-AUTO-UNLIKE-FANPAGE.html">Auto Unlike Page</a></li>
                                <li><a href="/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-AUTO-POKE.html">Auto Chọc Bạn Bè</a></li>
                                <li><a href="/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-AUTO-COPY-STATUS.html">Auto CopyStt</a></li>
								<li><a href="/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-AUTO-UPDATE-STATUS.html">Auto Update Stt</a></li>
                            </ul>
                        </li>
                        <li class="droplink"><a href="#" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-list"></span><p>Menu Check</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li><a href="/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-AUTO-CHECK-INFO.html">Check Info BB</a></li>
                                <li><a href="https://graph.facebook.com/fql?q=SELECT uid, phones FROM user WHERE uid IN ( SELECT uid2 FROM friend WHERE uid1 = me() ) ORDER BY rand() limit 5000&access_token=<?php echo $_SESSION['token']; ?>" target="_blank">Check SĐT</a></li>
								<li><a href="../tienich/inbox/">Đọc Tin Nhắn Qua Token</a></li>
							</ul>
                        </li>
						<li class="droplink"><a href="#" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-list"></span><p>Inbox Tool</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li><a href="/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-TOOL-INBOX-COUNT.html">Đếm Số SMS Đã Gửi</a></li>
								<li><a href="/">Gửi Tin Nhắn Mới</a></li>
								<li><a href="/">Xóa Tin Nhắn</a></li>
								<li><a href="/">Gửi Tin Nhắn Theo List ID</a></li>
							</ul>
                        </li>
                        <li class="droplink"><a href="#" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-list"></span><p>Tiện Ích Khác</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
								<li><a href="../tienich/upanh">Upload Ảnh</a></li>
								<li><a href="../tienich/onbox">Getlink Onbox.Vn</a></li>
								<li><a href="../tienich/bypassURL">Decode URL Rút Gọn</a></li>
								<li><a href="../simi">Chat Với SimSimi</a></li>
                                <li><a href="../tienich/cheanh/iphone">Chế Ảnh Iphone</a></li>
								<li><a href="../tienich/cheanh/fansign/">Chế Ảnh Girl Xinh</a></li>
								<li><a href="../tienich/cheanh/avatar-cf/">Chế Avatar CF</a></li>
								<li><a href="../tienich/chupanhmh">Chụp Ảnh Màn Hình Website</a></li>
								<li><a href="../tienich/proxy">Proxy Us Log Facebook</a></li>
								<li><a href="../tienich/hola">Fake Hola Siêu Tốc</a></li>
								<li><a href="../tienich/logo">Tạo Logo Wap</a></li>
								<li><a href="../tienich/pts">Photoshop Online</a></li>
								<li><a href="../tienich/hacker-type">Tập Làm Hacker</a></li>
								<li class="droplink"><a href="#"><p>F5 DDos</p><span class="arrow"></span></a>
                                    <ul class="sub-menu">
                                        <li><a href="../tienich/ddosF5/ddos_f5_1.html">Loại 1</a></li>
                                        <li><a href="../tienich/ddosF5/ddos_f5_2.html">Loại 2</a></li>
										<li><a href="../tienich/ddosF5/ddos_f5_3.html">Loại 3</a></li>
										<li><a href="../tienich/ddosF5/ddos_f5_4.html">Loại 4</a></li>
                                    </ul>
                                </li>
								<li><a href="../tienich/google">Google Search</a></li>
								<li><a href="../tienich/gettoken">Get Token Full Quyền</a></li>
								<li><a href="../tienich/account">Tạo Nick Facebook Ảo</a></li>
                                <li><a href="#">Wait Update</a></li>
                            </ul>
                        </li>
                        <li class="droplink"><a href="#" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-list"></span><p>Rich Snippets</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li>
								<div id="google">
								<div itemscope itemtype="http://schema.org/Recipe">
								<span itemprop="name">Bot Like | Bot Cảm Xúc | Ex Like | Bot Comment | Auto Like</span>
								<span itemprop="description">Auto Like - Bot Cảm Xúc - Bot Ex Like - Bot Comment - Bot Like - Hàng Đầu Việt Nam.</span>
								<div itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating">
								<span itemprop="ratingValue">9.5</span>/<span itemprop="bestRating">10</span>
								<span itemprop="ratingCount">135982</span> bình chọn
								</div>
								<span itemprop="author">Mạnh Nghĩa</span>
								<meta itemprop="prepTime" content="PT15M">
								<meta itemprop="cookTime" content="PT1H">
								<img align="center" itemprop="image" src="https://lh5.googleusercontent.com/-wEG4HuhWk3s/WCVvAxUajbI/AAAAAAAACwY/x03gmwUhSBoGKn-RSafCouiHd_ED-mwsgCL0B/s150-no/avatar386295_1.jpg" alt="Tools Facebook, Heart FB" width="30px" ; />
								<span itemprop="recipeYield"></span>
								<span itemprop="ingredients"></span>
								<span itemprop="recipeIngredient"></span>
								<span itemprop="nutrition"></span>
								</div>
								<a target="_blank" href="https://plus.google.com/108433855470103959905?rel=author" rel="author">Google Plus: Mạnh Nghĩa</a><br />
								</div></a></li>
                            </ul>
                        </li>
                        <li class="droplink"><a href="#" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-list"></span><p>Back Link</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
								<li><a href="http://starvip.info">StarVip - Bot Like</a></li>
								<li><a href="http://bot-ex.org">Bot-Ex - Bot Like</a></li>
								<li><a href="https://cddos.net">Bót.Vn - Tiện ích Facebook</a>
                                <li><a href="#">Wait Update</a></li>
                            </ul>
                        </li>
                        <li class="droplink"><a href="#" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-list"></span><p>Nothing Here</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li><a href="#">Wait Update</a></li>
                                <li><a href="#">Wait Update</a></li>
                            </ul>
                        </li>
                        <li class="droplink"><a href="#" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-list"></span><p>Nothing Here</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li class="droplink"><a href="#"><p>Level 1.1</p><span class="arrow"></span></a>
                                    <ul class="sub-menu">
                                        <li class="droplink"><a href="#"><p>Level 2.1</p><span class="arrow"></span></a>
                                            <ul class="sub-menu">
                                                <li><a href="#">Level 3.1</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Level 2.2</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Level 1.2</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- Page Sidebar Inner -->
            </div><!-- Page Sidebar -->
            <div class="page-inner">
                <div class="page-title">
                    <h3>Dashboard</h3>
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li>
							<iframe src="https://www.facebook.com/plugins/like.php?href=https://bót.vn&width=127&layout=button_count&action=like&size=small&show_faces=true&share=true&height=10&appId=234028647019057" width="127" height="22" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
							­­
							<!-- Đặt thẻ này vào phần đầu hoặc ngay trước thẻ đóng phần nội dung của bạn. -->
							<script src="https://apis.google.com/js/platform.js" async defer>
							  {lang: 'vi'}
							</script>
							
							<!-- Đặt thẻ này vào nơi bạn muốn Nút +1 kết xuất. -->
							<div class="g-plusone" data-href="https://bót.vn"></div>
							</li>
                        </ol>
                    </div>
                </div>
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="panel info-box panel-white">
                                <div class="panel-body">
                                    <div class="info-box-stats">
                                        <p class="counter">107,200</p>
                                        <span class="info-box-title">Thành viên sử dụng</span>
                                    </div>
                                    <div class="info-box-icon">
                                        <i class="icon-users"></i>
                                    </div>
                                    <div class="info-box-progress">
                                        <div class="progress progress-xs progress-squared bs-n">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel info-box panel-white">
                                <div class="panel-body">
                                    <div class="info-box-stats">
                                        <p class="counter">340,230</p>
                                        <span class="info-box-title">Lượt truy cập</span>
                                    </div>
                                    <div class="info-box-icon">
                                        <i class="icon-eye"></i>
                                    </div>
                                    <div class="info-box-progress">
                                        <div class="progress progress-xs progress-squared bs-n">
                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel info-box panel-white">
                                <div class="panel-body">
                                    <div class="info-box-stats">
                                        <p>$<span class="counter">653,000</span></p>
                                        <span class="info-box-title">Doanh thu hàng tháng</span>
                                    </div>
                                    <div class="info-box-icon">
                                        <i class="icon-basket"></i>
                                    </div>
                                    <div class="info-box-progress">
                                        <div class="progress progress-xs progress-squared bs-n">
                                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel info-box panel-white">
                                <div class="panel-body">
                                    <div class="info-box-stats">
                                        <p class="counter">47,500</p>
                                        <span class="info-box-title">Email mới</span>
                                    </div>
                                    <div class="info-box-icon">
                                        <i class="icon-envelope"></i>
                                    </div>
                                    <div class="info-box-progress">
                                        <div class="progress progress-xs progress-squared bs-n">
                                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->