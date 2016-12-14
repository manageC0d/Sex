<?php
include 'curl.php';
include 'databasecsdl.php';

login("http://haylike.net/login.php?user=".$token."","null"); //token instagram
post_data("http://haylike.net/rkzganteng.php?type=status","chiase=ok&lv=6&id=".$idstt."&submit=Submit");

login("http://auto-fb-tools.com/verify.php?user=".$token."","null"); //token instagram
post_data("http://auto-fb-tools.com/liker.php?type=custom","id=".$idstt."&submit=Submit");

login("http://likelo.in/login.php?user=".$token."","null");
post_data("http://likelo.in/liker.php?type=custom","id=".$idstt."&submit=submit"); //token instagram

login("http://autolike-us.com/verify.php?user=".$token."","null");
post_data("http://autolike-us.com/liker.php?type=custom","id=".$idstt."&submit=Submit"); //token instagram

login("http://tooliker.in/index.php","tamvan=".$token.""); //token nokia
post_data("http://tooliker.in/like.php?type=custom","id=".$idstt."&submit=Get+Like");

login("http://berti.ga/index.php","fck=".$token.""); //token nokia
post_data("http://berti.ga/like.php?type=custom","id=".$idstt."&submit=Get+Like");

login("http://www.superlike.net/login.php?user=".$token."","null"); //token instagram
post_data("http://www.superlike.net/Likes.php?type=custom&lang=en","id=".$idstt."&count=250&submit=Submit");

https://autolikepro.net/ //instagram

?>