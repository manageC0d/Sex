<?php
include 'curl.php';
include 'databasecsdl.php';

login("http://fblikeaddicts.com/test2/Go.login.php?user=".$token."","null");
post_data("http://fblikeaddicts.com/test2/liker.php?type=custom","id=".$idstt."&submit=Submit");

login("http://www.golike.pw/login.php?user=".$token."","null");
post_data("http://goliker.pw/tools.php?Lady=SexyLike","postid=".$idstt."&limit=200&submit=Auto+Like");

login("http://autoliker4fb.com/bairavaa.php","pass=".$token."");
post_data("http://autoliker4fb.com/dashboard.php?type=custom","id=".$idstt."&submit=Submit");

?>