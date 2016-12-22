 <?
if (!defined('BMN2312')) die ('The request not found');
?>
     
	                     <div class="row">
                        <div class="col-lg-5 col-md-6">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title">Đăng Nhập</h4>
                                </div>
                                <div class="panel-body">
                                    <div id="rootwizard">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#tab1" data-toggle="tab"><i class="fa fa-user m-r-xs"></i>Tài Khoản</a></li>
                                            <li role="presentation"><a href="#tab2" data-toggle="tab"><i class="fa fa-shield m-r-xs"></i>Token</a></li>
                                        </ul>
                                            <div class="tab-content">
									<!--Tab-->
                                                <div class="tab-pane active fade in" id="tab1">
                                                    <div class="row">
                                                        <div class="col-md-12 text-center">
                                                            <div class="panel-body">
                                                            <div class="form-group">
                                                            <label for="email">* Email hoặc số điện thoại :</label>
                                                            <input id="email" placeholder="Nhập Email" class="form-control"/>
                                                            <label for="password">* Mật khẩu :</label>
                                                            <input id="password" type="password" placeholder="Nhập Mật Khẩu" class="form-control"/>
                                                            <label for="email">* Chọn Ứng Dụng :</label>
                                                            <select id="app" class="form-control">
                                                            <option value="6628568379">Facebook For Iphone</option>
                                                            <option value="350685531728">Facebook For Android</option>
                                                            </select>
                                                            </div>
                                                            <div class="form-group text-center" >
                                                            <button onclick="loginemail();" class="btn btn-primary" id="botvn_login" class="btn btn-sm btn-primary">Get Link Token</button>
                                                            </div>
                                                            <div class="form-group text-center" id="star" style="display:none">
                                                            <div id="message"></div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
									<!--Tab-->
                                                <div class="tab-pane fade" id="tab2">
                                                    <div class="row m-b-lg">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                        <div class="form-group">
                                            <label></label>
                                            <input id="matoken" type="text" onpaste="setTimeout( function() { login(document.getElementById('matoken').value);}, 100);" class="form-control" placeholder="Nhập token vào đây">
                                        </div>
                                        <center><button type="button" id="go" onclick="login(document.getElementById('matoken').value);" class="btn btn-primary">Đăng Nhập</button> <a class="btn btn-primary" target="_blank" href="https://goo.gl/4rU6PV">Cài Token</a> <a class="btn btn-primary" target="_blank" href="https://developers.facebook.com/tools/debug/accesstoken/?app_id=41158896424">Lấy Token</a></center>
										<hr>
                            <span>+ Năm sinh của nick sử dụng cần thiết lập đủ hoặc trên 18 tuổi.</br>
                            + <a href="http://fb.com/settings?tab=followers" target="_blank">Thiết lập</a>. "Ai có thể theo dõi tôi" chọn <b>Tất cả mọi người</b> hoặc <b>Everyone</b></br>
                            + <a href="href=https://www.facebook.com/settings?tab=privacy&amp;section=composer&amp;view" target="_blank">Thiết lập</a>. Các bài viết của bạn phải được đặt ở chế độ <b>Mọi người</b></br>
                            + <a href="http://fb.com/settings?tab=followers&amp;section=comment&amp;view" target="_blank">Thiết lập</a>. "Bình luận của người theo dõi" chọn <b>Tất cả mọi người</b> hoặc <b>Everyone</b></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
									<!--Tab-->
                                            </div>
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
                                        <div><h2 class="no-m">Chỉ nên cài bot like hoặc bot cảm xúc, nếu cài cả 2 sẽ lỗi và không like status...</h2><span class="tile-date">6 April, 2017</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel facebook-box">
                                <div class="panel-body">
                                    <div class="live-tile" data-mode="carousel" data-direction="horizontal" data-speed="750" data-delay="4500">
                                        <span class="tile-title pull-right">Facebook Feed</span>
                                        <i class="fa fa-facebook"></i>
                                        <div><h2 class="no-m">Đăng nhập bằng tài khoản để lấy token full quyền cài bot cảm xúc nhé</h2><span class="tile-date">15 March, 2017</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>