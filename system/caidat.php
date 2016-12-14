<?php
include("../databasecsdl.php");
##  --> Tแบกo database  <-- ##
// --> Table Token <--
@mysqli_query($connection,"CREATE TABLE IF NOT EXISTS `Users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idfb` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `token1` varchar(255) NOT NULL,
  `token2` varchar(255) NOT NULL,
  `taikhoan` varchar(32) NOT NULL,
  `luotauto` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
 ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;
");
// --> Table Vip <--
@mysqli_query($connection,"CREATE TABLE IF NOT EXISTS `BotLike` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idfb` varchar(32) NOT NULL,
  `token` varchar(255) NOT NULL,
  `likecmt` varchar(32) NOT NULL,
  `ten` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;
");

@mysqli_query($connection,"CREATE TABLE IF NOT EXISTS `BotExCx` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idfb` varchar(32) NOT NULL,
  `token` varchar(255) NOT NULL,
  `ten` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;
");

@mysqli_query($connection,"CREATE TABLE IF NOT EXISTS `BotEx` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idfb` varchar(32) NOT NULL,
  `token` varchar(255) NOT NULL,
  `ten` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;
");

@mysqli_query($connection,"CREATE TABLE IF NOT EXISTS `BotCx` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idfb` varchar(32) NOT NULL,
  `token` varchar(255) NOT NULL,
  `likecmt` varchar(32) NOT NULL,
  `ten` varchar(32) NOT NULL,
  `camxuc` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;
");

@mysqli_query($connection,"CREATE TABLE IF NOT EXISTS `BotCmtRd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idfb` varchar(32) NOT NULL,
  `token` varchar(255) NOT NULL,
  `noidung` varchar(1024) NOT NULL,
  `ten` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;
");

@mysqli_query($connection,"CREATE TABLE IF NOT EXISTS `BotCmt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idfb` varchar(32) NOT NULL,
  `token` varchar(255) NOT NULL,
  `bieutuong` varchar(32) NOT NULL,
  `quangcao` varchar(32) NOT NULL,
  `ten` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;
");

@mysqli_query($connection,"CREATE TABLE IF NOT EXISTS `BotCmtImg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idfb` varchar(32) NOT NULL,
  `token` varchar(255) NOT NULL,
  `hinhanh` varchar(1024) NOT NULL,
  `ten` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;
");

@mysqli_query($connection,"CREATE TABLE IF NOT EXISTS `UpStt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idfb` varchar(32) NOT NULL,
  `token` varchar(255) NOT NULL,
  `theloai` varchar(32) NOT NULL,
  `thoigian` varchar(32) NOT NULL,
  `ten` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;
");

@mysqli_query($connection,"CREATE TABLE IF NOT EXISTS `BLOCK` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idfb` varchar(32) NOT NULL,
  `thoigian` varchar(52) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=80 ;
");

@mysqli_query($connection,"CREATE TABLE IF NOT EXISTS `Cookie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `fb_dtsg` varchar(512) NOT NULL,
  `camxuc` varchar(10) NOT NULL,
  `comments` varchar(1024) NOT NULL,
  `battatcmt` varchar(10) NOT NULL,
  `cookie` varchar(512) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=80 ;
");

?>
<meta charset="utf-8">
Cài đặt thành công :D