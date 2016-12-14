<!DOCTYPE html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Bypass URL Tools</title>
	
        <link rel="Shortcut Icon" type="image/x-icon" href="http://pubiway.xtgem.com/favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>
<body>



<div class="page-header">
  <h1>URL Bypass<small>Tools</small></h1>
</div>


<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title"><span class="label label-warning">Info Tools</span></h3>
  </div>
  <div class="panel-body">
<p>Tools ByPass url,Support Mega.co.nz, Tusfiles, Mediafire, Google Play,  Hugefiles, 1fichier, 4Shared, Indowebster, Uploading, Filepost, FileFactory, Oboom, Mirrorcreator, Datafilehost, 2Shared, SoundCloud, YouTube, Facebook Video, Vimeo, Dailymotion, Metacafe, Solidfiles, Sharebeast, Uppit, Gett, Usersfiles, Userscloud, Savefile.co, Speedyshare,  Elsfile,  Zxcfiles,  Acefiles, Aisfile, Sendspace, Sharemods, Mp4upload, Verzend, Idup.in, Letitbit | shortlink (link.safelinkconverter.com, safelinkreview.com, adf.ly, adfoc.us, sht.io, linkshrink, minidroid, p.pw, goo.gl, bitly, mylinkgen,  mir.cr, st.oploverz.net, st.azhie.net, st.wardhanime.net, st.kurogaze.net, etc)</p>
  </div>
</div>


<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><span class="label label-default">Menu</span></h3>
  </div>
  <div class="panel-body">

    <div class="form-group">

        <form method="post" action="">
                    <label for="email">URL</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="link" autofocus>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-paperclip"></span></span>

<input type="submit" name="submit" class="btn btn-info btn-block" value="ByPass Now!">
</form>
                    </div>
                </div>
  </div>
</div>



               

<?php
if($_POST[link]){

$masuk= $_POST['link'];
function bacaHTML($url){
  // inisialisasi CURL
  $data = curl_init();
  // setting CURL
  curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($data, CURLOPT_URL, $url);
  // menjalankan CURL untuk membaca isi file
  $hasil = curl_exec($data);
  curl_close($data);
  return $hasil;
}
 
$data1 = bacaHTML('http://www.autogeneratelink.com/?link='.$masuk);
$data2 = explode('<span class="glyphicon glyphicon-remove"></span></a>', $data1);

$data3 = explode('</li>', $data2[1]);

echo '<div class="panel panel-success"><div class="panel-heading"><h3 class="panel-title"><span class="label label-primary">Result:</span></h3></div><div class="panel-body">';
print_r($data3[0]);
echo '</div></div></div>';
}
?>


<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Visitors : </strong> <? include'counter.php';?>
</div>


<center>
<div class="panel panel-default">
  <div class="panel-body">
  </div>
  <div class="panel-footer">Copyright &copy; Pubiway<br>2015</div>
</div>

</body>
</html>







