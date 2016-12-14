<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!--- Script Moded By Md. Khalequzzaman Labonno -->

<head>
<style type="text/css">
</style>

<script type="text/javascript">
function pageStart() {
  var occ = location.href.indexOf("#");
  var loc = location.href.substring(occ+1);
  if (loc != "" && occ != -1) {
    window.location="decode.php?x=" + loc;
  }
}
var http = createRequestObject();
function encode() {
  var link = document.getElementById("inputText").value;
  document.getElementById("output").style.display = "";
  if (link == "") {
    document.getElementById("output").style.border = "1px solid red";
    document.getElementById("output").innerHTML = "Enter a URL first.";
  } else {
    document.getElementById("output").style.border = "1px solid #99ff00";
    document.getElementById("output").innerHTML = "<img src='Loading.gif'>";
    http.open("GET", "encode.php?x=" + link, true);
    http.onreadystatechange = objectReady;
    http.send(null);
  }
}
function createRequestObject() {
  var ro;
  var browser = navigator.appName;
  if (browser == "Microsoft Internet Explorer") {
    var ro = new ActiveXObject("Microsoft.XMLHTTP");
  }
  else {
    var ro = new XMLHttpRequest();
  }
  return ro;
}
function objectReady() {
  if (http.readyState == 4) {
    if (http.status == 200) {
      var result = http.responseText;
      document.getElementById("output").innerHTML = result;
    }
    else {
       document.getElementById("output").innerHTML = "error2"
    }
  }
}
</script>
</head>

<body onLoad="pageStart();">
<div id="container" style="width:320px;padding:20px;background:#f1f1f1;border:1px solid #f1f1f1;font-size:12px;font-family:trebuchet ms,arial,helvetica,freesans;">
URL to encode <input id="inputText" type="text"><input type="button" value="Encode" id="btnEncrypt" onClick="encode();">
</div><br>
<div id="output" style="display:none;width:320px;padding:20px;background:#ffffff;border:1px solid red;font-size:12px;font-family:trebuchet ms,arial,helvetica,freesans;">
test</div>
</body>

</html>

