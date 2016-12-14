<?php
function ROT13($text) {
  $array = explode("\r\n", chunk_split($text, 1));
  $result = "";
  array_pop($array);
  foreach ($array as $n) {
    if ((ord($n) >= 65 && ord($n) <= 77) || (ord($n) >= 97 && ord($n) <= 109)) {
      $result = $result.chr(ord($n)+13);
    } elseif ((ord($n) >= 78 && ord($n) <= 90) || (ord($n) >= 110 && ord($n) <= 122)) {
      $result = $result.chr(ord($n)-13);
    } else {
      $result = $result.$n;
    }
  }
  $path = mb_substr($_SERVER["PHP_SELF"],0,-mb_strlen(strrchr($_SERVER["PHP_SELF"],"/")));
  $result = "http://".$_SERVER["SERVER_NAME"].$path."/#".$result;
  print "<a href='".$result."'>".$result."</a>";
}
ROT13($_GET["x"]);
?>