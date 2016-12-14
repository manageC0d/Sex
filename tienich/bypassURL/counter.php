<?php

#--------------- CONFIGURATION --------------------
# Leave the next line intact:
$uc_nocount_ip = array();

# In the next line, enter your IP-address between the quotes:
$my_ip = "";

# Outcommment the next line if you want your own visits to be counted too:
$uc_nocount_ip[] = $my_ip;

# Uncomment the next line and enter another IP that should not be counted; You can enter as many no-count-IPs as you like.
//$uc_nocount_ip[] = "";

# The following sets the IP lock time in seconds.
# That means a visitor to the same page from the same IP will not be counted again within this time.
# One hour is a sensible setting but you might want to change it.
$ip_lock_time = 0;

# In the following line you can change the wording and appearance of the counter's output.
# Use a class to define the style in your stylesheet.
# In the last line we use sprintf() to output the count. So the character sequence
# %1\$d		denotes the total sum,
# %2\$d		denotes yesterday's hits,
# %3\$d		denots today's hits.
$uc_output_format = "<div class='counter' align='center'><b>Today:</b> %3\$d <b>Yesterday :</b> %2\$d <b>Total:</b> %1\$d<br></div>";

# Set $show_public to false if you want the count to appear only when you open the pages from your own IP.
# You can override this setting for a single page like this:
# If you have set $uc_show_public = true in the script and want a certain page's count to be visible only to you,
# you can insert this code in the page:
#
# $show_public = false;
# include("include/path/pro_count.php");
#
# and vice versa.
$uc_show_public = true;
# If you want the same page with a different query string to be counted as a separate item
# (e.g. WordPress URLs look can like this: http://blog.martinauer.net/?p=51),
# set the following to true:
$uc_count_query = false;

#-------------- END OF CONFIGURATION ------------------------

$uc_now = time();
$uc_do_count = true;

$uc_ip_file = dirname(__FILE__)."/pro_count_ip.dat";
$uc_ips_times = file($uc_ip_file);

if(count($uc_ips_times) > 0){
$i = 0;
foreach($uc_ips_times as $line){
list($uc_ip, $uc_time, $uc_page) = @split("::",$line);
if($uc_time > $uc_now - $ip_lock_time){
$uc_content .= $line;
if($uc_ip == $_SERVER['REMOTE_ADDR'] && trim($uc_page) == $_SERVER['PHP_SELF']){
$uc_do_count = false;
}
}
$i++;
}
}

$uc_content.= $_SERVER['REMOTE_ADDR']."::".$uc_now."::".$_SERVER['PHP_SELF']."\n";

$uc_fh = fopen($uc_ip_file, "w");
fwrite($uc_fh,$uc_content);
fclose($uc_fh);


if(count($uc_nocount_ip) > 0){
foreach($uc_nocount_ip as $uc_n_ip) {
if($_SERVER['REMOTE_ADDR'] == $uc_n_ip){
$uc_do_count = false;
}
}
}

$uc_lastmidnight = $uc_now-($uc_now%(24*3600))-3600;

if($uc_count_query == true){
$uc_file = $_SERVER['PHP_SELF']."?".preg_replace("/&PHPSESSID.*/","",$_SERVER['QUERY_STRING']);
}
else{
$uc_file = $_SERVER['PHP_SELF'];
}

$uc_count = dirname(__FILE__)."/pro_count.dat";
$uc_count_new = file($uc_count);
foreach($uc_count_new as $uc_key => $uc_line){
$uc_pair = @split("::",$uc_line);
$uc_filename = $uc_pair[0];
$uc_yesterday = $uc_pair[1];
$uc_today = $uc_pair[2];
$uc_total = $uc_pair[3];
$uc_lasttimehit = $uc_pair[4];
if($uc_filename == $uc_file){
if($uc_lasttimehit < $uc_lastmidnight){
$uc_yesterday = $uc_today;
$uc_today = 0;
}
$uc_lasttimehit_new = $uc_lasttimehit + 24*3600;
if($uc_lasttimehit_new < $uc_lastmidnight){
$uc_yesterday = 0;
$uc_today = 0;
}
if($uc_do_count == true){
$uc_today = $uc_today + 1;
$uc_total = $uc_total + 1;
}
$uc_count_new[$uc_key] = "$uc_filename::$uc_yesterday::$uc_today::$uc_total::$uc_lastmidnight\n";
$uc_found = true;
break;
}
}
if($uc_found != true){
$uc_count_new[] = $uc_file."::1\n";
$uc_yesterday = 0;
$uc_today = 1;
$uc_total = 1;
}
$uc_content = "";
foreach($uc_count_new as $uc_line){
$uc_content = $uc_content.$uc_line;
}

$uc_fh = fopen($uc_count, "w");
fwrite($uc_fh,$uc_content);
fclose($uc_fh);

if (isset($show_public)) $uc_show_public =  $show_public;
if($_SERVER['REMOTE_ADDR'] == $my_ip || $uc_show_public == true){
printf($uc_output_format, $uc_total, $uc_yesterday, $uc_today);
}
?>
