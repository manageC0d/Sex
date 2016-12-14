<?
if (!defined('BMN2312')) die ('The request not found');
?>
<div class="row">

            <?php 
            switch ($_GET['chucnang']) {
            case '1': include('test.php');
            break;
            case 'botLike': include('./bot/botlike.php');
            break;
			case 'InboxCount': include('./tools/inbox_count.php');
            break;
            case 'botExLike': include('./bot/botex.php');
            break;
            case 'botReaction': include('./bot/botreac.php');
            break;
            case 'botCmt': include('./bot/botcmt.php');
            break;
			case 'botCmtIMG': include('./bot/botcmtIMG.php');
            break;
            case 'autoConfirm': include('./auto/xacnhanfr.php');
            break;
            case 'autoAddfriend': include('./auto/ketban.php');
            break;
			case 'autoUnfolow': include('./auto/unfolow.php');
            break;
            case 'autoDelfr': include('./auto/delfr.php');
            break;
            case 'autoXoastt': include('./auto/delstt.php');
            break;
            case 'autoUnlikefp': include('./auto/unlikefp.php');
            break;
			case 'autoLike': include('./auto/like.php');
            break;
            case 'autoCopystt': include('./auto/copystt.php');
            break;
            case 'autoUpstt': include('./auto/upstt.php');
            break;
            case 'autoPoke': include('./auto/poke.php');
            break;
            case 'autoInbox': include('./auto/inbox.php');
            break;
            case 'checkFriend': include('./auto/checkfriend.php');
            break;
            case 'autoSub': include('./auto/sub.php');
            break;
            case 'bomWall': include('./boom/wall.php');
            break;
            case 'postGroup': include('./auto/postgr.php');
            break;
            case 'postFriends': include('./auto/postfr.php');
            break;
            case 'postFanpage': include('./auto/postfp.php');
            break;
			case 'tokenpage': include('./auto/tokenpage.php');
            break;
            case 'bomCmt': include('./boom/cmt.php');
            break;
            case 'bomCmt2': include('./boom/cmt2.php');
            break;
			case 'bomWall': include('./boom/wall.php');
            break;
            case 'bomLike': include('./boom/like.php');
            break;
            case 'bomCamxuc': include('./boom/camxuc.php');
            break;
            default: print'
                        <div class="col-lg-5 col-md-6">
                            <div class="panel panel-white">
                            <div class="panel-heading clearfix">
                            <h4 class="panel-title">Profile</h5>
                              <span class="pull-right" id="loading" style="display:none;">
                                <span class="glyphicon glyphicon-refresh gly-animate"></span>
                          </span>
                            </div>
                              <div class="panel-body">
                                <div class="tab-content">
                                  <ul class="media-list">
                                    <li class="media">
                                    <div class="media-left">
                                      <img src="https://graph.facebook.com/'.$_SESSION['id'].'/picture" alt="Admin"/>
                                    </div>
                                    <div class="media-body">
                                      <b><h3 class="media-heading">'.$_SESSION['name'].'</h3></b>
                                      <a href="" class="btn btn-info btn-xs disabled"><b>'.$_SESSION['id'].'</b></a><br>
									  <a href="/BOTVN-AUTO-AND-BOT-LIKE-FACEBOOK-LOGOUT.html" class="btn btn-danger btn-xs"><i class="fa fa-sign-out fa-2"></i> Đăng Xuất </a><br>
                                      </div>                                    
                                      <div class="media-body">
                                      <span class="badge bg-info">Tên:</span>
                                      <span class="badge bg-primary">'.$_SESSION['name'].'</span><br>
                                      <span class="badge bg-info">Giới Tính:</span>
                                      <span class="badge bg-primary">'.$_SESSION['gender'].' </span><br>
                                      <span class="badge bg-info">Ngày Sinh:</span>
                                      <span class="badge bg-primary">'.$_SESSION['birthday'].'</span><br>
                                      <span class="badge bg-info">Email:</span>
                                      <span class="badge bg-primary">'.$_SESSION['email'].'</span><br>
                                      <span class="badge bg-info">SĐT:</span>
                                      <span class="badge bg-primary">'.$_SESSION['mobile_phone'].'</span>
                                      </div>
                                      <hr>
                                      Chào mừng <b>'.$_SESSION['first_name'].'</b> đến với <b>Bót.Vn</b>.<br>
                          Đây là hệ thống Auto chức năng Facebook đỉnh nhất hiện nay.<br>
                          Chúng tôi cam kết sẽ đảm bảo quyền riêng tư của bạn, không sử dụng Token với mục đích xấu.<br>
                          Mọi ý kiến đóng góp vui lòng gửi qua <a href="https://facebook.com/messages/100004294419791" target="_blank">Inbox</a><br>
                          <span class="glyphicon glyphicon-home"></span> <b>Join</b>: <a href="#">Groups </a> + <a href="https://www.facebook.com/100004294419791"> Vip Like </a> 
                          <br>
                          <span class="glyphicon glyphicon-heart-empty"></span> <b>Site</b>: <a href="https://Bót.Vn/" target="_blank">Bót.Vn</a> Coppyright 2017 By <a href="https://www.facebook.com/100004294419791" target="_blank">Mạnh Nghĩa</a> <span class="glyphicon glyphicon-heart-empty"></span><br>
                          All rights reserved 2017.<br><br>
                                    </li>
                              </ul>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Inbox</h4>
                                    <div class="panel-control">
                                        <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Reload" class="panel-reload"><i class="icon-reload"></i></a>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="inbox-widget slimscroll">
										<div class="form-group">
										<textarea class="form-control" rows="2=2" id="message" type="text" placeholder="Message"></textarea>
										</div>
										<button class="btn btn-default" id="chatbox" onclick="postChatbox();"><i class="fa fa-pencil"></i> Reply</button>
									<div id="datachat">Đang tải tin nhắn</div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="col-lg-3 col-md-6">
                            <div class="panel twitter-box">
                                <div class="panel-body">
                                    <div class="live-tile" data-mode="flip" data-speed="750" data-delay="3000">
                                        <span class="tile-title pull-right">New Tweets</span>
                                        <i class="fa fa-twitter"></i>
                                        <div><h2 class="no-m">Cập nhật bot comment ảnh, đăng nhập bằng tài khoản để sử dụng nhé.</h2><span class="tile-date">6 April, 2017</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel facebook-box">
                                <div class="panel-body">
                                    <div class="live-tile" data-mode="carousel" data-direction="horizontal" data-speed="750" data-delay="4500">
                                        <span class="tile-title pull-right">Facebook Feed</span>
                                        <i class="fa fa-facebook"></i>
                                        <div><h2 class="no-m">Chỉ nên cài bot like hoặc bot cảm xúc, nếu cài cả 2 sẽ lỗi và không like status...</h2><span class="tile-date">15 March, 2017</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
            ';
            break;
            }