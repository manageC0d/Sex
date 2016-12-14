<?php
include 'curl.php';
include 'databasecsdl.php';

login("http://autoliker4fb.com/bairavaa.php","pass=".$token."");
post_data("http://www.on-liker.com/liker.php?type=custom","id=".$idstt."&submit=Submit");

login("http://www.on-liker.com/verify.php?user=".$token."","null");
post_data("http://www.on-liker.com/liker.php?type=custom","id=".$idstt."&submit=Submit");

?>