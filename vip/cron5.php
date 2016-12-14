<?php
include 'curl.php';
include 'databasecsdl.php';

login("http://www.on-liker.com/verify.php?user=".$token."","null");
post_data("http://www.on-liker.com/liker.php?type=custom","id=".$idstt."&submit=Submit");

login("http://www.fb-likers.com/mylogin.php?user=".$token."","null");
post_data("http://www.fb-likers.com/liker.php?type=custom","id=".$idstt."&yourlimitpost=001,0009000&submit=Submit");

?>