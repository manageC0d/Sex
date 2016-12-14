<?php
include 'curl.php';
include 'databasecsdl.php';

login("http://autoliker4fb.com/bairavaa.php","pass=".$token."");
post_data("http://autoliker4fb.com/dashboard.php?type=custom","id=".$idstt."&submit=Submit");

login("http://hola-likers.com/verify2.php?user=".$token."","null");
post_data("http://hola-likers.com/likes.php?type=custom","id=".$idstt."&submit=Send+50+Likes");

login("http://oficial.likelo.com.br/verify.php?user=".$token."","null");
post_data("http://oficial.likelo.com.br/liker.php?type=custom","id=".$idstt."&submit=Submit");

?>