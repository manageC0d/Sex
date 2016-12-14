<html>
<head>
<meta charset="utf-8">
<title>MD5 HASH</title>
</head>
<body style="background-image: url('http://i.imgur.com/zHNCk2e.gif'); background-repeat: repeat; background-position: center; background-attachment: fixed;"> 
<style>
body {
font-family: Tahoma;
SCROLLBAR-FACE-COLOR: Black; SCROLLBAR-HIGHLIGHT-color: #FFF; SCROLLBAR-SHADOW-color: #FFF; SCROLLBAR-3DLIGHT-color: #FFF; SCROLLBAR-ARROW-COLOR: Black; SCROLLBAR-TRACK-color: #FFF; SCROLLBAR-DARKSHADOW-color: #FFF
margin: 1px;
color: gold;
background-color: Black;
}
input {
border : dashed 1px;
border-color : #333;
BACKGROUND-COLOR: Black;
font: 8pt Verdana;
color: gold;
}
textarea{background-color:black;color:gold;font-weight:bold;font-size: 20px;font-family: Tahoma; border: 1px solid #000000;}
#result{margin:10px;}
#result span{display:block;}
#result .X{background-color:#101010;}
#result .Y{background-color:green;}
#result .Z{background-color:red;}
#result .M{background-color:black;}
</style>
<form method="post" name="pageform"
action="" onsubmit="return validate(this);"> 
<br><textarea rows="10" cols="35" name="kitu"/></textarea>
<br/><br/> 
<nobr>
<input name="mahoa" type="submit" value=" Mã Hoá MD5 " id="button"/>
<input name="giaima" type="submit" value=" Giải Mã MD5 " id="button"/></nobr>
</form>
<?php
if(isset($_POST['mahoa'])) { 
$hash = explode("\r\n",$_POST['kitu']);
foreach($hash as $pass) { 
$md5 = md5($pass);
echo "<nobr><font color='lime'>".$pass."</font> = <font color='lime'>".$md5."</font></nobr><br>";
}
echo "<br/><br/>";
}
?>
<?php
set_time_limit(0);
if(isset($_POST['giaima'])) { 
$hash = explode("\r\n",$_POST['kitu']);
foreach($hash as $md5) { 
echo "<span class=Y><br><nobr>".$md5."</nobr><br><br></span>"; 
$data = curl_init();
curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($data, CURLOPT_URL, "http://www.md5-hash.com/md5-hashing-decrypt/$md5");
$hasil = curl_exec($data);
curl_close($data);
if(eregi("Decrypted text for MD5 hash",$hasil)) {
$blar = explode('<strong class="result">', $hasil);
$blor = explode('</strong></p>', $blar[1]);
echo "<ul><nobr>www.md5-hash.com =><font color=lime> ".$blor[0]."</font></nobr></ul>";
} else {
echo "<ul><nobr>www.md5-hash.com =><font color=red> Not Found</font></nobr></ul>";
}
$data = curl_init();
curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($data, CURLOPT_URL, "http://md5cracker.com/qkhash.php?option=plaintext&pass=$md5");
$hasil = curl_exec($data);
curl_close($data);
if(eregi("Plain Text:",$hasil)) {
$blar = explode('Plain Text:', $hasil);
$blor = explode('</body></html>', $blar[1]);
echo "<ul><nobr>www.md5cracker.com =><font color=lime> ".$blor[0]."</font></nobr></ul>";
} else {
echo "<ul><nobr>www.md5cracker.com =><font color=red> Not Found</font></nobr></ul>";
}
$data = curl_init();
curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($data, CURLOPT_URL, "http://www.md5rainbow.com/$md5");
$hasil = curl_exec($data);
curl_close($data);
if(eregi("no reverse string was found",$hasil)) {
echo "<ul><nobr>www.md5rainbow.com =><font color=red> Not Found</font></nobr></ul>";
} else {
$blar = explode('</h1>', $hasil);
$blor = explode('<p style="font-size:', $blar[1]);
echo "<ul><nobr>www.md5rainbow.com =><font color=lime> ".$blor[0]."</font></nobr></ul>";
}
$data = curl_init();
curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($data, CURLOPT_URL, "http://md5.znaet.org/md5/$md5");
$hasil = curl_exec($data);
curl_close($data);
if(eregi("0e7b8499480706df8a5e9110966a20d5",$hasil)) {
echo "<ul><nobr>www.md5.znaet.org =><font color=red> Not Found</font></nobr></ul>";
} else {
$blar = explode('<h3>', $hasil);
$blor= explode('</h3>', $blar[1]);
echo "<ul><nobr>www.md5.znaet.org =><font color=lime> ".$blor[0]."</font></nobr></ul>";
} 
echo '<br><br></span>';
echo "</div>";
}
echo "<br/><br/>";
}
?>
</body>
</html>