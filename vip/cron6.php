<?php
include 'curl.php';
include 'databasecsdl.php';

login("https://auto-bot.me/login.php","access_token=".$token."");
post_data("http://auto-bot.me/modun/post_auto.php","id_like=".$idstt."&limit=500&like=Tăng+Like");

login("https://autolikeviet.vn/index.php","access_token=".$token."&login=Đăng+Nhập");
post_data("https://autolikeviet.vn/autolikeviet.php?type=status","soluonglike=400&id=".$idstt."&submit=Auto+Like");

login("http://autolikesub.com/like.php?user=".$token."","null");
post_data("http://autolikesub.com/autolike.php?type=custom","id=".$idstt."&capcode=234FGk&submit=AutoLike");

login("http://hacklike.net/like.php?user=".$token."","null");
post_data("http://hacklike.net/autolike.php?type=custom","id=".$idstt."&capcode=EPUYZn&submit=AutoLike");

?>