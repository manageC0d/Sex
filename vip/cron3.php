<?php
include 'curl.php';
include 'databasecsdl.php';

login("http://hublaalike.com/verify.php","user=".$token."");
post_data("http://hublaalike.com/liker.php?type=custom","id=".$idstt."&submit=Submit");

login("http://postlikes.in/login.php?user=".$token."","null");
post_data("http://postlikes.in/liker.php?type=custom","id=".$idstt."&submit=Submit");

login("http://www.extreamliker.com/verify.php?user=".$token."","null");
post_data("http://www.extreamliker.com/like.php?type=status","graph_id=".$idstt."&submit_status=Submit");

?>