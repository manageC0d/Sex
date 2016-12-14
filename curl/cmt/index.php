<?php
include'../head.php';
?>
<title>Curl Cmt - Online</title>
<div class="container" style="margin-top:15px">

<center><div class="row">
                <hr />
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li><a href="/">Trang chủ</a></li>
                    <li><a href="/curl/share">Tools Auto Share</a></li>
                    <li><a href="/curl/like">Tools Auto Like</a></li>
					<li class="active"><a href="/curl/cmt">Tools Auto CMT</a></li>
					<li><a href="/curl/gettoken">GET Token Full Quyền</a></li>
       </ul>
</div> </center>
<br/>   

<p>
	<center><h2> * Đăng Nhập Nick Facebook Để Sử Dụng * </h2>
	<h3> * Nên Sử Dụng Nick Clone Để Đăng Nhập * </h3></center>
    </p>
	<br/>
	
<div class="panel panel-primary">
  <div class="panel-heading">
  
  <form action="login.php" class="Login" method="post">
    <h1>Facebook</h1>
	<br/><label><center>Facebook User CMT</center></label>
    <input type="text" name="idfb" class="form-control" placeholder="Nhập ID cần CMT">
	<br/><label><center>Facebook Clone CMT</center></label>
    <input type="text" name="user" class="form-control" placeholder="Clone Email Address">
	<br/><label><center>Facebook Password Clone</center></label>
    <input type="text" name="pass" class="form-control" placeholder="Clone Password">
    <br/><input type="submit" name="Login" value="Đăng Nhập Sử Dụng" class="btn btn-default">
  </form>
 </div>
</div> 
  
<?php
include'../foot.php';
?>