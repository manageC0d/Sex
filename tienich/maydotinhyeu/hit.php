<?php

$fp=fopen("hit.txt","a+"); fputs($fp,"1"); fclose($fp); $fp1=filesize("hit.txt"); echo "$fp1";

?>